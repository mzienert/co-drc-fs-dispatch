<!-- Hero Component -->
<?php
	use App\Helpers;

	$fireDanger = Helpers::getFireDanger();
	$basePath = Helpers::prop($props, 'dispatchInfo.base_path');
?>
<section id="hero" style="background-image: url('<?= Helpers::sanitize($basePath) ?>/assets/images/hero.jpg');">
	<div class="hero-container">
		<div class="row">
			<div class="col-7 col-12-medium hero-left">
				<img src="<?= Helpers::sanitize($basePath) ?>/assets/images/logo_small.png" alt="<?= Helpers::sanitize(Helpers::prop($props, 'dispatchInfo.name')) ?>" class="hero-logo" />
			</div>
			<div class="col-5 col-12-medium hero-right">
				<div class="preparedness-levels">
					<h2>Current Fire Danger</h2>

					<!-- Higher Elevation -->
					<div class="pl-item" data-expandable>
						<div class="pl-header">
							<div class="pl-header-content">
								<h3 class="pl-label">Higher Elevation</h3>
								<p class="pl-value"><?= Helpers::sanitize($fireDanger['higher-elevation'], true) ?></p>
							</div>
							<img src="<?= Helpers::sanitize($basePath) ?>/assets/svg/plus.svg" alt="Expand" class="pl-expand-icon" />
						</div>
						<div class="pl-details">
							<p class="pl-description"><?= Helpers::sanitize($fireDanger['higher-elevation-description']) ?></p>
						</div>
					</div>

					<!-- Lower Elevation -->
					<div class="pl-item" data-expandable>
						<div class="pl-header">
							<div class="pl-header-content">
								<h3 class="pl-label">Lower Elevation</h3>
								<p class="pl-value"><?= Helpers::sanitize($fireDanger['lower-elevation'], true) ?></p>
							</div>
							<img src="<?= Helpers::sanitize($basePath) ?>/assets/svg/plus.svg" alt="Expand" class="pl-expand-icon" />
						</div>
						<div class="pl-details">
							<p class="pl-description"><?= Helpers::sanitize($fireDanger['lower-elevation-description']) ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
