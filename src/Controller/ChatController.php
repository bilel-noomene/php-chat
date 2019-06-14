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

    public static function index()
    {
        $userManager = UserManager::getInstance();
        $securityService = SecurityService::getInstance();

        $data = [
            'users' => $userManager->getUsers(),
            'connectedUser' => $securityService->getUser(),
            'conversations' => $securityService->getUser()->getConversations(),
            'selectedConversation' => $securityService->getUser()->getConversations()->first()
        ];

        self::renderView('chat/index', $data);
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

        self::redirectTo('/');
    }
}