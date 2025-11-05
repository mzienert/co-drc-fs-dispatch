<?php
    // Load layout system (React-like wrapper)
    $pageContext = require_once('../config/layout.php');
    $dispatchInfo = $pageContext->layoutData['dispatchInfo'];

    // Set page-specific variables
    $pageContext->page_title = "Smoke Report - {$dispatchInfo['name']}";
    $pageContext->meta_description = "Daily smoke report for {$dispatchInfo['name']}";
?>

<?php use App\Helpers; ?>

<h2>How to File a Smoke Report</h2>

<div class="row content-row gtr-150">
    <div class="col-12">
        <section class="smoke-report-section">

            <!-- Step 1-3 -->
            <div class="row gtr-50 smoke-report-row">
                <div class="col-9 col-12-medium smoke-report-text">
                    <div class="accent-panel">
                        <h3>Steps 1-3</h3>
                        <p><strong>Step 1:</strong> Open your Google Maps App.</p>
                        <p><strong>Step 2:</strong> Zoom in on where you estimate the smoke/fire to be. Touch and hold the map at that location until the "Dropped pin" banner appears.</p>
                        <p><strong>Step 3:</strong> The banner should appear at the bottom. The red pin now showing on the map is your estimated smoke/fire location.</p>
                    </div>
                </div>
                <div class="col-3 col-12-medium smoke-report-image-col">
                    <img src="<?= Helpers::sanitize($dispatchInfo['base_path']) ?>/assets/images/step_1.png" alt="Google Maps step 1" class="smoke-report-image" />
                </div>
            </div>

            <!-- Step 4 -->
            <div class="row gtr-50">
                <div class="col-9 col-12-medium">
                    <div class="accent-panel">
                        <h3>Step 4</h3>
                        <p>Pull up on the "Dropped pin" window at the bottom, and then touch the blue box circled in the image to expand it.</p>
                    </div>
                </div>
                <div class="col-3 col-12-medium smoke-report-image-col">
                    <img src="<?= Helpers::sanitize($dispatchInfo['base_path']) ?>/assets/images/step_2.png" alt="Google Maps step 2" class="smoke-report-image" />
                </div>
            </div>

            <!-- Step 5 -->
            <div class="row gtr-50 smoke-report-row">
                <div class="col-9 col-12-medium smoke-report-text">
                    <div class="accent-panel">
                        <h3>Step 5</h3>
                        <p>Now that you have expanded the blue box, you should see coordinates for your smoke/fire.</p>
                    </div>
                </div>
                <div class="col-3 col-12-medium smoke-report-image-col">
                    <img src="<?= Helpers::sanitize($dispatchInfo['base_path']) ?>/assets/images/step_3.png" alt="Google Maps step 3" class="smoke-report-image" />
                </div>
            </div>

            <!-- Step 6 -->
            <div class="row gtr-50">
                <div class="col-12">
                    <div class="accent-panel step-6">
                        <h3>Step 6</h3>
                        <p>Once you have the coordinates, contact us at <a href="tel:<?= Helpers::sanitize($dispatchInfo['phone_24_hour']) ?>"><?= Helpers::sanitize($dispatchInfo['phone_24_hour']) ?></a> to report the smoke/fire location.</p>
                    </div>
                </div>
            </div>

        </section>
    </div>
</div>
