<?php
/// CREATE DATABASE IF NOT EXISTS////////////////////////////////
$server="localhost";
$user="root";
$db_password="";
$db_name="mysite_1";

$db_conn =mysqli_connect($server, $user, $db_password);
$db_select= mysqli_select_db($db_conn, $db_name);

/// select database 
if(!$db_select){
	$query_create_db="CREATE DATABASE mysite_1";
	/// Create db
	if(mysqli_query($db_conn, $query_create_db)){
		echo "db created.<br>";
		
	}else{
		echo mysqli_error($db_conn);
	}
}

mysqli_close($db_conn);