<?php
$conn = mysqli_connect("localhost", "root", "", "mysite_1");
$sql = "SELECT * FROM image_info WHERE img_id BETWEEN 12 AND 24 ORDER BY img_id DESC ";
$result = mysqli_query($conn, $sql);
$grid = "";

if(mysqli_fetch_array($result) > 0 ){
	while($row = mysqli_fetch_array($result)){
		$grid .= '
		<div class = "image_box">
			<div class="image">
				<a href="uploads/ '. $row["img_name"] .'" download> <img src="uploads/'. $row["img_name"] .'" /> </a>
			</div>
			<div class= "img_name">
				'. $row["img_name"] .'
			</div>
			<div class = "img_size">
				'. $row["img_height"] .'x' .$row["img_width"]. '
			</div>
		</div>
		'; 
	}
}

echo $grid;