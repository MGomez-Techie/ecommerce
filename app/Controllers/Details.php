<?php

// required files
require_once APP_DIR . "Config/Database.php";
require_once APP_DIR . "Models/User.php";
require_once APP_DIR . "Models/Product.php";
require_once APP_DIR . "Models/Cart.php";


// create objects
$db_object = new Database();
$user_object = new User($db_object);
$product_object = new Product($db_object);
$cart_object = new Cart($db_object);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["add_to_cart"])){
        
        require_once APP_DIR . "Utils/code.isLoggedIn.php";
        $cart_object->addToCart($user_id, $id, $_POST["cart_quantity"]);
        $_SESSION["message"] = "Product added to cart";
        header ("location:" . BASE_URL . "cart");
        exit;
    }
    
    if(isset($_POST["add_to_wishlist"])){
        
        require_once APP_DIR . "Utils/code.isLoggedIn.php";
        $cart_object->addToWishlist1($user_id, $id, 1);
        $_SESSION["message"] = "Product added to wishlist";
    }


}

$product_details = $product_object->getProductDetails($id);
foreach ($product_details as $data) {
    # code...
}

// load views
require_once APP_DIR . "Views/header1.php";
require_once APP_DIR . "Views/includes/alerts.php";
require_once APP_DIR . "Views/pages/details.php";
require_once APP_DIR . "Views/includes/random-products.php";
require_once APP_DIR . "Views/footer1.php";
