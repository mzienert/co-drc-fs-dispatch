<?php
    // Load config first
    include_once("dispatch_config.php");

    // Load layout system (React-like wrapper)
    require_once('config/layout.php');

    // Set page-specific variables
    $page_title = "$dispatch_center_name ($dispatch_center_id)";
    $meta_description = "Welcome to $dispatch_center_name";
?>

<?php component('hero'); ?>

<h1>Welcome to <?php echo $dispatch_center_name; ?></h1>
<p>This is the home page content. Notice how clean this is - just content, no boilerplate!</p>

<h2>Getting Started</h2>
<p>This page demonstrates the new React-like layout system.</p>