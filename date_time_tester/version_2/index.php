<?php // This open the php code section

if (!isset($_GET['message'])) {
    session_start();
    $message = false;
} else {
    // Decode the message for display
    $message = htmlspecialchars(urldecode($_GET['message']));
}
require_once "assets/common.php";
?>
<!DOCTYPE html>

<html>

<head>

<title> Version 1</title>
<link rel='stylesheet' type='text/css' href='assets/styles.css' />

</head>

<body>

<div class='container'>


<?Php
require_once "assets/nav.php";
?>

<div class='content'>
<br>

<h2> Doctors Surgery - Date Time tester website.</h2>

<p class='content'> Boiler plate text about the doctors surgery </p>

<p class='content'> You have to be registered to login and book </p>

<br>
<?php
if (!$message){
    echo usermessage();
} else {
    echo $message;
}
?>

</div>

</div>

</body>

</html>