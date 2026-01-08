<div class="heading">
    <h3>your orders</h3>
    <p><a href="<?= url('/home') ?>">home</a> / orders</p>
</div>

<section class="placed-orders">
    <h1 class="title">placed orders</h1>
    <div class="box-container">
        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
                <div class="box">
                    <p>placed on : <span><?= e($order['placed_on']) ?></span></p>
                    <p>name : <span><?= e($order['name']) ?></span></p>
                    <p>number : <span><?= e($order['number']) ?></span></p>
                    <p>email : <span><?= e($order['email']) ?></span></p>
                    <p>address : <span><?= e($order['address']) ?></span></p>
                    <p>payment method : <span><?= e($order['method']) ?></span></p>
                    <p>your orders : <span><?= e($order['total_products']) ?></span></p>
                    <p>total price : <span><?= formatPrice($order['total_price']) ?></span></p>
                    <p>payment status :
                        <span style="color:<?= ($order['payment_status'] == 'pending') ? 'red' : 'green' ?>;">
                            <?= e($order['payment_status']) ?>
                        </span>
                    </p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty">no orders placed yet!</p>
        <?php endif; ?>
    </div>
</section>