<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['eventid3'])) {
		
		echo "<a href='StudentEventMajor.php'>Return To Previous</a><br />";
		
		if (isset($_POST['submit'])) {
			$majorid = strip_tags($_POST['majorid']);
			if (empty($majorid)) {
				echo '<br />Please Enter a Major ID <br />';
			} else {
				
				//open connection_aborted
				include_once("../connection.php");
				
				//check whether this event id exists
				$sqlcheck = "SELECT Major_ID FROM majors WHERE Major_ID = '{$majorid}'";
				$querycheck = mysqli_query($dbc, $sqlcheck);
				if ($querycheck) {
					$rowcheck = mysqli_fetch_row($querycheck);
					$dbMajorID = $rowcheck[0];
				}
				if ($dbMajorID == $majorid) {
					$_SESSION['majorid'] = $majorid;
					header('Location: StudentEventMajor3.php');					
				} else {
					echo '<br />That Major ID Does Not Exist.<br />';
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Query</title>
    </head>
    <body>
		<br>
		<b>Input the Major ID Below:</b>
		<br>
		<br>
	    <form method="post" action="StudentEventMajor2.php">
            <input type="text" placeholder="Major ID" name="majorid" /> &nbsp;
            <br><input type="submit" name="submit" value="Submit" />
        </form>	
		<br>
		<br>		
		<a href='Major.php'>Click for Major ID's</a>
    </body>
</html>