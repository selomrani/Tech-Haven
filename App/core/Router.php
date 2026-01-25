<?php
namespace App\Core;

class Router {
    public function dispatch($uri) {
    $urlPath = parse_url($uri, PHP_URL_PATH);

    switch ($urlPath) {
        case '/':
        case '/index.php':
            $this->callController('HomeController', 'renderHome');
            break;
        case '/admin':
            $this->callController('AdminController', 'index');
            break;
        case '/login':
            $this->callController('AuthController','renderLogin');
            break;
        case '/register':
            $this->callController('AuthController','renderRegister');
            break;
        case '/signup':
            $this->callController('AuthController','register');
            break;
        case '/signin':
            $this->callController('AuthController','login');
            break;
        case '/allproducts':
            $this->callController('HomeController','renderAll');
            break;
        default:
        case '/logout':
            $this->callController('AuthController','logout');
            require_once __DIR__ . '/../Views/error/404.php';
            break;
    }
}

    private function callController($controllerName, $methodName) {
        $controllerClass = "App\\Controllers\\" . $controllerName;
        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            if (method_exists($controller, $methodName)) {
                $controller->$methodName();
            } else {
                echo "Method $methodName not found in $controllerName";
            }
        } else {
            echo "Controller class $controllerClass not found. Check namespaces!";
        }
    }
}