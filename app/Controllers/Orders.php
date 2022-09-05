<?php

require_once APP_DIR . "Utils/code.precheckout.php";

$orders = $order_object->getUserOrders($user_id);

// load views
require_once APP_DIR . "Views/header1.php";
require_once APP_DIR . "Views/includes/alerts.php";
require_once APP_DIR . "Views/pages/orders.php";
require_once APP_DIR . "Views/footer1.php";