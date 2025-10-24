<!-- Accessibility Menu Component -->
<?php
	use App\Helpers;

	// Get props
	$basePath = Helpers::prop($props, 'dispatchInfo.base_path', '');
?>

<div class="accessibility-menu">
	<button class="accessibility-toggle" aria-label="Accessibility Options" aria-expanded="false">
		<img src="<?= Helpers::sanitize($basePath) ?>/assets/svg/wheelchair.svg" alt="" class="accessibility-icon" aria-hidden="true" />
	</button>

	<div class="accessibility-dropdown" hidden>
		<button class="accessibility-option" data-toggle="font-size" aria-label="Toggle font size">
			<img src="<?= Helpers::sanitize($basePath) ?>/assets/svg/text-height.svg" alt="" aria-hidden="true" />
			<span>Font Size</span>
		</button>

		<button class="accessibility-option" data-toggle="dyslexic-font" aria-label="Toggle dyslexic-friendly font">
			<img src="<?= Helpers::sanitize($basePath) ?>/assets/svg/font.svg" alt="" aria-hidden="true" />
			<span>Dyslexic Font</span>
		</button>

		<button class="accessibility-option" data-toggle="high-contrast" aria-label="Toggle high contrast mode">
			<img src="<?= Helpers::sanitize($basePath) ?>/assets/svg/palette.svg" alt="" aria-hidden="true" />
			<span>High Contrast</span>
		</button>
	</div>
</div>
