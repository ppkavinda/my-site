<?php
$server="localhost";
$user="root";
$db_password="";
$db_name="mysite_1";

$conn= mysqli_connect($server, $user, $db_password, $db_name);

if(!$conn){
	die ("cannot connect to database.<br>");
	echo mysqli_error($conn);
	
}