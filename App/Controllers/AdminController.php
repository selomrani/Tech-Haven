<?php
namespace App\Controllers;
require_once __DIR__ . '/../Core/Database.php'; 
require_once __DIR__ . '/../Models/Product.php'; 
use App\Models\Product;
use App\Models\User;

class AdminController{
    public static function saveProduct(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product();
            $product->setName($_POST['name']);
            $product->setPrice($_POST['price']);       // Fixed: setPrice
            $product->setDescription($_POST['description']); 
            $product->setInStock(1); 
            $product->setImage('default.jpg'); 
            $product->addProduct();
            header("Location: ../../index.php"); 
        }
    }
    public function renderDashboard(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $admin = User::fetchByEmail($_SESSION['email']);
        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }
}

AdminController::saveProduct();