<?php

function usermessage(){  # function to check for a user message and return echoable string
    if(isset($_SESSION['usermessage'])){  # checks to see if it is set

        $msg = $_SESSION['usermessage'];  # formats string appropriately
        unset($_SESSION['usermessage']);  # unsets the user message so it doesn't keep being displayed

    } else {
        $msg = "";  # if no message has been set, returns empty string.
    }
    return $msg;
}


function reg_user($conn){

    // Prepare and execute the SQL query
    $sql = "INSERT INTO patient (email, password, fname, sname, addressln1, addressln2, county, postcode, dob, gender, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $_POST['email']);  //bind parameters for security
    // Hash the password
    $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt->bindParam(2, $pwd);

    $stmt->bindParam(3, $_POST['fname']);
    $stmt->bindParam(4, $_POST['sname']);
    $stmt->bindParam(5, $_POST['addressln1']);
    $stmt->bindParam(6, $_POST['addressln2']);
    $stmt->bindParam(7, $_POST['county']);
    $stmt->bindParam(8, $_POST['postcode']);
    $stmt->bindParam(9, $_POST['dob']);
    $stmt->bindParam(10, $_POST['gender']);
    $stmt->bindParam(11, $_POST['phone']);


    $stmt->execute();  //run the query to insert
    $conn = null;  // closes the connection so cant be abused.
    return true; // Registration successful
}