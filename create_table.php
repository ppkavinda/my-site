<?php

$server="localhost";
$user="root";
$db_password="";
$db_name="mysite_1";

$conn= mysqli_connect($server, $user, $db_password, $db_name);

/// create table ///////////////////////////////
$query_create_table="CREATE TABLE IF NOT EXISTS users (
user_id INT(3) unsigned AUTO_INCREMENT PRIMARY KEY,
name VARCHAR (50) NOT NULL,
username VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR (50) NOT NULL,
gender VARCHAR (6) NOT NULL,
reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);";

$query_create_table_img="CREATE TABLE IF NOT EXISTS image_info (
img_id INT(3) unsigned AUTO_INCREMENT PRIMARY KEY,
img_name VARCHAR(80) NOT NULL,
img_type VARCHAR(5) NOT NULL,
img_size INT(20) NOT NULL,
img_width INT(5) NOT NULL,
img_height INT(5) NOT NULL,
user_id INT(3) NOT NULL
);
";

if(!mysqli_query($conn, $query_create_table)){
	echo "cannot create table.<br>";
	echo mysqli_error($conn);
}

if(!mysqli_query($conn, $query_create_table_img)){
	echo "cannot craete table.<br>". mysqli_error($conn);
}

mysqli_close($conn);
