<?php
session_start();
if(isset($_SESSION["username"])){
	$menu_link='<a href="logout.php">Logout</a>';
}else{
	$menu_link='<a href="signup_form.php">sign in/ Login</a>';
}

$cpass = $npass = $ncpass = "";
$user_id= $_SESSION["user_id"];
$ok=0;

if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	/// checking current password  field/////////////////////
	if(empty($_POST["cpass"]) || !(trim($_POST["cpass"])===$_POST["cpass"])){
		$_SESSION["cpass_er"]="This field cannot be empty.";
		$ok=0;
		header("Location: profile.php");
		
	}else{
		$cpass= $_POST["cpass"];
		$cpass= md5($cpass);
		$ok=1;
	}
	
	/// checking new password field /////////////////////////
	if(empty($_POST["npass"]) || (trim($_POST["npass"])!==$_POST["npass"])){
		$_SESSION["npass_er"]= "This field cannnot be empty.";
		$ok=0;
		header("Location: profile.php");
		
	}else{
		$npass= $_POST["npass"];
		$npass= md5($npass);
		$ok=1;
	}
	
	/// checking new conf password field ////////////////////
	if(empty($_POST["ncpass"]) || (trim($_POST["ncpass"])!==$_POST["ncpass"])){
		$_SESSION["ncpass_er"]= "This field cannot be empty.";
		$ok=0;
		header("Location: profile.php");
		
	}else{
		$ncpass= $_POST["ncpass"];
		$ncpass= md5($ncpass);
		$ok=1;
	}
	
	/// query select/////////////////////////////////////
	include_once("db_connection.php");
	
	$query_select_pass=" SELECT password FROM users WHERE user_id= '$user_id'";
	$result= mysqli_query($conn, $query_select_pass);
	
	if(mysqli_num_rows($result)> 0){
		$row= mysqli_fetch_array($result);
		
		if($row["password"]=== $cpass){
			
			if($npass== $ncpass && $ok===1){
				/// everything good, changing password ////////////////
				$query_update= "UPDATE users SET password='$npass' WHERE user_id='$user_id'";
				if(mysqli_query($conn, $query_update)){
					
					$msg="Password changed successfully.<br>";
					
					$_SESSION["npass_er"]= $_SESSION["cpass_er"] = $_SESSION["ncpass_er"] ="";
					
				}
			
			}else{
				$_SESSION["ncpass_er"]= "Password confirm failed.".mysqli_error($conn);
				header("Location: profile.php");
				
			}
		}else{
			if(!empty($_POST["cpass"])){
			$_SESSION["cpass_er"]="Current password incorrect.";
			}
			
			$_SESSION["npass_er"]= $_SESSION["ncpass_er"]="";
			mysqli_error($conn);
			header("Location: profile.php");
			
		}
	}
	mysqli_error($conn);
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
<head></head>
<body>
	<header>
		<div id="logo"></div>
		
		<nav>
		<ul>
			<li><a href="index.php">home</a></li>
			<li><a href="gallary.php">gallary</a></li>
			<li><a href="upload_form.php">upload image</a></li>
			<li><a href="about.php">about</a></li>
			<li><a href="profile.php">my profile</a></li>
			<li><?php echo $menu_link ?></li>
		</ul>
		</nav>
	</header>
	<?php echo $msg ;?>
</body>
</html>