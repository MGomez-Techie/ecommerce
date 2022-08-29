<?php

// required files
require_once APP_DIR . "Config/Database.php";
require_once APP_DIR . "Models/User.php";
require_once APP_DIR . "Models/Product.php";
require_once APP_DIR . "Models/admin/Adminproduct.php";


// create objects
$db_object = new Database();
$user_object = new User($db_object);
$product_object = new Adminproduct($db_object);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["add_discount"])){
        
        $product_object->addDiscount($_POST);
        
    }
    if(isset($_POST["assign_discount"])){
        
        if($_POST["product_id"] == 0){
            $product_details = $product_object->getAllProducts();
            $product_object->assignDiscount($product_details, $_POST["discount_id"]);
        }else{
            $product_details = [["product_id"=> $_POST["product_id"]]];
            $product_object->assignDiscount($product_details, $_POST["discount_id"]);
        }
        
    }
}


$product_details = $product_object->getAllProducts();
$discount_details = $product_object->getAllDiscounts();


// load views
require_once APP_DIR . "Views/adminheader.php";
require_once APP_DIR . "Views/pages/admin/admin-discounts.php";
require_once APP_DIR . "Views/adminfooter.php";