<?php
class Cart
{

    protected $pdo = null;
    private $subtotal = 0;
    private $total = 0;
    private $cart_details = array();
    
    
    /**
     * Constructor that takes pdo connection
     */
    public function __construct(Database $pdo)
    {
        if (!isset($pdo->pdo)) return null;
        $this->pdo = $pdo->pdo;
        $this->setSessions();
    }
  

    public function getCartDetails($user_id){
        $sql = "SELECT * 
        FROM cart, products, discounts
        WHERE cart.product_id = products.product_id 
        AND products.discount_id = discounts.discount_id
        AND cart.user_id = ? 
        AND cart.cart_status = 'cart'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $data) {
            $this->subtotal += Customhelper::calculateDiscountAmount(
                $data["product_price"],
                $data["discount_percent"]
            ) * $data["cart_quantity"];
        }
        $this->cart_details = $result;
        
        
        
        return $result;
    }
    
    
    public function addToCart($user_id, $product_id, $cart_quantity){
        $data = [
            "user_id" => $user_id,
            "product_id" => $product_id,
            "cart_quantity" => $cart_quantity,
        ];

        $sql = "INSERT INTO `ecommerce_v2`.`cart`
        (`cart_id`,
        `user_id`,
        `product_id`,
        `cart_created`,
        `cart_quantity`,
        `cart_status`)
        VALUES
        (
        NULL,
        :user_id,
        :product_id,
        current_timestamp(),
        :cart_quantity,
        'cart'
        );
        
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function removeFromCart($cart_id, $user_id){
        $sql = "DELETE FROM cart WHERE cart_id = ? AND user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cart_id, $user_id]);
    }

    public function updateCart($user_id, $product_id, $cart_quantity){
        $sql = "UPDATE cart set cart_quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$cart_quantity, $user_id, $product_id]);
    }

    public function getSubtotal(){
        return $this->subtotal;
    }
    public function getTotal(){
        return $this->total;
    }
    public function calculateTotal(){
        $total = $this->subtotal;
        $amount_to_add = [0, 0, 0, 0];
        $amount_to_subtract = [$_SESSION["checkout"]["points_discount_amount"], 0, 0];
        $total = $this->calculateAmountOff($total, $amount_to_subtract);
        $total = $this->calculateAmountAdded($total, $amount_to_add);
        $this->total = $total;
    }

    public function calculateAmountOff($total, $array_of_values){
        $amount = array_sum($array_of_values);
        return $total - $amount;
    }

    public function calculateAmountAdded($total, $array_of_values){
        $amount = array_sum($array_of_values);
        return $total + $amount;
    }

    public function getWishlistDetails($user_id){
        $sql = "SELECT * FROM wishlist, products, discounts 
        WHERE wishlist.product_id = products.product_id 
        AND products.discount_id = discounts.discount_id
        AND wishlist.user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function isInWishList($user_id, $product_id){
        $sql = "SELECT * FROM wishlist WHERE product_id = ? AND user_id = ? LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$product_id, $user_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result){
            return true;
        }else{
            false;
        }


    }

    public function addToWishlist($user_id, $cart_id, $wishlist_quantity = 1){
        $data = [
            "user_id" => $user_id,
            "cart_id" => $cart_id,
            "wishlist_quantity" => $wishlist_quantity,
        ];

        $sql = "INSERT INTO `wishlist`
        (`wishlist_id`,
        `user_id`,
        `product_id`,
        `wishlist_created`,
        `wishlist_quantity`)
        VALUES
        (
        NULL,
        :user_id,
        (SELECT product_id FROM cart WHERE cart_id = :cart_id),
        current_timestamp(),
        :wishlist_quantity
        );
        
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }
    
    public function addToWishlist1($user_id, $product_id, $wishlist_quantity = 1){
        $data = [
            "user_id" => $user_id,
            "product_id" => $product_id,
            "wishlist_quantity" => $wishlist_quantity,
        ];

        $sql = "INSERT INTO `wishlist`
        (`wishlist_id`,
        `user_id`,
        `product_id`,
        `wishlist_created`,
        `wishlist_quantity`)
        VALUES
        (
        NULL,
        :user_id,
        :product_id,
        current_timestamp(),
        :wishlist_quantity
        );
        
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function removeFromWishlist($wishlist_id, $user_id){
        $sql = "DELETE FROM wishlist WHERE wishlist_id = ? AND user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$wishlist_id, $user_id]);
    }

    public function setSessions(){
        $names = [
            "points_used",
            "points_gained",
            "points_discount_amount"
        ];

        foreach ($names as $key) {
            if(empty($_SESSION["checkout"][$key])){
                $_SESSION["checkout"][$key] = 0;
            }
        }
    }

    public function resetSessions(){
        unset($_SESSION["checkout"]);
    }


    // POINTS

    public function setPointsUsed($points_used){

        echo "Points to be used " . $points_used . '<br>';

        //convert points to money
        $points_discount_amount = POINT::getDiscountAmount($points_used);

        echo "Points discount amoutn is " . $points_discount_amount . "<br>";

        //check if discount isnt greater than subtotal
        if ($points_discount_amount >= $this->subtotal){
            $this->resetPoints();
            $_SESSION["message"] = "Cannot redeem points";
            return;
        }

        //if user has enough points
        if ($_SESSION["current_user"]["total_points"] >= $points_used){
            //can exchange
            $_SESSION["checkout"]["points_used"] = $points_used;
            $_SESSION["checkout"]["points_discount_amount"] = POINT::getDiscountAmount($points_used);
            echo "Total is  " . $this->getTotal();
            echo "Points gained is  " . $this->getPointsGained();
            // exit;
            $_SESSION["checkout"]["points_gained"] = $this->getPointsGained();
            $_SESSION["message"] = "Discount applied! Keep shopping to gain more points";
        }else{
            //cannot exchange
            $this->resetPoints();
            $_SESSION["message"] = "Not enough points";
            return;
        }
    }

    public function resetPoints(){
        $_SESSION["checkout"]["points_used"] = 0;
        $_SESSION["checkout"]["points_gained"] = 0;
        $_SESSION["checkout"]["points_discount_amount"] = 0;
    }

    public function setUserTotalPoints(){

    }
    
    public function getUserTotalPoints(){
        return $_SESSION["current_user"]["total_points"];        
    }

    public function getPointsGained(){
        return POINT::getPoints($this->total);
    }

    public function getPointsUsed(){
        return $_SESSION["checkout"]["points_used"];
    }

    public function getPointsDiscountAmount(){
        return $_SESSION["checkout"]["points_discount_amount"];
    }
}