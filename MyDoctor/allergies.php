<?php 
@session_start();
require_once("dbconnect.php");

if(isset($_REQUEST['save_allergies'])) { //	ΑΝ ΠΑΤΗΘΕΙ ΤΟ ΚΟΥΜΠΙ "save_allergies" ΤΟΤΕ ΜΠΑΙΝΕΙ ΣΤΟΝ ΒΡΟΓΧΟ.
		//print_r($_REQUEST);
		//print "Πρωτη θεση id toy allergies".$_REQUEST['idAllergiesHidden'];
		$idFromAllergies=$_REQUEST['idAllergiesHidden']; //Αποθηκευει την τιμη του id που ειναι type=hidden στην φορμα
		$alForUpdate1=$_REQUEST['allergy1']; //Περιεχει το text απο το textbox των αλλεργιων. Τα textbx περιεχουν κειμενο ή "None"
		$alForUpdate2=$_REQUEST['allergy2'];
		$alForUpdate3=$_REQUEST['allergy3'];
		$alForUpdate4=$_REQUEST['allergy4'];
		$alForUpdate5=$_REQUEST['allergy5'];
		$sqlUpdate = 'UPDATE allergies SET ousia=?, user=? WHERE id=?';	
		for($x=1;$x<6;$x++){//Λειτουργει μονο για 5 αλλεργιες.
			$alForUpdate="alForUpdate".$x;//Δημιουργια μεταβλητης $alForUpdate1-5
			$finalAlForUpdate=${$alForUpdate}; // 
			//if($finalAlForUpdate != ""){ //Ελεγχει αν τα textbox ειναι "" τοτε δεν κανει την εγγραφη. Αν τα textbox ειναι " " η εγγραφη γινεται.
				$stmt=$con->prepare($sqlUpdate);
				$stmt->bind_param("sii",$finalAlForUpdate,$_SESSION['userId'],$idFromAllergies);
				/*if($stmt->execute()){
					print "<p>OK. STATEMENT EXECUTE!</p>";
				}*/
				$stmt->execute();
				$stmt->close();
			//}
			$idFromAllergies++;//Αυξανει κατα 1 τον αριθμο του id ωστε η επομενη εγγραφη να γινει σε αλλη γραμμη
		}
 }

//=========================================================================
$selectAllergies="SELECT * FROM allergies WHERE user=".$_SESSION['userId'];
$resultAllergies=$con->query($selectAllergies);
$allergyArray = array();
$allergyID=array(); //Πινακας με τα id του allergies. Θα ειναι hidden input στην φορμα.
while($rowAllergies=$resultAllergies->fetch_assoc()){
	array_push($allergyArray,$rowAllergies['ousia']);
	array_push($allergyID,$rowAllergies['id']);
}

