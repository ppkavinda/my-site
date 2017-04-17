<?php

$username = $_GET["username"];
$conn = mysqli_connect("localhost", "root", "", "mysite_1");
$sql = "SELECT username FROM users WHERE username ='$username' LIMIT 1";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
	echo "<b>" . $row["username"]. "</b> is already exists.";

}

mysqli_error($conn);
mysqli_close($conn);