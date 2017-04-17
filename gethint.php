<?php

$a = $_REQUEST["a"];

$conn = mysqli_connect("localhost", "root", "", "mysite_1");

$sql = "SELECT username FROM users WHERE username='$a'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
    echo "<span style='font-weight: bold'>". $row["username"] ."</span> is already exists!";
}

mysqli_error($conn);
mysqli_close($conn);