?>
<!DOCTYPE HTML>
<!--
    Intensify by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
    <title>My Allergies</title>
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
            <li><a href="index.php" class="active">Home</a></li>
            <?php 
			if($_SESSION['user'] != null && $_SESSION['user'] != '?'){
				print <<<END
			<li><a href="profile.php">Profile</a></li>
            <li><a href="allergies.php" class="current_page_item">My Allergies</a></li>
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
    <section id="main" class="wrapper">
        <div class="inner">
            <header class="align-center">
                <h1>My Allergies</h1>
                <p>Substances that you are allergic to</p>
            </header>
            <div class="image fit">
                <img src="images/pic06.jpg" alt="" /> <!--image src: https://unsplash.com/photos/L4iKccAChOc-->
            </div>
            <form method="POST">
				<div class="row">
					<div class="6u 12u$(small)">
						<ul class="alt">
							<p>&nbsp;
							<select name="allergy1" id="allergy1" disabled>
							<option> 
							<?php 
								/*$al=array_pop($allergyArray);
								if(!empty($al)) 
									print $al;
								else print "";*/
								if(empty($allergyArray[0])){
									print "None";
								}else{
									print $allergyArray[0];
								}
							?> 
							</option>						
							<option value="None">None</option>
							<option value="Aletylosalikyliko oxy">Aletylosalikyliko oxy</option>
							<option value="Algiko natrio">Algiko natrio</option>
							<option value="Alkooliko dixlwrovenzolio">Alkooliko dixlwrovenzolio</option>
							<option value="Amylmetacresol">Amylmetacresol</option>
							<option value="Anthrakiko asbestio">Anthrakiko asbestio</option>
							<option value="Aseklofenaki">Aseklofenaki</option>
							<option value="Boutiloskopolamini">Boutiloskopolamini</option>
							<option value="Deksivouprofaini">Deksivouprofaini</option>
							<option value="Diklofainaki">Diklofainaki</option>
							<option value="Dittanthrakiko natrio">Dittanthrakiko natrio</option>
							<option value="Etofainemath">Etofainemath</option>
							<option value="Eukaluptos">Eukaluptos</option>
							<option value="Exetidini">Exetidini</option>
							<option value="Gloutaminiko oxy">Gloutaminiko oxy</option>
							<option value="Ivouprofaini">Ivouprofaini</option>
							<option value="Kitriki orfenadrini">Kitriki orfenadrini</option>
							<option value="Ksylometazolini">Ksylometazolini</option>
							<option value="Loperamidi">Loperamidi</option>
							<option value="Lusozumi">Lusozumi</option>
							<option value="Mefainamiko oxy">Mefainamiko oxy</option>
							<option value="Menta">Menta</option>
							<option value="Niaouli">Niaouli</option>
							<option value="Nifouroxazidi">Nifouroxazidi</option>
							<option value="Oxymetazolini">Oxymetazolini</option>
							<option value="Papaini">Papaini</option>
							<option value="Paraketamoli">Paraketamoli</option>
							<option value="Pikotheiko natrio">Pikotheiko natrio</option>
							<option value="Poliaithileniglukozi">Poliaithileniglukozi</option>
							<option value="Pseudoefedrini">Pseudoefedrini</option>
							<option value="Sennosides">Sennosides</option>
							<option value="Simethikoni">Simethikoni</option>
							<option value="Tanniko oxy">Tanniko oxy</option>
							<option value="Theiokolxikosidi">Theiokolxikosidi</option>
							<option value="Vakitrakini">Vakitrakini</option>
							<option value="Visakodili">Visakodili</option>
							<option value="Xlwrofainamini">Xlwrofainamini</option>
							<option value="Ydroxidio tou argiliou">Ydroxidio tou argiliou</option>
							<option value="Ydroxidio tou magnisiou">Ydroxidio tou magnisiou</option>
							</select></p>
							<p>&nbsp;
							<select name="allergy2" id="allergy2" disabled>
							<option>
							<?php 
								/*$al2=array_pop($allergyArray);
								if(!empty($al2)) 
									print $al2;
								else print "";*/
								if(empty($allergyArray[1])){
									print "None";
								}else{
									print $allergyArray[1];
								}
							?> 
							</option>						
							<option value="None">None</option>
							<option value="Aletylosalikyliko oxy">Aletylosalikyliko oxy</option>
							<option value="Algiko natrio">Algiko natrio</option>
							<option value="Alkooliko dixlwrovenzolio">Alkooliko dixlwrovenzolio</option>
							<option value="Amylmetacresol">Amylmetacresol</option>
							<option value="Anthrakiko asbestio">Anthrakiko asbestio</option>
							<option value="Aseklofenaki">Aseklofenaki</option>
							<option value="Boutiloskopolamini">Boutiloskopolamini</option>
							<option value="Deksivouprofaini">Deksivouprofaini</option>
							<option value="Diklofainaki">Diklofainaki</option>
							<option value="Dittanthrakiko natrio">Dittanthrakiko natrio</option>
							<option value="Etofainemath">Etofainemath</option>
							<option value="Eukaluptos">Eukaluptos</option>
							<option value="Exetidini">Exetidini</option>
							<option value="Gloutaminiko oxy">Gloutaminiko oxy</option>
							<option value="Ivouprofaini">Ivouprofaini</option>
							<option value="Kitriki orfenadrini">Kitriki orfenadrini</option>
							<option value="Ksylometazolini">Ksylometazolini</option>
							<option value="Loperamidi">Loperamidi</option>
							<option value="Lusozumi">Lusozumi</option>
							<option value="Mefainamiko oxy">Mefainamiko oxy</option>
							<option value="Menta">Menta</option>
							<option value="Niaouli">Niaouli</option>
							<option value="Nifouroxazidi">Nifouroxazidi</option>
							<option value="Oxymetazolini">Oxymetazolini</option>
							<option value="Papaini">Papaini</option>
							<option value="Paraketamoli">Paraketamoli</option>
							<option value="Pikotheiko natrio">Pikotheiko natrio</option>
							<option value="Poliaithileniglukozi">Poliaithileniglukozi</option>
							<option value="Pseudoefedrini">Pseudoefedrini</option>
							<option value="Sennosides">Sennosides</option>
							<option value="Simethikoni">Simethikoni</option>
							<option value="Tanniko oxy">Tanniko oxy</option>
							<option value="Theiokolxikosidi">Theiokolxikosidi</option>
							<option value="Vakitrakini">Vakitrakini</option>
							<option value="Visakodili">Visakodili</option>
							<option value="Xlwrofainamini">Xlwrofainamini</option>
							<option value="Ydroxidio tou argiliou">Ydroxidio tou argiliou</option>
							<option value="Ydroxidio tou magnisiou">Ydroxidio tou magnisiou</option>
							</select></p>
							<p>&nbsp;
							<select name="allergy3" id="allergy3" disabled >
							<option>
							<?php 
								/*$al3=array_pop($allergyArray);
								if(!empty($al3)) 
									print $al3;
								else print "";*/
								if(empty($allergyArray[2])){
									print "None";
								}else{
									print $allergyArray[2];
								}
							?> 
							</option>
							<option value="None">None</option>							
							<option value="Aletylosalikyliko oxy">Aletylosalikyliko oxy</option>
							<option value="Algiko natrio">Algiko natrio</option>
							<option value="Alkooliko dixlwrovenzolio">Alkooliko dixlwrovenzolio</option>
							<option value="Amylmetacresol">Amylmetacresol</option>
							<option value="Anthrakiko asbestio">Anthrakiko asbestio</option>
							<option value="Aseklofenaki">Aseklofenaki</option>
							<option value="Boutiloskopolamini">Boutiloskopolamini</option>
							<option value="Deksivouprofaini">Deksivouprofaini</option>
							<option value="Diklofainaki">Diklofainaki</option>
							<option value="Dittanthrakiko natrio">Dittanthrakiko natrio</option>
							<option value="Etofainemath">Etofainemath</option>
							<option value="Eukaluptos">Eukaluptos</option>
							<option value="Exetidini">Exetidini</option>
							<option value="Gloutaminiko oxy">Gloutaminiko oxy</option>
							<option value="Ivouprofaini">Ivouprofaini</option>
							<option value="Kitriki orfenadrini">Kitriki orfenadrini</option>
							<option value="Ksylometazolini">Ksylometazolini</option>
							<option value="Loperamidi">Loperamidi</option>
							<option value="Lusozumi">Lusozumi</option>
							<option value="Mefainamiko oxy">Mefainamiko oxy</option>
							<option value="Menta">Menta</option>
							<option value="Niaouli">Niaouli</option>
							<option value="Nifouroxazidi">Nifouroxazidi</option>
							<option value="Oxymetazolini">Oxymetazolini</option>
							<option value="Papaini">Papaini</option>
							<option value="Paraketamoli">Paraketamoli</option>
							<option value="Pikotheiko natrio">Pikotheiko natrio</option>
							<option value="Poliaithileniglukozi">Poliaithileniglukozi</option>
							<option value="Pseudoefedrini">Pseudoefedrini</option>
							<option value="Sennosides">Sennosides</option>
							<option value="Simethikoni">Simethikoni</option>
							<option value="Tanniko oxy">Tanniko oxy</option>
							<option value="Theiokolxikosidi">Theiokolxikosidi</option>
							<option value="Vakitrakini">Vakitrakini</option>
							<option value="Visakodili">Visakodili</option>
							<option value="Xlwrofainamini">Xlwrofainamini</option>
							<option value="Ydroxidio tou argiliou">Ydroxidio tou argiliou</option>
							<option value="Ydroxidio tou magnisiou">Ydroxidio tou magnisiou</option>
							</select></p>
						</ul>
					</div>
					<div class="6u$ 12u$(small)">
						<ul class="icons">
							<p>&nbsp;
							<select name="allergy4" id="allergy4" disabled >
							<option>
							<?php 
								/*$al4=array_pop($allergyArray);
								if(!empty($al4)) 
									print $al4;
								else print "";*/
								if(empty($allergyArray[3])){
									print "None";
								}else{
									print $allergyArray[3];
								}
							?> 
							</option>	
							<option value="None">None</option>
							<option value="Aletylosalikyliko oxy">Aletylosalikyliko oxy</option>
							<option value="Algiko natrio">Algiko natrio</option>
							<option value="Alkooliko dixlwrovenzolio">Alkooliko dixlwrovenzolio</option>
							<option value="Amylmetacresol">Amylmetacresol</option>
							<option value="Anthrakiko asbestio">Anthrakiko asbestio</option>
							<option value="Aseklofenaki">Aseklofenaki</option>
							<option value="Boutiloskopolamini">Boutiloskopolamini</option>
							<option value="Deksivouprofaini">Deksivouprofaini</option>
							<option value="Diklofainaki">Diklofainaki</option>
							<option value="Dittanthrakiko natrio">Dittanthrakiko natrio</option>
							<option value="Etofainemath">Etofainemath</option>
							<option value="Eukaluptos">Eukaluptos</option>
							<option value="Exetidini">Exetidini</option>
							<option value="Gloutaminiko oxy">Gloutaminiko oxy</option>
							<option value="Ivouprofaini">Ivouprofaini</option>
							<option value="Kitriki orfenadrini">Kitriki orfenadrini</option>
							<option value="Ksylometazolini">Ksylometazolini</option>
							<option value="Loperamidi">Loperamidi</option>
							<option value="Lusozumi">Lusozumi</option>
							<option value="Mefainamiko oxy">Mefainamiko oxy</option>
							<option value="Menta">Menta</option>
							<option value="Niaouli">Niaouli</option>
							<option value="Nifouroxazidi">Nifouroxazidi</option>
							<option value="Oxymetazolini">Oxymetazolini</option>
							<option value="Papaini">Papaini</option>
							<option value="Paraketamoli">Paraketamoli</option>
							<option value="Pikotheiko natrio">Pikotheiko natrio</option>
							<option value="Poliaithileniglukozi">Poliaithileniglukozi</option>
							<option value="Pseudoefedrini">Pseudoefedrini</option>
							<option value="Sennosides">Sennosides</option>
							<option value="Simethikoni">Simethikoni</option>
							<option value="Tanniko oxy">Tanniko oxy</option>
							<option value="Theiokolxikosidi">Theiokolxikosidi</option>
							<option value="Vakitrakini">Vakitrakini</option>
							<option value="Visakodili">Visakodili</option>
							<option value="Xlwrofainamini">Xlwrofainamini</option>
							<option value="Ydroxidio tou argiliou">Ydroxidio tou argiliou</option>
							<option value="Ydroxidio tou magnisiou">Ydroxidio tou magnisiou</option>
							</select></p>
							<p>&nbsp;
							<select name="allergy5" id="allergy5" disabled>
							<option>
							<?php 
								/*$al5=array_pop($allergyArray);
								if(!empty($al5)) 
									print $al5;
								else print "";*/
								if(empty($allergyArray[4])){
									print "None";
								}else{
									print $allergyArray[4];
								}
							?> 
							</option>
							<option value="None">None</option>
							<option value="Aletylosalikyliko oxy">Aletylosalikyliko oxy</option>
							<option value="Algiko natrio">Algiko natrio</option>
							<option value="Alkooliko dixlwrovenzolio">Alkooliko dixlwrovenzolio</option>
							<option value="Amylmetacresol">Amylmetacresol</option>
							<option value="Anthrakiko asbestio">Anthrakiko asbestio</option>
							<option value="Aseklofenaki">Aseklofenaki</option>
							<option value="Boutiloskopolamini">Boutiloskopolamini</option>
							<option value="Deksivouprofaini">Deksivouprofaini</option>
							<option value="Diklofainaki">Diklofainaki</option>
							<option value="Dittanthrakiko natrio">Dittanthrakiko natrio</option>
							<option value="Etofainemath">Etofainemath</option>
							<option value="Eukaluptos">Eukaluptos</option>
							<option value="Exetidini">Exetidini</option>
							<option value="Gloutaminiko oxy">Gloutaminiko oxy</option>
							<option value="Ivouprofaini">Ivouprofaini</option>
							<option value="Kitriki orfenadrini">Kitriki orfenadrini</option>
							<option value="Ksylometazolini">Ksylometazolini</option>
							<option value="Loperamidi">Loperamidi</option>
							<option value="Lusozumi">Lusozumi</option>
							<option value="Mefainamiko oxy">Mefainamiko oxy</option>
							<option value="Menta">Menta</option>
							<option value="Niaouli">Niaouli</option>
							<option value="Nifouroxazidi">Nifouroxazidi</option>
							<option value="Oxymetazolini">Oxymetazolini</option>
							<option value="Papaini">Papaini</option>
							<option value="Paraketamoli">Paraketamoli</option>
							<option value="Pikotheiko natrio">Pikotheiko natrio</option>
							<option value="Poliaithileniglukozi">Poliaithileniglukozi</option>
							<option value="Pseudoefedrini">Pseudoefedrini</option>
							<option value="Sennosides">Sennosides</option>
							<option value="Simethikoni">Simethikoni</option>
							<option value="Tanniko oxy">Tanniko oxy</option>
							<option value="Theiokolxikosidi">Theiokolxikosidi</option>
							<option value="Vakitrakini">Vakitrakini</option>
							<option value="Visakodili">Visakodili</option>
							<option value="Xlwrofainamini">Xlwrofainamini</option>
							<option value="Ydroxidio tou argiliou">Ydroxidio tou argiliou</option>
							<option value="Ydroxidio tou magnisiou">Ydroxidio tou magnisiou</option>
							</select></p>
							<p id="thisbutton">&nbsp;<br/>
							<input class="button" onclick="hide()" value="Edit Profile"/></p>
							<p id="thesebuttons" style="display: none;">&nbsp;<br/>
							<input type="submit" class="button" value="Save" name="save_allergies"/>
							<input class="button" onclick="location.reload()" value="Cancel"/>
							<input type="hidden" name="idAllergiesHidden" value="<?= $allergyID[0]?>"/> <!--Εμφανιζει το 1ο id του χρηστη στον πινακα allergies της βασης-->
							</p>
						</ul>
					</div>
				</div>
			</form>	
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
				  $("#allergy1").prop('disabled', false);
				  $("#allergy2").prop('disabled', false);
				  $("#allergy3").prop('disabled', false);
				  $("#allergy4").prop('disabled', false);
				  $("#allergy5").prop('disabled', false);
				}
				function show() {
				  var x = document.getElementById("thesebuttons");
				  if (x.style.display === "none") {
					x.style.display = "block";
				  } else {
					x.style.display = "none";
				  }
				  document.getElementById("thisbutton").style.display = "block";
				  $("#allergy1").prop('disabled', true);
				  $("#allergy2").prop('disabled', true);
				  $("#allergy3").prop('disabled', true);
				  $("#allergy4").prop('disabled', true);
				  $("#allergy5").prop('disabled', true);
				}
			</script>

</body>
</html>