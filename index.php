<?php
session_start();

if(isset($_SESSION["username"])){
	$menu_link='<a href="logout.php">Logout</a>';
}else{
	$menu_link='<a href="signup_form.php">sign&nbsp;in/&nbsp;login</a>';
}

/// CREATING DBS AND TABLES //////
/// create db//
include_once("create_db.php");
/// create table ////
include_once("create_table.php");


?>

<!DOCTYPE html>
<html>

<head>
<title>ImageGallary: HOME</title>
<link href="style/style.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/script.js"></script>
</head>

<body>
<header>
<div id="logo"><img src="images/logo.png" alt="mysite"/></div>
	<ul id="navlinks">
		<li><a href="index.php" class="thispage">home</a></li>
		<li><a href="gallary.php">gallary</a></li>
		<li><a href="upload_form.php">upload&nbsp;image</a></li>
		<li><a href="about.php">about</a></li>
		<li><a href="profile.php">my&nbsp;profile</a></li>
		<li><?php echo $menu_link ?></li>
	</ul>
</header>

<div id="wrapper">
<div id="hero"> </div>

<p>Bayside Beat keeps you informed of the best places to see, eat, and sleep in the City by the Bay.</p>
<h2>Riding the Cable Cars</h2>

<p>No visit to San Francisco is complete without a ride on the iconic cable cars that climb up the vertiginous hills of the city. 
Of the twenty-three lines established between 1873 and 1890, three remain: two routes from downtown near Union Square to Fisherman's Wharf, and a
 third route along California Street.</p>

<p>The cable cars rely on cables running constantly beneath the road’s surface. The driver—or gripman—uses a lever to grip the cable to pull the car
 and its passengers up the hill. The gripman requires not only great strength, but also great skill. He needs to know where to release the cable to coast
 over crossing cables and points. The conductor works in close cooperation with the gripman, operating the brake at the rear of the car to prevent it from 
 running out of control on the downward slopes.</p>

<p>Although the cable cars are now mainly a tourist attraction, they’re still used by local commuters to get to and from work. The California Street line
 is particularly popular among commuters on weekdays.</p>
 
<h2>Cable Car Tips</h2>

<p>A single ride on a cable car costs $7. If you plan to travel around the city, it’s often cheaper to buy a Muni Passport, which gives you unlimited
 rides on San Francisco’s extensive public transport system, including the cable cars (but not the BART subway system). Even a single-day passport ($20) 
 will save you money if you make a return trip, and stop off to visit Chinatown one way.</p>

<p>There are often long lines at the cable car terminus, particularly on the Powell-Mason and Powell-Hyde routes. If you don’t want to wait, try walking 
a few stops along the route. The conductor usually leaves a small number of places to pick up passengers on the way. The California Street route is generally
 less crowded (but not as spectacular).
</p>

</div>

<footer>&copy; Copyright 2016 Prasad Kavinda&reg;</footer>

</body>

</html>