<?php

include_once 'includes/Mic.class.php';
include_once 'includes/Session.class.php';
include_once 'includes/User.class.php';
include_once 'includes/Database.class.php';

Session::start();

function load_template($name){
    include $_SERVER['DOCUMENT_ROOT']."/htdocs/app/__templates/$name.php";
}

function validate_credentials($username, $password) {
    if($username == "jeromcibi@gmail.com" and $password == "password"){
        return true;
    } else {
        return false;
    }
}

function signup($user, $pass, $email, $phone)
{
    mysqli_report(MYSQLI_REPORT_OFF); // Disable auto-exceptions so we can handle errors manually

$conn = Database::getDatabaseConnection();

    $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
            VALUES ('$user', '$pass', '$email', '$phone', '0', '1')";

    $error = false;
    if ($conn->query($sql) === TRUE) {
        $error = false;
    } else {
        // MySQL error 1062 = Duplicate entry (unique constraint violated)
        if ($conn->errno === 1062) {
            $error = "That username or email is already taken. Please choose a different one.";
        } else {
            $error = $conn->error;
        }
    }

    $conn->close();
    return $error;
}
