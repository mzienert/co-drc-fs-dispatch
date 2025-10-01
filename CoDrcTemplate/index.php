<?php
	include_once("dispatch_config.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo "$dispatch_center_name ($dispatch_center_id)"; ?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="/rmcc/assets/css/main.css" />
	</head>
	<body class="is-preload">
		<!-- Wrapper -->
		<div id="wrapper">
			<!-- Main -->
			<div id="main">
				<div class="inner">
                    <?php include("header.php"); ?>
							<!-- Content -->
								<section style="padding-top: 0;">
									<div style="min-height: 5em;display: none;" id="headlines">
										<div class="box" style="margin-top: 1.5em;border-color: black;border-width: 3px;background-color: wheat;color: black;">
											<p style="font-weight: bold; font-size: 20pt;"></p>
										</div>
									</div>
									<header class="main">
								    <h1><?php echo "$dispatch_center_name"; ?></h1>
									</header>

									<!-- Enter home page content here -->

								</section>
						</div>
					</div>
            <?php include('sidebar.php'); ?>

			</div>

		    <?php include('scripts.php'); ?>
			<script>
				var headlines = [];
				var current_headline = 0;
				const req = new XMLHttpRequest();
				req.onload = (e) => {
					
					headlines = req.response.replace('\r\n', '\n').split("\n").filter((a) => a !== '');
					console.log(headlines);
					if (headlines.length > 0) {
						document.getElementById('headlines').style.display="block";
						document.getElementById('headlines').getElementsByTagName('p')[0].innerHTML = headlines[current_headline];

						setInterval(() => {
							current_headline++;
							if (current_headline >= headlines.length) {
								current_headline = 0;
							}
							document.getElementById('headlines').getElementsByTagName('p')[0].innerHTML = headlines[current_headline];
						}, 30000)
					}
				};
				req.open("GET", "headlines.txt");
				req.send();
			</script>
        </div>
    </body>
</html>