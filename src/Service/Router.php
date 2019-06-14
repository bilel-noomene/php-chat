<?php

namespace App\Service;

use App\Controller\ChatController;
use App\Controller\ErrorController;
use App\Controller\SecurityController;

/**
 * Router service for routing utilities.
 */
class Router
{
    use SingletonTrait;

    private const ROUTES = [
        'login' => [
            'pattern' => '/^\/login$/',
            'controller' => SecurityController::class,
            'action' => 'login'
        ],
        'home' => [
            'pattern' => '/^\/$/',
            'controller' => ChatController::class,
            'action' => 'index'
        ],
        'send-message' => [
            'pattern' => '/^\/send-message\/([0-9]+)$/',
            'controller' => ChatController::class,
            'action' => 'sendMessage'
        ],

    ];

    /**
     * Execute the action that matches the route.
     *
     * @param string $path
     */
    public function matchRoute(string $path)
    {
        foreach (self::ROUTES as $name => $route) {
            if (preg_match($route['pattern'], $path, $attributes)) {
                array_shift($attributes);
                call_user_func([$route['controller'], $route['action']], ...$attributes);
                exit;
            }
        }

        ErrorController::error(404);
    }

    /**
     * Redirect to an url.
     * @param $url
     */
    public function redirectTo($url)
    {
        header('Location: ' . $url);
        exit;
    }

}