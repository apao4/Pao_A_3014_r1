<?php 

//To Do: Login Needed
    require_once('scripts/config.php');
    confirm_logged_in();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to your admin panel</title>
</head>
<body>

    <h1>Admin Dashboard</h1>
    <h3>Welcome Back!</h3>
    <p>This is the admin dashboard.</p>

    <nav>
        <ul>
            <li><a href="#">Create User</a></li>
            <li><a href="#">Edit User</a></li>
            <li><a href="#">Delete User</a></li>
            <li><a href="scripts/caller.php?caller_id=logout">Sign Out</a></li>
        </ul>
    </nav>
</body>
</html>


<?php // Welcome messages based off time of day 

// Setting up the messages
$afternoon = "Good Afternoon!";
$evening = "Good Evening!";
$morning = "Good Morning!";
$morning = "Good Night!";

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

