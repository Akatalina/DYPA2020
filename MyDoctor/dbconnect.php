<?php
 @session_start();

$servername="localhost";
$user="root";
$pass="";
$database="mydoctordb";

$con =  new mysqli($servername,$user,$pass,$database);

if($con->connect_error){
		die('Could not connect: '.$con->connect_error);
}

//echo "Connected to database.";









?>