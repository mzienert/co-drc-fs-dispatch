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
?>
