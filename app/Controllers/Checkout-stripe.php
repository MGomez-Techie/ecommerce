<?php


require_once APP_DIR . "Utils/code.precheckout.php";

$cart_details = $cart_object->getCartDetails($user_id);
$cart_object->calculateTotal();

$stripe = Stripeclient::getClient();

header('Content-Type: application/json');

$YOUR_DOMAIN = BASE_URL;

$checkout_session = $stripe->checkout->sessions->create([
  'line_items' => [[
    'price_data' => [
        'currency' => 'TTD',
        'unit_amount' => $cart_object->getTotal() * 100,
        'product_data' => [
            'name' => 'Cart Checkout',
            'description' => "Cart checkout description",
            'images' => ['https://source.unsplash.com/n9R0MN3XGvY/300x300']
        ]
    ],
    'quantity' => 1,
  ]],
  'payment_method_types' => ['card'],
  'allow_promotion_codes' => true,
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . 'checkout/success/stripe/{CHECKOUT_SESSION_ID}',
  'cancel_url' => $YOUR_DOMAIN . 'checkout',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);