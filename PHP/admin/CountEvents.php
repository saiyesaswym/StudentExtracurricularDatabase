<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	
	include_once("../connection.php");
	$execute = mysqli_query($dbc,"CALL num_events(@out)");
	$sql = "SELECT @out;";
	
	if (mysqli_multi_query($dbc,$sql)) {
		if ($result = mysqli_store_result($dbc)) {
			$row = mysqli_fetch_row($result);
			$_SESSION['numEvents'] = $row[0];
		}
	}
	mysqli_close($dbc);
	//echo "Testing " . $_SESSION['numEvents'];
	header('Location: admin.php');