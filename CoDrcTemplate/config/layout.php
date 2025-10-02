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
} else {
    // Store our buffer level for verification later
    define('LAYOUT_BUFFER_LEVEL', ob_get_level());
}

// Register error handler to clean buffers on fatal errors
register_shutdown_function(function() {
    $error = error_get_last();
    if ($error && in_array($error['type'], [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR])) {
        // Fatal error occurred - clean up any open buffers
        while (ob_get_level() > 0) {
            ob_end_clean();
        }

        // Log the error
        error_log("Fatal error: {$error['message']} in {$error['file']}:{$error['line']}");

        // Show user-friendly error page
        http_response_code(500);
        $error_details = base64_encode(json_encode([
            'message' => $error['message'],
            'file' => $error['file'],
            'line' => $error['line']
        ]));
        require __DIR__ . '/../errors/fatal.php';
    }
});

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
 * Inside components, access props via $props array (e.g., <?= $props['title'] ?>)
 */
function component($name, $props = []) {
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

    // Check if we have an active buffer before trying to clean
    $current_level = ob_get_level();
    if ($current_level === 0) {
        error_log('No output buffer active when render_layout was called');
        return;
    }

    // Verify we're at the correct buffer level (our buffer, not a nested one)
    if (defined('LAYOUT_BUFFER_LEVEL') && $current_level !== LAYOUT_BUFFER_LEVEL) {
        error_log("Buffer level mismatch: expected " . LAYOUT_BUFFER_LEVEL . ", got $current_level");
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
