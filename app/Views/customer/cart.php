<div class="heading">
    <h3>shopping cart</h3>
    <p><a href="<?= url('/home') ?>">home</a> / cart</p>
</div>

<section class="shopping-cart">
    <h1 class="title">products added</h1>
    <div class="box-container">
        <?php
        $grandTotal = 0;
        if (!empty($cartItems)):
            foreach ($cartItems as $item):
                $subTotal = $item['quantity'] * $item['price'];
                $grandTotal += $subTotal;
        ?>
                <div class="box">
                    <a href="<?= url('/cart/delete/' . $item['id']) ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
                    <img src="<?= asset('uploads/' . e($item['image'])) ?>" alt="">
                    <div class="name"><?= e($item['name']) ?></div>
                    <div class="price"><?= formatPrice($item['price']) ?></div>
                    <form action="<?= url('/cart/update') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="cart_id" value="<?= $item['id'] ?>">
                        <input type="number" min="1" name="cart_quantity" value="<?= $item['quantity'] ?>">
                        <input type="submit" name="update_cart" value="update" class="option-btn">
                    </form>
                    <div class="sub-total">sub total : <span><?= formatPrice($subTotal) ?></span></div>
                </div>
            <?php
            endforeach;
        else:
            ?>
            <p class="empty">your cart is empty</p>
        <?php endif; ?>
    </div>

    <div style="margin-top: 2rem; text-align:center;">
        <a href="<?= url('/cart/clear') ?>" class="delete-btn <?= ($grandTotal > 1) ? '' : 'disabled' ?>" onclick="return confirm('delete all from cart?');">delete all</a>
    </div>

    <div class="cart-total">
        <p>grand total : <span><?= formatPrice($grandTotal) ?></span></p>
        <div class="flex">
            <a href="<?= url('/shop') ?>" class="option-btn">continue shopping</a>
            <a href="<?= url('/checkout') ?>" class="btn <?= ($grandTotal > 1) ? '' : 'disabled' ?>">proceed to checkout</a>
        </div>
    </div>
</section>