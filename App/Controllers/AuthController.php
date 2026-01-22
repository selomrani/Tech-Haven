<?php 
namespace App\Controllers; 

use App\Controllers\Controller as ControllersController;
use App\Core\Controller; 

class AuthController  extends ControllersController {
    public function index() {
        echo "This is the User Index method!";
    }
    public function show($id) { 
        echo "Showing User ID: " . htmlspecialchars($id);
    }

    public function profile($username, $tab = 'posts') { 
    }
}
