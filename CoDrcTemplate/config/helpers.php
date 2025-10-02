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
?>
