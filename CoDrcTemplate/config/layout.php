<?php
/**
 * Layout Bootstrap
 * Orchestrates the layout system by loading all necessary components
 * Returns layout data for use in templates
 */

// Load error handler first (so it catches errors in other files)
require_once __DIR__ . '/error-handler.php';

// Load helper functions
require_once __DIR__ . '/../helpers/index.php';

// Load and prepare application data
$layoutData = [
    'dispatchInfo' => require_once __DIR__ . '/../data/dispatchCenterInfo.php',
    'navItems' => require_once __DIR__ . '/../data/nav.php'
];

// Start output buffering system (buffer.php uses $layoutData via closure)
require_once __DIR__ . '/buffer.php';

// Set default variables
require_once __DIR__ . '/defaults.php';

// Return data for template use
return $layoutData;
?>
