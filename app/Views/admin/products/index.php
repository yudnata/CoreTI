<section class="add-products">
    <h1 class="title">shop products</h1>
    <form action="<?= url('/admin/products/add') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <h3>add product</h3>
        <input type="text" name="name" class="box" placeholder="enter product name" required>
        <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
        <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
        <input type="submit" value="add product" name="add_product" class="btn">
    </form>
</section>

<section class="show-products">
    <div class="box-container">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="box">
                    <img src="<?= asset('uploads/' . e($product['image'])) ?>" alt="">
                    <div class="name"><?= e($product['name']) ?></div>
                    <div class="price"><?= formatPrice($product['price']) ?></div>
                    <a href="<?= url('/admin/products?update=' . $product['id']) ?>" class="option-btn">update</a>
                    <a href="<?= url('/admin/products/delete/' . $product['id']) ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="empty">no products added yet!</p>
        <?php endif; ?>
    </div>
</section>

<?php if (isset($updateProduct) && $updateProduct): ?>
    <section class="edit-product-form" style="display: block;">
        <form action="<?= url('/admin/products/update') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="update_p_id" value="<?= $updateProduct['id'] ?>">
            <input type="hidden" name="update_old_image" value="<?= e($updateProduct['image']) ?>">
            <img src="<?= asset('uploads/' . e($updateProduct['image'])) ?>" alt="">
            <input type="text" name="update_name" value="<?= e($updateProduct['name']) ?>" class="box" required placeholder="enter product name">
            <input type="number" name="update_price" value="<?= $updateProduct['price'] ?>" min="0" class="box" required placeholder="enter product price">
            <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
            <input type="submit" value="update" name="update_product" class="btn">
            <a href="<?= url('/admin/products') ?>" class="option-btn">cancel</a>
        </form>
    </section>
<?php endif; ?>