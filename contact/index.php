<?php
    // Load layout system (React-like wrapper)
    $pageContext = require_once('../config/layout.php');
    $dispatchInfo = $pageContext->layoutData['dispatchInfo'];

    // Set page-specific variables
    $pageContext->page_title = "Contact - {$dispatchInfo['name']}";
    $pageContext->meta_description = "Contact {$dispatchInfo['name']}";
?>

<?php use App\Helpers; ?>

<h1>Contact <?= Helpers::sanitize($dispatchInfo['name']) ?></h1>

<p>This is the contact page. It demonstrates how easy it is to create new pages with our React-like layout system.</p>

<h2>Our Mission</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

<h2>Contact Information</h2>
<p><strong>24-Hour Line:</strong> <?= Helpers::sanitize($dispatchInfo['phone_24_hour']) ?></p>
<p><strong>Office:</strong> <?= Helpers::sanitize($dispatchInfo['phone_office']) ?></p>
<p><strong>Email:</strong> <?= Helpers::sanitize($dispatchInfo['email']) ?></p>
