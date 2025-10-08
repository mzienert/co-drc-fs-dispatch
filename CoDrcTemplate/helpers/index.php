<?php
/**
 * Helpers Class
 * Utility functions for the application
 */
class Helpers {
    /**
     * Helper function to include reusable components (like React components)
     * Usage: Helpers::component('nav'); or Helpers::component('hero', ['title' => 'Welcome']);
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
     * Usage: Helpers::renderDropdown($children)
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
}
?>
