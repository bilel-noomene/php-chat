<?php

namespace App\Service;

use App\Entity\Conversation;
use App\Entity\Message;
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
        $this->repository = $this->em->getRepository(Conversation::class);
    }

    /**
     * @param $id
     * @return Conversation
     */
    public function getConversation($id): ?Conversation
    {
        return $this->repository->find($id);
    }

    /**
     * @param User $firstUser
     * @param User $secondUser
     * @return Conversation|null
     */
    public function getConversationBetweenUsers(User $firstUser, User $secondUser): ?Conversation
    {
        foreach ($firstUser->getConversations() as $conversation) {
            if ($conversation->getUsers()->contains($secondUser)) {
                return $conversation;
            }
        }

        return null;
    }

    public function createConversation(array $users): Conversation
    {
        $conversation = new Conversation();

        foreach ($users as $user) {
            $conversation->addUser($user);
        }

        $this->em->persist($conversation);
        $this->em->flush();

        return $conversation;
    }

    /**
     * Create and append a new message to the conversation.
     *
     * @param Conversation $conversation
     * @param string $content
     */
    public function appendMessage(Conversation $conversation, string $content)
    {
        $message = new Message();

        $message
            ->setConversation($conversation)
            ->setSender(SecurityService::getInstance()->getUser())
            ->setContent($content)
            ->setDate(new \DateTime());

        $this->em->persist($message);
        $this->em->flush();
    }
}