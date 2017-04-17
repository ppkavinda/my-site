<?php
session_start();
if(isset($_SESSION["username"])){
	$menu_link='<a href="logout.php">logout</a>';
	header("Location: profile.php");
	
}else{
	$menu_link='<a href="signup_form.php" class="thispage">sign&nbsp;in/&nbsp;login</a>';
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Imagegallary: SIGNUP/ LOGIN</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/script.js"></script>
<script src="js/check_db.js"></script>

</head>

<body>
	<header>
	<div id="logo"><img src="images/logo.png" alt="mysite"/></div>
		<ul id="navlinks">
			<li><a href="index.php" >home</a></li>
			<li><a href="gallary.php" >gallary</a></li>
			<li><a href="upload_form.php">upload&nbsp;image</a></li>
			<li><a href="about.php">about</a></li>
			<li><a href="profile.php">my&nbsp;profile</a></li>
			<li><?php echo $menu_link ?></li>
		</ul>
	</header>
	
<div id="wrapper">

<div class="signup">
<h3>Signup here</h3>

<p class="error"> * required fields</p>

<form name="signup_form" method="post" action="signup_control.php" id="signup" >

	<label>Name:</label><br>
	<input type = "text" name="name" required>
		<span class="error" >
			*<?php if(isset($_SESSION["ename"])){ echo $_SESSION["ename"];}?>
		</span>
			
	<label>Username:</label><br>
	<input type="text" name="username" onblur="check_db_username(this.value)" required>
		<span class="error" id="ajax_username">
			*<?php if(isset($_SESSION["eusername"])){ echo $_SESSION["eusername"];}?>
		</span>
			
	<label>Password:</label><br>
	<input type="password" name="password" required>
		<span class="error" >
			*<?php if(isset($_SESSION["epassword"])){ echo $_SESSION["epassword"];}?>
		</span>
			
	<label>Confirm password:</label><br>
	<input type="password" name="re-password" required>
		<span class="error">
			*<?php if(isset($_SESSION["ere_password"])){ echo $_SESSION["ere_password"];}?>
		</span>
			
	<label>Email:</label><br>
	<input type="email" name="email" onblur="check_db_email(this.value)" required>
		<span class="error" id="ajax_email">
			*<?php if(isset($_SESSION["eemail"])){ echo $_SESSION["eemail"]; }?>
		</span>
			
	<label>Gender:</label><br>
	<input type="radio" name="gender" value="male" >Male
		<input type="radio" name="gender" value="female" >Female
		<span class="error">
			*<?php if(isset($_SESSION["egender"])){ echo $_SESSION["egender"];}?>
		</span>
			
		<input type="submit" name="submit" value="Sign up" class="submit"><br><br>
	
</form>
</div>

<div class="login">
<h3>Login here</h3>

<form method="post" action="login_control.php" id="login" >
Username: <br><input type="text" name="username"><br><br>
Password: <br><input type="password" name="password">
<span class="error">*<?php if(isset($_SESSION["loger"])){ echo $_SESSION["loger"];} ?></span><br><br>

<input type="submit" name="submit" value="Log in" class="submit">
</form>
</div>
</div>

<footer>&copy; Copyright 2016 Prasad Kavinda&reg;</footer>

</body>

</html>