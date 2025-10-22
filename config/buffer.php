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

// Create render_layout closure that captures page context
$render_layout = function() use ($pageContext) {
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

    // Get the buffered page content
    $pageContext->content = ob_get_clean();

    // If buffer retrieval failed, log error and bail out
    if ($pageContext->content === false) {
        error_log('Failed to retrieve output buffer content');
        return;
    }

    // Extract variables for layout template
    $layoutData = $pageContext->layoutData;
    $layout = $pageContext->layout;
    $page_title = $pageContext->page_title;
    $meta_description = $pageContext->meta_description;
    $body_class = $pageContext->body_class;
    $canonical_url = $pageContext->canonical_url;
    $og_title = $pageContext->og_title;
    $og_description = $pageContext->og_description;
    $og_url = $pageContext->og_url;
    $og_type = $pageContext->og_type;
    $og_site_name = $pageContext->og_site_name;
    $og_image = $pageContext->og_image;
    $content = $pageContext->content;

    // Render the layout with content
    if (file_exists($layout)) {
        require $layout;
    } else {
        echo $content;
    }
};

// Register shutdown function to automatically apply layout
register_shutdown_function($render_layout);
?>
