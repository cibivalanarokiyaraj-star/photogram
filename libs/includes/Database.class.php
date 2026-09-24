<?php

class Database
{
    public static $conn = null;

    public static function getDatabaseConnection()
    {
        if(Database::$conn == null)
            {
    $db_server = "127.0.0.1";
    $db_user   = "root";
    $db_pass   = "Admin1234";
    $db_name   = "mynewdb";

    // Create connection
    $connection = new mysqli($db_server, $db_user, $db_pass, $db_name);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error); //TO DO : Replace this with exception handling in future
    } else {
        printf("Database connection established successfully\n");
        Database::$conn = $connection;
        return Database::$conn;
    }
            } else {
                printf("Using existing database connection...\n");
                return Database::$conn;
            }
    }
}