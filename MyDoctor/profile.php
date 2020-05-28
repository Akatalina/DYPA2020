<?php 
	@session_start();
	require_once("dbconnect.php");
	
//=================================================
	if(isset($_REQUEST['action_save'])) { //	ΑΝ ΠΑΤΗΘΕΙ ΤΟ ΚΟΥΜΠΙ "ΑΠΟΘΗΚΕΥΣΗ" ΤΟΤΕ ΜΠΑΙΝΕΙ ΣΤΟΝ ΒΡΟΓΧΟ.
		 $sqlUpdate = 'update users set FName=?, LName=?, uname=?, password=?, email=?, gender=?, weight=?, passwd_enc=PASSWORD(?),age=? where ID=?';	
		 if($_REQUEST['passwd1']==$_REQUEST['repeatpasswd1']){
			$selectGendAgeWeig = "SELECT * FROM users WHERE id=".$_SESSION['userId'].";";
			$result1=$con->query($selectGendAgeWeig);
			$row1=$result1->fetch_assoc();
			if(empty($_REQUEST['gender1'])){
				$_REQUEST['gender1']=$row1['gender'];
			}if(empty($_REQUEST['age1'])){
				$_REQUEST['age1']=$row1['age'];					//VGAZOYN LATHOS TA IF
			}
			if(empty($_REQUEST['weight1'])){
				$_REQUEST['weight1']=$row1['weight'];
			}
			$stmt=$con->prepare($sqlUpdate);
			$stmt->bind_param("ssssssssii",$_REQUEST['firstname1'],$_REQUEST['lastname1'],$_REQUEST['username1'],$_REQUEST['passwd1'],$_REQUEST['email1'],$_REQUEST['gender1'],$_REQUEST['weight1'],$_REQUEST['passwd1'],$_REQUEST['age1'],$_SESSION['userId']);
			$stmt->execute();
			/*if($stmt->execute()){
				print "<p>OK. STATEMENT EXECUTE!</p>";
				print "<p>".date(DATE_RFC822)."</p>"; //ΕΜΦΑΝΙΖΕΙ ΤΗΝ ΩΡΑ ΠΟΥ ΓΙΝΕΤΑΙ Η ΑΠΟΘΗΚΕΥΣΗ ΑΛΛΑ ΕΜΦΑΝΙΖΕΙ ΛΑΘΟΣ ΩΡΑ(UTC+1).
			}*/
			$stmt->close();
			
		}else{
			print "Password dont match";
		}
 }
 //============================
 $sql="SELECT * FROM users WHERE id=".$_SESSION['userId'];
	$result=$con->query($sql);
	$row=$result->fetch_row();
