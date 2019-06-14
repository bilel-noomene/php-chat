<div class="inbox_people">
    <div class="headind_srch">
        <div class="recent_heading">
            <h4>People</h4>
        </div>
    </div>

    <div class="inbox_chat scroll">
        <div class="chat_list">
            <?php foreach ($viewData['users'] as $user) {
                if ($user->getId() !== $viewData['currentUser']->getId()) { ?>
                    <a href="/conversation/user/<?php echo $user->getId() ?>">
                        <div class="chat_people" href="/conversation/user/<?php echo $user->getId() ?>">
                            <div class="chat_img">
                                <img src="/assets/images/profile.png" alt="profile">
                            </div>

                            <div class="chat_ib">
                                <h5>
                                    <?php echo $user->getName() ?>
                                    <span class="chat_status active">
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                    </span>
                                </h5>
                            </div>
                        </div>
                    </a>
                    <hr>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>