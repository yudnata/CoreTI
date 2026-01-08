<section class="users">
    <h1 class="title">user accounts</h1>
    <div class="box-container">
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <div class="box">
                    <p>user id : <span><?= $user['id'] ?></span></p>
                    <p>username : <span><?= e($user['name']) ?></span></p>
                    <p>email : <span><?= e($user['email']) ?></span></p>
                    <p>user type :
                        <span style="color:<?= ($user['user_type'] == 'admin') ? 'var(--orange)' : 'inherit' ?>">
                            <?= e($user['user_type']) ?>
                        </span>
                    </p>
                    <a href="<?= url('/admin/users/delete/' . $user['id']) ?>" onclick="return confirm('delete this user?');" class="delete-btn">delete user</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty">no users found!</p>
        <?php endif; ?>
    </div>
</section>