<?php
    // Load layout system (React-like wrapper)
    require_once('config/layout.php');

    // Set page-specific variables
    $page_title = "{$dispatchInfo['name']} ({$dispatchInfo['id']})";
    $meta_description = "Welcome to {$dispatchInfo['name']}";
?>

<?php Helpers::component('hero', ['dispatchInfo' => $dispatchInfo]); ?>

<h1>Welcome to <?= htmlspecialchars($dispatchInfo['name']) ?></h1>
<p>This is the home page content. Notice how clean this is - just content, no boilerplate!</p>

<h2>Getting Started</h2>
<p>This page demonstrates the new React-like layout system.</p>