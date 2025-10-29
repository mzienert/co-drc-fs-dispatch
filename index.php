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

<div class="row content-row gtr-150">
    <div class="col-6 col-12-medium">
        <section class="about-section">
            <h2>About the Durango Interagency Dispatch Center</h2>
            <p>The Durango Interagency Dispatch Center (CODRC) coordinates wildfire and emergency response across 4.5 million acres of Southwestern Colorado, serving as the interagency focal point for the San Juan National Forest, Bureau of Land Management, Bureau of Indian Affairs, and Mesa Verde National Park.</p>

            <p>Our team of experienced dispatchers operates 24/7 to manage firefighting resources, track incidents, and coordinate emergency response across elevations ranging from 5,000 to over 14,000 feet in the communities of Cortez, Durango, and Pagosa Springs.</p>

            <p>The center serves as a critical hub for five federal agencies, coordinating aircraft, helicopters, fire engines, and ground crews to protect the diverse landscape of Southwestern Colorado—from the Utah state line to the Continental Divide, and from New Mexico to the Montrose Dispatch Center boundary.</p>
        </section>
    </div>
    <div class="col-6 col-12-medium">
        <?php Helpers::component('fire-activity-map', [
            'title' => 'Current Fire Activity',
            'height' => '500px',
            'dispatchInfo' => $dispatchInfo
        ]); ?>
    </div>
</div>

