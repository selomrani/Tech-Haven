<?php
namespace App\Controllers;

// --- ADD THESE LINES TO LOAD DEPENDENCIES ---
// 1. Load the Database class (Product needs this to connect)
// Note: Adjust the path if your Database file is named differently or in a different folder
require_once __DIR__ . '/../Core/Database.php'; 

// 2. Load the Product model
require_once __DIR__ . '/../Models/Product.php'; 
// --------------------------------------------

use App\Models\Product;

class AdminController{
    public static function saveProduct(){
        // (Ensure you also applied the logic fixes from the previous answer)
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product();
            $product->setName($_POST['name']);
            $product->setPrice($_POST['price']);       // Fixed: setPrice
            $product->setDescription($_POST['description']); // Fixed: setDescription
            
            // Set required defaults that are missing from the form
            $product->setInStock(1); 
            $product->setImage('default.jpg'); 

            $product->addProduct();
            
            // Optional: Redirect to prevent resubmission
            header("Location: ../../index.php"); // Adjust redirection as needed
        }
    }
}

AdminController::saveProduct();