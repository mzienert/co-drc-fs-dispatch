<?php
    // Load config first
    include_once("../dispatch_config.php");

    // Load layout system (React-like wrapper)
    require_once('../config/layout.php');

    // Set page-specific variables
    $page_title = "Contact - $dispatch_center_name";
    $meta_description = "Learn more about $dispatch_center_name";
?>

<h1>About <?php echo $dispatch_center_name; ?></h1>

<p>This is the about page. It demonstrates how easy it is to create new pages with our React-like layout system.</p>

<h2>Our Mission</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

<h2>Contact Information</h2>
<p><strong>24-Hour Line:</strong> <?php echo $dispatch_center_24_hour_phone; ?></p>
<p><strong>Office:</strong> <?php echo $dispatch_center_office_phone; ?></p>
<p><strong>Email:</strong> <?php echo $dispatch_center_email; ?></p>
