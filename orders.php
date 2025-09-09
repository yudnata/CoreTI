<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['user_id'];
include 'header.php';

$stmt = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$order_query = $stmt->get_result();

if ($order_query->num_rows > 0) {
    while ($fetch_orders = $order_query->fetch_assoc()) { ?>
        <div class="box">
            <p>placed on: <span><?= $fetch_orders['placed_on']; ?></span></p>
            <p>name: <span><?= $fetch_orders['name']; ?></span></p>
            <p>number: <span><?= $fetch_orders['number']; ?></span></p>
            <p>email: <span><?= $fetch_orders['email']; ?></span></p>
            <p>address: <span><?= $fetch_orders['address']; ?></span></p>
            <p>payment method: <span><?= $fetch_orders['method']; ?></span></p>
            <p>your orders: <span><?= $fetch_orders['total_products']; ?></span></p>
            <p>total price: <span>Rp. <?= number_format($fetch_orders['total_price'], 0, ',', '.'); ?></span></p>
            <p>payment status: <span style="color:<?= $fetch_orders['payment_status'] == 'pending' ? 'red' : 'green'; ?>;"><?= $fetch_orders['payment_status']; ?></span></p>
        </div>
<?php }
} else {
    echo '<p class="empty">no orders placed yet!</p>';
}

include 'footer.php';
?>