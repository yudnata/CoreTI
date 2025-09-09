<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart`
WHERE name = '$product_name' AND user_id = '$user_id'") or
        die('query failed');
    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name,
price, quantity, image) VALUES('$user_id', '$product_name',
'$product_price', '$product_quantity', '$product_image')") or
            die('query failed');
        $message[] = 'product added to cart!';
    }
}
?>
<?php include 'header.php'; ?>
<?php
$select_products = mysqli_query($conn, "SELECT * FROM
`products`") or die('query failed');
if (mysqli_num_rows($select_products) > 0) {
    while ($fetch_products =
        mysqli_fetch_assoc($select_products)
    ) {

?>
        <form action="" method="post" class="box">
            <img class="image" src="uploaded_img/<?php echo

                                                    $fetch_products['image']; ?>" alt="">

            <div class="name"><?php echo

                                $fetch_products['name']; ?></div>

            <div class="price">Rp. <?php echo
                                    number_format($fetch_products['price'], 0, ',', '.'); ?></div>

            <input type="number" min="1"
                name="product_quantity" value="1" class="qty">

            <input type="hidden" name="product_name"

                value="<?php echo $fetch_products['name']; ?>">

            <input type="hidden" name="product_price"

                value="<?php echo $fetch_products['price']; ?>">

            <input type="hidden" name="product_image"

                value="<?php echo $fetch_products['image']; ?>">

            <input type="submit" value="add to cart"

                name="add_to_cart" class="btn">
        </form>
<?php
    }
} else {
    echo '<p class="empty">no products added yet!</p>';
}
?>
<?php include 'footer.php'; ?>