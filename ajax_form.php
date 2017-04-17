<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

	

	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];

	$conn = mysqli_connect("localhost", "root", "", "ajax_db");

	$sql = "INSERT INTO user_info (firstName, lastName, username, password, email) VALUES 
		('$firstName', '$lastName', '$username', '$password', '$email')";

		header("Location: test3.php");
	mysqli_query($conn, $sql);
	mysqli_close($conn);

}