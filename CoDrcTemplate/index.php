<?php
    // Load layout system (React-like wrapper)
    $pageContext = require_once('config/layout.php');
    $dispatchInfo = $pageContext->layoutData['dispatchInfo'];

    // Set page-specific variables
    $pageContext->page_title = "{$dispatchInfo['name']} ({$dispatchInfo['id']})";
    $pageContext->meta_description = "Welcome to {$dispatchInfo['name']}";
?>

<?php \App\Helpers::component('hero', ['dispatchInfo' => $dispatchInfo]); ?>

<h1>Welcome to <?= htmlspecialchars($dispatchInfo['name']) ?></h1>
<p>This is the home page content. Notice how clean this is - just content, no boilerplate!</p>

<h2>Getting Started</h2>
<p>This page demonstrates the new React-like layout system.</p>