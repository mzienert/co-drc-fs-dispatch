<?php
    /**
     * Layout Bootstrap
     * Orchestrates the layout system by loading all necessary components
     * Returns layout data for use in templates
     */

    // Load Composer autoloader
    require_once __DIR__ . '/../vendor/autoload.php';

    // Load error handler first (so it catches errors in other files)
    require_once __DIR__ . '/error-handler.php';

    // Load and prepare application data
    // Note: SharePoint config is lazy-loaded by Helpers class when needed
    $layoutData = [
        'dispatchInfo' => require_once __DIR__ . '/../data/dispatchCenterInfo.php',
        'navItems' => require_once __DIR__ . '/../data/nav.php'
    ];

    // Create page context to hold all page data
    $pageContext = new \App\PageContext($layoutData);

    // Start output buffering system (buffer.php uses $pageContext via closure)
    require_once __DIR__ . '/buffer.php';

    // Set default variables
    require_once __DIR__ . '/defaults.php';

    // Return page context for page files to use
    return $pageContext;
?>
