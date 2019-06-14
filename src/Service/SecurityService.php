<?php

namespace App\Service;

use App\Entity\User;

/**
 * Security service to handle authentication and authorization.
 */
class SecurityService
{
    use SingletonTrait;

    private $userManager;

    private function __construct()
    {
        $this->userManager = UserManager::getInstance();
    }

    /**
     * Save user email in the session.
     *
     * @param User $user
     */
    public function authenticateUser(User $user)
    {
        $_SESSION['user'] = $user->getEmail();

    }

    /**
     * CHeck if user is authenticated.
     *
     * @return bool
     */
    public function userIsAuthenticated(): bool
    {

        if (isset($_SESSION['user']) && $_SESSION['user']) {
            return $this->userManager->getUserByEmail($_SESSION['user']) !== null;
        }

        return false;
    }
}