<div class="msg_history">
    <?php if ($viewData['selectedConversation'] !== null) {
        foreach ($viewData['selectedConversation']->getMessages() as $message) {
            if ($message->getSender()->getId() === $viewData['connectedUser']->getId()) { ?>
                <div class="outgoing_msg">
                    <div class="sent_msg">
                        <p><?php echo $message->getContent(); ?></p>
                        <span class="time_date"><?php echo $message->getDate()->format('h:i A  | F j'); ?></span>
                    </div>
                </div>
            <?php } else { ?>
                <div class="incoming_msg">
                    <div class="incoming_msg_img">
                        <img src="/assets/images/profile.png" alt="profile">
                    </div>

                    <div class="received_msg">
                        <div class="received_withd_msg">
                            <p><?php echo $message->getContent(); ?></p>
                            <span class="time_date"><?php echo $message->getDate()->format('h:i A | F j'); ?></span>
                        </div>
                    </div>
                </div>

            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>
