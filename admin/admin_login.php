<?php require_once('scripts/config.php');
    if(empty($_POST['username']) || empty($_POST['password'])){
        $message = 'Missing Fields';
    }else{
        $username = $_POST['username'];
        $password = $_POST['password'];

        $message = login($username, $password);
    }
?>

<br>
<?php // show the last login time
date_default_timezone_set('America/Toronto'); // setting the timezone 
 
//Calculate 60 days in the future
//seconds * minutes * hours * days + current time
 
$dateTime = 60 * 60 * 24 * 60 + time();
setcookie('lastVisit', date("m/d/y - g:i:s A"), $dateTime); // this adds a cookie so that every time you log in, it writes to the cookie
if(isset($_COOKIE['lastVisit']))
 
{
$visit = $_COOKIE['lastVisit'];
echo "Your last login was on ". $visit; // the text before the date
}
else
echo "You've got some stale cookies!";
?>

<br>

<?php // Welcome messages based off time of day 

// Setting up the messages
$afternoon = "<h1>Good Afternoon!</h1>";
$evening = "<h1>Good Evening!</h1>";
$morning = "<h1>Good Morning!</h1>";
$morning = "<h1>Good Night!</h1>";

// Get the current time 
$time = date('G'); // G means 24-hour format of an hour without leading zeros
date_default_timezone_set('America/Toronto'); // Setting the timezone here again

// Changing the messages - YAY I did it!!!
if ($time >= 6 && $time <= 11) { // Put it in 24hr format
    echo $afternoon;
} else if ($time >= 12 && $time <= 17) {
    echo $morning;
} else if ($time >= 18 && $time <= 22) {
    echo $evening;
} else if ($time >= 23 && $time <= 5) {
    echo $night;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
</head>
<body>

<?php if(!empty($message)):?>
    <p><?php echo $message;?></p>
<?php endif;?>

    <form action="admin_login.php" method="post"> <!-- use post to keep username and pw private-->
    <label for="username">Username:
        <input type="text" name="username" value="" required>
    </label>
    <br>
    <label for="password">Password:
        <input type="password" name="password" value="" required>
    </label>
    <br>
    <br>
    <button type="submit">Submit</button>
</form>

</body>
</html>

<?php
	session_start();
	
	if (isset($_POST["username"]) && isset($_POST["password"]))
	{
		// This checks if the value has ever been set, if not, declares it as zero.
		if (!isset($_SESSION["attempts"]))
			$_SESSION["attempts"] = 0;
			
		if ($_SESSION["attempts"] < 3)
		{
			$username = $_POST["username"];
			$password = $_POST["password"];
			
			if ($username = "test" && $password == "test")
			{
				echo "Hello, you are logged in.";
			}
			else
			{
				echo "Incorrect username or password.  Try again.";
				$_SESSION["attempts"] = $_SESSION["attempts"] + 1;
			}
			
		}
		else
		{
			echo "You've failed to log in too many times.  Try again later.";
		}
	}
?>