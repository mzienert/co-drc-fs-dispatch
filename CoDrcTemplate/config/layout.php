<?php
/**
 * Layout Bootstrap
 * React-like layout system using output buffering
 * Pages only need to define content - layout wraps automatically
 */

// Start output buffering to capture page content
$buffer_started = ob_start();
if (!$buffer_started) {
    error_log('Output buffering failed to start');
    // Set flag to skip buffering system
    define('BUFFER_FAILED', true);
}

// Set default layout (can be overridden per page)
if (!isset($layout)) {
    $layout = __DIR__ . '/../layouts/default.php';
}

// Default page variables (can be overridden per page)
$page_title = $page_title ?? "$dispatch_center_name ($dispatch_center_id)";
$meta_description = $meta_description ?? '';
$body_class = $body_class ?? '';

/**
 * Helper function to include reusable components (like React components)
 * Usage: component('nav'); or component('hero', ['title' => 'Welcome']);
 */
function component($name, $data = []) {
    extract($data);
    $file = __DIR__ . "/../components/{$name}/index.php";
    if (file_exists($file)) {
        include $file;
    }
}

/**
 * Render layout on shutdown
 * Captures buffered content and wraps it with layout
 */
function render_layout() {
    // Skip if buffering never started
    if (defined('BUFFER_FAILED') && BUFFER_FAILED) {
        return;
    }

    global $layout, $page_title, $meta_description, $body_class;
    global $dispatch_center_name, $dispatch_center_id, $dispatch_center_email;
    global $dispatch_center_24_hour_phone, $dispatch_center_office_phone;
    global $dispatch_center_fax_number, $dispatch_center_address_line_1, $dispatch_center_address_line_2;

    // Get the buffered page content
    $content = ob_get_clean();

    // If buffer retrieval failed, log error and bail out
    if ($content === false) {
        error_log('Failed to retrieve output buffer content');
        return;
    }

    // Render the layout with content
    if (file_exists($layout)) {
        require $layout;
    } else {
        echo $content;
    }
}

// Register shutdown function to automatically apply layout
register_shutdown_function('render_layout');
?>
