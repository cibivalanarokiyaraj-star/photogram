<?php
include 'libs/load.php';

$user = "hello";
$pass = "helloworld";
$result = null;

if (isset($_GET['logout'])) {
    Session::destroy();
    die("Logged out successfully. <a href='logintest.php'>Login again</a>");
}

if (Session::get('is_loggedin')) {
    $userdata = Session::get('session_user');
    printf("Welcome back, $userdata[username]!");
    $result = $userdata;
} else {
    printf("You are not logged in.");
    $result = User::login($user, $pass);
    if ($result) {
        echo "Login successful!, $result[username]";
        Session::set('is_loggedin', true);
        Session::set('session_user', $result);
    } else {
        echo "Login failed!";
    }
}

echo <<<EOL
<a href="logintest.php?logout=true">Logout</a>
EOL;