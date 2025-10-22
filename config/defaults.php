<?php
/**
 * Default Variables
 * Set default values for page-level variables
 */

// Get dispatch info from page context
$dispatchInfo = $pageContext->layoutData['dispatchInfo'];

// Set default layout (can be overridden per page)
$pageContext->layout = $pageContext->layout ?? __DIR__ . '/../layouts/default.php';

// Default page variables (can be overridden per page)
$pageContext->page_title = $pageContext->page_title ?? "{$dispatchInfo['name']} ({$dispatchInfo['id']})";
$pageContext->meta_description = $pageContext->meta_description ?? '';
$pageContext->body_class = $pageContext->body_class ?? '';

// Canonical URL - auto-generate from current request (can be overridden per page)
$pageContext->canonical_url = $pageContext->canonical_url ?? $dispatchInfo['site_base_url'] . $_SERVER['REQUEST_URI'];

// Open Graph defaults (can be overridden per page)
$pageContext->og_title = $pageContext->og_title ?? $pageContext->page_title;
$pageContext->og_description = $pageContext->og_description ?? $pageContext->meta_description;
$pageContext->og_url = $pageContext->og_url ?? $pageContext->canonical_url ?? '';
$pageContext->og_type = $pageContext->og_type ?? 'website';
$pageContext->og_site_name = $pageContext->og_site_name ?? $dispatchInfo['name'];
?>
