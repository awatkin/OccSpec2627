<?php // This open the php code section

session_start();

require_once "assets/admin_common.php";
require_once "assets/dbconn.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
        if(pub_insert(dbconnect())) {
            $_SESSION['usermessage'] = "SUCCESS: New Publisher Has been registered!";
            header("Location: game_add.php");
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        header("Location: dev_add.php");
        exit;
    } catch (Exception $e){
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        header("Location: dev_add.php");
    }

}


echo "<!DOCTYPE html>";  # essential html line to dictate the page type

echo "<html>";  # opens the html content of the page

echo "<head>";  # opens the head section

echo "<title> Dev Add</title>";  # sets the title of the page (web browser tab)
//echo "<link rel='stylesheet' type='text/css' href='../css/styles.css' />";  # links to the external style sheet

echo "</head>";  # closes the head section of the page

echo "<body>";  # opens the body for the main content of the page.

echo "<div class='container'>";

//require_once "assets/topbar.php";

//require_once "assets/nav.php";

echo "<div class='content'>";
echo "<br>";

echo "<h2> Dev Add form</h2>";  # sets a h2 heading as a welcome

echo "<p class='content'> Please complete the below form to register for our system </p>";

echo user_message();

echo "<form method='post' action=''>";
echo"<br>";
echo "<input type='text' name='name' placeholder='Pub Name' required/>";
echo"<br>";
echo "<input type='text' name='location' placeholder='Location of Pub' required/>";
echo"<br>";

echo "<input type='submit' name='submit' value='Add Maker' />";
echo"<br>";
echo "</form>";

echo "<br>";



echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>";
?>