<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	
	if (isset($_SESSION['password'])) {
		
		echo "<a href='admin.php'>Return To Previous</a><br />";
		
		include_once("../connection.php");
		$execute = mysqli_query($dbc,"CALL num_faculty(@out)");
		$sql = "SELECT @out;";
		
		if (mysqli_multi_query($dbc,$sql)) {
			if ($result = mysqli_store_result($dbc)) {
				$row = mysqli_fetch_row($result);
				$_SESSION['numFaculty'] = $row[0];
			}
		}
		mysqli_close($dbc);
	} else {
		header('Location: admin.php');
		die();
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Faculty Information</title>
    </head>
    <body>
		<br>
		<img src = "Dog (2).jpg" height="200" width="400">
		<br>
		<?php if(isset($_SESSION['numFaculty'])) {
		echo "<br />Current Faculty: " . $_SESSION['numFaculty'];
		}?>
		<br>
		<br>
		<b> Currently Available Faculty Information </b>
		<br>
		<br>
		<a href="FacultyQueries.php">Available Queries</a>
		<br>
		<br>
		<a href="FacultyNames.php">Faculty Names and Logins</a>
    </body>
</html>