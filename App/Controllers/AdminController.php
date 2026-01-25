<?php
namespace App\Controllers;


use App\Models\Product;
use App\Models\User;

class AdminController {

    public static function saveProduct() {
        die("The controller is working and the request was received.");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Product;
            $product->setName($_POST['name']);
            $product->setPrice($_POST['price']);
            $product->setDescription($_POST['description']);
            $product->setCategory($_POST['category']);
            $product->setInStock(1);

            $imageName = '/../../public/assets/uploads/placeholder_image.jpeg';

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $fileTmpPath = $_FILES['image']['tmp_name'];
                $fileName = basename($_FILES['image']['name']);

                $newFileName = 'product_' . uniqid() . '_' . $fileName;

                $uploadFileDir = __DIR__ . '/../../public/assets/uploads/';
                $dest_path = $uploadFileDir . $newFileName;

                if(move_uploaded_file($fileTmpPath, $dest_path)) {
                    $imageName = $newFileName;
                }
            }

            $product->setImage($imageName);

            $product->addProduct();
            header("Location: /admin");
            exit;
        }
    }

    public function renderDashboard(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['email'])) {
            header('Location: /login');
            exit;
        }

        $admin = User::fetchByEmail($_SESSION['email']);

        if (!$admin) {
            session_destroy();
            header('Location: /login');
            exit;
        }

        require_once __DIR__ . '/../Views/admin/dashboard.php';
    }
}