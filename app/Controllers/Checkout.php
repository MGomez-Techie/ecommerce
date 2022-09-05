<?php

require_once APP_DIR . "Utils/code.precheckout.php";



$cart_details = $cart_object->getCartDetails($user_id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["points_btn"])){ 
        $cart_object->setPointsUsed($_POST["points"]);
    }
}

$cart_object->calculateTotal();

// load views
require_once APP_DIR . "Views/header1.php";
require_once APP_DIR . "Views/includes/alerts.php";
require_once APP_DIR . "Views/pages/checkout.php";
require_once APP_DIR . "Views/footer1.php";
