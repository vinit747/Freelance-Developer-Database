<?php

	require('connect.php');
	
	$name = $_POST['name'];
	$country = $_POST['country'];
	$skill = $_POST['skill'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	
	/*Check if email already exists*/
	
	if($password != $cpassword)
	{
		header("Location:SignUpDeveloper.php");
	}
	
	else
	{
		echo 'Passwords same';
		/*Insert into database*/
		$dpersonalInsertQuery = "INSERT INTO dpersonal VALUES('$username','$password','$name','$country')";
		$demailInsertQuery = "INSERT INTO demail VALUES('$username','$email')";
		$dskillInsertQuery = "INSERT INTO dskill VALUES('$username','$skill')";
	
		$dpersonalInsertQueryResult = mysqli_query($conn,$dpersonalInsertQuery);
		$demailInsertQueryResult = mysqli_query($conn,$demailInsertQuery);
		$dskillInsertQueryResult = mysqli_query($conn,$dskillInsertQuery);
		
		if($dpersonalInsertQueryResult  && $demailInsertQueryResult && $dskillInsertQueryResult)
		{
			echo 'Registered Successfully';
			header("Location:SignIn.php")
		}
		
		else
		{
			echo 'registration error';
		}
	}
	
?>