<?php
	require('connect.php');
	session_start();
	
	$username = $_SESSION['e_username'];
	$password = $_SESSION['e_password'];
?>


<!doctype html>
<html leng = "en">
<head>
	
	<meta charset = "utf-8"/>
	<title>Company Unassigned Projects</title>
	<link rel = "stylesheet" href = "ComUnassignedProject.css">
	
</head>

<body>
		
		<div id = "top">
			<nav id = "nav1">
			
				<img src = "Work.png">
				<span id = "logotext">	
					<span>Back</span>
					<span id = "number2">2</span>
					<span>Work</span>
				</span>	
				<sub>.com</sub>
				
				<a href="Home.php" id = "signout">Sign Out <img src = "SignOutIcon.png"></a>
				
				<span><input id = "search_box" type = "text" name = "search" placeholder = "Search"></span>	
				
				<span id = "dropdown_search">
					
					<select>
						<option value="project">Project</option>
						<option value="developer">Developer</option>
						<option value="company">Company</option>
					</select>
				
				</span>	
				
			</nav>
			
			<nav id = "nav2">
				
				<a href>Unassigned Projects </a>	
				<a href="ComPendingProject.php">Ongoing Projects <img src = "PendingProjectIcon.png"></a>
				<a href="ComDoneProject.php">Completed Projects <img src = "DoneProjectIcon.png"></a>
				
				<?php
					echo '<a href="" id = "user">';
					echo "Signed in as ".$username;
					echo '</a>'
				?>
	
			</nav>
		</div>		
		
		<?php

			$unassignedProjectQuery = "SELECT * FROM project WHERE givenby = '{$username}' AND status = 'unassigned'";
			$unassignedProjectQueryResult = mysqli_query($conn,$unassignedProjectQuery);
			$noOfRows = mysqli_num_rows($unassignedProjectQueryResult);
			
			if($noOfRows == 0)
			{
				echo 'Good Job!You have completed all your projects';
			}
			
			else
			{
				echo '<article id = "unassigned_project_no">';
				echo 'You have '.$noOfRows.' unassigned projects<br>';
				echo "</article>";
			
				while($projectDetails = mysqli_fetch_assoc($unassignedProjectQueryResult))
				{
					echo '<article id = "unassigned_project">';
					
					echo 'Project Name: '.$projectDetails['name'].'<br><br>';
					echo 'Uploaded on: '.$projectDetails['uploaddate'].'<br><br><br>';
					
					$noOfBiddersQuery = "SELECT count(bidby) AS countBidders FROM project inner join bid on project.name = bid.name WHERE givenby = '{$username}' and status = 'unassigned' and project.name = '{$projectDetails['name']}';";
					$noOfBiddersQueryResult = mysqli_query($conn,$noOfBiddersQuery);
					$noOfBidders = mysqli_fetch_array($noOfBiddersQueryResult);
					echo $noOfBidders['countBidders'].' developers have bidded so far';
					?>					
					<a href = "ComAssignsProject.php?projectName=<?php echo $projectDetails['name']; ?>">
						<button id = "assign_button" type = "button">Assign</button>
					</a>
					
					<?php
					
					echo "</article>";
				}
				
			}
		
		?>
			
</body>