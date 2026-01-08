<div class="heading">
    <h3>our shop</h3>
    <p><a href="<?= url('/home') ?>">home</a> / shop</p>
</div>

<section class="products">
    <h1 class="title">latest products</h1>
    <div class="box-container">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <form action="<?= url('/cart/add') ?>" method="post" class="box">
                    <?= csrf_field() ?>
                    <img class="image" src="<?= asset('uploads/' . e($product['image'])) ?>" alt="<?= e($product['name']) ?>">
                    <div class="name"><?= e($product['name']) ?></div>
                    <div class="price"><?= formatPrice($product['price']) ?></div>
                    <input type="number" min="1" name="product_quantity" value="1" class="qty">
                    <input type="hidden" name="product_name" value="<?= e($product['name']) ?>">
                    <input type="hidden" name="product_price" value="<?= $product['price'] ?>">
                    <input type="hidden" name="product_image" value="<?= e($product['image']) ?>">
                    <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                </form>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty">no products added yet!</p>
        <?php endif; ?>
    </div>
</section>