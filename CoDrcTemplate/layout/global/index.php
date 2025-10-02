<div id="wrapper">
    <div id="main">
		<?php include("components/header/index.php"); ?>
		<div class="inner">
            <?php include("components/content-area/index.php"); ?>
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
