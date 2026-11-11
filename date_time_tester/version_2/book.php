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

        $tmp = $_POST["appt_date"] . ' ' . $_POST["appt_time"];
        $epoch_time = strtotime($tmp);
        if(commit_booking(dbconnect_insert(),$epoch_time)){
            $_SESSION['usermessage'] = "SUCCESS: YOUR Booking has been made!";
            header("Location: bookings.php");
            exit;
        } else {
            $_SESSION['usermessage'] = "ERROR: Booking has failed!";
        }

    }
    catch (PDOException $e){
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
    } catch(Exception $e){
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>

<html>

<head>

<title> Version 1</title>
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
        id="apt-time"
        name="apt-time"
 />

<br>
<select name='admin'>

    <?php

$staff = staf_geter(dbconn());

foreach ($staff as $staf){

    if ($staf['role'] = "doc"){
        $role = "Doctor";
    } else if ($staf['role'] = "nur"){
        $role = "Nurse";
    }
    echo "<option value =".$staf['staffid']. ">" .$role." ".$staf['sname']." ".
        $staf['fname']." Room ".$staf['room']."</option>";
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
