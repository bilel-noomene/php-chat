<?php

namespace App\Controller;

/**
 * Controller for handling error pages
 */
class ErrorController
{

    /**
     * @param int $code Status code: 404 | 500
     */
    static public function error(int $code)
    {
        require sprintf('%s/../views/error/error-%s.php', dirname(__DIR__), $code);
    }
}