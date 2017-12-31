<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	
	if(isset($_SESSION['password'])) {
		$username = $_SESSION['username'];
		$userId = $_SESSION['password'];
		$userMajor = $_SESSION['major'];
		echo "Current User: {$username}";
		echo "<br /> ID Number: {$userId}";
		echo "<br /> Major: {$userMajor}";
	} else {
		header('Location: index.php');
		die();
	}
	
	if(isset($_POST['submit'])) {
		
		$data_missing = array();
		
		if(empty($_POST['eventID'])) {
			$data_missing[] = 'Event ID';
		} else {
			$eventID = strip_tags(trim($_POST['eventID']));
		}
		if(empty($data_missing)) {
			// Get a connection for the database
			require_once('../connection.php');
			
			// Create a query for the database
			$query = "INSERT INTO student_event (Univ_ID, Event_ID) VALUES (?, ?)";
			$stmt = mysqli_prepare($dbc, $query);
			
			mysqli_stmt_bind_param($stmt, "is", $userId, $eventID);
			
			mysqli_stmt_execute($stmt);
			
			$affected_rows = mysqli_stmt_affected_rows($stmt);
			
			if($affected_rows == 1) {
				echo '<br /><br />You Have Been Registered';
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
			} else {
				echo 'An Error Has Occurred <br />';
				echo mysqli_error();
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
			}
		} else {
			echo 'Please Enter an Event ID Number';
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Event Registration</title>
    </head>
    <body>
        <form method="post" action="EventRegister.php">
			<br>
			<b>Register for an Event</b>
			<p>Event ID:
            <input type="text" placeholder="Event ID" name="eventID" /><br />
			</p>
            <input type="submit" name="submit" value="Register" />
        </form>
		<div style="position: absolute; bottom: 10px"> <a href="students.php">Back</a> </div>
    </body>
</html>