<div id="wrapper" style="background-color: rgba(0,0,0,0.15);">
    <div id="main" style="background-color: rgba(0,0,0,0.15);">
        <!-- Main -->
		<?php include("components/header/index.php"); ?>
		<div class="inner" style="background-color: rgba(0,0,0,0.15); height: 50vh;">    
		<!-- Content -->
			<section style="padding-top: 0;">
				<div style="min-height: 5em;display: none;" id="headlines">
					<div class="box" style="margin-top: 1.5em;border-color: black;border-width: 3px;background-color: wheat;color: black;">
						<p style="font-weight: bold; font-size: 20pt;"></p>
					</div>
				</div>
				<header class="main">
			        <!---<h1><?php /* echo "$dispatch_center_name"; */ ?></h1> -->
				</header>
				<!-- Enter home page content here -->
			</section>

						</div>
					</div>
			</div>

		    <?php include('scripts.php'); ?>

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