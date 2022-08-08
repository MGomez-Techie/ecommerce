<?php

// required files
require_once APP_DIR . "Config/Database.php";
require_once APP_DIR . "Models/User.php";


// create objects
$db_object = new Database();
$user_object = new User($db_object);


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["registration"])){
        $user_object->register($_POST);
        
    }
}


// load views

require_once APP_DIR . "Views/pages/registration.php";