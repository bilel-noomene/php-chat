<?php

require dirname(__DIR__) . '/bootstrap.php';

use App\Controller;

$route = $_SERVER['REQUEST_URI'];

try {
    switch ($route) {
        default:
            Controller\ErrorController::error(404);
    }
} catch (\Exception $exception) {
    Controller\ErrorController::error(500);
}
