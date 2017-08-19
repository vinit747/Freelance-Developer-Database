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
	<title>Developer Profile</title>
	<link rel = "stylesheet" href = "DevPendingProject.css">
	
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
				
				<a href="DevInvitation.php" >Invitations <img src = "InvitationIcon.png"></a>	
				<a href="DevPendingProject.php">Ongoing Projects <img src = "PendingProjectIcon.png"></a>
				<a href="DevDoneProject.php">Completed Projects <img src = "DoneProjectIcon.png"></a>
				
				<?php
					echo '<a href="" id = "user">';
					echo "Signed in as ".$username;
					echo '</a>'
				?>
	
			</nav>
		</div>		
		
		<?php
			$searchPendingProjectQuery = "SELECT * FROM project where givento = '{$username}' AND status = 'inprogress'";
			$searchPendingProjectQueryResult = mysqli_query($conn,$searchPendingProjectQuery);
			$noOfRows = mysqli_num_rows($searchPendingProjectQueryResult);
			
			
			if($noOfRows == 0)
			{
				echo 'Good Job!You have completed all your projects';
			}
		
			else
			{	
				echo '<article id = "pending_project_no">';
				echo 'You have '.$noOfRows.' projects pending<br>';
				echo "</article>";
				
				
				while($projectDetails = mysqli_fetch_assoc($searchPendingProjectQueryResult))
				{
					echo '<article id = "pending_project">';
					
					echo 'Project Name: '.$projectDetails['name'].'<br><br>';
					echo 'Given By: '.$projectDetails['givenby'].'<br><br>';
					echo 'Uploaded on: '.$projectDetails['uploaddate'].'<br><br>';
					echo 'Started on: '.$projectDetails['startdate'];
					echo ' Deadline: '.$projectDetails['deadline'];
					
					?>					
					<a href = "DevRatesCompany.php?projectName=<?php echo $projectDetails['name']; ?>">
						<button type = "button">Done</button>
					</a>
					
					<?php
					
					echo "</article>";
				}
				
			}
			
		?>
			
</body>