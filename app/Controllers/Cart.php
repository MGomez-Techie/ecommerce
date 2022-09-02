<?php

require_once APP_DIR . "Utils/code.precheckout.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {



    if(isset($_POST["remove_from_cart"])){ 
        $cart_object->removeFromCart($_POST["cart_id"], $user_id);
    }

    
    if(isset($_POST["add_to_wishlist"])){ 
        
        if(!$cart_object->isInWishList($user_id, $_POST["product_id"])){
            $cart_object->addToWishlist($user_id, $_POST["cart_id"], 1);
        $cart_object->removeFromCart($_POST["cart_id"], $user_id);
        
        }else{
            echo "Already in wishlist";
        }
        // $cart_object->removeFromCart($_POST["cart_id"], $user_id);
    }


}


$cart_details = $cart_object->getCartDetails($user_id);
$cart_object->calculateTotal();

// load views
require_once APP_DIR . "Views/header1.php";
require_once APP_DIR . "Views/pages/cart.php";
require_once APP_DIR . "Views/footer1.php";
