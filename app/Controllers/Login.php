<?php

// required files
require_once APP_DIR . "Config/Database.php";
require_once APP_DIR . "Models/User.php";


// create objects
$db_object = new Database();
$user_object = new User($db_object);


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["login"])){
        
        if ($user_object->login($_POST)){

            $_SESSION["message"] = "Login was successful";
            header ("location: " . BASE_URL . "templates");
            exit;
        }else{
            $_SESSION["message"] = "Incorrect email or password";
        }
    }
}




// load views
require_once APP_DIR . "Views/header1.php";
require_once APP_DIR . "Views/includes/alerts.php";
require_once APP_DIR . "Views/pages/login1.php";
require_once APP_DIR . "Views/footer1.php";
