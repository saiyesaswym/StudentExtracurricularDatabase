<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['password'])) {
		
		echo "<a href='StudentQueries.php'>Return To Previous</a><br />";
		
		if (isset($_POST['submit'])) {
			$eventid = strip_tags($_POST['eventid']);
			if (empty($eventid)) {
				echo '<br />Please Enter an Event ID';
			} else {
				
				//open connection_aborted
				include_once("../connection.php");
				
				//check whether this event id exists
				$sqlcheck = "SELECT Event_ID FROM events WHERE Event_ID = '{$eventid}'";
				$querycheck = mysqli_query($dbc, $sqlcheck);
				if ($querycheck) {
					$rowcheck = mysqli_fetch_row($querycheck);
					$dbEventID = $rowcheck[0];
				}
				if ($dbEventID == $eventid) {
					$_SESSION['eventid2'] = $eventid;
					header('Location: StudentEvent2.php');					
				} else {
					echo '<br />That Event ID Does Not Exist.<br /><br />';
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
		<b>Input the Event ID Below:</b>
		<br>
		<br>
	    <form method="post" action="StudentEvent.php">
            <input type="text" placeholder="Event ID" name="eventid" /> &nbsp;
            <br><input type="submit" name="submit" value="Submit" />
        </form>
    </body>
</html>