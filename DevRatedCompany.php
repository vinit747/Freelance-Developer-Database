<?php
	require("connect.php");
	session_start();
	$projectName = $_SESSION['projectName'];
	$crating = $_SESSION['crating'];
	$enddate = Date("Y-m-d");
	
	$updateProjectQuery = "UPDATE project SET enddate = '{$enddate}',crating = '{$crating}',status = 'completed' where name = '{$projectName}'"; 
	$updateProjectQueryResult = mysqli_query($conn,$updateProjectQuery);
	
	if(!$updateProjectQueryResult)
	{
		echo 'unsuccessful';
	}
		
	else
	{
		header("Location:DevPendingProject.php");
	}
?>