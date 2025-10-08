<?php
    // Load layout system (React-like wrapper)
    $layoutData = require_once('../config/layout.php');
    $dispatchInfo = $layoutData['dispatchInfo'];

    // Set page-specific variables
    $page_title = "About - {$dispatchInfo['name']}";
    $meta_description = "Learn more about {$dispatchInfo['name']}";
?>

<div style="background-color: #eee">
    <h1>Testing <?= htmlspecialchars($dispatchInfo['name']) ?></h1>

    <p>This is the about page. It demonstrates how easy it is to create new pages with our React-like layout system.</p>

    <h2>Our Mission</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

    <h2>Contact Information</h2>
    <p><strong>24-Hour Line:</strong> <?= htmlspecialchars($dispatchInfo['phone_24_hour']) ?></p>
    <p><strong>Office:</strong> <?= htmlspecialchars($dispatchInfo['phone_office']) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($dispatchInfo['email']) ?></p>
</div>