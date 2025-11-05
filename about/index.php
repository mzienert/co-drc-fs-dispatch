<?php
    // Load layout system (React-like wrapper)
    $pageContext = require_once('../config/layout.php');
    $dispatchInfo = $pageContext->layoutData['dispatchInfo'];

    // Set page-specific variables
    $pageContext->page_title = "About - {$dispatchInfo['name']}";
    $pageContext->meta_description = "Learn more about {$dispatchInfo['name']}";
?>

<?php
    use App\Helpers;
    $aboutContent = Helpers::getAboutContent();
?>

<h2><?= Helpers::sanitize($aboutContent['title']) ?></h2>

<div class="row content-row gtr-150">
    <div class="col-12">
        <section class="accent-panel">
            <div class="content-text">
                <?= Helpers::parseSimpleMarkdown($aboutContent['body']) ?>
            </div>
        </section>
    </div>
</div>