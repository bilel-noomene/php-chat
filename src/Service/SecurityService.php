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
    private static $connectedUser;

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
        return $this->getUser() !== null;
    }

    public function getUser()
    {
        if (self::$connectedUser === null && isset($_SESSION['user']) && $_SESSION['user']) {
            self::$connectedUser = $this->userManager->getUserByEmail($_SESSION['user']);
        }

        return self::$connectedUser;
    }
}