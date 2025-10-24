<!-- Fire Activity Map Component -->
<?php
	use App\Helpers;

	// Get props with defaults
	$title = Helpers::prop($props, 'title', 'Current Fire Activity');
	$height = Helpers::prop($props, 'height', '600px');
	$showTitle = Helpers::prop($props, 'showTitle', true);
	$basePath = Helpers::prop($props, 'dispatchInfo.base_path');
?>

<section id="fire-activity-map" class="fire-activity-map-section">
	<?php if ($showTitle): ?>
		<header class="map-header">
			<h2><?= Helpers::sanitize($title) ?></h2>
		</header>
	<?php endif; ?>

	<div class="fire-activity-map-container" style="height: <?= Helpers::sanitize($height) ?>;">
		<iframe
			width="100%"
			height="100%"
			frameborder="0"
			scrolling="no"
			marginheight="0"
			marginwidth="0"
			title="RMCC Wildfire Intelligence Map - Website"
			src="https://nifc.maps.arcgis.com/apps/Embed/index.html?webmap=65d822c03058408384069b0c94281d43&extent=-116.0948,36.9734,-90.807,44.5409&zoom=true&previewImage=false&scale=true&legendlayers=true&disable_scroll=true&theme=light"
			allowfullscreen>
		</iframe>
	</div>

	<div class="map-attribution">
		<p><small>Data provided by NIFC (National Interagency Fire Center) | Updates every 5 minutes</small></p>
	</div>
</section>

<style>
	.fire-activity-map-section {
		margin: 2em 0;
	}

	.map-header {
		margin-bottom: 1em;
		text-align: center;
	}

	.map-header h2 {
		font-size: 1.75em;
		margin: 0;
		color: #333;
	}

	.fire-activity-map-container {
		position: relative;
		width: 100%;
		border: 1px solid #ddd;
		border-radius: 4px;
		overflow: hidden;
		box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
	}

	.fire-activity-map-container iframe {
		display: block;
		border: none;
	}

	.map-attribution {
		margin-top: 0.5em;
		text-align: center;
		color: #666;
	}

	.map-attribution p {
		margin: 0;
	}

	/* Responsive adjustments */
	@media screen and (max-width: 768px) {
		.map-header h2 {
			font-size: 1.5em;
		}

		.fire-activity-map-container {
			min-height: 400px;
		}
	}
</style>
