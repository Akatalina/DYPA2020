<?php
@session_start();
require_once("dbconnect.php");
//$allergia=$_POST['allergia'];
$symptoma1=$_POST['symptom1'];
$symptoma2=$_POST['symptom2'];
$symptoma3=$_POST['symptom3'];
$symptoma4=$_POST['symptom4'];
$symptoma5=$_POST['symptom5'];
if(!isset($symptoma1))
	$symptoma1="";
if(!isset($symptoma2))
	$symptoma2="";
if(!isset($symptoma3))
	$symptoma3="";
if(!isset($symptoma4))
	$symptoma4="";
if(!isset($symptoma5))
	$symptoma5="";


$sql="SELECT id FROM users WHERE uname='".$_SESSION['user']."'";
$result=$con->query($sql);
$row=$result->fetch_row();
//print "<br>user id = ".$row[0]."<br>";
//$id=$row[0];//Αποθηκευεται το id του S_SESSION['user']
//print $allergia." ".$symptoma; // Τα εμφανιζω για επιβεβαιωση
/*
//====================================================================
$insertAllergia="INSERT INTO allergies(`user`,`ousia`) VALUES ('".$id."','".$allergia."');";
if (mysqli_query($con, $insertAllergia)) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $insertAllergia . "<br>" . mysqli_error($con);
}
//====================================================================
$onomaFarmakou="DEPON";
$insertSymptoma="INSERT INTO symptomlist VALUES('".$symptoma."','".$onomaFarmakou."')";
if (mysqli_query($con, $insertSymptoma)) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $insertSymptoma . "<br>" . mysqli_error($con);
}
//====================================================================
$allergiogonaOusia="Paraketamoli";
$insertFarmako="INSERT INTO farmaka VALUES('".$onomaFarmakou."','".$allergiogonaOusia."')";
if (mysqli_query($con, $insertFarmako)) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $insertFarmako . "<br>" . mysqli_error($con);
}
*/
//====================================================================
//$selectedSymptomList="SELECT * FROM symptomlist;";				//--------------->Επιλογη ολων απο πινακα symptomlist
//$resSymptomList=$con->query($selectedSymptomList);	//[1]
//$rowSymptomList=$resSymptomList->fetch_row();
//print "rowSymptms= ".$rowSymptomList[0]."&nbsp"."&nbsp rowSymptoms[1]=".$rowSymptomList[1]; <------ Το εβαλα για δοκιμη. Να το σβησω
//===================================================================
//$selectedFarmaka="SELECT * FROM farmaka;";						//--------------->Επιλογη ολων απο πινακα farmaka
//$resFarmaka=$con->query($selectedFarmaka);			//[2]
				
//===================================================================



/*BHMA1*/
$selectAllergia="SELECT ousia FROM allergies WHERE user='".$_SESSION['userId']."';";		//--------------->Επιλογη ουσιας απο πινακα allergies
$resAllergia=$con->query($selectAllergia);		//[3]
$allergiesArray = array();
$allergiesString="";
while($rowAllergia=$resAllergia->fetch_assoc()){    //[3]                 Παιρνω τις αλλεργιες του συγκεκριμενου χρηστη και 
	array_push($allergiesArray,$rowAllergia['ousia']);		//τις βαζω στην μεταβλητη $allergiesArray
	$allergiesString.=$rowAllergia['ousia'].",";
}
if($allergiesString!=null){
	$finalAllergiesString = rtrim($allergiesString,",");
	print $finalAllergiesString;
}

print "<pre>";
print_r($allergiesArray);
print "</pre><br>";
print "Oi parapano einai oi allergies tou user ".$id;
print "<p>To length tou allergyarray = ".count($allergiesArray)."</p>";

/*BHMA2*/
function addToArraySplitted($ousia){   			// Βαζει τις ουσιες των φαρμακων σε πινακα.
	$ousiesArray = array();
	$token=strtok($ousia,",");
	while($token !== false){
		array_push($ousiesArray,$token);
		$token=strtok(",");
	}
	return $ousiesArray;
}


//$i=1;
function yparxeiOusia($haystack,$needle){		//Ελεγχει αν στον πινακα με τις ουσιες των φαρμακων υπαρχει καποια απο τις αλλεργιες του χρηστη.
	foreach(array_values($needle) as $x ){
		$find = false;
		//print "<br>".$i++." EPANALIPSI FOR<br>";
		if(in_array($x,$haystack)){
			$find=true;
			break 1;
		}else{
			$find = false;;
		}
	}
return $find;
}


$proteinomenoFarmakoArray=array();					//Το δηλώνω έτσι γιατί αλλιώς πετάει error  	
$selectFarmaka="SELECT * FROM farmaka WHERE symptoma='".$symptoma1."' OR symptoma='".$symptoma2."' OR symptoma='".$symptoma3."' OR symptoma='".$symptoma4."' OR symptoma='".$symptoma5."';";
$resFarmaka=$con->query($selectFarmaka);
while($rowFarmaka=$resFarmaka->fetch_assoc()){
	print "<br>".$rowFarmaka['onoma']."<br>";
	$ousiaFarmakou=$rowFarmaka['ousia'];
	print $ousiaFarmakou."<br>";
	$historyFarmakou=$rowFarmaka['history'];
	print $historyFarmakou."<br>";
	$pin=addToArraySplitted($ousiaFarmakou);		//$pin = Πινακας με τις ουσιες των φαρμακων
	print_r($pin);
	print "<br>";
	$vrethike=yparxeiOusia($pin,$allergiesArray);
	if($vrethike==true){
		print "h function yparxiOusia() ektelesteike kai vrethike ousia sto xapi pou prokalei allergia<br>";
		print "----------------------";
	}else{
		$proteinomenoFarmako = $rowFarmaka['onoma'];
		array_push($proteinomenoFarmakoArray,$rowFarmaka['onoma']);
		//break 1;
	}
}



//========================================================================================================
//print "<p>PROTEINOMENO FARMAKO GIA TO SYMPTOMA ".$symptoma1." EINAI TO ".$proteinomenoFarmako."</p>";
print_r($proteinomenoFarmakoArray);
print "<br/>";
$uniqueProteinomenaFarmaka = array();
$uniqueProteinomenaFarmaka = array_unique($proteinomenoFarmakoArray);
print_r($uniqueProteinomenaFarmaka);

$_SESSION['proteinomenaFarmaka']=$uniqueProteinomenaFarmaka;
header("Location:symptoms.php");
?>