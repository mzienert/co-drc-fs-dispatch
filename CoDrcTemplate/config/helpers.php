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
 * Get preparedness levels from text file
 * Returns array with national, RMA, and local preparedness levels
 */
function getPreparednessLevels() {
    $levels = [
        'national' => 'PL N/A',
        'rma' => 'PL N/A',
        'local' => 'PL N/A'
    ];

    // Read national and RMA levels
    $pl_file = __DIR__ . '/../pl.txt';
    if (file_exists($pl_file)) {
        $pl_content = file_get_contents($pl_file);
        if (preg_match('/Preparedness Level[\n\s]+National\s+(PL \d)[\n\s]+RMA\s+(PL \d)/', $pl_content, $matches)) {
            $levels['national'] = $matches[1];
            $levels['rma'] = $matches[2];
        }
        // Read local level
        if (preg_match('/Preparedness Level[\n\s]+Local\s+(PL \d)/', $pl_content, $matches)) {
            $levels['local'] = $matches[1];
        }
    }

    return $levels;
}
?>
