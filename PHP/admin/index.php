<?php
    error_reporting(E_ALL & ~E_NOTICE);
	session_start();

    if (isset($_POST['submit'])) {
        $username = strip_tags($_POST['username']);
        $password = strip_tags($_POST['password']);
        
        if ($username == 'RobertLankford' && $password == 'abcd1234') {
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
            header('Location: CountEvents.php');
        } else {
            echo "Incorrect Password";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Administrator Login System</title>
    </head>
    <body>
		<br>
		<img src = "Dog (2).jpg" height="200" width="400">	
        <h1>Administrator Login System</h1>
        <form method="post" action="index.php">
            <input type="text" placeholder="Username" name="username" /><br />
            <input type="password" placeholder="Password" name="password" /><br />
            <input type="submit" name="submit" value="Login" />
        
        </form>
    </body>

</html>