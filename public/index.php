<?php

require dirname(__DIR__) . '/bootstrap.php';

use App\Controller;
use App\Service\SecurityService;

$route = explode('?', $_SERVER['REQUEST_URI'])[0];

try {
    session_start();

    if ($route !== '/login' && !SecurityService::getInstance()->userIsAuthenticated()) {
        header('Location: /login');
        return;
    }

    switch ($route) {
        case '/':
            Controller\ChatController::index();
            break;
        case '/login':
            Controller\SecurityController::login();
            break;
        default:
            Controller\ErrorController::error(404);
    }
} catch (\Exception $exception) {
    Controller\ErrorController::error(500);
}
