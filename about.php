<?php
session_start();
if(isset($_SESSION["username"])){
	$menu_link='<a href="logout.php">Logout</a>';
	
}else{
	$menu_link='<a href="signup_form.php">sign in/ Login</a>';
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Imagegallary: ABOUT</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header>
	<div id="logo"><img src="images/logo.png" alt="mysite"/></div>
		<ul id="navlinks">
			<li><a href="index.php" >home</a></li>
			<li><a href="gallary.php" >gallary</a></li>
			<li><a href="upload_form.php">upload&nbsp;image</a></li>
			<li><a href="about.php" class="thispage">about</a></li>
			<li><a href="profile.php" >my&nbsp;profile</a></li>
			<li><?php echo $menu_link ?></li>
		</ul>
	</header>
	<div id="space"></div>
	<footer>&copy; Copyright 2016 Prasad Kavinda&reg;</footer>
	
</body>
</html>