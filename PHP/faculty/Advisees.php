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
	
	// Get a connection for the database
	require_once('../connection.php');
	
	// Create a query for the database
	$query = "SELECT persons.First_Name, persons.Last_Name, persons.Univ_ID FROM persons INNER JOIN students ON persons.Univ_ID = students.Univ_ID WHERE		students.Advisor_ID = '{$userId}' ORDER BY persons.Last_Name;";
	
	// Get a response from the database by sending the connection and the query
	$response = @mysqli_query($dbc, $query);
	
	// If the query executed properly proceed
	if($response){
 
	echo '<table align="left"
	cellspacing="4" cellpadding="2">
	<tr><td align="left"><b>First Name</b></td>
	<td align="left"><b>Last Name</b></td>
	<td align="left"><b>University ID</b></td></tr>';
	
	// mysqli_fetch_array will return a row of data from the query until no further data is available
	echo '<br /> <br />';
	echo 'Your advisees are:';
	echo '<br /> <br />';
	while($row = mysqli_fetch_array($response)){
		echo '<tr><td align="left">' .
		$row['First_Name'] . '</td><td align="left">' .
		$row['Last_Name'] . '</td><td align="left">' .
		$row['Univ_ID'] . '</td><td align="left">';
		echo '</tr>';
	}
	
	echo '</table>';
	} else {
		echo "<br /> <br /> You do not have any advisees <br />";
 
		echo mysqli_error($dbc);
 
	}
	
	// Close connection to the database
	mysqli_close($dbc);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Events Attended Query</title>
    </head>
    <body>
	
		<div style="position: absolute; bottom: 10px"> <a href="faculty.php">Back</a> </div>
    </body>
</html>