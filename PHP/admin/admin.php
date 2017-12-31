<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['password'])) {
		
		echo "<a href='logout.php'>Logout</a><br />";
		//echo "<img src = 'University.jpg'>";
		$numEve = $_SESSION['numEvents'];
		
		if (isset($_POST['submit'])) {
			$eventid = strip_tags($_POST['eventid']);
			if (empty($eventid)) {
				echo '<br />Please Enter an Event ID';
			} else {
				
				//open connection
				include_once("../connection.php");

				//check whether this event id exists
				$sqlcheck = "SELECT Event_ID FROM events WHERE Event_ID = '{$eventid}'";
				$querycheck = mysqli_query($dbc, $sqlcheck);
				if ($querycheck) {
					$rowcheck = mysqli_fetch_row($querycheck);
					$dbEventID = $rowcheck[0];
				}
				if ($dbEventID == $eventid) {
					$_SESSION['eventid'] = $eventid;
					header('Location: UpdateEvent.php');
				} else {
					echo '<br />That Event ID Does Not Exist.';
				}
			}
		}
	} else {
		header('Location: index.php');
		die();
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Home Page</title>
    </head>
    <body>
		<br>
		<img src = "Dog (2).jpg" height="200" width="400">
		<h1>Administrative Controls: University Events</h1>
		<p><?php echo "Current Events: " . $numEve; ?></p>
		<a href="events.php">View All Events</a>
		<br>
		<br>
		<a href="AddEvent.php">Add Event</a>
		<br>
		<br>
		<a href="DeleteTrans.php">Delete Event</a>
		<br>
		<br>
		<a href="EventQueries.php">Available Queries</a>
		<br>
		<br>		
		<p>Input the Event ID Below to Update It
	    <form method="post" action="admin.php">
            <input type="text" placeholder="Event ID" name="eventid" /> &nbsp;
            <br><input type="submit" name="submit" value="Update Event" />
        </form></p>
		<br>
		<br>
		<h2>Other Administrative Controls</h2>
		<a href="Students.php">Student Information</a>
		<br>
		<br>
		<a href="Faculty.php">Faculty Information</a>
    </body>
</html>