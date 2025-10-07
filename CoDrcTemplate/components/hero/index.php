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
					<h2>Current Status</h2>
					<div class="pl-item">
						<span class="pl-label">National:</span>
						<span class="pl-value"><?= htmlspecialchars($preparednessLevels['national']) ?></span>
					</div>
					<div class="pl-item">
						<span class="pl-label">RMA:</span>
						<span class="pl-value"><?= htmlspecialchars($preparednessLevels['rma']) ?></span>
					</div>
					<div class="pl-item">
						<span class="pl-label">Local:</span>
						<span class="pl-value"><?= htmlspecialchars($preparednessLevels['local']) ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
