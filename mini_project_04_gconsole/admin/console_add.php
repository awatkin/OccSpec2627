<?php // This open the php code section

session_start();

require_once "assets/admin_common.php";
require_once "assets/dbconn.php";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try{
        if(console_insert(dbconnect())) {
            $_SESSION['usermessage'] = "SUCCESS: New Maker Has been registered!";
            header("Location: console_add.php");
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        header("Location: maker_add.php");
        exit;
    } catch (Exception $e){
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        header("Location: maker_add.php");
    }

}
?>

<!DOCTYPE html>

<html>

<head>

<title> Console Add</title>

</head>

<body>

<div class='container'>



<div class='content'>
<br>

<h2> Console Add form</h2>

<p class='content'> Please complete the below form to register for our system </p>

<?php
    echo user_message();


    try {
        $makers = maker_getter(dbconnect());
    }  catch(PDOException $e){
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        header("Location: console_add.php");  // sends them to back to book with error message
        exit;  // stops any other code executing
    } catch(Exception $e){
        $_SESSION['usermessage'] = "ERROR: " . $e->getMessage();
        header("Location: console_add.php");  // sends them to back to book with error message
        exit;  // stops any other code executing
    }

?>

    <form method='post' action=''>
    <br>
    <input type='text' name='console' placeholder='Console Name' required/>
    <br>
    <input type='text' name='bit' placeholder='Bit of the console' required/>
    <br>
    EU Release Date
    <input type='date' name='eu_release' value="2026-10-19" required/>
    <br>
    US Release Date
    <input type='date' name='us_release' value="2026-10-19" required/>
    <br>
    asia Release Date
    <input type='date' name='asia_release' value="2026-10-19" required/>
    <br>

<?php
    echo "<select name='maker'>";  // generates a select box of staff with role and room number


    foreach ($makers as $maker){


        echo "<option value =".$maker['makerid']. ">" .$maker['maker']."</option>";
    }

    echo "</select>";
?>
<br>

<input type='submit' name='submit' value='Add Maker' />

<br>

</form>



<br>

</div>

</div>

</body>

</html>
