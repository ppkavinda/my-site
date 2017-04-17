
<?php

$email = $_GET["email"];
$conn = mysqli_connect("localhost", "root", "", "mysite_1");
$sql = "SELECT email FROM users WHERE email ='$email' LIMIT 1";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
	echo "<b>" . $row["email"]. "</b> is already registered.";

}

mysqli_error($conn);
mysqli_close($conn);
