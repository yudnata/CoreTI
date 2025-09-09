<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
if (isset($_POST['update_cart'])) {
    $cart_id = $_POST['cart_id'];
    $cart_quantity = $_POST['cart_quantity'];
    mysqli_query($conn, "UPDATE `cart` SET quantity =
'$cart_quantity' WHERE id = '$cart_id'") or die('query failed');
    $message[] = 'cart quantity updated!';
}
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id =
'$delete_id'") or die('query failed');
    header('location:cart.php');
}
if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id =
'$user_id'") or die('query failed');
    header('location:cart.php');
}

?>
<?php include 'header.php'; ?>

<?php
$grand_total = 0;
$select_cart = mysqli_query($conn, "SELECT * FROM `cart`

WHERE user_id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select_cart) > 0) {
    while ($fetch_cart =
        mysqli_fetch_assoc($select_cart)
    ) {

?>
        <div class="box">
            <a href="cart.php?delete=<?php echo
                                        $fetch_cart['id']; ?>" class="fas fa-times" onclick="return
confirm('delete this from cart?');"></a>

            <img src="uploaded_img/<?php echo

                                    $fetch_cart['image']; ?>" alt="">

            <div class="name"><?php echo

                                $fetch_cart['name']; ?></div>

            <div class="price">Rp. <?php echo
                                    number_format($fetch_cart['price'], 0, ',', '.'); ?></div>
            <form action="" method="post">
                <input type="hidden" name="cart_id"

                    value="<?php echo $fetch_cart['id']; ?>">

                <input type="number" min="1"

                    name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                <input type="submit" name="update_cart"

                    value="update" class="option-btn">
            </form>
            <div class="sub-total"> sub total :

                <span>Rp. <?php echo number_format($sub_total =
                                ($fetch_cart['quantity'] * $fetch_cart['price']), 0, ',', '.');
                            ?></span>
            </div>

        </div>
<?php
        $grand_total += $sub_total;
    }
} else {
    echo '<p class="empty">your cart is empty</p>';
}
?>

<div style="margin-top: 2rem; text-align:center;">

    <a href="cart.php?delete_all" class="delete-btn <?php
                                                    echo ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return
confirm('delete all from cart?');">delete all</a>
</div>
<div class="cart-total">
    <p>grand total : <span>Rp. <?php echo
                                number_format($grand_total, 0, ',', '.'); ?></span></p>

    <div class="flex">
        <a href="shop.php" class="option-btn">continue

            shopping</a>

        <a href="checkout.php" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>

    </div>
</div>

</section>
<?php include 'footer.php'; ?>