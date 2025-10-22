<?php
    // Load layout system (React-like wrapper)
    $pageContext = require_once('config/layout.php');
    $dispatchInfo = $pageContext->layoutData['dispatchInfo'];

    // Set page-specific variables
    $pageContext->page_title = "{$dispatchInfo['name']} ({$dispatchInfo['id']})";
    $pageContext->meta_description = "Welcome to {$dispatchInfo['name']}";
?>

<?php \App\Helpers::component('hero', ['dispatchInfo' => $dispatchInfo]); ?>

<h1>Welcome to <?= htmlspecialchars($dispatchInfo['name']) ?></h1>
<p>This is the home page content. Notice how clean this is - just content, no boilerplate!</p>

<h2>SharePoint Integration Demo</h2>
<?php
    // Get SharePoint list data
    $testItems = \App\Helpers::getSharePointList('test-list');

    if ($testItems !== null && !empty($testItems)) {
        echo '<p>Successfully loaded data from SharePoint:</p>';
        echo '<ul>';
        foreach ($testItems as $item) {
            echo '<li>';
            echo '<strong>' . htmlspecialchars($item['Title'] ?? 'No Title') . '</strong>';
            if (isset($item['test-data'])) {
                echo ' - ' . htmlspecialchars($item['test-data']);
            }
            echo ' <small>(Modified: ' . htmlspecialchars($item['Modified'] ?? 'Unknown') . ')</small>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p><em>No SharePoint data available.</em></p>';
    }
?>

<h2>Getting Started</h2>
<p>This page demonstrates the new React-like layout system.</p>