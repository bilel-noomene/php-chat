<?php

require dirname(__DIR__) . '/bootstrap.php';

use App\Controller;
use App\Service\Router;
use App\Service\SecurityService;

$route = explode('?', $_SERVER['REQUEST_URI'])[0];
$router = Router::getInstance();

try {
    session_start();

    if ($route !== '/login' && !SecurityService::getInstance()->userIsAuthenticated()) {
        $router->redirectTo('/login');
    }

    $router->matchRoute($route);
} catch (\Exception $exception) {
    Controller\ErrorController::error(500);
}
