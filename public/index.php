<?php
// 1. Load Composer Autoloader
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;

// 2. Start the Router
$router = new Router();
$router->dispatch($_SERVER['REQUEST_URI']);