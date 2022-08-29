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
    }
  

    public function getCartDetails($user_id){
        $sql = "SELECT * 
        FROM cart, products, discounts
        WHERE cart.product_id = products.product_id 
        AND products.product_id = discounts.discount_id
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
        $this->total = $this->subtotal;
    }
}