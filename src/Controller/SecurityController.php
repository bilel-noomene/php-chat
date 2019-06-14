<?php

namespace App\Controller;

use App\Service\SecurityService;
use App\Service\UserManager;

/**
 * Controller for authentication actions.
 */
class SecurityController extends AbstractController
{
    /**
     * Authenticate user.
     */
    public static function login()
    {
        $params = self::postParams();

        if (self::isPostRequest() && $params->notEmpty('email') && $params->notEmpty('password')) {
            $userManager = UserManager::getInstance();

            $user = $userManager->getUserByEmail($params->get('email'));

            if ($user !== null && $userManager->checkPassword($user, $params->get('password'))) {
                SecurityService::getInstance()->authenticateUser($user);

                self::redirectTo('/');
            }
        }

        self::renderView('security/login');
    }
}