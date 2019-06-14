<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chat App</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="assets/css/chat.css" rel="stylesheet">
</head>
<body>

<div class="messaging">
    <div class="inbox_msg">
        <?php include __DIR__ . '/_conversations.php' ?>

        <div class="mesgs">
            <?php include __DIR__ . '/_messages.php' ?>

            <div class="type_msg">
                <div class="input_msg_write">
                    <form method="post" action="/send-message">
                        <input type="text" class="write_msg" placeholder="Type a message"/>
                        <button class="msg_send_btn">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <?php include __DIR__ . '/_people.php' ?>
    </div>
</div>

</body>
</html>
