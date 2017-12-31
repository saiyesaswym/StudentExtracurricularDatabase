<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	
	if(isset($_SESSION['password'])) {
		$username = $_SESSION['username'];
		$userId = $_SESSION['password'];
		$userDeptId = $_SESSION['DeptID'];
		$userDeptName = $_SESSION['DeptName'];
		echo "Current User: {$username}";
		echo "<br /> ID Number: {$userId}";
		echo "<br /> Department: {$userDeptName}";
	} else {
		header('Location: index.php');
		die();
	}
	
?>

<!DOCTYPE html>
<html>
    <head>
        <title>University Faculty Page</title>
    </head>
    <body>
		<br>
		<br>
		<a href="Advisees.php">Advisees</a>
		<br>
		<br>
		<a href="AdviseesEvents.php">Advisees Events</a>
		<br>
		<br>
		<a href="AddEvent.php">Add Event</a>
		<br>
		<br>
		<a href="logout.php">Logout</a>
    </body>
</html>