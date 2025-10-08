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
$page_title = $page_title ?? "{$dispatchInfo['name']} ({$dispatchInfo['id']})";
$meta_description = $meta_description ?? '';
$body_class = $body_class ?? '';

// Canonical URL - auto-generate from current request (can be overridden per page)
if (!isset($canonical_url)) {
    $canonical_url = $dispatchInfo['site_base_url'] . $_SERVER['REQUEST_URI'];
}

// Open Graph defaults (can be overridden per page)
$og_title = $og_title ?? $page_title;
$og_description = $og_description ?? $meta_description;
$og_url = $og_url ?? $canonical_url ?? '';
$og_type = $og_type ?? 'website';
$og_site_name = $og_site_name ?? $dispatchInfo['name'];
// $og_image = $og_image ?? ''; // TODO: Add logo when available
?>
