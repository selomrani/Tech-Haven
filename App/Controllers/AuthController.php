<?php
namespace App\Controllers;

use App\Models\User;
class AuthController{
    public function renderLogin(){
        require_once __DIR__ . '/../Views/auth/login.php';
    }
    public function renderRegister(){
        require_once __DIR__ . '/../Views/auth/register.php';
    }
    public function register(){
        $user = new User();
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setEmail($_POST['email']);
        $user->setPhone($_POST['phone']);
        $user->setPassword($_POST['password']);
        $user->setRole($_POST['role']);
        $user->createUser();
        $this->renderLogin();
    }
    public function login(){
        if($_SERVER['REQUEST_METHOD']){
            $email = $_POST['email'];
                $user = User::fetchByEmail($email);
                $pass = $_POST['password'];
                $hash = $user->getPassword();
            if(User::checkpassword($hash,$pass)){
                session_start();
                if($user->getRole() == "admin") require_once __DIR__ . '/../Views/admin/dashboard.php';
                elseif($user->getRole() == "customer") require_once __DIR__ . '/../Views/home/home.php';
            }
        }
    }
}
