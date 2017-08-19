<?php
	
	session_start();
	$_SESSION['projectName'] = $_GET['projectName'];
	echo $_SESSION['projectName'];
?>

<!doctype html>
<html leng = "en">
<head>
	<meta charset = "utf-8"/>
	<title>Developer Rates Company</title>
	<link rel = "stylesheet" href = "">
</head>

<body>
	<form action = "DevRatedCompany.php">
		<input type = "text" placeholder = "Rate your Employer" name="crating" required/>
		<button type = "submit">Rate</button>
	</form>
</body>

</html>
