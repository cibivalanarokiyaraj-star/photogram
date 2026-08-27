<?php

function load_template($name){
    include $_SERVER['DOCUMENT_ROOT']."/htdocs/app/__templates/$name.php";
}

function validate_credentials($username, $password) {
    if($username == "jeromcibivalan@gmail.com" and $password == "password"){
        return true;
    } else {
        return false;
    }
}

function signup($user, $pass, $email, $phone)
{
    $db_server = "127.0.0.1";
    $db_user   = "root";
    $db_pass   = "Admin1234";
    $db_name   = "mynewdb";

    // Create connection
    $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

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
