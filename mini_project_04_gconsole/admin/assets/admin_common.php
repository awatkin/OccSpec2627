<?php

function user_message() {
    $msg = "";

    if (isset($_SESSION['usermessage'])) {
        $msg = "USER MESSAGE: " . $_SESSION['usermessage'];
        $_SESSION['usermessage'] = "";
        unset($_SESSION['usermessage']);
    }

    return $msg;
}

function maker_insert($conn) {
    $sql = "INSERT INTO maker (maker, location, date_added) VALUES (?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql

    $currentDate = date('Y-m-d');

    $stmt->bindParam(1, $_POST['maker']);  //bind parameters for security
    // Hash the password
    $stmt->bindParam(2, $_POST['location']);
    $stmt->bindParam(3, $currentDate);

    $stmt->execute();  //run the query to insert
    $conn = null;  // closes the connection so cant be abused.
    return true; // Registration successful
}

function maker_getter($conn) {
    $sql = "SELECT makerid, maker FROM maker";
    //get all makers from the database
    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}

function console_insert($conn){
    $sql = "INSERT INTO console (name, bit, eu_release, us_release, asia_relase, makerid, date_added) VALUES (?, ?, ?, ?, ?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql

    $currentDate = date('Y-m-d');

    $stmt->bindParam(1, $_POST['console']);  //bind parameters for security
    $stmt->bindParam(2, $_POST['bit']);
    $stmt->bindParam(3, $_POST['eu_release']);
    $stmt->bindParam(4, $_POST['us_release']);
    $stmt->bindParam(5, $_POST['asia_release']);
    $stmt->bindParam(6, $_POST['maker']);

    $stmt->bindParam(7, $currentDate);

    $stmt->execute();  //run the query to insert
    $conn = null;  // closes the connection so cant be abused.
    return true; // Registration successful
}

function dev_insert($conn){
    $sql = "INSERT INTO dev (name, location, date_added) VALUES (?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql

    $currentDate = date('Y-m-d');

    $stmt->bindParam(1, $_POST['name']);  //bind parameters for security
    // Hash the password
    $stmt->bindParam(2, $_POST['location']);
    $stmt->bindParam(3, $currentDate);

    $stmt->execute();  //run the query to insert
    $conn = null;  // closes the connection so cant be abused.
    return true; // Registration successful
}

function pub_insert($conn){
    $sql = "INSERT INTO pub (name, location, date_added) VALUES (?, ?, ?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql

    $currentDate = date('Y-m-d');

    $stmt->bindParam(1, $_POST['name']);  //bind parameters for security

    $stmt->bindParam(2, $_POST['location']);
    $stmt->bindParam(3, $currentDate);

    $stmt->execute();  //run the query to insert
    $conn = null;  // closes the connection so cant be abused.
    return true; // Registration successful
}

function game_insert(){

}

function playson_insert(){

}

