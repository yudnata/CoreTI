<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
<div class="message">
<span>' . $message . '</span>
<i class="fas fa-times"
onclick="this.parentElement.remove();"></i>
</div>
';
    }
}
?>
<?php

$select_cart_number = mysqli_query($conn, "SELECT *
FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

$cart_rows_number =
    mysqli_num_rows($select_cart_number);

?>
<a href="cart.php"> <i class="fas fa-shopping-cart"></i>

    <span>(<?php echo $cart_rows_number; ?>)</span> </a>
div class="user-box">

<p>username : <span><?php echo $_SESSION['user_name'];

                    ?></span></p>

<p>email : <span><?php echo $_SESSION['user_email'];

                    ?></span></p>

<a href="logout.php" class="delete-btn">logout</a>
</div>