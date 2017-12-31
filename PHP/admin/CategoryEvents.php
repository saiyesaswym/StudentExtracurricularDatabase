<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['password'])) {
		
		echo "<a href='EventQueries.php'>Return To Previous</a><br />";
		
		if (isset($_POST['submit'])) {
			$catid = strip_tags($_POST['catid']);
			if (empty($catid)) {
				echo '<br />Please Enter a Category ID<br />';
			} else {
				
				//open connection_aborted
				include_once("../connection.php");
				
				//check whether this event id exists
				$sqlcheck = "SELECT Category_ID FROM event_categories WHERE Category_ID = '{$catid}'";
				$querycheck = mysqli_query($dbc, $sqlcheck);
				if ($querycheck) {
					$rowcheck = mysqli_fetch_row($querycheck);
					$dbCatID = $rowcheck[0];
				}
				if ($dbCatID == $catid) {
					$_SESSION['catid2'] = $catid;
					header('Location: CategoryEvents2.php');					
				} else {
					echo '<br />That Category ID Does Not Exist.<br />';
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Event Query</title>
    </head>
    <body>
		<br>
		<b>Input the Category ID Below:</b>
		<br>
		<br>
	    <form method="post" action="CategoryEvents.php">
            <input type="text" placeholder="Category ID" name="catid" /> &nbsp;
            <br><input type="submit" name="submit" value="Submit" />
        </form>
		<br>	
		<a href='EventCategories3.php'>Click for Category ID's</a>		
    </body>
</html>