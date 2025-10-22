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
     * Get FedAuth cookie by visiting the shared link
     * This mimics what a browser does when accessing the "Anyone with the link" URL
     *
     * @return bool True on success, false on failure
     */
    public function getFedAuthCookie() {
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
