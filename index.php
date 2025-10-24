<?php
    // Load layout system (React-like wrapper)
    $pageContext = require_once('config/layout.php');
    $dispatchInfo = $pageContext->layoutData['dispatchInfo'];

    // Set page-specific variables
    $pageContext->page_title = "{$dispatchInfo['name']} ({$dispatchInfo['id']})";
    $pageContext->meta_description = "Welcome to {$dispatchInfo['name']}";
?>

<?php use App\Helpers; ?>

<?php Helpers::component('hero', ['dispatchInfo' => $dispatchInfo]); ?>

<h1>Welcome to <?= Helpers::sanitize($dispatchInfo['name']) ?></h1>

<?php Helpers::component('fire-activity-map', [
    'title' => 'Current Fire Activity',
    'height' => '600px',
    'dispatchInfo' => $dispatchInfo
]); ?>

