<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Item {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::connect();
    }
    public function saveItem($orderId, $productId, $quantity, $price) {
        $query = "INSERT INTO order_items (order_id, product_id, quantity, unit_price) 
                  VALUES (:order_id, :product_id, :quantity, :price)";
        
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':order_id'   => $orderId,
            ':product_id' => $productId,
            ':quantity'   => $quantity,
            ':price'      => $price
        ]);
    }
}