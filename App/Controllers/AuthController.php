<?php
namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function renderLogin()
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function renderRegister()
    {
        require_once __DIR__ . '/../Views/auth/register.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPhone($_POST['phone']);
            $user->setPassword($_POST['password']);
            $user->setRole($_POST['role']);
            $user->createUser();
            
            header('Location: /login');
            exit;
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = User::fetchByEmail($email);
            if ($user && password_verify($password, $user->getPassword())) {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['role'] = $user->getRole();
                $_SESSION['firstname'] = $user->getFirstname();
                $_SESSION['user_id'] = $user->getId();
                if ($user->getRole() === 'admin') {
                    header('Location: /admin/dashboard');
                } else {
                    header('Location: /');
                }
                exit;
            } else {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['error'] = "Invalid email or password.";
                header('Location: /login');
                exit;
            }
        }
    }
    public function logout()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION = [];
    session_destroy();
    header('Location: /'); 
    exit;
}
}