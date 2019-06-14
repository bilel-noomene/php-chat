<?php

namespace App\Controller;

/**
 * Controller for handling error pages
 */
class ErrorController extends AbstractController
{

    /**
     * @param int $code Status code: 404 | 500
     */
    public static function error(int $code)
    {
        self::renderView('error/error-' . $code);
    }
}