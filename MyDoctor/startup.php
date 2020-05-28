<?php @session_start();
//print $_SESSION['userId'];?>
<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
		<header id="header">
			<nav class="left">
				<a href="#menu"><span>Menu</span></a>
			</nav>
			<a href="index.php" class="logo">MyDoctor</a>
			<nav class="right">
				<?php 	if(isset($_SESSION['user']) && $_SESSION['user']!='?'){
							print "<a href=\"logout.php\" class=\"button alt\">Logout</a>";
						}
						else if(!isset($_SESSION['user']) || $_SESSION['user']=='?')
							print "<a href=\"login.php\" class=\"button alt\">Login</a>";
				?>
			</nav>
		</header>

		<!-- Menu -->
		<nav id="menu">
			<ul class="links">
				<li class="current_page_item"><a  href="index.php">Home</a></li>
				<?php if(isset($_SESSION['user']) && $_SESSION['user']!='?'){ 
					print "<li><a href=\"profile.php\">Profile</a></li>";
					print "<li><a href=\"symptoms.php\">Symptoms</a></li>";
				}?>
				<li><a href="about.php">About</a></li>
			</ul>
			<ul class="actions vertical">
				<?php 	if(isset($_SESSION['user']) && $_SESSION['user']!='?'){
							print "<li><a href=\"logout.php\" class =\"button fit\">Logout</a></li>";
						}
						else if(!isset($_SESSION['user']) || $_SESSION['user']=='?')
							print "<li><a href=\"login.php\" class=\"button fit\">Login</a></li>";
						
				?>
			</ul>
		</nav>

		<!-- Banner 
		<section id="banner">
			<!--Banner image src: https://unsplash.com/photos/hIgeoQjS_iE\-\-\>
			<div class="content">
				<h1>Here for your health</h1>
				<p>An app created for your health<br />from people that care.</p>
				<ul class="actions">
					<li><a href="#one" class="button scrolly">Get Started</a></li>
				</ul>
			</div>
		</section> -->

		<!-- One -->
		<section id="main" class="wrapper">
		
			<div class="inner">
				<h2>Starting up you will have to edit your Profile, Allergies and Medical History!</h2>
				<p>Note that before you can start using the app you <b>will</b> have to edit those 3 categories for your own safety!</p>
			</div>
		</section>

		<!-- Three -->
		<section id="three" class="wrapper">
			<div class="inner flex flex-3">
				<div class="flex-item box">
					<div class="image fit">
						<img src="images/pic02.jpg" alt="" /> <!--image src: https://unsplash.com/photos/0EVKn3-5JSU-->
					</div>
					<div class="content">
						<h3>Profile</h3>
						<p>Basic information about you.<br />Name age weight email etc.</p>
						<a href="profile.php" class="button alt small">Edit Profile</a>
					</div>
				</div>
				<div class="flex-item box">
					<div class="image fit">
						<img src="images/pic03.jpg" alt="" />
					</div>
					<div class="content">
						<h3>My Allergies</h3>
						<p>A thorough list of what you are allergic to.<br />Make sure to include everything you know you are allergic to.</p>
						<a href="allergies.php" class="button alt small">Edit my Allergies</a>
					</div>
				</div>
				<div class="flex-item box">
					<div class="image fit">
						<img src="images/pic04.jpg" alt="" />
					</div>
					<div class="content">
						<h3>My Medical History</h3>
						<p>Nam dui mi, tincidunt quis, accu an porttitor, facilisis luctus que metus vulputate sem magna.</p>
						<a href="medhistory.php" class="button alt small">Edit my Medical History</a>
					</div>
				</div>
			</div>
		</section>

		<!-- Footer -->
		<footer id="footer">
			<div class="inner">
				<h2>Get In Touch</h2>
				<ul class="actions">
					<li><span class="icon fa-phone"></span> <a href="tel:+302310013621">(+30) 2310 013 621</a></li>
					<li><span class="icon fa-envelope"></span> <a href="mailto:admin@dypa.com">admin@dypa.com</a></li>
					<li><span class="icon fa-map-marker"></span> P.O BOX 141, GR T.K. 57400, Thessaloniki</li>
				</ul>
			</div>
			<div class="copyright">
				&copy; Untitled. Design <a href="https://templated.co">TEMPLATED</a>. Images <a href="https://unsplash.com">Unsplash</a>.
			</div>
		</footer>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>