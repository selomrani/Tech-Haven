<?php
namespace App\Controllers;

class HomeController {
    public function renderHome() {
        $viewPath = __DIR__ . '/../Views/home/home.php';
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            echo "View file not found: $viewPath";
        }
    }

    public function renderAll(){
        require_once __DIR__ . '/../Views/home/allProducts.php';
    }
}