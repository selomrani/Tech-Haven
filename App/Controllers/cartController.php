<?php
namespace App\Controllers;
use App\Models\Product;
class CartController {
    public static function addToCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]++;
            } else {
                $_SESSION['cart'][$productId] = 1;
            }
            header("Location: /allProducts.php"); 
            exit;
        }
    }

    public static function getCartItems() {
        $cartItems = [];
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $productId => $quantity) {
                $product = Product::find($productId);
                if ($product) {
                    $cartItems[] = [
                        'product' => $product,
                        'quantity' => $quantity,
                        'total' => $product->getPrice() * $quantity
                    ];
                }
            }
        }
        return $cartItems;
    }
}