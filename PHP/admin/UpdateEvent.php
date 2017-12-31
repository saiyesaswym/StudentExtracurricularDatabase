<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	if(isset($_SESSION['eventid'])) {
		$eventid = $_SESSION['eventid'];
	}
	
	echo "<a href='CountEvents.php'>Return to Previous</a><br /><br />";	
	
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Updating Event</title>
    </head>
    <body>
		<b>Updating Event: <?php echo ' ' . $eventid; ?></b>
		<br>
		<br>
		<a href="UpdateEventName.php">Update Name</a>
		<br>
		<br>
		<a href="UpdateEventDesc.php">Update Description</a>
		<br>
		<br>
		<a href="UpdateEventLoc.php">Update Location</a>
		<br>
		<br>
		<a href="UpdateEventSD.php">Update Start Date</a>
		<br>
		<br>
		<a href="UpdateEventST.php">Update Start Time</a>
		<br>
		<br>
		<a href="UpdateEventED.php">Update End Date</a>
		<br>
		<br>
		<a href="UpdateEventET.php">Update End Time</a>
		<br>
		<br>
		<a href="UpdateEventCat.php">Update Category ID</a>
		<br>
		<br>
		<a href="UpdateEventDept.php">Update Department ID</a>	
    </body>
</html>