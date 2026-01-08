<section class="messages">
    <h1 class="title">messages</h1>
    <div class="box-container">
        <?php if (!empty($messages)): ?>
            <?php foreach ($messages as $message): ?>
                <div class="box">
                    <p>user id : <span><?= $message['user_id'] ?></span></p>
                    <p>name : <span><?= e($message['name']) ?></span></p>
                    <p>number : <span><?= e($message['number']) ?></span></p>
                    <p>email : <span><?= e($message['email']) ?></span></p>
                    <p>message : <span><?= e($message['message']) ?></span></p>
                    <a href="<?= url('/admin/messages/delete/' . $message['id']) ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty">you have no messages!</p>
        <?php endif; ?>
    </div>
</section>