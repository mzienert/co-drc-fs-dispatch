<?php
    // Load layout system (React-like wrapper)
    require_once('../config/layout.php');

    // Set page-specific variables
    $page_title = "Contact - {$dispatchInfo['name']}";
    $meta_description = "Contact {$dispatchInfo['name']}";
?>

<h1>Contact <?= htmlspecialchars($dispatchInfo['name']) ?></h1>

<p>This is the contact page. It demonstrates how easy it is to create new pages with our React-like layout system.</p>

<h2>Our Mission</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

<h2>Contact Information</h2>
<p><strong>24-Hour Line:</strong> <?= htmlspecialchars($dispatchInfo['phone_24_hour']) ?></p>
<p><strong>Office:</strong> <?= htmlspecialchars($dispatchInfo['phone_office']) ?></p>
<p><strong>Email:</strong> <?= htmlspecialchars($dispatchInfo['email']) ?></p>
