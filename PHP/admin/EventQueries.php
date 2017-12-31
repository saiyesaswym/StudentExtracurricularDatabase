<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (!isset($_SESSION['password'])) {
		header('Location: index.php');
		die();
	} else {
		echo "<a href='admin.php'>Return To Previous</a><br />";		
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Event Queries</title>
    </head>
    <body>
		<br>
		<br>
		<b> Currently Available Event Queries</b>
		<br>
		<br>
		<a href="CategoryEvents.php">All Events for a Particular Category</a>
		<br>
		<br>
		<a href="DepartmentEvents.php">All Events Sponsored by a Particular Department</a>		
    </body>
</html>
	