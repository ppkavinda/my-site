<?php
session_start();
/// setting menulink ////////////////////
if(isset($_SESSION["username"])){
	$menu_link='<a href="logout.php">Logout</a>';
}else{
	$menu_link='<a href="signup_form.php">sign&nbsp;in/&nbsp;login</a>';
}

$grid="";
/// selecting data and setting up the gallary ///////////////////////////
include_once("db_connection.php");

$query_select=" SELECT * FROM image_info ORDER BY img_id DESC LIMIT 12";
$result= mysqli_query($conn, $query_select);

if(mysqli_num_rows($result) >0){

	while($row= mysqli_fetch_array($result)){
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



		/* '
		<div id="image_box">
			<div id="image_bg"><a href="image_maximize.php" > <img src="uploads/'.$row["img_name"].'" width="200"> </a></div>
			<div id="table">
			<table border="1px">
				<tr>
					<td>
				'.$row["img_name"].'
					</td>
				</tr>
				<tr>
					<td>
				'.$row["img_width"].' x '.$row["img_height"].'
					</td>
				</tr>
			</table>
			</div>
		</div>'; */
	}
}

mysqli_error($conn);
?>
<!DOCTYPE html>
<html>
<head>
<title>Imagegallary: GALLARY</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/script.js"></script>
<script src="js/load_page2.js"></script>
</head>
<body>

	<header>
	<div id="logo"><img src="images/logo.png" alt="mysite"/></div>
		<ul id="navlinks">
			<li><a href="index.php" >home</a></li>
			<li><a href="gallary.php" class="thispage">gallary</a></li>
			<li><a href="upload_form.php">upload&nbsp;image</a></li>
			<li><a href="about.php">about</a></li>
			<li><a href="profile.php">my&nbsp;profile</a></li>
			<li><?php echo $menu_link ?></li>
		</ul>
	</header>

<div id ="wrapper">
	<?php echo $grid; ?>
	<div id="ajax_grid"></div>

	<div id="load_button">
	<button type="button" id="load_more_button" onclick="load_page2();">Load More</button>

	</div>


</div>

<footer>&copy; Copyright 2016 Prasad Kavinda&reg;</footer>

</body>
</html>
