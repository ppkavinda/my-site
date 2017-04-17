<!DOCTYPE html>
<html>
<head>
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/testscript.js"></script>
<script src="js/ajax_test.js"></script>
<script src= "js/bootstrap.min.js"></script>

<link href="style/test3.css" rel="stylesheet" type="text/css"/>
<link rel = "stylesheet" href="css/bootstrap.min.css" type="text/css"/>
</head>
<body id="body">
<header>
	<div class="logo"></div>
	
</header>
<nav id="navbar">
		<ul id="navlinks">
			<li><a href="#">Home</a></li>
			<li><a href="#">gallery</a></li>
			<li><a href="#">my profile</a></li>
			<li><a href="#">add image</a></li>
			<li><a href="#">sign in</a></li>
		</ul>
</nav>
<div class="wrapper">
	<p>lasdk asi akj i aloi jias naisd eai elidmian idmn iwe dnnia idfa alskj
	laksj eijpaosdij adsoij la;kfj adlfkjaf aiej aldifj ;alkdjf a;ldifj a;dlkfjfie
	alifmdflksja jlfij aslidfjawe ihtoi uaosdifjap apsoifja podsifuopiuf aodfjovnnofaf
	ouoasf awer asdf fa sdfn aidnij anidn iandin aisdn inaisdn alidfja din difj 
	ifanidnfin infijijt ijninivn ijda nina sdi</p>

<!-------------------------------------------------------------------------------------------------------------------------->
	
<!--	
<input id="b1" type="button" value="<h1>Click here</h1>">
<p id="test"></p>


<form name="form1"  onsubmit="formValidate();" id="form1" >

Name: <input type="text" name="name" id="name" onfocus="changeC(this);" ><br/><br/>
Email: <input type="text" name="email" id="email" ><br/><br/>
Contact: <input type="number" name="contact" id="contact" min="4"><br/><br/>

<button type="submit" >Submit</button>
<button name="btn1" onclick="formValidate();" >Button 2</button>
</form>




<br/><br/>
<hr/>
<input id="id1" type="text" >
<button >hide/ show</button><br/>

<p id="demo"></p>


<p id="p1">Hello World!</p>
<button id="button" >show</button>


<p>The paragraph above was changed by a script.</p>
	<script>
		window.addEventListener("scroll", function(){
		document.getElementById("demo").innerHTML= "a";
		
		
		});
	</script>
	
<div id="div1">
	<p id="p2">This is a paragraph.</p>
	<button id="b2">.  b2  .</button><br/>
	
	<button id="b3">.  b3  .</button>
	<p id="p3">This is another paragraph.</p>
	
	<p id="p4">This is paragraph 4.</p>
	<button id="b4">.  b4  .</button>
	<button id="b5">.  b5  .</button>
	
	<p id="p5">This is paragraph 5.</p>
	<button id="b6">.  b6  .</button>
	<button id="b7">.  b7  .</button>
	
</div>



	<div style="height:600px"><div>


-->

<br><br>

<form action="ajax_form.php" method="POST">
	First Name: <input type ="text" name="firstName" onblur="new_page()" required>
		<span id="firstName" class="er"></span><br><br>

	Last Name: <input type = "text" name= "lastName"required>
		<span id="lastName" class="er"></span></span><br><br>

	Username:<input type = "text" name= "username" onblur = "check_db_username(this.value)" required>
		<span id="username" class="er"></span><br><br>

	Password: <input type = "password" name="password" required>
		<span id="password" class="er"></span><br><br>

	Email: <input type = "email" name="email" onblur = "check_db_email(this.value)"  required>
		<span id="email" class="er"></span><br><br>

	<input type ="submit" name="submit">
</form>

<div id="ajax_res"><div/>


<!------------------------------------------------------------------------------------------------------------------------>
</div>
</body>
</html>