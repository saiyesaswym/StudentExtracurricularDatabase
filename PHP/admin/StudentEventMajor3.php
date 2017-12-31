<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['eventid3']) && isset($_SESSION['majorid'])) {
		echo "<a href='StudentEventMajor.php'>Return To Start</a><br />";
		$eventid = $_SESSION['eventid3'];
		$majorid = $_SESSION['majorid'];
		// Get a connection for the database
		require_once('../connection.php');

		// Create a query for the database
		$query = "SELECT persons.Univ_ID, persons.First_Name, persons.Last_Name FROM students INNER JOIN persons ON students.Univ_ID = persons.Univ_ID INNER JOIN majors ON students.Major_Code = majors.Major_ID INNER JOIN student_event ON students.Univ_ID = student_event.Univ_ID WHERE	students.Major_Code = '{$majorid}' AND student_event.Event_ID = '{$eventid}' ORDER BY	persons.Last_Name";
		
		// Get a response from the database by sending the connection and the query
		$response = @mysqli_query($dbc, $query);
		
		// If the query executed properly proceed
		if($response){
			echo '<br /> The Students Who Registered (If Any) Are:';
			echo '<br /><br><table align="left"
			cellspacing="2" cellpadding="4">
			<tr><td align="left"><b>University ID</b></td>
			<td align="left"><b>First Name</b></td>
			<td align="left"><b>Last Name</b></td></tr>';

			// mysqli_fetch_array will return a row of data from the query
			// until no further data is available
			while($row = mysqli_fetch_array($response)){
			 
				echo '<tr><td align="left">' .
				$row['Univ_ID'] . '</td><td align="left">' .
				$row['First_Name'] . '</td><td align="left">' .
				$row['Last_Name'] . '</td><td align="left">';
				echo '</tr>';
			}
			 
			echo '</table>';
			 
		} else {
			echo "Couldn't issue database query<br />";
			 
			echo mysqli_error($dbc);
		}
		 
		// Close connection to the database
		mysqli_close($dbc);
	}
?>