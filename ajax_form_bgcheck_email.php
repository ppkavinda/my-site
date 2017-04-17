<?php
$email = $_REQUEST["email"];
$conn = mysqli_connect("localhost", "root", "", "ajax_db");
$sql = "SELECT email FROM user_info WHERE email = '$email' LIMIT 1";
$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_array($result)){
		echo $row["email"] . " is already registered.";
	}

mysqli_error($conn);
mysqli_close($conn);

