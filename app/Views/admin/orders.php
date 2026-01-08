<section class="orders">
    <h1 class="title">placed orders</h1>
    <div class="box-container">
        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
                <div class="box">
                    <p>user id : <span><?= $order['user_id'] ?></span></p>
                    <p>placed on : <span><?= e($order['placed_on']) ?></span></p>
                    <p>name : <span><?= e($order['name']) ?></span></p>
                    <p>number : <span><?= e($order['number']) ?></span></p>
                    <p>email : <span><?= e($order['email']) ?></span></p>
                    <p>address : <span><?= e($order['address']) ?></span></p>
                    <p>total products : <span><?= e($order['total_products']) ?></span></p>
                    <p>total price : <span><?= formatPrice($order['total_price']) ?></span></p>
                    <p>payment method : <span><?= e($order['method']) ?></span></p>
                    <form action="<?= url('/admin/orders/update') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                        <select name="update_payment">
                            <option value="" selected disabled><?= e($order['payment_status']) ?></option>
                            <option value="pending">pending</option>
                            <option value="completed">completed</option>
                        </select>
                        <input type="submit" value="update" name="update_order" class="option-btn">
                        <a href="<?= url('/admin/orders/delete/' . $order['id']) ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty">no orders placed yet!</p>
        <?php endif; ?>
    </div>
</section>