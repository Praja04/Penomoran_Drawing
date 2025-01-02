<header class="main-header" >
	<div class="d-flex align-items-center logo-box justify-content-start">
		<!-- Logo -->
		<div class=" row" style="margin-top:10px;">
			<a class="logo">
				<!-- logo-->
				<div class="logo-lg">
					<!-- <span class="light-logo"><img src="<?= base_url() ?>eduadmin/images/logo-dark-text.png" alt="logo"></span>
			  <span class="dark-logo"><img src="<?= base_url() ?>eduadmin/images/logo-light-text.png" alt="logo"></span> -->
					<span class="light-logo"><img src="<?= base_url() ?>assets/images/logo1.png" alt="logo" style="max-width: 150px; height: auto; "></span>
				</div>
			</a>
		</div>
		<div class=" row">
			<h4>PCE</h4>
			<p>Department</p>
		</div>
		<div class=" row" style="margin-left:10px;">
			<a href="<?= base_url('menu/utama') ?>" class="p-5 waves-effect waves-light nav-link svg-bt-icon" title="Menu">
				<i class="ti ti-desktop"><span class="path1"></span><span class="path2"></span>
				</i>
			</a>
		</div>
		<div class=" row" style="margin-left:10px;">
			<p class="p-5">Normal Mode</p>
		</div>
	</div>
	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top justify-content-center">
		<!-- Sidebar toggle button-->
		<div class="app-menu  d-none d-md-block">

			<?php
			// Mendapatkan URL saat ini
			$current_url = uri_string(); // Menggunakan uri_string() untuk mendapatkan string URI saat ini

			// Menentukan tampilan berdasarkan URL
			if ($current_url == 'mode/line6/hsm1' || $current_url == 'mode/line6/hsm2' || $current_url == 'mode/line5/hsm2' || $current_url == 'mode/line5/hsm1') {
				echo '<h2>Real Time Heat Sealing Machine</h2>';
			} else if ($current_url == 'mode/line6/alt1' || $current_url == 'mode/line6/alt2' || $current_url == 'mode/line5/alt2' || $current_url == 'mode/line5/alt1') {
				echo '<h2>Real Time Auto Leak Test</h2>';
			} else if ($current_url == 'mode/line6/apb1' || $current_url == 'mode/line6/apb2' || $current_url == 'mode/line5/apb2' || $current_url == 'mode/line5/apb1') {
				echo '<h2>Real Time Auto Pole Burning</h2>';
			} else if ($current_url == 'ballmill/dashboard/3' || $current_url == 'ballmill/dashboard/4') {
				echo '<h2>Ballmill</h2>';
			} else {
				echo '<h3>Default Header Title</h3>';
			}
			?>

		</div>
		<div class="navbar-custom-menu r-side" style="visibility:hidden;">
			<ul class="nav navbar-nav">

			</ul>
		</div>

		<div class="navbar-custom-menu r-side justify-content-end d-none d-md-block" style="padding-left:100px;">
			<?php
			// Mendapatkan URL saat ini
			$current_url = uri_string(); // Menggunakan uri_string() untuk mendapatkan string URI saat ini

			// Menentukan tampilan berdasarkan URL
			if ($current_url == 'mode/line6/hsm1') {
				echo '<h3>Line 6 - HSM 1</h3>';
			} else if ($current_url == 'mode/line6/hsm2') {
				echo '<h3>Line 6 - HSM 2</h3>';
			} else if ($current_url == 'mode/line5/hsm1') {
				echo '<h3>Line 5 - HSM 1</h3>';
			} else if ($current_url == 'mode/line5/hsm2') {
				echo '<h3>Line 5 - HSM 2</h3>';
			} else if ($current_url == 'mode/line6/alt1') {
				echo '<h3>Line 6 - ALT 1</h3>';
			} else if ($current_url == 'mode/line6/alt2') {
				echo '<h3>Line 6 - ALT 2</h3>';
			} else if ($current_url == 'mode/line5/alt1') {
				echo '<h3>Line 5 - ALT 1</h3>';
			} else if ($current_url == 'mode/line5/alt2') {
				echo '<h3>Line 5 - ALT 2</h3>';
			} else if ($current_url == 'mode/line6/apb1') {
				echo '<h3>Line 6 - APB 1</h3>';
			} else if ($current_url == 'mode/line6/apb2') {
				echo '<h3>Line 6 - APB 2</h3>';
			} else if ($current_url == 'mode/line5/apb1') {
				echo '<h3>Line 5 - APB 1</h3>';
			} else if ($current_url == 'mode/line5/apb2') {
				echo '<h3>Line 5 - APB 2</h3>';
			} else if ($current_url == 'ballmill/dashboard/4') {
				echo '<h3>Ballmill - 4</h3>';
			} else if ($current_url == 'ballmill/dashboard/3') {
				echo '<h3>Ballmill - 3</h3>';
			} else {
				echo '<h3>Default</h3>';
			}
			?>

		</div>
		<!-- <div class="navbar-custom-menu r-side justify-content-end d-none d-md-block" style="padding-left:300px;">
			<h4>31/10/2024</h4>
			<p>14:08:09</p>
		</div> -->

	</nav>

</header>