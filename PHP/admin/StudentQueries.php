<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (!isset($_SESSION['password'])) {
		header('Location: index.php');
		die();
	} else {
		echo "<a href='Students.php'>Return To Previous</a><br />";		
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Queries</title>
    </head>
    <body>
		<br>
		<br>
		<b> Currently Available Student Queries</b>
		<br>
		<br>
		<a href="StudentEvent.php">All Students Who Attended a Certain Event</a>
		<br>
		<br>
		<a href="StudentEventMajor.php">All Students in a Certain Major Who Attended a Certain Event</a>
		<br>
		<br>
		<a href="StudentEventDate.php">All Activities Attended by a Certain Student</a>
		<br>
		<br>
		<a href="StudentEventCategory.php">All Students Who Attended a Certain Category of Events</a>
    </body>
</html>
	