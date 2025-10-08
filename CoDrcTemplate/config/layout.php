<?php
/**
 * Layout Bootstrap
 * Orchestrates the layout system by loading all necessary components
 */

// Load error handler first (so it catches errors in other files)
require_once __DIR__ . '/error-handler.php';

// Load dispatch center data
$dispatchInfo = require_once __DIR__ . '/../data/dispatchCenterInfo.php';

// Load helper functions
require_once __DIR__ . '/../helpers/index.php';

// Start output buffering system
require_once __DIR__ . '/buffer.php';

// Set default variables
require_once __DIR__ . '/defaults.php';
?>
