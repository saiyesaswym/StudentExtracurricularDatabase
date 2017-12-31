<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	if(isset($_SESSION['eventid'])) {
		$eventid = $_SESSION['eventid'];
	}
	
	echo "<a href='UpdateEvent.php'>Return to Previous</a><br />";	
	
	if(isset($_POST['submit'])) {
		
		$data_missing = array();
		
		if(empty($_POST['eventET'])) {
			$data_missing[] = 'Event End Time';
		} else {
			$eventET = strip_tags(trim($_POST['eventET']));
		}
		if(empty($data_missing)) {
			// Get a connection for the database
			require_once('../connection.php');
			
			// Create a query for the database
			$query = "UPDATE events SET End_Time = ? WHERE event_ID = '{$eventid}'";
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "s", $eventET);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1) {
				echo '<br /><br />Update Successful';
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
				header('Location: UpdateEvent.php');
			} else {
				echo 'An Error Has Occurred <br />';
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
			}
		} else {
			echo 'Please Enter an Updated End Time';
		}
	}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Update Event End Time</title>
    </head>
    <body>
        <form method="post" action="UpdateEventET.php">
			<br>
			<b>To When Would You Like To Change The End Time?</b>
			
			<p>Event End Time:
            <input type="text" placeholder="hh:mm:ss" name="eventET" /><br />
			</p>
			<input type="submit" name="submit" value="Update Value" />
		</form>
	</body>
</html>