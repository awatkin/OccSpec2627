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

function login($conn, $email){
    $sql = "SELECT patientid, password FROM patient WHERE email = ?"; //set up the sql statement
    $stmt = $conn->prepare($sql); //prepares
    $stmt->bindParam(1,$email);  //binds the parameters to execute
    $stmt->execute(); //run the sql code
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results
    $conn = null;  // nulls off the connection so cant be abused.

    if($result){  // if there is a result returned
        return $result;

    } else {
        return false;
    }

}

function pro_getter($conn){
    // function to get all the staff suitable for an appointment

    $sql = "SELECT * FROM professional";
    //get all admin from datbase where role NOT equal to "adm" - this is admin role, none bookable
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}

function make_booking($conn){
    $dt = new DateTime($_POST['appt-time']);
    $mysql_datetime = $dt->format('Y-m-d H:i:s');

    $bookedon = "";
    $notes = "";

    $sql = "INSERT INTO appointment (datetime, bookedon, notes, proid, patientid) VALUES (?, ?, ?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $mysql_datetime);  //bind parameters for security
    // Hash the password
    $stmt->bindParam(2, $bookedon);
    $stmt->bindParam(3, $notes);
    $stmt->bindParam(4, $_POST['professional']);



    $stmt->execute();  //run the query to insert
    $conn = null;  // closes the connection so cant be abused.
    return true; // Registration successful

}