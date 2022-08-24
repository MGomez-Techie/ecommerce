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

$product_details = $product_object->getAllProducts();


// load views
require_once APP_DIR . "Views/adminheader.php";
require_once APP_DIR . "Views/pages/admin/admin-dashboard.php";
require_once APP_DIR . "Views/adminfooter.php";
