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
    