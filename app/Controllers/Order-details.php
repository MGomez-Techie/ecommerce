<?php

require_once APP_DIR . "Utils/code.precheckout.php";

$orders = $order_object->getUserOrderDetails($user_id, $id);


// load views
require_once APP_DIR . "Views/header1.php";
require_once APP_DIR . "Views/includes/alerts.php";
require_once APP_DIR . "Views/pages/order-details.php";
require_once APP_DIR . "Views/footer1.php";