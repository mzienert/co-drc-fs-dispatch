<!-- Fire Activity Map Component -->
<?php
	use App\Helpers;

	// Get props with defaults
	$title = Helpers::prop($props, 'title', 'Current Fire Activity');
	$height = Helpers::prop($props, 'height', '600px');
	$showTitle = Helpers::prop($props, 'showTitle', true);
	$basePath = Helpers::prop($props, 'dispatchInfo.base_path');

	// Map configuration
	$mapId = '65d822c03058408384069b0c94281d43';
	$mapExtent = '-116.0948,36.9734,-90.807,44.5409'; // Rocky Mountain area bounds
	$mapParams = [
		'zoom' => 'true',
		'previewImage' => 'false',
		'scale' => 'true',
		'legendlayers' => 'true',
		'disable_scroll' => 'true',
		'theme' => 'light'
	];

	// Build map URL
	$mapUrl = 'https://nifc.maps.arcgis.com/apps/Embed/index.html?webmap=' . $mapId . '&extent=' . $mapExtent;
	foreach ($mapParams as $key => $value) {
		$mapUrl .= '&' . $key . '=' . $value;
	}
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
			src="<?= Helpers::sanitize($mapUrl) ?>"
			allowfullscreen>
		</iframe>
	</div>

	<div class="map-attribution">
		<p><small>Data provided by NIFC (National Interagency Fire Center) | Updates every 5 minutes</small></p>
	</div>
</section>
