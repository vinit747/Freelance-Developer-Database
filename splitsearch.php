

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practise";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
else
{
	echo "Connected successfully"; 
}
?> 



<!doctype html>
<html leng = "en">
<head>
	<meta charset = "utf-8"/>
	<title>Search Results</title>
	<link rel = "stylesheet" href = "practise.css">
	
</head>

<body>
	

	<form method = "get" action = "splitsearch.php" >
		<input type = "text" name = "searchName" placeholder = "<?php echo $_REQUEST["searchName"]; ?>" >
		<input type="submit" value="click on me!">
	</form>
	
	<?php
		$rowsPerPage = 3;
		$totalRecords;
		$pageNo;
		$startRow;
		$noOfPages;
	?>
	
	<?php
		
		$selectAll = "SELECT * FROM student where rollno >= '{$_GET["searchName"]}'";
		//echo "searchName is ".$_GET["searchName"];
		
		displayQueryResult($selectAll);
	?>
	
	<?php
		
		function displayQueryResult($query)
		{
			global $rowsPerPage,$totalRecords,$pageNo,$startRow,$conn,$noOfPages;
			$pageNo = $_GET['pageNo'];
			//echo 'pageNo is'.$pageNo;
			//echo "pageNo in else ".$pageNo;
			if(!isset($pageNo))
			{
				$pageNo = 0;
				//echo "pageNo in if ".$pageNo;
			}
			
		
			
			
			
			
			$queryResult = mysqli_query($conn,$query);
			$totalRecords = mysqli_num_rows($queryResult);
			$noOfPages = ceil($totalRecords / $rowsPerPage);
			
			
			$startRow = $rowsPerPage*$pageNo;
			//echo "start row is ".$startRow;
			//$query .= " LIMIT '{$startRow}','{$rowsPerPage}'"; 
			$query .= " LIMIT "."$startRow".","."$rowsPerPage";
			
			$queryResult = mysqli_query($conn,$query);
			
			
			//echo "no of pages".$noOfPages;
			
			echo '<div id = "searchResultWrapper">';
			
				echo '<div id = "searchResults" > ';
				if(mysqli_num_rows($queryResult) > 0)
				{
					while($row = mysqli_fetch_assoc($queryResult))
					{	
						$pk = $row["rollno"];
						echo '<a href="profile.php?pk='.$pk.'">';
						echo "<article>";
						
						echo '<img src="'.$row["imagepath"].'">';
						echo $row["rollno"]."<br>". $row["name"] . "<br>" . $row["color"] . "<br><br>";
					
						echo "</article>";
						echo '</a>';
					}
				}
				
				else
				{
					echo "0 search results";
				}
				echo "</div>";
				
				echo '<ul id = "pageNumberWrapper">';
				
				/*if ($pageNo > 0) 
				{
					echo "Prev";
					$url = "splitsearch.php?searchName=".$_GET["searchName"]."&pageNo=".($pageNo - 1);
					echo "<a href=\"$url\">Previous</a>\n";
				}*/
				
					// page numbering links now
				for ($i = 0; $i < $noOfPages; $i++) 
				{	
					$url = "splitsearch.php?searchName=".$_GET["searchName"]."&pageNo=" . $i;
					?>
					<li id = "pageNumber"><a href = "splitsearch.php?pageNo=<?php echo $i."&searchName=".$_GET['searchName'];?>"><?php echo $i;?></a></li><?php
				}
				
				/*if ($pageNo < $pages) 
				{
					$url = "splitsearch.php?pageNo=" .($pageNo + 1);
					echo "<a href=\"$url\">Next</a>\n";
				}*/
				echo "</ul>";
			echo "</div>";
		}
	
	?>
	
	
</body>

</html>