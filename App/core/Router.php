<?php
namespace App\Core;
class Router {
    public function dispatch() {
        $url = $_SERVER['PATH_INFO'] ?? '/home/index';
        $url = trim($url, '/');
        $parts = explode('/', $url);
        $controllerName = ucfirst($parts[0]) . 'Controller'; 
        $method = $parts[1] ?? 'index';
        $params = array_slice($parts, 2);
        $file = "../app/controllers/" . $controllerName . ".php";
        if (file_exists($file)) {
            require_once $file;
            if (class_exists($controllerName)) {
                $controllerInstance = new $controllerName();
                if (method_exists($controllerInstance, $method)) {
                    call_user_func_array([$controllerInstance, $method], $params);
                }
            }
        } else {
            die("404 - Controller $controllerName not found at $file");
        }
    }
}
