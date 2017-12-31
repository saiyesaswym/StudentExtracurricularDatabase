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
	
?>

<!DOCTYPE html>
<html>
    <head>
        <title>University Student Page</title>
    </head>
    <body>
		<br>
		<br>
		<a href="events.php">All Events</a>
		<br>
		<br>
		<a href="RegisteredEvents.php">Your Registered Events</a>
		<br>
		<br>
		<a href="EventRegister.php">Register for an Event</a>
		<br>
		<br>
		<a href="logout.php">Logout</a>
    </body>
</html>