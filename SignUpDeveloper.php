<!doctype html>
<html leng = "en">
<head>
	<meta charset = "utf-8"/>
	<title>Sign Up As A Developer</title>
	<link rel = "stylesheet" href = "SignUpDeveloper.css">
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
				<a href class = "SignUp ">Sign Up <img src = "SignUpIcon.png"></a>	
				<a href="SignIn.php" class = "SignIn">Sign In <img src = "SignInIcon.png"></a>
				<a href = "Home.php" class = "Home">Home <img src = "HomeIcon.png"></a>
				<span><input id = "search_box" type = "text" name = "search" placeholder = "Search"></span>
				
				<span id = "dropdown_search">
					
					<select  name = "tablefilter">
						<option value="project">Project</option>
						<option value="developer">Developer</option>
						<option value="company">Company</option>
					</select>
				
				</span>
			
			</nav>
		</div>
		
		<form method = "post" action="RegisterDeveloper.php">
			<div id = "sign_up_box_wrapper">
				<div id = "sign_up_box">
					<img id ="sign_up_logo" src = "SignUpDeveloperLogo.png">
					
					<input class = "formfields" type = "text" name = "name" required placeholder = "Name"><br>
					
					<span  id = "dropdown_country" >
						<select name = "country">
							<option value="India">India</option>
							<option value="United States">United States</option>
							<option value="Russia">Russia</option>
						</select>
					</span><br><br>
					
					<span  id = "dropdown_skill">
						<select  name = "skill">
							<option value="Web">Web</option>
							<option value="Android">Android</option>
							<option value="iOS">iOS</option>
							<option value="Game">Game</option>
						</select>
					</span><br><br>
					
					<input class = "formfields" type = "text" name = "username" required placeholder = "Username"><br>
					<input class = "formfields" type = "text" name = "email" required placeholder = "Email"><br>
					<input class = "formfields" type = "password" name = "password" required placeholder = "Password"><br>
					<input class = "formfields" type = "password" name = "cpassword" required placeholder = "Confirm Password"><br><br><br>
					<input type = "submit" class = "shakeButton" value = "Sign Up"><br><br><br>
					<a href = "SignUpCompany.php" id = "signup_bottom">Sign up as a company</a>
				</div>
			</div>
			
		
		</form>
	
</body>
</html>