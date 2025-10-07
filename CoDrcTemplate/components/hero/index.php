<!-- Hero Component -->
<?php
	$preparednessLevels = getPreparednessLevels();
?>
<section id="hero">
	<div class="hero-container">
		<div class="row">
			<div class="col-7 hero-left">
				<!-- Left column content -->
			</div>
			<div class="col-5 hero-right">
				<div class="preparedness-levels">
					<h2>Preparedness Levels</h2>
					<div class="pl-item">
						<h3 class="pl-label">National</h3>
						<p class="pl-value">PL <?= htmlspecialchars($preparednessLevels['national']) ?></p>
					</div>
					<div class="pl-item">
						<h3 class="pl-label">RMA</h3>
						<p class="pl-value">PL <?= htmlspecialchars($preparednessLevels['rma']) ?></p>
					</div>
					<div class="pl-item">
						<h3 class="pl-label">Local</h3>
						<p class="pl-value">PL <?= htmlspecialchars($preparednessLevels['local']) ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
