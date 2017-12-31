<?php
    error_reporting(E_ALL & ~E_NOTICE);  
	session_start();
	
	if (isset($_SESSION['password'])) {
		
		echo "<a href='EventQueries.php'>Return To Previous</a><br />";
		
		if (isset($_POST['submit'])) {
			$deptid = strip_tags($_POST['deptid']);
			if (empty($deptid)) {
				echo '<br />Please Enter a Department ID<br />';
			} else {
				
				//open connection_aborted
				include_once("../connection.php");
				
				//check whether this department id exists
				$sqlcheck = "SELECT Dept_ID FROM departments WHERE Dept_ID = '{$deptid}'";
				$querycheck = mysqli_query($dbc, $sqlcheck);
				if ($querycheck) {
					$rowcheck = mysqli_fetch_row($querycheck);
					$dbDeptID = $rowcheck[0];
				}
				if ($dbDeptID == $deptid) {
					$_SESSION['deptid2'] = $deptid;
					header('Location: DepartmentEvents2.php');					
				} else {
					echo '<br />That Department ID Does Not Exist.<br />';
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Event Query</title>
    </head>
    <body>
		<br>
		<b>Input the Department ID Below:</b>
		<br>
		<br>
	    <form method="post" action="DepartmentEvents.php">
            <input type="text" placeholder="Department ID" name="deptid" /> &nbsp;
            <br><input type="submit" name="submit" value="Submit" />
        </form>
		<br>	
		<a href='Departments2.php'>Click for Department ID's</a>		
    </body>
</html>