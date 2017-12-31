<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['univid2'])) {
		echo "<a href='AdvisorEvents.php'>Return To Previous</a><br />";
		$univid = $_SESSION['univid2'];
		// Get a connection for the database
		require_once('../connection.php');

		// Create a query for the database
		$query = "SELECT persons.Univ_ID, persons.First_Name, persons.Last_Name, students.Year, events.Event_ID, events.Name, events.Location, events.Start_Date, events.Start_Time FROM students INNER JOIN persons ON students.Univ_ID = persons.Univ_ID INNER JOIN student_event ON students.Univ_ID = student_event.Univ_ID INNER JOIN events ON student_event.Event_ID = events.Event_ID WHERE	students.Advisor_ID = '{$univid}' ORDER BY students.Year, persons.Last_Name";
		
		// Get a response from the database by sending the connection and the query
		$response = @mysqli_query($dbc, $query);
		
		// If the query executed properly proceed
		if($response){
			echo '<br /> The Students Who Attended Event(s) for this Advisor (If Any) Are:';
			echo '<br /><br><table align="left"
			cellspacing="2" cellpadding="4">
			<tr><td align="left"><b>University ID</b></td>
			<td align="left"><b>First Name</b></td>
			<td align="left"><b>Last Name</b></td>
			<td align="left"><b>Year</b></td>
			<td align="left"><b>Event ID</b></td>
			<td align="left"><b>Name</b></td>
			<td align="left"><b>Location</b></td>
			<td align="left"><b>Start Date</b></td>
			<td align="left"><b>Start Time</b></td></tr>';

			// mysqli_fetch_array will return a row of data from the query
			// until no further data is available
			while($row = mysqli_fetch_array($response)){
			 
				echo '<tr><td align="left">' .
				$row['Univ_ID'] . '</td><td align="left">' .
				$row['First_Name'] . '</td><td align="left">' .
				$row['Last_Name'] . '</td><td align="left">' .
				$row['Year'] . '</td><td align="left">' .
				$row['Event_ID'] . '</td><td align="left">' .	
				$row['Name'] . '</td><td align="left">' .
				$row['Location'] . '</td><td align="left">' .
				$row['Start_Date'] . '</td><td align="left">' .					
				$row['Start_Time'] . '</td><td align="left">';
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