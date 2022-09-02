<?php

// required files
require_once APP_DIR . "Utils/code.precheckout.php";





if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["remove_from_wishlist"])){
         $cart_object->removeFromWishlist($_POST["wishlist_id"], $user_id);
    }

    if(isset($_POST["add_to_cart"])){
        $cart_object->removeFromWishlist($_POST["wishlist_id"], $user_id);
        $cart_object->addToCart($user_id, $_POST["product_id"], 1);
   }
    
   if(isset($_POST["add_to_wishlist"])){
        
        if(!$cart_object->isInWishList($user_id, $_POST["product_id"])){
            $cart_object->addToWishlist1($user_id, $_POST["product_id"], 1);
        }else{
            echo "Already in wishlist";
        }

   


    }
}

$wishlist_details = $cart_object->getWishlistDetails($user_id);

foreach ($wishlist_details as $data) {
    # code...
}

// load views
require_once APP_DIR . "Views/header1.php";
require_once APP_DIR . "Views/pages/wishlist.php";
require_once APP_DIR . "Views/footer1.php";
