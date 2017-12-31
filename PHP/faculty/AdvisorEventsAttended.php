	<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	
	if(isset($_SESSION['password'])) {
		$username = $_SESSION['username'];
		$userId = $_SESSION['password'];
		$userDeptId = $_SESSION['DeptID'];
		$userDeptName = $_SESSION['DeptName'];
		$eventNum = $_SESSION['eventID'];
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
			$query = "SELECT persons.First_Name, persons.Last_Name, persons.Univ_ID, students.Year, events.Name FROM persons INNER JOIN students ON persons.Univ_ID = students.Univ_ID INNER JOIN student_event ON students.Univ_ID = student_event.Univ_ID INNER JOIN events ON student_event.Event_ID = events.Event_ID WHERE events.Event_ID = '$eventNum' AND students.Advisor_ID = '$userId' ORDER BY persons.Last_Name, students.Year, events.Start_Date";
			
			// Get a response from the database by sending the connection and the query
			$response = @mysqli_query($dbc, $query);

			// If the query executed properly proceed
			if($response){
				echo '<table align="left"
				cellspacing="4" cellpadding="2">
				<tr><td align="left"><b>First Name</b></td>
				<td align="left"><b>Last Name</b></td>
				<td align="left"><b>University ID</b></td>
				<td align="left"><b>Event Name</b></td></tr>';
				
				// mysqli_fetch_array will return a row of data from the query until no further data is available
				
				echo '<br /> <br />';
				echo 'Your Advisees Attended:';
				echo '<br /> Note: If No Results, Your Advisees Did Not Attend That Event';
				echo '<br /> <br />';
				while($row = mysqli_fetch_array($response)){
					echo '<tr><td align="left">' .
					$row['First_Name'] . '</td><td align="left">' .
					$row['Last_Name'] . '</td><td align="left">' .
					$row['Univ_ID'] . '</td><td align="left">' .
					$row['Name'] . '</td><td align="left">';
					echo '</tr>';
				}
				echo '</table>';
			} else {
				echo "<br /> <br /> Your Advisees Have Not Attended That Event <br />";echo mysqli_error($dbc);
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
		<div style="position: absolute; bottom: 10px"> <a href="AdviseesEvents.php">Back</a> </div>
    </body>
</html>