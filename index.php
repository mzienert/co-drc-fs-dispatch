<?php
    // Load layout system (React-like wrapper)
    $pageContext = require_once('config/layout.php');
    $dispatchInfo = $pageContext->layoutData['dispatchInfo'];

    // Set page-specific variables
    $pageContext->page_title = "{$dispatchInfo['name']} ({$dispatchInfo['id']})";
    $pageContext->meta_description = "Welcome to {$dispatchInfo['name']}";
?>

<?php
    use App\Helpers;
    $homeContent = Helpers::getHomeContent();
?>

<?php Helpers::component('hero', ['dispatchInfo' => $dispatchInfo]); ?>

<div class="row content-row gtr-150">
    <div class="col-6 col-12-medium">
        <section class="about-section">
            <h2><?= Helpers::sanitize($homeContent['title']) ?></h2>
            <div class="content-text">
                <?php
                $paragraphs = explode("\n\n", $homeContent['body']);
                foreach ($paragraphs as $para):
                    if (trim($para)): ?>
                        <p><?= Helpers::sanitize(trim($para)) ?></p>
                    <?php endif;
                endforeach;
                ?>
            </div>
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

