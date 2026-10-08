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
