<?php

namespace App\Controller;

use App\Helper\Parameters;
use App\Service\Router;

/**
 * Helper abstract controller
 */
abstract class AbstractController
{
    /**
     * Render PHP template.
     *
     * @param $view
     * @param array $viewData Data used in the template.
     */
    protected static function renderView($view, array $viewData = [])
    {
        require(sprintf('%s/../views/%s.php', dirname(__DIR__), $view));
        exit;
    }

    /**
     * Check if the request method is POST.
     *
     * @return bool
     */
    protected static function isPostRequest()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * Map post parameters into Parameters model.
     *
     * @return Parameters
     */
    protected static function postParams()
    {
        return new Parameters($_POST);
    }

    /**
     * Map post parameters into Parameters model.
     *
     * @return Parameters
     */
    protected static function queryParams()
    {
        return new Parameters($_GET);
    }

    /**
     * Redirect to an url.
     *
     * @param $url
     */
    protected static function redirectTo($url)
    {
        Router::getInstance()->redirectTo($url);
    }
}