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

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    if(!empty($_GET)){
        $product_details = $product_object->filterProducts($_GET);
    }else{
        $product_details = $product_object->getAllProducts();
    }

}





// load views
require_once APP_DIR . "Views/header1.php";
require_once APP_DIR . "Views/includes/alerts.php";

if(empty($product_details)){
    require_once APP_DIR . "Views/includes/store-no-results.php";
}else{
    require_once APP_DIR . "Views/pages/store.php";
}
require_once APP_DIR . "Views/footer1.php";
