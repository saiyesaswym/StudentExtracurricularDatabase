<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	if(isset($_SESSION['eventid'])) {
		$eventid = $_SESSION['eventid'];
	}
	
	echo "<a href='UpdateEvent.php'>Return to Previous</a><br />";	
	
	if(isset($_POST['submit'])) {
		
		$data_missing = array();
		
		if(empty($_POST['eventDesc'])) {
			$data_missing[] = 'Event Description';
		} else {
			$eventDesc = strip_tags(trim($_POST['eventDesc']));
		}
		if(empty($data_missing)) {
			// Get a connection for the database
			require_once('../connection.php');
			
			// Create a query for the database
			$query = "UPDATE events SET Description = ? WHERE event_ID = '{$eventid}'";
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "s", $eventDesc);
			
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
			echo 'Please Enter an Updated Description';
		}
	}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Update Event Description</title>
    </head>
    <body>
        <form method="post" action="UpdateEventDesc.php">
			<br>
			<b>To What Would You Like To Change The Description?</b>
			
			<p>Event Description:
            <input type="text" placeholder="Event Description" name="eventDesc" /><br />
			</p>
			<input type="submit" name="submit" value="Update Value" />
		</form>
	</body>
</html>