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

<div class="row">
    <div class="col-6 col-12-medium">
        <!-- Left column content -->
    </div>
    <div class="col-6 col-12-medium">
        <?php Helpers::component('fire-activity-map', [
            'title' => 'Current Fire Activity',
            'height' => '500px',
            'dispatchInfo' => $dispatchInfo
        ]); ?>
    </div>
</div>

