<?php
session_start();
if(empty($_SESSION["user_id"]) || empty($_SESSION["username"])){
	$uploadOk=0;
	$_SESSION["loger"]="You have to log in first.";
	header("Location: signup_form.php");
}

if(isset($_SESSION["username"])){
	$menu_link='<a href="logout.php">logout</a>';
}else{
	$menu_link='<a href="signup_form.php">sign in/ login</a>';
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Imagegallary: UPLOAD</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/script.js"></script>
</head>

<body>
<div class="wrapper">
	
	<header>
	<div id="logo"><img src="images/logo.png" alt="mysite"/></div>
		<ul id="navlinks">
			<li><a href="index.php" >home</a></li>
			<li><a href="gallary.php" >gallary</a></li>
			<li><a href="upload_form.php" class="thispage">upload&nbsp;image</a></li>
			<li><a href="about.php">about</a></li>
			<li><a href="profile.php" >my&nbsp;profile</a></li>
			<li><?php echo $menu_link ?></li>
		</ul>
	</header>
	
<div class="instruction">
	<p>
		Your image should be,
		<ul>
			<li>jpg, png or gif format.</li>
			<li>less than 1mb.</li>
			<li>named using less than 40 characters.</li>
		</ul>
	</p>
</div>
	
<div class="upload_form">
<form method="post" action="upload_control.php" enctype="multipart/form-data" id="upload_form">
Select an image to upload : <input type="file" value="Browse" name="fileToUpload" id="fileToUpload"><br>
						<input type="submit" value="Upload image" name="submit" class="del_submit">
</form>
</div>
	
</div>

<footer>&copy; Copyright 2016 Prasad Kavinda&reg;</footer>

</body>
</html>