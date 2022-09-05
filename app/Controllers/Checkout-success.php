<?php


// required files
require_once APP_DIR . "Utils/code.precheckout.php";
$completed = false;

// Get cart details
$cart_details = $cart_object->getCartDetails($user_id);
if(empty($cart_details)){
    echo "Cart is empty";
    exit;
}

// Calculate subtotal and total
$cart_object->calculateTotal();

// Determine payment method
switch ($payment) {
    case 'debug':
        $data = [
            "payment" => "none",
            "payment_id" => null,
            "subtotal" => $cart_object->getSubtotal(),
            "total" => $cart_object->getTotal(),
            "total_discount_amount" => 0,
        ];
        $completed = true;
        break;
    
    case 'stripe':
        $payment_object = new Stripehelper();
        $checkout_order = $payment_object->getCheckoutOrder($id);
        Debugger::debug($checkout_order);
        $completed = $payment_object->isCheckoutCompleted($checkout_order);
        $data = $payment_object->getPaymentDetails($checkout_order);
        Debugger::debug($data);
        break;
    
    default:
        # code...
        break;
}

// Check if payment was completed
if(!$completed || empty($data)){
    $_SESSION["message"] = "Payment process not completed";
    exit;
}

// Insert order
$order_id = $order_object->insertOrder(
    $user_id,
    $data["subtotal"],
    $data["total"],
    $data["total_discount_amount"],
    $data["payment"],
    $data["payment_id"],
);


// Set points info
$points_used = $cart_object->getPointsUsed();
$points_gained = $cart_object->getPointsGained();
$points_discount_amount = $cart_object->getPointsDiscountAmount();
$total_points = ($cart_object->getUserTotalPoints() + $points_gained) - $points_used;

// Insert order details
$order_object->insertOrderDetails($cart_details, $order_id);

// Update items in stock

// Send user to thanks page
header("location: " . BASE_URL . "thanks");
exit;

// Update User Points
$user_object->updateTotalPoints($user_id, $total_points);
$user_object->setTotalPoints($points_gained);
$cart_object->resetSessions();