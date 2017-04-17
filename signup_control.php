<?php
session_start();

/// LOGING IN FROM LOGIN FORM //////////////////////////////
$tname = $tusername= $tpassword = $tre_password = $temail = $tgender = "";
$ename = $eusername= $epassword = $ere_password = $eemail = $egender = "";

/// validating inputs /////////////////////////////////////////////////////////////
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	/// name
	if(empty($_POST["name"])){
		$ename = "Name is required.";
		
	}else{
		$tname = clear_inputs($_POST["name"]);
		
		if(!preg_match("/^[a-zA-Z ]*$/", $tname)){
			$ename = "Name is not valied.";
			$tname= "";
		}
		
	}
	/// username
	if(empty($_POST["username"])){
		$eusername= "Username is required.";
	}else{
		$tusername = clear_inputs($_POST["username"]);
		
		if(!preg_match("/^[a-zA-Z]*$/", $tusername)){
			$eusername="Username is not valid.";
			$tusername="";
		}
	}
	/// password
	if(empty($_POST["password"])){
		$epassword ="Password is required.";
	}else{
		$tpassword = clear_inputs($_POST["password"]);
		
		
	}
	/// re-password
	if(empty($_POST["re-password"])){
		$ere_password= "Please re-enter password.";
	}else{
		$tre_password = clear_inputs($_POST["re-password"]);
		
		
	}
	/// email
	if(empty($_POST["email"])){
		$eemail="Email is required.";
	}else{
		$temail = clear_inputs($_POST["email"]);
		if(!filter_var($temail, FILTER_VALIDATE_EMAIL)){
			$eemail= "Email is not valid.";
			$temail="";
			
		}
	}
	/// gender
	if(empty($_POST["gender"])){
		$egender= "Gender is required.";
	}else{
		$tgender= clear_inputs($_POST["gender"]);
		
	}
	/// if password not matched//////////////////
	if($tpassword!=$tre_password){
		$ere_password="Passwords not match.";
	}
	
}
/////////////////////////////////////////////////////////////////////////////////////////////////

//echo $tname ."<br>" . $tusername ."<br>" . $tpassword ."<br>" . $tre_password ."<br>" . $temail ."<br>" . $tgender;

/// clear inputs function //////////////////////////////////////////////////////////////////////////////////////////
function clear_inputs($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
	
}
/// creating session variables////////////////
$_SESSION["ename"]=$ename;
$_SESSION["eusername"]=$eusername;
$_SESSION["epassword"]=$epassword;
$_SESSION["ere_password"]=$ere_password;
$_SESSION["eemail"]=$eemail;
$_SESSION["egender"]=$egender;


/// DATABASE CONNECTIONS //////////////////////////////

/// create db if not exists//
include_once("create_db.php");

/// create table if not exists//
include_once("create_table.php");

/// make connection ///////
include_once("db_connection.php");

/// hashing the password ///////////
$password_hash = md5($tpassword);

/// insert data ////////////////////////////////////
if(empty($ename) && empty($eusername) && empty($epassword) && empty($ere_password) && empty($eemail) && empty($egender) &&!empty($tname) && !empty($tusername) && !empty($tpassword) && !empty($tre_password) && !empty($temail) && !empty($tgender)){
$sql="INSERT INTO users (name, username, password, email, gender) VALUES ('$tname', '$tusername', '$password_hash', '$temail', '$tgender')";

if(mysqli_query($conn, $sql)){
	echo"inserted.<br>";
	
	/// logging in /////////////////
	$_SESSION["username"]= $tusername;
	$_SESSION["user_id"]= mysqli_insert_id($conn);
	
	header("Location: index.php");
	
}else{
	echo "error<br>";
	echo mysqli_error($conn);
}
}else{
	header("Location: signup_form.php");
	echo "data not added.<br>";
}
mysqli_close($conn);

//echo $tname ."<br>" . $tusername ."<br>" . $tpassword ."<br>" . $tre_password ."<br>" . $temail ."<br>" . $tgender;
