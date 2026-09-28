<?php
class User
{
    private $conn;
    public static function signup($user, $pass, $email, $phone)
    {
        $pass = md5(strrev(md5($pass)));
        $conn = Database::getDatabaseConnection();
        $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
                VALUES ('$user', '$pass', '$email', '$phone', '0', '1')";

        $error = false;

        if ($conn->query($sql) === TRUE) {
            $error = false;
        } else {
            if ($conn->errno === 1062) {
                $error = "That username or email is already taken. Please choose a different one.";
            } else {
                $error = $conn->error;
            }
        }

       // $conn->close();
        return $error;
    }

    public static function login($user, $pass)
    {
        $pass = md5(strrev(md5($pass)));
        $query = "SELECT * FROM `auth` WHERE `username` = '$user' AND `password` = '$pass'";
        $conn = Database::getDatabaseConnection();
        $result = $conn->query($query);
        if($result->num_rows ==1) {
            $row = $result->fetch_assoc();
            if($row['password'] == $pass) {
                return $row;
            }
        } else{
        return false;
        }
    }

    public function __construct($username)
    {
        $this->conn = Database::getDatabaseConnection();
       // $this->conn->query();
    }

    public function authenticate()
    {
    }

    public function setBio()
    {
    }

    public function getBio()
    {
    }

    public function setAvatar()
    {
    }
    
    public function getAvatar()
    {
    }

}