<div class="heading">
    <h3>checkout</h3>
    <p><a href="<?= url('/home') ?>">home</a> / checkout</p>
</div>

<section class="display-order">
    <h3 class="title">your order summary</h3>
    <?php
    $grandTotal = 0;
    if (!empty($cartItems)):
        foreach ($cartItems as $item):
            $totalPrice = $item['price'] * $item['quantity'];
            $grandTotal += $totalPrice;
    ?>
            <p><?= e($item['name']) ?> <span>(Rp <?= number_format($item['price']) ?>/- x <?= $item['quantity'] ?>)</span></p>
        <?php
        endforeach;
    else:
        ?>
        <p class="empty">your cart is empty</p>
    <?php endif; ?>
    <div class="grand-total">Grand Total : <span>Rp <?= number_format($grandTotal) ?>/-</span></div>
</section>

<section class="checkout">
    <form action="<?= url('/checkout') ?>" method="post">
        <?= csrf_field() ?>
        <h3>place your order</h3>
        <div class="flex">
            <div class="inputBox">
                <span>your name :</span>
                <input type="text" name="name" required placeholder="enter your name">
            </div>
            <div class="inputBox">
                <span>your number :</span>
                <input type="number" name="number" required placeholder="enter your number">
            </div>
            <div class="inputBox">
                <span>your email :</span>
                <input type="email" name="email" required placeholder="enter your email">
            </div>
            <div class="inputBox">
                <span>payment method :</span>
                <select name="method">
                    <option value="cash on delivery">cash on delivery</option>
                    <option value="credit card">credit card</option>
                    <option value="paypal">paypal</option>
                    <option value="gopay">gopay</option>
                </select>
            </div>
            <div class="inputBox">
                <span>address line 01 :</span>
                <input type="text" name="flat" required placeholder="e.g. house number">
            </div>
            <div class="inputBox">
                <span>address line 02 :</span>
                <input type="text" name="street" required placeholder="e.g. street name">
            </div>
            <div class="inputBox">
                <span>city :</span>
                <input type="text" name="city" required placeholder="e.g. denpasar">
            </div>
            <div class="inputBox">
                <span>state :</span>
                <input type="text" name="state" required placeholder="e.g. bali">
            </div>
            <div class="inputBox">
                <span>country :</span>
                <input type="text" name="country" required placeholder="e.g. indonesia">
            </div>
            <div class="inputBox">
                <span>pin code :</span>
                <input type="number" min="0" name="pin_code" required placeholder="e.g. 80227">
            </div>
        </div>
        <input type="submit" value="order now" class="btn" name="order_btn">
    </form>
</section>