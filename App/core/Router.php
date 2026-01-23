<?php

class Router {
    
    public function dispatch($uri) {
        $urlPath = parse_url($uri, PHP_URL_PATH);
        $urlPath = trim($urlPath, '/');

        switch ($urlPath) {
            case '':
            case 'home':
                $this->callController('PageController', 'home');
                break;

            case 'about':
                $this->callController('PageController', 'about');
                break;
            
            case 'contact':
                $this->callController('PageController', 'contact');
                break;

            default:
                $this->callController('PageController', 'notFound');
                break;
        }
    }

    private function callController($controllerName, $methodName) {
        require_once "controllers/$controllerName.php";
        
        $controller = new $controllerName();
        $controller->$methodName();
    }
}