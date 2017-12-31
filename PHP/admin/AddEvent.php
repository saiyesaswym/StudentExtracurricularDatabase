<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();
	
	echo "<a href='CountEvents.php'>Return to Previous</a>";
	
	if(isset($_POST['submit'])){
     
	$data_missing = array();
     
    if(empty($_POST['eventName'])){
        // Adds name to array
        $data_missing[] = 'Event Name';
    } else {
        // Trim white space from the name and store the name
        $e_name = strip_tags(trim($_POST['eventName']));
    }
	if(empty($_POST['eventDesc'])){
        // Adds name to array
        $data_missing[] = 'Event Description';
    } else {
        // Trim white space from the name and store the name
        $e_desc = strip_tags(trim($_POST['eventDesc']));
    }
	if(empty($_POST['eventLoc'])){
        // Adds name to array
        $data_missing[] = 'Event Location';
    } else {
        // Trim white space from the name and store the name
        $e_loc = strip_tags(trim($_POST['eventLoc']));
    }
	if(empty($_POST['eventSD'])){
        // Adds name to array
        $data_missing[] = 'Event Start Date';
    } else {
        // Trim white space from the name and store the name
        $e_SD = strip_tags(trim($_POST['eventSD']));
    }
	if(empty($_POST['eventST'])){
        // Adds name to array
        $data_missing[] = 'Event Start Time';
    } else {
        // Trim white space from the name and store the name
        $e_ST = strip_tags(trim($_POST['eventST']));
    }
	if(empty($_POST['eventCat'])){
        // Adds name to array
        $data_missing[] = 'Event Category ID';
    } else {
        // Trim white space from the name and store the name
        $e_Cat = strip_tags(trim($_POST['eventCat']));
    }
	if(empty($_POST['eventDept'])){
        // Adds name to array
        $data_missing[] = 'Event Department ID';
    } else {
        // Trim white space from the name and store the name
        $e_Dept = strip_tags(trim($_POST['eventDept']));
    }
	
	// End Time and End Date Can be Null
	if(empty($_POST['eventED'])){
        // Do Nothing, Because Can Be Null
    } else {
        // Trim white space from the name and store the name
        $e_ED = strip_tags(trim($_POST['eventED']));
    }
	if(empty($_POST['eventET'])){
        // Do Nothing, Because Can Be Null
    } else {
        // Trim white space from the name and store the name
        $e_ET = strip_tags(trim($_POST['eventET']));
    }
	
    if(empty($data_missing)){
		// Get a connection for the database         
		require_once('../connection.php');
         
        $query = "INSERT INTO events (Event_ID, Name, Description, Location, Start_Date, Start_Time, End_Date, End_Time, Category_ID, Dept_ID) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        $stmt = mysqli_prepare($dbc, $query);
		
		mysqli_stmt_bind_param($stmt, "sssssssii" , $e_name, $e_desc, $e_loc, $e_SD, $e_ST, $e_ED, $e_ET, $e_Cat, $e_Dept);
		
		mysqli_stmt_execute($stmt);
         
        $affected_rows = mysqli_stmt_affected_rows($stmt);
         
        if($affected_rows == 1){
             
            echo '<br /><br />Event Entered';
             
            mysqli_stmt_close($stmt);
             
            mysqli_close($dbc);
			
        } else {
             
            echo 'Error Occurred<br />';
            echo mysqli_error();
             
            mysqli_stmt_close($stmt);
             
            mysqli_close($dbc);
             
        }
         
    } else {
         
        echo '<br />You need to enter the following data<br />';
         
        foreach($data_missing as $missing){
             
            echo "$missing<br />";
             
        }
         
    }
     
}
 
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Event</title>
    </head>
		<br>
        <form method="post" action="AddEvent.php">
			<br>
			<b>Add an Event</b>
			
			<p>Event Name:
            <input type="text" placeholder="Event Name" name="eventName" /><br />
			</p>
			<p>Description:
            <input type="text" placeholder="Description" name="eventDesc" /><br />
			</p>
			<p>Location:
            <input type="text" placeholder="Location" name="eventLoc" /><br />
			</p>
			<p>Start Date:
            <input type="text" placeholder="yyyy-mm-dd" name="eventSD" /><br />
			</p>
			<p>Start Time:
            <input type="text" placeholder="hh:mm:ss" name="eventST" /><br />
			</p>
			<p>End Date:
            <input type="text" placeholder="yyyy-mm-dd" name="eventED" /><br />
			</p>
			<p>End Time:
            <input type="text" placeholder="hh:mm:ss" name="eventET" /><br />
			</p>
			<p>Category:
            <input type="text" placeholder="Category ID" name="eventCat" /><br />
			</p>
			<p>Department:
            <input type="text" placeholder="Department ID" name="eventDept" /><br />
			</p>
            <input type="submit" name="submit" value="Add" />
        </form>
		<br>
		<br>
		<a href="EventCategories.php">Click for Category ID's</a>
		<br>
		<br>
		<a href="Departments.php">Click for Department ID's</a>		
    </body>
</html>