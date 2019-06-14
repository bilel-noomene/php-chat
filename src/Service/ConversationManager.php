<?php

namespace App\Service;

use App\Entity\User;
use App\Helper\EntityManagerAccessor;

/**
 * Service for managing the conversion entity.
 */
class ConversationManager
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
}