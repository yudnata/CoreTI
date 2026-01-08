<div class="heading">
    <h3>search page</h3>
    <p><a href="<?= url('/home') ?>">home</a> / search</p>
</div>

<section class="search-form">
    <form action="<?= url('/search') ?>" method="post">
        <?= csrf_field() ?>
        <input type="text" name="search" placeholder="search products..." class="box" value="<?= e($keyword ?? '') ?>">
        <input type="submit" name="submit" value="search" class="btn">
    </form>
</section>

<section class="products" style="padding-top: 0;">
    <div class="box-container">
        <?php if ($searched ?? false): ?>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <form action="<?= url('/cart/add') ?>" method="post" class="box">
                        <?= csrf_field() ?>
                        <img src="<?= asset('uploads/' . e($product['image'])) ?>" alt="" class="image">
                        <div class="name"><?= e($product['name']) ?></div>
                        <div class="price"><?= formatPrice($product['price']) ?></div>
                        <input type="number" class="qty" name="product_quantity" min="1" value="1">
                        <input type="hidden" name="product_name" value="<?= e($product['name']) ?>">
                        <input type="hidden" name="product_price" value="<?= $product['price'] ?>">
                        <input type="hidden" name="product_image" value="<?= e($product['image']) ?>">
                        <input type="submit" class="btn" value="add to cart" name="add_to_cart">
                    </form>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="empty">no result found!</p>
            <?php endif; ?>
        <?php else: ?>
            <p class="empty">search something!</p>
        <?php endif; ?>
    </div>
</section>