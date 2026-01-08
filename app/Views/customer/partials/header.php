<header class="header">
    <div class="header-2">
        <div class="flex">
            <a href="<?= url('/home') ?>" class="logo">CoreTI</a>

            <nav class="navbar">
                <a href="<?= url('/home') ?>">home</a>
                <a href="<?= url('/about') ?>">about</a>
                <a href="<?= url('/shop') ?>">shop</a>
                <a href="<?= url('/contact') ?>">contact</a>
                <a href="<?= url('/orders') ?>">orders</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="<?= url('/search') ?>" class="fas fa-search"></a>
                <div id="user-btn" class="fas fa-user"></div>
                <a href="<?= url('/cart') ?>">
                    <i class="fas fa-shopping-cart"></i>
                    <span>(<?= $cartCount ?? 0 ?>)</span>
                </a>
            </div>

            <div class="user-box">
                <?php if (isLoggedIn()): ?>
                    <?php $user = currentUser(); ?>
                    <p>username : <span><?= e($user['name']) ?></span></p>
                    <p>email : <span><?= e($user['email']) ?></span></p>
                    <a href="<?= url('/logout') ?>" class="delete-btn">logout</a>
                <?php else: ?>
                    <p><span>Silakan login terlebih dahulu</span></p>
                    <a href="<?= url('/login') ?>" class="btn">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>