?>
<!DOCTYPE HTML>
<!--
	Intensify by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Profile</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

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
					<li><a href="index.php">Home</a></li>
					<?php
					if(isset($_SESSION['user']) && $_SESSION['user']!='?'){
						print <<<END
						<li><a href="profile.php" class="current_page_item">Profile</a></li>
						<li><a href="allergies.php">My Allergies</a></li>
						<li><a href="medhistory.php">My Medical History</a></li>
						<li><a href="symptoms.php">Symptoms</a></li>
END;
					}
					?>
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

		<!-- Main -->
		<span>
			<?php
				if(isset($_GET['msg']))
					print "**********".$_GET['msg'];
				if(isset($_GET['msg1']))
					print "**********".$_GET['msg1'];
			?>
		</span>
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h1>Profile Page</h1>
						<p>Basic information</p>
					</header>
					<div class="image fit">
						<img src="images/pic05.jpg" alt="" /> <!--image src: https://unsplash.com/photos/OQMZwNd3ThU-->
					</div>	
					<form method="POST" >
						<div class="row">
							<div class="6u 12u$(small)">
								<ul class="alt">
									<p>Username:
									<input type="text" class="text" name="username1" id="username" placeholder="Enter your username" value="<?= $row[3];?>" disabled/></p>
									<p>Password:
									<input type="password" class="password" name="passwd1" id="passwd" placeholder="Enter your password" value="<?= $row[4];?>" disabled/></p>
									<p>First Name:
									<input type="text" class="text" name="firstname1" id="firstname" placeholder="Enter your first name" value="<?= $row[1];?>" disabled/></p>
									<p>Age:
									<select name="age1" id="age" disabled>
									<option selected value> <?php print $row[6];?></option>
									<option value="2020">2020</option>
									<option value="2019">2019</option>
									<option value="2018">2018</option>
									<option value="2017">2017</option>
									<option value="2016">2016</option>
									<option value="2015">2015</option>
									<option value="2014">2014</option>
									<option value="2013">2013</option>
									<option value="2012">2012</option>
									<option value="2011">2011</option>
									<option value="2010">2010</option>
									<option value="2009">2009</option>
									<option value="2008">2008</option>
									<option value="2007">2007</option>
									<option value="2006">2006</option>
									<option value="2005">2005</option>
									<option value="2004">2004</option>
									<option value="2003">2003</option>
									<option value="2002">2002</option>
									<option value="2001">2001</option>
									<option value="2000">2000</option>
									<option value="1999">1999</option>
									<option value="1998">1998</option>
									<option value="1997">1997</option>
									<option value="1996">1996</option>
									<option value="1995">1995</option>
									<option value="1994">1994</option>
									<option value="1993">1993</option>
									<option value="1992">1992</option>
									<option value="1991">1991</option>
									<option value="1990">1990</option>
									<option value="1989">1989</option>
									<option value="1988">1988</option>
									<option value="1987">1987</option>
									<option value="1986">1986</option>
									<option value="1985">1985</option>
									<option value="1984">1984</option>
									<option value="1983">1983</option>
									<option value="1982">1982</option>
									<option value="1981">1981</option>
									<option value="1980">1980</option>
									<option value="1979">1979</option>
									<option value="1978">1978</option>
									<option value="1977">1977</option>
									<option value="1976">1976</option>
									<option value="1975">1975</option>
									<option value="1974">1974</option>
									<option value="1973">1973</option>
									<option value="1972">1972</option>
									<option value="1971">1971</option>
									<option value="1970">1970</option>
									<option value="1969">1969</option>
									<option value="1968">1968</option>
									<option value="1967">1967</option>
									<option value="1966">1966</option>
									<option value="1965">1965</option>
									<option value="1964">1964</option>
									<option value="1963">1963</option>
									<option value="1962">1962</option>
									<option value="1961">1961</option>
									<option value="1960">1960</option>
									<option value="1959">1959</option>
									<option value="1958">1958</option>
									<option value="1957">1957</option>
									<option value="1956">1956</option>
									<option value="1955">1955</option>
									<option value="1954">1954</option>
									<option value="1953">1953</option>
									<option value="1952">1952</option>
									<option value="1951">1951</option>
									<option value="1950">1950</option>
									<option value="1949">1949</option>
									<option value="1948">1948</option>
									<option value="1947">1947</option>
									<option value="1946">1946</option>
									<option value="1945">1945</option>
									<option value="1944">1944</option>
									<option value="1943">1943</option>
									<option value="1942">1942</option>
									<option value="1941">1941</option>
									<option value="1940">1940</option>
									<option value="1939">1939</option>
									<option value="1938">1938</option>
									<option value="1937">1937</option>
									<option value="1936">1936</option>
									<option value="1935">1935</option>
									<option value="1934">1934</option>
									<option value="1933">1933</option>
									<option value="1932">1932</option>
									<option value="1931">1931</option>
									<option value="1930">1930</option>
									</select></p>
									<p>Gender:
									<select name="gender1" id="gender"   disabled>
									<option selected value> <?php print $row[5];?></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
									</select></p>
								</ul>
							</div>
							<div class="6u$ 12u$(small)">
								<ul class="icons">
									<p>E-mail:
									<input type="text" class="text" name="email1" id="email" placeholder="Enter your email" disabled value="<?= $row[7];?>"/></p>
									<p>Repeat Password*:
									<input type="password" class="repeatpasswd" name="repeatpasswd1" id="repeatpasswd" placeholder="Repeat your password" value="<?= $row[4];?>" disabled/></p>
									<p>Last Name:
									<input type="text" class="text" name="lastname1" id="lastname" placeholder="Enter your last name" value="<?= $row[2];?>" disabled/></p>							
									<p>Weight (kg):
									<select name="weight1" id="weight" disabled>
									<option  selected value> <?php print $row[8];?></option>
									<option value="1 - 10">1 - 10</option>
									<option value="11 - 20">11 - 20</option>
									<option value="21 - 30">21 - 30</option>
									<option value="31 - 40">31 - 40</option>
									<option value="41 - 50">41 - 50</option>
									<option value="51 - 60">51 - 60</option>
									<option value="61 - 70">61 - 70</option>
									<option value="71 - 80">71 - 80</option>
									<option value="81 - 90">81 - 90</option>
									<option value="91 - 100">91 - 100</option>
									<option value="101 - 110">101 - 110</option>
									<option value="111 - 120">111 - 120</option>
									<option value="121 - 130">121 - 130</option>
									<option value="131 - 140">131 - 140</option>
									<option value="141 - 150">141 - 150</option>
									<option value="150+">150+</option>
									</select></p>
									<p id="thisbutton">&nbsp;<br/>
									<input class="button" onclick="hide()" value="Edit Profile"/></p>
									<p id="thesebuttons" style="display: none;">&nbsp;<br/>
									<input type="submit" class="button"  value="Save" name="action_save"/>
									<input class="button" onclick="location.reload()" value="Cancel"/>
									</p>
								</ul>
							</div>
						</div>
						<input type="hidden" name="username" value="<?php $_POST['username1'] ?>"/>
						<input type="hidden" name="passwd" value="<?php $_POST['passwd1'] ?>"/>
						<input type="hidden" name="repeatpasswd" value="<?php $_POST['repeatpasswd1'] ?>"/>
						<input type="hidden" name="firstname" value="<?php $_POST['firstname1'] ?>"/>
						<input type="hidden" name="lastname" value="<?php $_POST['lastname1'] ?>"/>
						<input type="hidden" name="email" value="<?php $_POST['email1'] ?>"/>
						<input type="hidden" name="age" value="<?php $_POST['age1'] ?>"/>
						<input type="hidden" name="gender" value="<?php $_POST['gender1'] ?>"/>
						<input type="hidden" name="weight" value="<?php $_POST['weight1'] ?>"/>
					<form>
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
			<script>				
				function hide() {
				  var x = document.getElementById("thisbutton");
				  if (x.style.display === "none") {
					x.style.display = "block";
				  } else {
					x.style.display = "none";
				  }
				  document.getElementById("thesebuttons").style.display = "block";
				  $("#username").prop('disabled', false);
				  $("#passwd").prop('disabled', false);
				  $("#firstname").prop('disabled', false);
				  $("#age").prop('disabled', false);
				  $("#gender").prop('disabled', false);
				  $("#email").prop('disabled', false);
				  $("#passwd").prop('disabled', false);
				  $("#repeatpasswd").prop('disabled', false);
				  $("#lastname").prop('disabled', false);
				  $("#weight").prop('disabled', false);
				}
				function show() {
				  var x = document.getElementById("thesebuttons");
				  if (x.style.display === "none") {
					x.style.display = "block";
				  } else {
					x.style.display = "none";
				  }
				  document.getElementById("thisbutton").style.display = "block";
				  $("#username").prop('disabled', true);
				  $("#passwd").prop('disabled', true);
				  $("#firstname").prop('disabled', true);
				  $("#age").prop('disabled', true);
				  $("#gender").prop('disabled', true);
				  $("#email").prop('disabled', true);
				  $("#passwd").prop('disabled', true);
				  $("#repeatpasswd").prop('disabled', true);
				  $("#lastname").prop('disabled', true);
				  $("#weight").prop('disabled', true);
				}
			</script>

	</body>
</html>