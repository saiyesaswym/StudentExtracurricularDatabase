<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	
// Get a connection for the database
require_once('../connection.php');

// Create a query for the database
$query = "SELECT * FROM	events_view ORDER BY events_view.Start_Date, events_view.Start_Time, events_view.Name";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){
echo "<a href='CountEvents.php'>Return to Previous</a>";

echo '<br /><br><table align="left"
cellspacing="2" cellpadding="4">
<tr><td align="left"><b>Event ID</b></td>
<td align="left"><b>Name</b></td>
<td align="left"><b>Description</b></td>
<td align="left"><b>Location</b></td>
<td align="left"><b>Start Date</b></td>
<td align="left"><b>Start Time</b></td>
<td align="left"><b>End Date</b></td>
<td align="left"><b>End Time</b></td>
<td align="left"><b>Department Sponsor</b></td>
<td align="left"><b>Category</b></td></tr>';

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="left">' .
$row['Event_ID'] . '</td><td align="left">' .
$row['Name'] . '</td><td align="left">' .
wordwrap($row['D1'], 50, "<br />\n") . '</td><td align="left">' .
$row['Location'] . '</td><td align="left">' .
$row['Start_Date'] . '</td><td align="left">' .
$row['Start_Time'] . '</td><td align="left">' .
$row['End_Date'] . '</td><td align="left">' .
$row['End_Time'] . '</td><td align="left">' .
$row['Dept_Name'] . '</td><td align="left">' .
$row['D2'] . '</td><td align="left">';

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

<!DOCTYPE html>
<html>
    <head>
        <title>View All Events</title>
    </head>
</html>