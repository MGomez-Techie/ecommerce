<?php

// required files
require_once APP_DIR . "Config/Database.php";
require_once APP_DIR . "Models/User.php";
require_once APP_DIR . "Models/Product.php";


// create objects
$db_object = new Database();
$user_object = new User($db_object);
$product_object = new Product($db_object);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["login"])){ 
    }
}

$product_details = $product_object->getProductDetails($id);
foreach ($product_details as $data) {
    # code...
}

// load views
require_once APP_DIR . "Views/header.php";
require_once APP_DIR . "Views/pages/details.php";
require_once APP_DIR . "Views/footer.php";
