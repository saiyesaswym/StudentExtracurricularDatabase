<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['password'])) {
		echo "<a href='Students.php'>Return To Previous</a><br />";
		// Get a connection for the database
		require_once('../connection.php');

		// Create a query for the database
		$query = "SELECT * FROM studentlogin_view";
		
		// Get a response from the database by sending the connection and the query
		$response = @mysqli_query($dbc, $query);
		
		// If the query executed properly proceed
		if($response){
			echo '<br /><br><table align="left"
			cellspacing="2" cellpadding="4">
			<tr><td align="left"><b>University ID</b></td>
			<td align="left"><b>First Name</b></td>
			<td align="left"><b>Last Name</b></td>
			<td align="left"><b>Username</b></td>			
			<td align="left"><b>Password</b></td></tr>';

			// mysqli_fetch_array will return a row of data from the query
			// until no further data is available
			while($row = mysqli_fetch_array($response)){
			 
				echo '<tr><td align="left">' .
				$row['Univ_ID'] . '</td><td align="left">' .
				$row['First_Name'] . '</td><td align="left">' .
				$row['Last_Name'] . '</td><td align="left">' .
				$row['Email'] . '</td><td align="left">' .
				$row['Univ_ID'] . '</td><td align="left">';
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