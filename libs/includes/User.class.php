<?php

class User
{
    public static function signup($user, $pass, $email, $phone)
    {
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
}