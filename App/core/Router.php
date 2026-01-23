<?php
namespace App\Core;

class Router {
    public function dispatch($uri) {

        $urlPath = parse_url($uri, PHP_URL_PATH);
        if ($urlPath === '/' || $urlPath === '/index.php') {
            $this->callController('HomeController', 'renderHome');
        } elseif ($urlPath === '/admin') {
            $this->callController('AdminController', 'index');
        } else {
            require_once __DIR__ . '/../Views/error/404.php';
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