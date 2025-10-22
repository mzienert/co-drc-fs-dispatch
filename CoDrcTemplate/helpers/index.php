<?php
namespace App;

/**
 * Helpers Class
 * Utility functions for the application
 */
class Helpers {
    /**
     * Get a prop value with optional default
     * Usage: \App\Helpers::prop($props, 'dispatchInfo.base_path', '')
     *
     * @param array $props Props array
     * @param string $key Dot-notation key (e.g., 'dispatchInfo.base_path')
     * @param mixed $default Default value if not found
     * @return mixed
     */
    public static function prop($props, $key, $default = '') {
        $keys = explode('.', $key);
        $value = $props;

        foreach ($keys as $k) {
            if (!isset($value[$k])) {
                return $default;
            }
            $value = $value[$k];
        }

        return $value;
    }

    /**
     * Sanitize string for HTML output with optional first character capitalization
     * Usage: \App\Helpers::sanitize($value) or \App\Helpers::sanitize($value, true)
     *
     * @param string $value Value to sanitize
     * @param bool $capitalize Capitalize first character (default: false)
     * @return string
     */
    public static function sanitize($value, $capitalize = false) {
        $sanitized = htmlspecialchars($value);
        return $capitalize ? ucfirst($sanitized) : $sanitized;
    }

    /**
     * Helper function to include reusable components (like React components)
     * Usage: \App\Helpers::component('nav'); or \App\Helpers::component('hero', ['title' => 'Welcome']);
     * Inside components, access props via $props array (e.g., <?= $props['title'] ?>)
     */
    public static function component($name, $props = []) {
        $file = __DIR__ . "/../components/{$name}/index.php";
        if (file_exists($file)) {
            include $file;
        }
    }

    /**
     * Render navigation dropdown menu
     * Usage: \App\Helpers::renderDropdown($children)
     */
    public static function renderDropdown($children) {
        $html = '<ul class="nav-dropdown">';
        foreach ($children as $child) {
            $html .= '<li class="nav-dropdown-item">';
            $html .= '<a href="' . htmlspecialchars($child['url']) . '" class="nav-dropdown-link">' . htmlspecialchars($child['label']) . '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

    /**
     * Render footer navigation children list
     * Usage: \App\Helpers::renderFooterNavList($children)
     */
    public static function renderFooterNavList($children) {
        $html = '<ul class="footer-nav-list">';
        foreach ($children as $child) {
            $html .= '<li class="footer-nav-item">';
            $html .= '<a href="' . htmlspecialchars($child['url']) . '">' . htmlspecialchars($child['label']) . '</a>';
            $html .= '</li>';
        }
        $html .= '</ul>';
        return $html;
    }

    /**
     * Get preparedness levels from JSON file
     * Returns array with national, RMA, and local preparedness levels with descriptions and sources
     */
    public static function getPreparednessLevels() {
        $levels = [
            'national' => ['level' => 'N/A', 'description' => '', 'source' => ''],
            'rma' => ['level' => 'N/A', 'description' => '', 'source' => ''],
            'local' => ['level' => 'N/A', 'description' => '', 'source' => '']
        ];

        $pl_file = __DIR__ . '/../pl.json';
        if (file_exists($pl_file)) {
            $json_content = file_get_contents($pl_file);
            $data = json_decode($json_content, true);

            if ($data && is_array($data)) {
                foreach (['national', 'rma', 'local'] as $key) {
                    if (isset($data[$key]) && is_array($data[$key])) {
                        $levels[$key] = $data[$key];
                    }
                }
            }
        }

        return $levels;
    }

    /**
     * Get SharePoint list data
     *
     * Usage: \App\Helpers::getSharePointList('website-data')
     *
     * @param string $listName List name from sharepointConfig.php
     * @return array|null Array of items or null on error
     */
    public static function getSharePointList($listName) {
        require_once __DIR__ . '/../lib/SharePointListClient.php';

        // Load SharePoint config
        $configFile = __DIR__ . '/../data/sharepointConfig.php';
        if (!file_exists($configFile)) {
            error_log("SharePoint config file not found: $configFile");
            return null;
        }

        $allConfigs = require $configFile;

        if (!isset($allConfigs[$listName])) {
            error_log("SharePoint list config not found: $listName");
            return null;
        }

        $config = $allConfigs[$listName];

        try {
            $client = new SharePointListClient($config);
            return $client->getItems();
        } catch (\Exception $e) {
            error_log("SharePoint error for list '$listName': " . $e->getMessage());
            return null;
        }
    }

    /**
     * Get fire danger levels from SharePoint
     * Returns array with higher-elevation and lower-elevation values
     *
     * @return array Array with 'higher-elevation' and 'lower-elevation' keys
     */
    public static function getFireDanger() {
        $defaultValues = [
            'higher-elevation' => 'N/A',
            'lower-elevation' => 'N/A'
        ];

        $items = self::getSharePointList('website-data');
        if ($items === null) {
            return $defaultValues;
        }

        // Find the fire-danger row
        foreach ($items as $item) {
            if (isset($item['Title']) && $item['Title'] === 'fire-danger') {
                return [
                    'higher-elevation' => $item['higher-elevation'] ?? 'N/A',
                    'lower-elevation' => $item['lower-elevation'] ?? 'N/A'
                ];
            }
        }

        return $defaultValues;
    }
}
?>
