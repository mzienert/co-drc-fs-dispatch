<?php
/**
 * Default Variables
 * Set default values for page-level variables
 */

// Set default layout (can be overridden per page)
if (!isset($layout)) {
    $layout = __DIR__ . '/../layouts/default.php';
}

// Default page variables (can be overridden per page)
$page_title = $page_title ?? "$dispatch_center_name ($dispatch_center_id)";
$meta_description = $meta_description ?? '';
$body_class = $body_class ?? '';

// Canonical URL - auto-generate from current request (can be overridden per page)
if (!isset($canonical_url) && isset($site_base_url)) {
    $canonical_url = $site_base_url . $_SERVER['REQUEST_URI'];
}
?>
