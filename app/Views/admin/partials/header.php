<?php $admin = currentUser(); ?>

<header class="header">
    <div class="flex">
        <a href="<?= url('/admin') ?>" class="logo">Admin<span>Panel</span></a>
        <nav class="navbar">
            <a href="<?= url('/admin') ?>">home</a>
            <a href="<?= url('/admin/products') ?>">products</a>
            <a href="<?= url('/admin/orders') ?>">orders</a>
            <a href="<?= url('/admin/users') ?>">users</a>
            <a href="<?= url('/admin/messages') ?>">messages</a>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>
        <div class="account-box">
            <?php if ($admin): ?>
                <p>username : <span><?= e($admin['name']) ?></span></p>
                <p>email : <span><?= e($admin['email']) ?></span></p>
            <?php endif; ?>
            <a href="<?= url('/logout') ?>" class="delete-btn">logout</a>
            <div>new <a href="<?= url('/login') ?>">login</a> | <a href="<?= url('/register') ?>">register</a></div>
        </div>
    </div>
</header>