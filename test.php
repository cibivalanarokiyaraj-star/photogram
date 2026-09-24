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
    $result = signup("testuser55", "secretpassword655", "test7@e5x5ample.com", "9864543511");
    if ($result) {
        echo "Signup Failed: " . $result;
    } else {
        echo "Signup Success!";
    }
}

$mic1 = new Mic();
$mic2 = new Mic();

$mic1->brand = "Roda";
$mic2->brand = "Hyper";

$mic1->setLight("RGB");    // use setter — $light is private
$mic2->setLight("White");

echo "\n\nMic 1 Brand: " . $mic1->brand . ", Light: " . $mic1->getLight();
echo "\nMic 2 Brand: " . $mic2->brand . ", Light: " . $mic2->getLight();
$conn = Database::getDatabaseConnection();
$conn = Database::getDatabaseConnection();
?>

