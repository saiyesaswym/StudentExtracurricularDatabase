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
	
    if (isset($_POST['submit'])) {
		include_once("../connection.php");
		$eventNum = strip_tags($_POST['eventID']);
        
		$sqlcheck = "SELECT events.Event_ID FROM events WHERE events.Event_ID = '$eventNum'";
		$querycheck = mysqli_query($dbc, $sqlcheck);
		if ($querycheck) {
			$rowcheck = mysqli_fetch_row($querycheck);
			$dbEventID = $rowcheck[0];
		}
		if ($eventNum == $dbEventID) {
			$_SESSION['eventID'] = $dbEventID;
			header('Location: AdvisorEventsAttended.php');
		} else {
			echo " <br /> <br /> That Event ID Does Not Exist";
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Advisee Event Lookup</title>
    </head>
    <body>
        <h3>Advisee Event Lookup</h3>
        <form method="post" action="AdviseesEvents.php">
            <input type="text" placeholder="Event ID Number" name="eventID" /><br />
            <input type="submit" name="submit" value="Search" />
        
        </form>	
		<div style="position: absolute; bottom: 10px"> <a href="faculty.php">Back</a> </div>
    </body>

</html>