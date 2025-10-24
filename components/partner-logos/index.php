<!-- Partner Logos Component -->
<?php
	use App\Helpers;

	// Get props with defaults
	$basePath = Helpers::prop($props, 'dispatchInfo.base_path');
	$showTitle = Helpers::prop($props, 'showTitle', false);
	$title = Helpers::prop($props, 'title', 'Our Partners');

	// Load partner organizations data
	$partners = require __DIR__ . '/../../data/partnerOrganizations.php';
?>

<section id="partner-logos" class="partner-logos-section">
	<?php if ($showTitle): ?>
		<header class="partner-logos-header">
			<h2><?= Helpers::sanitize($title) ?></h2>
		</header>
	<?php endif; ?>

	<div class="partner-logos-container">
		<?php foreach ($partners as $partner): ?>
			<a
				href="<?= Helpers::sanitize($partner['url']) ?>"
				class="partner-logo-link"
				target="_blank"
				rel="noopener noreferrer"
				title="<?= Helpers::sanitize($partner['name']) ?>">
				<img
					src="<?= Helpers::sanitize($basePath) ?>/assets/images/<?= Helpers::sanitize($partner['image']) ?>"
					alt="<?= Helpers::sanitize($partner['name']) ?> Logo"
					class="partner-logo-image" />
			</a>
		<?php endforeach; ?>
	</div>
</section>
