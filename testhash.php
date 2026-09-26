<?php
$pass = isset($_GET['pass']) ? $_GET['pass'] : "RandomSecurePassword";
echo(md5($pass));