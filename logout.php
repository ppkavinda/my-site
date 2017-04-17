<?php
session_start();

if(!empty($_SESSION["username"]) || !empty($_SESSION["user_id"])){
	
	session_unset();
	
	header("Location: signup_form.php");
}else{
	
}
exit;