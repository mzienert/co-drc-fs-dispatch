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
     * Log debug message
     */
    private function log($message) {
        if ($this->debug) {
            echo "[SharePointListClient] $message\n";
        }
    }
}
?>
