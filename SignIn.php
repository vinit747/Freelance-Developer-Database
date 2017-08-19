<?php

	session_start();
	
?>


<!doctype html>
<html leng = "en">
<head>
	<meta charset = "utf-8"/>
	<title>Sign In</title>
	<link rel = "stylesheet" href = "SignIn.css">
	
	

</head>
<body>
		<div id = "top">
			<nav>
			
				<img src = "Work.png">
				<span id = "logotext">	
					<span>Back</span>
					<span id = "number2">2</span>
					<span>Work</span>
				</span>	
				<sub>.com</sub>	
				<a href="SignUp.php" class = "SignUp ">Sign Up <img src = "SignUpIcon.png"></a>	
				<a href class = "SignIn">Sign In <img src = "SignInIcon.png"></a>
				<a href="Home.php" class = "Home">Home <img src = "HomeIcon.png"></a>
				<span><input id = "search_box" type = "text" name = "search" placeholder = "Search"></span>
				
				<span id = "dropdown_search">
					
					<select>
						<option value="project">Project</option>
						<option value="developer">Developer</option>
						<option value="company">Company</option>
					</select>
				
				</span>
			
			</nav>
			
			<div id = "signInBlock">
			<form method = "post" action="loginverify.php">
				<img id = "signInLogo" src = "SignInLogo.png"><img>
				<input id = "userNameField" type = "text" name = "username" placeholder = "Username"><br>
				<input id = "passwordField" type = "password" name = "password" placeholder = "Password"><br>
				<input type = "submit" class = "shakeButton" name = "signin" value = "Sign In"><br>
				<a href><h3>Forgot Password?</h3></a>
			</div>
			</form>
		
		</div>
		<hr>
		
		<h1>How it Works</h1>
		
		<div id = "bottom">
			<article>
				<img src = "PostIcon.png">
				<h2>Post</h2>
				<p>Post your project</p>
			</article>
			
			<article>
				<img src = "BigSearchIcon.png">
				<h2>Search</h2>
				<p>Use search option to find suitable developers</p>				
			</article>
			
			<article>
				<img src = "HireIcon.png">
				<h2>Hire</h2>
				<p>Hit Hire and Relax</p>				
			</article>
		</div>
		
</body>

</html>
<?php
	/*
	if(isset($_POST['username'],$_POST['password'],$_POST['signin']))
	{
		$_SESSION['e_username'] = $_POST['username'];
		$_SESSION['e_password'] = $_POST['password'];
	}*/
	/*echo $e_username;
	echo $e_password;*/


?>