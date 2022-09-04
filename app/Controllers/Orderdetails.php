<?php

// required files
require_once APP_DIR . "Utils/code.precheckout.php";





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(isset($_POST["checkout"])){
        
        require_once APP_DIR . "Utils/code.isLoggedIn.php";
        
    }
}
   
$order_details = $order_object->getOrderDetails();


foreach ($order_details as $data) {
    # code...
}

// load views
require_once APP_DIR . "Views/header1.php";
require_once APP_DIR . "Views/pages/orderdetails.php";
require_once APP_DIR . "Views/footer1.php";
