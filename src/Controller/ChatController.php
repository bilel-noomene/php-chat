<?php

namespace App\Controller;

use App\Service\ConversationManager;
use App\Service\SecurityService;
use App\Service\UserManager;

/**
 * ChatController for handling chat actions.
 */
class ChatController extends AbstractController
{

    /**
     * Render the chat home page.
     */
    public static function index()
    {
        $userManager = UserManager::getInstance();
        $securityService = SecurityService::getInstance();
        $conversationManager = ConversationManager::getInstance();

        $currentUser = $securityService->getUser();
        $users = $userManager->getUsers();
        $conversations = $currentUser->getConversations();

        if ($conversationId = self::queryParams()->get('conversation')) {
            $selectedConversation = $conversationManager->getConversation($conversationId);

            if ($selectedConversation === null || !$selectedConversation->getUsers()->contains($currentUser)) {
                self::redirectTo('/');
            }
        } else {
            $selectedConversation = $conversations->first();
        }

        $data = [
            'users' => $users,
            'currentUser' => $currentUser,
            'conversations' => $conversations,
            'selectedConversation' => $selectedConversation
        ];

        self::renderView('chat/index', $data);
    }

    /**
     * Find the conversation by the counterparty user or create a new one if it does not already exist.
     *
     * @param $userId
     */
    public function userConversation($userId)
    {
        $conversationManager = ConversationManager::getInstance();
        $securityService = SecurityService::getInstance();
        $userManager = UserManager::getInstance();

        $user = $userManager->getUser($userId);
        $currentUser = $securityService->getUser();
        $conversation = $conversationManager->getConversationBetweenUsers($currentUser, $user);

        if ($conversation === null) {
            // TODO Create the conversation on sending the first message
            $conversation = $conversationManager->createConversation([$currentUser, $user]);
        }

        self::redirectTo('/?conversation=' . $conversation->getId());
    }

    /**
     * Post a new message.
     *
     * @param $conversationId
     */
    public static function sendMessage($conversationId)
    {
        $conversationManager = ConversationManager::getInstance();

        if (!($conversation = $conversationManager->getConversation($conversationId))) {
            ErrorController::error(404);
        }

        if ($messageContent = self::postParams()->get('message')) {
            $conversationManager->appendMessage($conversation, $messageContent);
        }

        self::redirectTo('/?conversation=' . $conversationId);
    }
}