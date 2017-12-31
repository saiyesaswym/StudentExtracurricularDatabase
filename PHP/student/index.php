<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();

    if (isset($_POST['submit'])) {
        include_once("../connection.php");
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        
        $sql = "SELECT persons.Email, students.Univ_ID, majors.Major_Name FROM students INNER JOIN persons ON students.Univ_ID = persons.Univ_ID INNER JOIN majors ON students.Major_Code = majors.Major_ID WHERE persons.Email = '$username' AND students.Univ_ID = '$password'";
        
        $query = mysqli_query($dbc, $sql); 
         if ($query) {
            $row = mysqli_fetch_row($query); 
            $dbUsername = $row[0];
            $dbPassword = $row[1];
           	$dbMajor = $row[2];
         }
        if ($username == $dbUsername && $password == $dbPassword) {
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['major'] = $dbMajor;
            header('Location: students.php');
        } else {
            echo "Incorrect Password";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>University Student Login System</title>
    </head>
    <body>
        <h1>University Student Login System</h1>
        <form method="post" action="index.php">
            <input type="text" placeholder="Username" name="username" /><br />
            <input type="password" placeholder="Password" name="password" /><br />
            <input type="submit" name="submit" value="Login" />
        
        </form>
		<p>Username: University Email Address <br> Password: University ID Number</p>
    </body>

</html>