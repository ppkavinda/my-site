<?php
if(isset($_POST["submit"])){
	$username = clear_inputs($_POST["username"]);
	$password = clear_inputs($_POST["password"]);
	$password_hash = md5($password);
	
	include_once("db_connection.php");
	
	$query_select="SELECT user_id, username FROM users WHERE username='$username' AND password='$password_hash' LIMIT 1";
	$result= mysqli_query($conn, $query_select);
	
	if(mysqli_num_rows($result) > 0){
		$row= mysqli_fetch_array($result);
		
		session_start();
		/// creating session variables /////////////////
		$_SESSION["username"] = $row["username"];
		$_SESSION["user_id"] = $row["user_id"];
		
		header("Location: profile.php");
	}else{
		session_start();
		/// creating error session variable ////////////
		$_SESSION["loger"]= "Username and password not matched.<br>".mysqli_error($conn);
		header("Location: signup_form.php");
	}
}

function clear_inputs($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}