<?php

// required files
require_once APP_DIR . "Config/Database.php";
require_once APP_DIR . "Models/User.php";
require_once APP_DIR . "Models/Product.php";
require_once APP_DIR . "Models/admin/Adminusers.php";


// create objects
$db_object = new Database();
$user_object = new User($db_object);
$admin_object = new Adminuser($db_object);

$admin_details = $admin_object->getAllUsers();


// load views
require_once APP_DIR . "Views/adminheader.php";
require_once APP_DIR . "Views/pages/admin/admin-user.php";
require_once APP_DIR . "Views/adminfooter.php";
