<section class="home">
    <div class="content">
        <h3>Ultimate Hardware Solutions in Bali</h3>
        <p>Kami menyediakan berbagai komponen berkualitas tinggi, mulai dari prosesor mutakhir, kartu grafis, motherboard, hingga aksesori pendukung lainnya. Dengan koleksi yang terus diperbarui dan layanan pelanggan yang berdedikasi, CoreTI memastikan Anda mendapatkan pengalaman berbelanja yang mudah dan memuaskan. Dapatkan solusi hardware terbaik untuk meningkatkan kinerja dan produktivitas Anda hanya di CoreTI! 💻🔧✨</p>
        <a href="<?= url('/about') ?>" class="white-btn">discover more</a>
    </div>
</section>

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
    <div class="load-more" style="margin-top: 2rem; text-align:center">
        <a href="<?= url('/shop') ?>" class="option-btn">load more</a>
    </div>
</section>

<section class="about">
    <div class="flex">
        <div class="image">
            <img src="<?= asset('images/about-img.jpg') ?>" alt="">
        </div>
        <div class="content">
            <h3>about us</h3>
            <p>CoreTI menyediakan hardware berkualitas untuk kebutuhan teknologi Anda. Temukan prosesor, GPU, dan komponen komputer terbaik di sini. Upgrade teknologi Anda bersama CoreTI!</p>
            <a href="<?= url('/about') ?>" class="btn">read more</a>
        </div>
    </div>
</section>

<section class="home-contact">
    <div class="content">
        <h3>have any questions?</h3>
        <p>Kami di sini untuk membantu! Jelajahi dunia teknologi tanpa batas dengan CoreTI. Hubungi kami kapan saja, dan biarkan tim ahli kami membantu Anda menemukan solusi yang Anda butuhkan. 🚀✨</p>
        <a href="<?= url('/contact') ?>" class="white-btn">contact us</a>
    </div>
</section>