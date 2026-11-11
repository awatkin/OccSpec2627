<?php // This open the php code section

session_start();

require_once "assets/common.php";

if (!isset($_SESSION['userid'])) {
    $_SESSION['usermessage'] = "ERROR: You are not logged in!";
    header("Location: login.php");
    exit;
}

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

        <p class='content'> Book your appointment below </p>


        <br>
        <?php
            echo usermessage();

        ?>

    </div>

</div>

</body>

</html>