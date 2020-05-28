<?php
@session_start();
require_once("dbconnect.php");
/*
$cond1=$_POST['conditition1'];
$cond2=$_POST['conditition2'];
$cond3=$_POST['conditition3'];
$cond4=$_POST['conditition4'];
$cond5=$_POST['conditition5'];
if(!isset($cond1))
	$cond1="";
if(!isset($cond2))
	$cond2="2";
if(!isset($cond3))
	$cond3="";
if(!isset($cond4))
	$cond4="1";
if(!isset($cond5))
	$cond5="1";*/
$cond1="1";
$cond2="2";
$cond3="3";
$cond4="4";
$cond5="5";
$historyString="";
for($i=1;$i<6;$i++){
	$cond='cond'.$i;
print ${$cond};
}
$a1="";
$a2="";
print "a1:".$a1."a2:".$a2."<br> ga";
if($a1==$a2){
print "einai isa";
}



?>