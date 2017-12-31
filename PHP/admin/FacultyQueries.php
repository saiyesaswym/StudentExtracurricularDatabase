<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (!isset($_SESSION['password'])) {
		header('Location: index.php');
		die();
	} else {
		echo "<a href='Faculty.php'>Return To Previous</a><br />";		
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Faculty Queries</title>
    </head>
    <body>
		<br>
		<br>
		<b> Currently Available Faculty Queries</b>
		<br>
		<br>
		<a href="AdvisorEvents.php">All Events Attended by Advisor's Students
    </body>
</html>
	