<?php // This open the php code section

session_start();
require_once "assets/common.php";
require_once "assets/dbconnect.php";

if (!isset($_SESSION['userid'])) {
    $_SESSION['usermessage'] = "ERROR: You are not logged in!";
    header("Location: login.php");
    exit;
} elseif($_SERVER["REQUEST_METHOD"] == "POST"){

    try {

        if(make_booking(dbconn())){
            $_SESSION['usermessage'] = "SUCCESS: YOUR Booking has been made!";
            header("Location: bookings.php");
            exit;
        } else {
            $_SESSION['usermessage'] = "ERROR: Booking has failed!";
            header("Location: book.php");
            exit;
        }

    }
    catch (PDOException $e){
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        header("Location: book.php");
        exit;
    } catch(Exception $e){
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        header("Location: book.php");
        exit;
    }
}
?>


<!DOCTYPE html>

<html>

<head>

<title> Version 2</title>
<link rel='stylesheet' type='text/css' href='../version_1/assets/styles.css' />

</head>

<body>

<div class='container'>

<?php
require_once "assets/nav.php";
?>

<div class='content'>
<br>

<h2> Doctor Surgery - Appointment Booking System</h2>
<br>
    <?php
    echo usermessage();
    ?>
<br>

<form action='' method='post'>


    <label for="appt-time">Choose a time for your appointment:</label>

    <input
        type="datetime-local"
        id="appt-time"
        name="appt-time"
 />

<br>
<select name='professional'>

    <?php

$pro = pro_getter(dbconn());

foreach ($pro as $staf){

    echo "<option value =".$staf['proid']. ">" . $staf['role'] . " " . $staf['fname']." ".
        $staf['sname']." - Room ".$staf['roomno']."</option>";
}
?>
</select>

<br>

<input type='submit' name='submit' value='Book Appointment' />

</form>

<br>

</div>

</div>

</body>

</html>
