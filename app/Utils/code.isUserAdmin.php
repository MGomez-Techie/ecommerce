<?php

if(isset($_SESSION["current_user"]["user_type"])&& $_SESSION["current_user"]["user_type"] == "admin"){
    $user_type = $_SESSION["current_user"]["user_type"];
}else{
    header("location:" . BASE_URL . "login");
}