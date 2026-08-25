<?php

function load_template($name){
    include $_SERVER['DOCUMENT_ROOT']."/htdocs/app/__templates/$name.php";
}
    