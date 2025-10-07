<?php
/**
 * Helper Functions
 * Reusable utility functions for the application
 */

/**
 * Helper function to include reusable components (like React components)
 * Usage: component('nav'); or component('hero', ['title' => 'Welcome']);
 * Inside components, access props via $props array (e.g., <?= $props['title'] ?>)
 */
function component($name, $props = []) {
    $file = __DIR__ . "/../components/{$name}/index.php";
    if (file_exists($file)) {
        include $file;
    }
}

/**
 * Render navigation dropdown menu
 * Usage: renderDropdown($children)
 */
function renderDropdown($children) {
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
 * Returns array with national, RMA, and local preparedness levels
 */
function getPreparednessLevels() {
    $levels = [
        'national' => 'PL N/A',
        'rma' => 'PL N/A',
        'local' => 'PL N/A'
    ];

    $pl_file = __DIR__ . '/../pl.json';
    if (file_exists($pl_file)) {
        $json_content = file_get_contents($pl_file);
        $data = json_decode($json_content, true);

        if ($data && is_array($data)) {
            if (isset($data['national'])) $levels['national'] = $data['national'];
            if (isset($data['rma'])) $levels['rma'] = $data['rma'];
            if (isset($data['local'])) $levels['local'] = $data['local'];
        }
    }

    return $levels;
}
?>
