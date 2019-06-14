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

                    <a class="chat_ib" href="?conversation=<?php echo $conversation->getId() ?>">
                        <h5>
                            <?php foreach ($conversation->getUsers() as $user) { ?>
                                <?php if ($user->getId() !== $viewData['currentUser']->getId())
                                    echo $user->getName() . ', '; ?>
                            <?php } ?>

                            <span class="chat_date">
                                <?php if ($conversation->getMessages()->count())
                                    echo $conversation->getMessages()->last()->getDate()->format('M d'); ?>
                            </span>
                        </h5>

                        <p>
                            <?php if ($conversation->getMessages()->count())
                                echo $conversation->getMessages()->last()->getContent(); ?>
                        </p>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
