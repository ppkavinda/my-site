
<?php
session_start();
if(isset($_SESSION["username"])){
	$menu_link='<a href="logout.php">Logout</a>';
}else{
	$menu_link='<a href="signup_form.php">sign in/ Login</a>';
}

if(!isset($_SESSION["username"])){
	$_SESSION["loger"]="You have to log in first.";
	header("Location: signup_form.php");
}
/// GETTING USER INFO //////////////////////
include_once("db_connection.php");

$username= $_SESSION["username"];
$user_id= $_SESSION["user_id"];

$query_select_info=" SELECT * FROM users WHERE username='$username' AND user_id='$user_id' LIMIT 1 ";
$result= mysqli_query($conn, $query_select_info);

if(mysqli_num_rows($result)> 0){
	$row= mysqli_fetch_array($result);
	
	$uname= $row["name"];
	$uusername= $row["username"];
	$uemail= $row["email"];
	$ureg_date= $row["reg_date"];
	$ugender=$row["gender"];
	$uid=$row["user_id"];

}else{
	mysqli_error($conn);
}


/// GETTING IMG INFO /////////////
include_once("db_connection.php");

$query_select_img=" SELECT * FROM image_info WHERE user_id='$user_id'  ORDER BY image_info.img_id DESC LIMIT 3";
$result= mysqli_query($conn, $query_select_img);
$grid="";
$msg='';

if(mysqli_num_rows($result)> 0){
	
	while($row=mysqli_fetch_array($result)){
		$grid.='
		<div class="image_box">
			<div class="image">
				<a href="uploads/'.$row["img_name"].'" download><img src="uploads/'.$row["img_name"].'"/></a>
			</div>
			<div class="img_name">
			'.$row["img_name"].'
			</div>
			<div class="img_size">
			'.$row["img_width"].'x'.$row["img_height"].'
			</div>
		</div>
		';
	}
}else{
	$msg= "you haven't added images recently.<br>";
}

mysqli_error($conn);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
<title>Imagegallary: PROFILE</title>
<head>
<link href="style/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/script.js"></script>
</head>
<body>
	<header>
	<div id="logo"><img src="images/logo.png" alt="mysite"/></div>
		<ul id="navlinks">
			<li><a href="index.php" >home</a></li>
			<li><a href="gallary.php" >gallary</a></li>
			<li><a href="upload_form.php">upload&nbsp;image</a></li>
			<li><a href="about.php">about</a></li>
			<li><a href="profile.php" class="thispage">my&nbsp;profile</a></li>
			<li><?php echo $menu_link ?></li>
		</ul>
	</header>
<div id="wrapper">	
	<div id="user_info">
	<h2>my details</h2>
	
	<p>Name: <?php echo $uname ?></P>
	<p>Username: <?php echo $uusername ?></p>
	<p>Email: <?php echo $uemail ?></p>
	<p>Gender: <?php echo $ugender ?></p>
	<p>Registered date: <?php echo $ureg_date ?></p>
	<p>id: <?php echo $uid ?></p>
	
	</div>
	
	<div id="change_password">
	<h2>change password</h2>

	<form action="change_p.php" method="post">
		Current password: <input type="password" name="cpass"/>
		<span class="error">*<?php if(isset($_SESSION["cpass_er"])){echo  $_SESSION["cpass_er"]; }?></span>
		
		New password:  <input type="password" name="npass"/> 
		<span class="error">*<?php if(isset($_SESSION["npass_er"])){echo $_SESSION["npass_er"]; }?></span>
		
		Confirm password: <input type="password" name="ncpass"/>
		<span class="error">*<?php if(isset($_SESSION["ncpass_er"])){echo $_SESSION["ncpass_er"]; }?></span>
		
		<input type="submit" name="submit" class="pw_submit"/>
	</form>
	
	</div>
	
	<div id="space"></div>
	
	<div class="image_gallary">	
		<h3>recently added images</h3>

	<?php echo $grid; ?>
	<?php echo $msg ; ?>
	</div>
	
</div>
	<footer>&copy; Copyright 2016 Prasad Kavinda&reg;</footer>
	
</body>
</html>