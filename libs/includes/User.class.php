<?php
class User
{
    private $conn;

    public static function signup($user, $pass, $email, $phone)
    {
        $options = [
            'cost' => 12,
        ];

        $hashedPass = password_hash($pass, PASSWORD_BCRYPT, $options);
        $conn = Database::getDatabaseConnection();

        $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
                VALUES (?, ?, ?, ?, 0, 1)";

        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            return $conn->error;
        }

        $stmt->bind_param('ssss', $user, $hashedPass, $email, $phone);
        $error = false;

        if ($stmt->execute() === TRUE) {
            $error = false;
        } else {
            if ($conn->errno === 1062) {
                $error = "That username or email is already taken. Please choose a different one.";
            } else {
                $error = $conn->error;
            }
        }

        $stmt->close();
        return $error;
    }

    public static function login($user, $pass)
    {
        $conn = Database::getDatabaseConnection();
        $sql = "SELECT * FROM `auth` WHERE `username` = ? LIMIT 1";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            return false;
        }

        $stmt->bind_param('s', $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                $stmt->close();
                return $row;
            }
        }

        $stmt->close();
        return false;
    }

    public function __construct($username)
    {
        $this->conn = Database::getDatabaseConnection();
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
