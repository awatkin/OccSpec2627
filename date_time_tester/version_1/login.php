<?php // This open the php code section

session_start();

require_once "assets/common.php";
require_once "assets/dbconnect.php";

if (isset($_SESSION['userid'])) {
    $_SESSION['usermessage'] = "ERROR: You have already logged in!";
    header("Location: index.php");
    exit;
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $usr = login(dbconn(), $_POST["email"]);

        if ($usr && password_verify($_POST["password"], $usr["password"])) { // verifies the password is matched
            $_SESSION["userid"] = $usr["patientid"];
            $_SESSION['usermessage'] = "SUCCESS: User Successfully Logged In ";
            header("location:index.php");  //redirect on success
            exit;
        } elseif (!$usr) {
            $_SESSION['usermessage'] = "ERROR: User not found";
            header("Location: login.php");
            exit; // Stop further execution
        } else {
            $_SESSION['usermessage'] = "ERROR: User login passwords not match";
            header("Location: login.php");
            exit; // Stop further execution

        }
    } catch (PDOException $e) {
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        header("Location: login.php");
        exit;
    } catch (Exception $e) {
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        header("Location: login.php");
        exit;
    }
    }
?>

<!DOCTYPE html>

<html>

<head>

<title>Version 1</title>
<link rel='stylesheet' type='text/css' href='assets/styles.css' />

</head>

<body>

<div class='container'>

<?php
require_once "assets/nav.php";
?>

<div class='content'>
<br>

<h2> Primary Oaks - User Login System</h2>

<p class='content'> Please Enter the needed credentials below! </p>

<?php
    echo usermessage();
?>

<form action='' method='post'>
<br>

<input type='email' name='email' placeholder='E-mail Address' required/>
<br>

<input type='password' name='password' placeholder='Password' required/>
<br>

<input type='submit' name='submit' value='Login' />

</form>

<br>

</div>

</div>

</body>

</html>
