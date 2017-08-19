<?php
	
	session_start();
	require('connect.php');
	
	if($_POST['username'] != '' && $_POST['password'] != '' && $_POST['signin'] != '')
	{
		$_SESSION['e_username'] = $_POST['username'];
		$_SESSION['e_password'] = $_POST['password'];
		
		$e_username = $_SESSION['e_username'];
		$e_password = $_SESSION['e_password'];
		/*
		echo "set";
		echo $_SESSION['e_username'];
		echo $_SESSION['e_password'];
		*/
		
		$searchDevQuery = "SELECT * FROM dpersonal where username = '{$e_username}' AND password = '{$e_password}'";
		$searchComQuery = "SELECT * FROM cpersonal where username = '{$e_username}' AND password = '{$e_password}'";
		
		$searchDevQueryResult = mysqli_query($conn,$searchDevQuery);
		$searchComQueryResult = mysqli_query($conn,$searchComQuery);
		
		if(mysqli_num_rows($searchDevQueryResult) == 1)
		{
			echo "authenticated developer";
			header("Location:DevPendingProject.php");
		}	
		
		else if(mysqli_num_rows($searchComQueryResult) == 1)
		{
			echo "authenticated company";
			header("Location:ComUnassignedProject.php");
		}	
		
		else
		{
			echo "cannot recognize";
		}
	
	}
	
	else
	{
		//session_destroy();
		header("Location:SignIn.php");
		exit();
		//echo "error";
	}

?>