<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['password'])) {
		
		echo "<a href='FacultyQueries.php'>Return To Previous</a><br />";
		
		if (isset($_POST['submit'])) {
			$univid = strip_tags($_POST['univid']);
			if (empty($univid)) {
				echo '<br />Please Enter a Faculty ID<br />';
			} else {
				
				//open connection_aborted
				include_once("../connection.php");
				
				//check whether this event id exists
				$sqlcheck = "SELECT DISTINCT Advisor_ID FROM students WHERE Advisor_ID = '{$univid}'";
				$querycheck = mysqli_query($dbc, $sqlcheck);
				if ($querycheck) {
					$rowcheck = mysqli_fetch_row($querycheck);
					$dbUnivID = $rowcheck[0];
				}
				if ($dbUnivID == $univid) {
					$_SESSION['univid2'] = $univid;
					header('Location: AdvisorEvents2.php');					
				} else {
					echo '<br />That ID Does Not Correspond to an Advisor.<br />';
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Faculty Query</title>
    </head>
    <body>
		<br>
		<b>Input the Advisor ID Below:</b>
		<br>
		<br>
	    <form method="post" action="AdvisorEvents.php">
            <input type="text" placeholder="Faculty ID" name="univid" /> &nbsp;
            <br><input type="submit" name="submit" value="Submit" />
        </form>		
    </body>
</html>