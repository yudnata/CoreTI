<?php
include 'config.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}
$admin_id = $_SESSION['admin_id'];

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM `message` WHERE id = ?");
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    header('Location: admin_contacts.php');
    exit();
}

include 'admin_header.php';

$select_message = $conn->query("SELECT * FROM `message`") or die('query failed');

if ($select_message->num_rows > 0) {
    while ($fetch_message = $select_message->fetch_assoc()) { ?>
        <div class="box">
            <p>name: <span><?= $fetch_message['name']; ?></span></p>
            <p>number: <span><?= $fetch_message['number']; ?></span></p>
            <p>email: <span><?= $fetch_message['email']; ?></span></p>
            <p>message: <span><?= $fetch_message['message']; ?></span></p>
            <a href="admin_contacts.php?delete=<?= $fetch_message['id']; ?>" onclick="return confirm('delete this message?');" class="delete-btn">delete message</a>
        </div>
<?php }
} else {
    echo '<p class="empty">you have no messages!</p>';
}
?>