<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	
// Get a connection for the database
require_once('../connection.php');

// Create a query for the database
$query = "SELECT * FROM studentevents_view";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){
 
echo '<table align="left"
cellspacing="4" cellpadding="2">
<tr><td align="left"><b>Event ID</b></td>
<td align="left"><b>Name</b></td>
<td align="left"><b>Description</b></td>
<td align="left"><b>Location</b></td>
<td align="left"><b>Start Date</b></td>
<td align="left"><b>Start Time</b></td>
<td align="left"><b>Department Sponsor</b></td></tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="left">' .
$row['Event_ID'] . '</td><td align="left">' .
$row['Name'] . '</td><td align="left">' .
$row['Description'] . '</td><td align="left">' .
$row['Location'] . '</td><td align="left">' .
$row['Start_Date'] . '</td><td align="left">' .
$row['Start_Time'] . '</td><td align="left">' .
$row['Dept_Name'] . '</td><td align="left">';

echo '</tr>';
}
 
echo '</table>';
 
} else {
 
echo "Couldn't issue database query<br />";
 
echo mysqli_error($dbc);
 
}
 
// Close connection to the database
mysqli_close($dbc);
 
?>
