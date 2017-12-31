<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['studentid'])) {
		echo "<a href='StudentEventDate.php'>Return To Previous</a><br />";
		$studentid = $_SESSION['studentid'];
		// Get a connection for the database
		require_once('../connection.php');

		// Create a query for the database
		$query = "SELECT events.Event_ID, events.Name, events.Description, events.Location, events.Start_Date, events.Start_Time FROM		student_event INNER JOIN events ON student_event.Event_ID = events.Event_ID WHERE student_event.Univ_ID = '{$studentid}' ORDER BY events.Start_Date";
		
		// Get a response from the database by sending the connection and the query
		$response = @mysqli_query($dbc, $query);
		
		// If the query executed properly proceed
		if($response){
			echo '<br /> The Events Attended (If Any) Are:';
			echo '<br /><br><table align="left"
			cellspacing="2" cellpadding="4">
			<tr><td align="left"><b>Event ID</b></td>
			<td align="left"><b>Name</b></td>
			<td align="left"><b>Description</b></td>
			<td align="left"><b>Location</b></td>
			<td align="left"><b>Start Date</b></td>	
			<td align="left"><b>Start Time</b></td></tr>';

			// mysqli_fetch_array will return a row of data from the query
			// until no further data is available
			while($row = mysqli_fetch_array($response)){
			 
				echo '<tr><td align="left">' .
				$row['Event_ID'] . '</td><td align="left">' .
				$row['Name'] . '</td><td align="left">' .
				wordwrap($row['Description'], 50, "<br />\n") . '</td><td align="left">' .
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