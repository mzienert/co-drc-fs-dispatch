<?php
namespace App;

/**
 * SharePointListClient
 *
 * Fetches data from SharePoint Online lists using REST API with anonymous sharing
 */
class SharePointListClient {
    private $shareLink;
    private $listGuid;
    private $siteUrl;
    private $cookieFile;
    private $debug;

    /**
     * Constructor
     *
     * @param array $config Configuration:
     *   - shareLink: "Anyone with the link" URL
     *   - listGuid: List GUID (without braces)
     *   - siteUrl: SharePoint site URL
     *   - debug: Enable debug logging (optional, default false)
     */
    public function __construct(array $config) {
        // Validate required config
        if (empty($config['shareLink'])) {
            throw new \InvalidArgumentException("Missing required config: shareLink");
        }
        if (empty($config['listGuid'])) {
            throw new \InvalidArgumentException("Missing required config: listGuid");
        }
        if (empty($config['siteUrl'])) {
            throw new \InvalidArgumentException("Missing required config: siteUrl");
        }

        $this->shareLink = $config['shareLink'];
        $this->listGuid = $config['listGuid'];
        $this->siteUrl = rtrim($config['siteUrl'], '/');
        $this->debug = $config['debug'] ?? false;

        // Set cookie file path
        $listHash = md5($this->listGuid);
        $this->cookieFile = sys_get_temp_dir() . "/sp_cookies_$listHash.txt";
    }

    /**
     * Get configuration info (for testing)
     */
    public function getConfig() {
        return [
            'shareLink' => $this->shareLink,
            'listGuid' => $this->listGuid,
            'siteUrl' => $this->siteUrl,
            'cookieFile' => $this->cookieFile,
            'debug' => $this->debug
        ];
    }

    /**
     * Get list items from SharePoint
     * This is the main public method to retrieve data
     *
     * @return array|null Array of items or null on error
     */
    public function getItems() {
        return $this->fetchListItems();
    }

    /**
     * Fetch list items from SharePoint REST API
     *
     * @return array|null Array of items or null on error
     */
    private function fetchListItems() {
        $this->log("Fetching list items");

        // Step 1: Get authentication cookie
        if (!$this->getFedAuthCookie()) {
            $this->log("ERROR: Failed to obtain FedAuth cookie");
            return null;
        }

        // Step 2: Call REST API
        $apiUrl = $this->siteUrl . "/_api/web/lists(guid'" . $this->listGuid . "')/items";
        $this->log("Calling REST API: $apiUrl");

        $ch = curl_init($apiUrl);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Accept: application/json;odata=verbose',
            ],
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            CURLOPT_COOKIEFILE => $this->cookieFile,
            CURLOPT_TIMEOUT => 30,
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        // Check for errors
        if ($response === false) {
            $this->log("ERROR: cURL error - $curlError");
            return null;
        }

        if ($httpCode !== 200) {
            $this->log("ERROR: HTTP $httpCode");
            $this->log("Response: " . substr($response, 0, 200));
            return null;
        }

        // Parse JSON response
        $data = json_decode($response, true);

        if (!isset($data['d']['results'])) {
            $this->log("ERROR: Unexpected response format");
            return null;
        }

        $items = $data['d']['results'];
        $this->log("Successfully fetched " . count($items) . " items");

        // Clean up items (decode field names and remove metadata)
        $items = array_map([$this, 'cleanItem'], $items);

        return $items;
    }

    /**
     * Clean an item by removing metadata and decoding field names
     *
     * @param array $item Raw item from SharePoint
     * @return array Cleaned item
     */
    private function cleanItem(array $item) {
        $cleaned = [];

        // Fields to skip (metadata and complex objects)
        $skipFields = [
            '__metadata',
            'FirstUniqueAncestorSecurableObject',
            'RoleAssignments',
            'AttachmentFiles',
            'ContentType',
            'GetDlpPolicyTip',
            'FieldValuesAsHtml',
            'FieldValuesAsText',
            'FieldValuesForEdit',
            'File',
            'Folder',
            'LikedByInformation',
            'ParentList',
            'Properties',
            'Versions',
        ];

        foreach ($item as $key => $value) {
            // Skip metadata fields and complex objects
            if (in_array($key, $skipFields) || is_array($value) || is_object($value)) {
                continue;
            }

            // Decode SharePoint field name encoding
            $decodedKey = $this->decodeFieldName($key);

            $cleaned[$decodedKey] = $value;
        }

        return $cleaned;
    }

    /**
     * Decode SharePoint field name encoding
     *
     * SharePoint encodes special characters in field names:
     * - Hyphen: _x002d_
     * - Space: _x0020_
     * - Underscore: _x005f_
     *
     * @param string $fieldName Encoded field name
     * @return string Decoded field name
     */
    public static function decodeFieldName($fieldName) {
        $decoded = $fieldName;
        $decoded = str_replace('_x002d_', '-', $decoded);
        $decoded = str_replace('_x0020_', ' ', $decoded);
        $decoded = str_replace('_x005f_', '_', $decoded);
        return $decoded;
    }

    /**
     * Get FedAuth cookie by visiting the shared link
     * This mimics what a browser does when accessing the "Anyone with the link" URL
     *
     * @return bool True on success, false on failure
     */
    private function getFedAuthCookie() {
        $this->log("Getting FedAuth cookie from share link");

        $ch = curl_init($this->shareLink);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HEADER => true,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
            CURLOPT_COOKIEJAR => $this->cookieFile,
            CURLOPT_COOKIEFILE => $this->cookieFile,
            CURLOPT_TIMEOUT => 30,
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        // Check for cURL errors
        if ($response === false) {
            $this->log("ERROR: cURL error - $curlError");
            return false;
        }

        // Check HTTP status
        if ($httpCode !== 200) {
            $this->log("ERROR: HTTP $httpCode when getting cookie");
            return false;
        }

        // Verify cookie file was created and contains FedAuth
        if (!file_exists($this->cookieFile)) {
            $this->log("ERROR: Cookie file not created");
            return false;
        }

        $cookieContent = file_get_contents($this->cookieFile);
        if (strpos($cookieContent, 'FedAuth') === false) {
            $this->log("ERROR: FedAuth cookie not found in cookie file");
            return false;
        }

        $this->log("Successfully obtained FedAuth cookie");
        return true;
    }

    /**
     * Log debug message
     */
    private function log($message) {
        if ($this->debug) {
            echo "[SharePointListClient] $message\n";
        }
    }
}
?>
