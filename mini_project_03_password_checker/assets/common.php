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

function string_length($mystring){  //Check the length of a string
    $answer = false;

    $length = strlen($mystring);

    if($length > 8){
        $answer = true;
    }
    return $answer;
}