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

<div class="row content-row gtr-150">
    <div class="col-6 col-12-medium">
        <section class="contact-info-section">
            <h2>Contact Information</h2>

            <div class="contact-details">
                <h3><?= Helpers::sanitize($dispatchInfo['name']) ?></h3>
                <p><?= Helpers::sanitize($dispatchInfo['id']) ?></p>

                <p>
                    <strong>24-Hour Line:</strong><br>
                    <a href="tel:<?= Helpers::sanitize(preg_replace('/[^0-9]/', '', $dispatchInfo['phone_24_hour'])) ?>">
                        <?= Helpers::sanitize($dispatchInfo['phone_24_hour']) ?>
                    </a>
                </p>

                <p>
                    <strong>Office:</strong><br>
                    <a href="tel:<?= Helpers::sanitize(preg_replace('/[^0-9]/', '', $dispatchInfo['phone_office'])) ?>">
                        <?= Helpers::sanitize($dispatchInfo['phone_office']) ?>
                    </a>
                </p>

                <p>
                    <strong>Email:</strong><br>
                    <a href="mailto:<?= Helpers::sanitize($dispatchInfo['email']) ?>">
                        <?= Helpers::sanitize($dispatchInfo['email']) ?>
                    </a>
                </p>

                <p>
                    <strong>Address:</strong><br>
                    <?= Helpers::sanitize($dispatchInfo['address_line_1']) ?><br>
                    <?= Helpers::sanitize($dispatchInfo['address_line_2']) ?>
                </p>
            </div>
        </section>
    </div>

    <div class="col-6 col-12-medium">
        <section class="map-section">
            <h2>Location</h2>
            <div class="map-container" style="position: relative; padding-bottom: 75%; height: 0; overflow: hidden;">
                <iframe
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8&q=<?= urlencode($dispatchInfo['address_line_1'] . ', ' . $dispatchInfo['address_line_2']) ?>&zoom=15"
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Map showing location of <?= Helpers::sanitize($dispatchInfo['name']) ?>">
                </iframe>
            </div>
        </section>
    </div>
</div>
