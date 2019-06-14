<?php

namespace App\Service;

use App\Entity\User;
use App\Helper\EntityManagerAccessor;

/**
 * Service for managing the user entity.
 */
class UserManager
{
    use SingletonTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $em;

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repository;

    private function __construct()
    {
        $this->em = EntityManagerAccessor::$entityManage;
        $this->repository = $this->em->getRepository(User::class);
    }

    public function getUsers()
    {
        return $this->repository->findAll();
    }

    /**
     * Retrieve the user by email.
     *
     * @param string $email
     * @return User|null
     */
    public function getUserByEmail(string $email): ?User
    {
        return $this->repository->findOneBy(['email' => $email]);
    }

    public function checkPassword(User $user, string $password): bool
    {
        return password_verify($password, $user->getPassword());
    }

}