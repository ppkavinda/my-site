<!DOCTYPE html>
<html>
<head>
<title>My site: Home</title>
<style>
.error{color:red;}
</style>
</head>

<body>

<?php 
$name= $email= $website= $gender= $comment ="";
$nameEr= $emailEr= $websiteEr= $genderEr= $commentEr="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(empty($_POST["name"])){
		$nameEr = "Name is require.";
	}else{
		$name= clear_input($_POST["name"]);
		if(!preg_match("/^[a-zA-Z ]*$/", $name)){
			$nameEr="Name is not valid.";
			
		}
	}
	
	if(empty($_POST["email"])){
		$emailEr="Email is require.";
	}else{
		$email=clear_input($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$emailEr="Email is not valid.";
			
		}
	}
	
	if(empty($_POST["gender"])){
		$genderEr="Gender is require.";
	}else{
		$gender=clear_input($_POST["gender"]);
		
	}
	
	if(empty($_POST["website"])){
		$website="";
	}else{
		$website=clear_input($_POST["website"]);
		if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)){
			$websiteEr="Website is not valid.";
		}
		
	}
	
	if(empty($_POST["comment"])){
		$comment="";
	}else{
		$comment=clear_input($_POST["comment"]);
		
	}
	
}
function clear_input($data){
$data= trim($data);
$data= stripslashes($data);
$data= htmlspecialchars($data);
return($data);	
}


?>

<h1>Insert your information.</h1>

<p class= "error" >* require fields</p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
Name: <input type="text" name="name" >
<span class="error ">*<?php echo $nameEr ?></span><br><br>

Email: <input type="text" name="email">
<span class="error">*<?php echo $emailEr ?></span><br><br>

Website: <input type ="text" name="website">
<span class="class "><?php echo $websiteEr ?></span><br><br>

Gender: <input type="radio" name="gender" value="male" >Male
		<input type="radio" name="gender" value="female" >Female
		<span class="error">*<?php echo $genderEr ?></span><br><br>
Comment: <textarea type="text" placeholder="Tell us what you think..." rows="5" cols="35" name="comment"></textarea><br><br>

<input type="submit" value="Submit" >

</form>


<?php
/// DATABASE CONNECTION ////////////////////////////////////////////////////////////////
$server="localhost";
$user="root";
$password="";
$db_name="php_test";

/// create database ///////////////////////////
$conn= mysqli_connect($server, $user, $password);
$select_db= mysqli_select_db($conn, $db_name);

if(!$select_db){
	$create_db="CREATE DATABASE php_test";
	if(mysqli_query($conn, $create_db)){
		echo "db created.<br>";
	}else{
		echo mysqli_error($conn);
	}
}

mysqli_close($conn);

$conn =mysqli_connect($server, $user, $password, $db_name);

if(!$conn){
	die("cannot connect to database.<br>". mysqli_error($conn));
}

/// create the table /////////////////////////////
$select_table="SELECT * FROM members";

if(!mysqli_query($conn, $select_table)){
	$create_table="CREATE TABLE IF NOT EXISTS members(
	id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(40) NOT NULL,
	email VARCHAR(40) NOT NULL,
	website VARCHAR(40) NOT NULL,
	gender VARCHAR(6) NOT NULL,
	comment VARCHAR(300) NOT NULL,
	reg_date TIMESTAMP
	)";
	if(mysqli_query($conn, $create_table)){
		echo "table created.<br>";
	}else{
		echo "coudn't create the table.<br>" . mysqli_error($conn);
		
	}
}

if(empty($nameEr) && empty($emailEr) && empty($websiteEr) && empty($genderEr) &&!empty($name) && !empty($email) && !empty($gender)){

$insert_query=" INSERT INTO members (name, email, website, gender, comment) VALUES ( '$name', '$email', '$website', '$gender', '$comment')";

if(mysqli_query($conn, $insert_query)){
	echo "<br><br><strong>Your input data submitted successfully.</strong><br>";
}else{
	echo "Cannot submit the data.<br>". mysqli_error($conn);
}
}

mysqli_close($conn);

 ?>


<?php
/// PRINTING DATA TO A FILE //////////////////////////////////////////////////////////////


if(empty($nameEr) && empty($emailEr) && empty($websiteEr) && empty($genderEr) && empty($commentEr) &&!empty($name) && !empty($email) && !empty($gender) ){
 
$file=fopen("db_records.txt", "a") or die("Cannot Open file.<br>");

fwrite($file, $name ."\t" . $email ."\t" . $website. "\t" . $gender. "\t" . $comment . "\n");
fclose($file);

}
 ?>
</body>
</html>