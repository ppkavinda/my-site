<?php
$username = $_REQUEST["username"];
$conn = mysqli_connect("localhost", "root", "", "ajax_db");
$sql = "SELECT username FROM user_info WHERE  username='$username' LIMIT 1";
$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_array($result) ){
		echo $row['username'] . " is already exists.";

	}

mysqli_error($conn);
mysqli_close($conn);

