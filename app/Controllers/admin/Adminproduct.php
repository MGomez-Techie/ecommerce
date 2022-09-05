<?php

// required files
require_once APP_DIR . "Config/Database.php";
require_once APP_DIR . "Models/User.php";
require_once APP_DIR . "Models/Product.php";
require_once APP_DIR . "Models/admin/Adminproduct.php";
require_once APP_DIR . "Utils/Customimage.php";
require_once APP_DIR . "Utils/Uploadfile.php";
require_once APP_DIR . "Utils/code.isUserAdmin.php";



// create objects
$db_object = new Database();
$user_object = new User($db_object);
$product_object = new Adminproduct($db_object);

$url = (empty($id)) ? "admin/products/add" : "admin/products/edit/$id";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["add_product"]) && empty($id)){ 
        $_SESSION["message"] = "Product was inserted";
        $images = [
            new Customimage("product_image1", 1),
            new Customimage("product_image2", 0),
            new Customimage("product_image3", 0),
            new Customimage("product_image4", 0)
    ];
        if(startValidations($images)){
            
            if (startUpload($images)){
                $product_object->addProduct($_POST, $images);
            }else{
                $_SESSION["message"] = "Error trying to upload file";
            }

        }else{
            $_SESSION["message"] = "Error trying to validate files";
        }  
    }

    if(isset($_POST["add_product"]) && !empty($id)){ 
        $images = [
            new Customimage("product_image1", 0, $_POST["previous_product_image1"]),
            new Customimage("product_image2", 0, $_POST["previous_product_image2"]),
            new Customimage("product_image3", 0, $_POST["previous_product_image3"]),
            new Customimage("product_image4", 0, $_POST["previous_product_image4"])
    ];
        if(startValidations($images)){
            
            if (startUpload($images)){
                $product_object->updateProduct($id,$_POST, $images);
            }else{
                $_SESSION["message"] = "Error trying to upload file";
            }

        }else{
            $_SESSION["message"] = "Error trying to validate files";
        }  
    }
}


if(!empty($id)){
    $product_details = $product_object->getProductDetails($id);
    foreach ($product_details as $data ) {
        # code...
    }
}


$product_title = (!empty($data["product_title"])) ? $data["product_title"] : "";
$product_description = (!empty($data["product_description"])) ? $data["product_description"] : "";
$product_price = (!empty($data["product_price"])) ? $data["product_price"] : "";
$product_quantity = (!empty($data["product_quantity"])) ? $data["product_quantity"] : "";
$product_image1 = (!empty($data["product_image1"])) ? $data["product_image1"] : "";
$product_image2 = (!empty($data["product_image2"])) ? $data["product_image2"] : "";
$product_image3 = (!empty($data["product_image3"])) ? $data["product_image3"] : "";
$product_image4 = (!empty($data["product_image4"])) ? $data["product_image4"] : "";
$product_status = (!empty($data["product_status"])) ? $data["product_status"] : "";
$product_category = (!empty($data["product_category"])) ? $data["product_category"] : "";


// load views
require_once APP_DIR . "Views/adminheader.php";
require_once APP_DIR . "Views/includes/alerts.php";
require_once APP_DIR . "Views/pages/admin/manage-product.php";
require_once APP_DIR . "Views/adminfooter.php";
