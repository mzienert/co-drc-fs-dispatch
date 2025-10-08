<?php
/**
 * Output Buffer Management
 * React-like layout system using output buffering
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

    global $layout, $page_title, $meta_description, $body_class, $canonical_url;
    global $og_title, $og_description, $og_url, $og_type, $og_site_name, $og_image;
    global $dispatchInfo;

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
