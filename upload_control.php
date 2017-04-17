<?php
/// HANDLING IMAGE UPLOAD ////////////////////////////
session_start();

$target_dir="uploads/";
$target_file= $target_dir. basename($_FILES["fileToUpload"]["name"]);
$uploadOk= 1;
$ok= 0;
$imageFileType= pathinfo($target_file, PATHINFO_EXTENSION);
$check[3]= "";    /// error handling
$msg= "";


/// check if image is fake or not /////////////////////////
if(isset($_POST["submit"])){
	
	/// check if an image selected /////////////////
	if(empty($_FILES["fileToUpload"]["tmp_name"])){
		$msg.= "please select an image.<br>";
	}else{
		$check= getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	
	if($check!== false){
		$uploadOk=1;
		
	}else{
		$msg.= "file is not an image.<br>";
		$uploadOk=0;
	}
	}
}

/// check file is ALREADY EXISTS ////////////////////////////
if(file_exists($target_file)){
	$msg.= "file is already exists.<br>";
	$uploadOk= 0;
}else{
	$uploadOk= 1;
}

/// limit file SIZE //////////////////////////////////////////
if($_FILES["fileToUpload"]["size"] > 3000000){
	$msg.= "Image is too large.<br>";
	$uploadOk=0;
}
/// check name length of the image ///////////////////////
if(strlen(basename($_FILES["fileToUpload"]["name"])) >75){
	$msg.= "file name is too long. max lingth is 5 charactors.<br>";
	$uploadOk=0;
}
/// allow sertain file types only /////////////////////////
if($imageFileType !=="jpg" && $imageFileType!=="jpeg" && $imageFileType!=="gif" && $imageFileType!=="png"){
	$msg.= "Only jpg, png and gif file types are allowed.<br>";
	$uploadOk=0;
}
/// check if the user is logged in //////////////////
if(empty($_SESSION["user_id"]) || empty($_SESSION["username"])){
	$uploadOk=0;
	$_SESSION["loger"]="You have to log in first.";
	header("Location: signup_form.php");
}
/// check if $uploadOk is eather 1 or 0 /////////////////////////
if($uploadOk==0){
	$url="upload_form.php";
	$msg.= "Error: cannot upload image.<br>";
	
	//everything is ok and uploading file /////////////////////
}else{
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
		$url="gallary.php";
		$msg.= "image named \"". basename($_FILES["fileToUpload"]["name"]). "\" file was uploaded.<br>";
		
		/// sql good to go //////
		$ok=1;
		
	}else{
		$url="upload_form.php";
		$msg.= "File upload FAILED!.<br>";
	}
	
}

/// check if $msg is equals to "please select an image"  and resetting it ///////////////
if($msg=="please select an image.<br>file is already exists.<br>Only jpg, png and gif file types are allowed.<br>Error: cannot upload image.<br>"){
	$msg="please select an image.<br>";
}

/// DATABASE INSERT - IMAGE INFO///////////////////////////////////////


// to determine the width and height///
function flt_wh($st, $wh){
  $token = strtok($st, '"');
  $c=0;
while ($token !== false)
    {
    $token = strtok('"');
	$c++;

	if($c== 1){
		$w=$token;
	}elseif($c== 3){
		$h=$token;
	}
    }
	if(!empty($w) && !empty($h)){
if($wh=="w"){ return $w;}
if($wh=="h"){ return $h;}
	}
}


$img_name= basename($_FILES["fileToUpload"]["name"]);
$img_size= $_FILES["fileToUpload"]["size"];
$img_width= flt_wh($check[3], "w" );
$img_height= flt_wh($check[3], "h");
$userId= $_SESSION["user_id"];

if($ok==1){
	include_once("db_connection.php");
	
	$query_insert="INSERT INTO image_info (img_name, img_type, img_size, img_width, img_height, user_id) VALUES 
	('$img_name','$imageFileType', '$img_size', '$img_width', '$img_height', '$userId') ";
	
	if(!mysqli_query($conn, $query_insert)){
		
		$msg.= mysqli_error($conn);
	}
}

/// REDIRECTING ///////////////////////////////////
?>

<!DOCTYPE html>
<html>

<head>

	<link href="style/style.css" rel="stylesheet" type="text/css">
	<meta http-equiv="refresh" content="5;url=<?php echo $url ?>" />
</head>

<body>
	<div class="wrapper">
	<div class="upload_message">
		<?php echo "<h4>".$msg."</h4>"; ?>
	</div>
	
	<div id="space">
			
	</div>
	</div>

<footer>&copy; Copyright 2016 Prasad Kavinda&reg;</footer>

</body>
</html>