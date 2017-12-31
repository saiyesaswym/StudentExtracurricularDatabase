<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	
	echo "<a href='CountEvents.php'>Return to Previous</a>";
	
    if(isset($_POST['submit'])) {
		$eventID = strip_tags($_POST['eventID']);
		
		// Get a connection for the database
		require_once('../connection.php');
		
		mysqli_autocommit($dbc, false);
		$flag = true;
		$query1 = "DELETE FROM student_event WHERE Event_ID = '{$eventID}'";
		$query2 = "DELETE FROM events WHERE Event_ID = '{$eventID}'";
		
		$result = mysqli_query($dbc, $query1);	
		if(!$result) {
			$flag = false;
			echo "<br /><br />Error details: " . mysqli_error($dbc) . ".";
		}
		$result = mysqli_query($dbc, $query2);
		if(!$result) {
			$flag = false;
			echo "<br /><br />Error details: " . mysqli_error($dbc) . ".";
		}		
		
		if($flag) {
			mysqli_commit($dbc);
			echo "<br /><br />Deletion Successful, Transaction Complete";
		} else {
			mysqli_rollback($dbc);
			echo "<br /><br /> Deletion Unsuccessful, All Queries Were Rolled Back";
		}
		
		mysqli_close($dbc);
	}
	

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Delete Event and Participation</title>
    </head>
    <body>
		<br>
		<br>
        <b>Delete Event and Participation</b>
        <form method="post" action="DeleteTrans.php">
			<p>Event ID to be Deleted:
            <input type="text" placeholder="Event ID" name="eventID" /><br />
			</p>
            <input type="submit" name="submit" value="Delete" />
        </form>
    </body>

</html>