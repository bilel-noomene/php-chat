<div class="inbox_conversations">
    <div class="headind_srch">
        <div class="recent_heading">
            <h4>Conversations</h4>
        </div>
    </div>

    <div class="inbox_chat scroll">
        <?php foreach ($viewData['conversations'] as $conversation) { ?>
            <div class="chat_list <?php if ($conversation->getId() === $viewData['selectedConversation']->getId()) echo 'active_chat' ?>">
                <div class="chat_conversation">
                    <div class="chat_img">
                        <img src="/assets/images/profile.png" alt="profile">
                    </div>

                    <div class="chat_ib">
                        <h5>
                            <?php foreach ($conversation->getUsers() as $user) { ?>
                                <?php if ($user->getId() !== $viewData['connectedUser']->getId())
                                    echo $user->getName() . ', '; ?>
                            <?php } ?>

                            <span class="chat_date">
                                <?php echo $conversation->getMessages()->last()->getDate()->format('M d'); ?>
                            </span>
                        </h5>

                        <p><?php echo $conversation->getMessages()->last()->getContent(); ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
