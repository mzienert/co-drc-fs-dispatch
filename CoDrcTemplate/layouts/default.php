<!DOCTYPE HTML>
<html>
<head>
	<title><?php echo htmlspecialchars($page_title); ?></title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<?php if ($meta_description): ?>
	<meta name="description" content="<?php echo htmlspecialchars($meta_description); ?>" />
	<?php endif; ?>
	<?php if (isset($canonical_url)): ?>
	<link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>" />
	<?php endif; ?>
	<link rel="stylesheet" href="https://gacc.nifc.gov/rmcc/assets/css/main.css" />
	<link rel="stylesheet" href="/assets/css/custom.css" />
</head>
<body class="is-preload <?php echo htmlspecialchars($body_class); ?>">
	<div id="wrapper">
		<div id="main">
			<?php component('header') ?>
			<div class="inner">
				<section class="content-area">
					<?php echo $content; ?>
				</section>
			</div>
		</div>
	</div>

	<?php component('footer'); ?>

	<?php include(__DIR__ . '/../scripts.php'); ?>

	<script>
		// Mobile sidebar toggle
		const sidebar = document.getElementById('mobile-sidebar');
		const menuToggle = document.getElementById('menu-toggle');

		menuToggle.addEventListener('click', function(e) {
			e.stopPropagation();
			sidebar.classList.toggle('active');
		});

		// Close sidebar when clicking outside
		document.addEventListener('click', function(e) {
			if (sidebar.classList.contains('active') && !sidebar.contains(e.target) && e.target !== menuToggle) {
				sidebar.classList.remove('active');
			}
		});

		// Prevent clicks inside sidebar from closing it
		sidebar.addEventListener('click', function(e) {
			e.stopPropagation();
		});
	</script>
</body>
</html>
