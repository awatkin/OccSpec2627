<?php
session_start();

require_once('assets/common.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION["usermessage"] = $_POST["message"];

}

?>


<!DOCTYPE html>

<html>

    <head>
        <title> SESSION WORK PAGE </title>


    </head>

    <body>

    <?php
        echo user_message();
    ?>

    <form action="" method="post">

        <input type="text" name="message" required />
        <input type="submit" />


    </form>

    </body>

</html>