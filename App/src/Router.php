<?php

class Router
{
    private $routes = [];

    /**
     * Register a route.
     * @param string $path The URI path (e.g., '/home')
     * @param array $callback [ControllerClass, MethodName]
     */
    public function add(string $path, array $callback)
    {
        // Normalize path: ensure it starts with / and trim trailing /
        $path = '/' . trim($path, '/');
        $this->routes[$path] = $callback;
    }

    /**
     * Dispatch the request to the matching controller.
     */
    public function dispatch()
    {
        // Get the URI path from the server request
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = '/' . trim($uri, '/');

        // Check if the route exists
        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri][0];
            $action = $this->routes[$uri][1];

            // Instantiate controller and call method
            $controllerInstance = new $controller();
            $controllerInstance->$action();
        } else {
            // Simple 404 handling
            http_response_code(404);
            echo "404 - Page Not Found";
        }
    }
}