<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['password'])) {
		
		echo "<a href='StudentQueries.php'>Return To Previous</a><br />";
		
		if (isset($_POST['submit'])) {
			$studentid = strip_tags($_POST['studentid']);
			if (empty($studentid)) {
				echo '<br />Please Enter a Student ID<br />';
			} else {
				
				//open connection
				include_once("../connection.php");
				
				//check whether this event id exists
				$sqlcheck = "SELECT Univ_ID FROM students WHERE Univ_ID = '{$studentid}'";
				$querycheck = mysqli_query($dbc, $sqlcheck);
				if ($querycheck) {
					$rowcheck = mysqli_fetch_row($querycheck);
					$dbStudentID = $rowcheck[0];
				}
				if ($dbStudentID == $studentid) {
					$_SESSION['studentid'] = $studentid;
					header('Location: RegisteredEvents.php');					
				} else {
					echo '<br />That Student ID Does Not Exist.<br />';
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
		<b>Input the Student ID Below:</b>
		<br>
		<br>
	    <form method="post" action="StudentEventDate.php">
            <input type="text" placeholder="Student ID" name="studentid" /> &nbsp;
            <br><input type="submit" name="submit" value="Submit" />
        </form>
    </body>
</html>