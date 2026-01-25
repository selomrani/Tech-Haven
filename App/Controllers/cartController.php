<?php
namespace App\Controllers;

use App\Models\Product;

class CartController {

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function viewCart() {
        $cartItems = [];
        $totalPrice = 0;

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $quantity) {
                $product = Product::find($id);
                if ($product) {
                    $cartItems[] = [
                        'product' => $product,
                        'quantity' => $quantity,
                        'line_total' => $product->getPrice() * $quantity
                    ];
                    $totalPrice += $product->getPrice() * $quantity;
                }
            }
        }
        require_once __DIR__ . '/../Views/cart/cart.php';
    }
    public function addToCart() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }

            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]++;
            } else {
                $_SESSION['cart'][$productId] = 1;
            }
            header('Location: /allproducts'); 
            exit;
        }
    }
}