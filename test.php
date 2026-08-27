<pre>
<?php
include 'libs/load.php';

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email_address']) && isset($_POST['phone'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email_address'];
    $phone = $_POST['phone'];

    $result = signup($username, $password, $email, $phone);
    if ($result) {
        echo "Signup Failed: " . $result;
    } else {
        echo "Signup Success for user: " . htmlspecialchars($username);
    }
} else {
    echo "Direct test run:\n";
    $result = signup("testuser2", "secretpassword", "test2@example.com", "9876543211");
    if ($result) {
        echo "Signup Failed: " . $result;
    } else {
        echo "Signup Success!";
    }
}
?>
</pre>
