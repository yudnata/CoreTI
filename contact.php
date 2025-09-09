<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
if (isset($_POST['send'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $msg = mysqli_real_escape_string($conn, $_POST['message']);
    $select_message = mysqli_query($conn, "SELECT * FROM `message`
WHERE name = '$name' AND email = '$email' AND number = '$number' AND
message = '$msg'") or die('query failed');
    if (mysqli_num_rows($select_message) > 0) {
        $message[] = 'message sent already!';
    } else {
        mysqli_query($conn, "INSERT INTO `message`(user_id, name,
email, number, message) VALUES('$user_id', '$name', '$email',
'$number', '$msg')") or die('query failed');
        $message[] = 'message sent successfully!';
    }
}
?>
<?php include 'header.php'; ?>
<?php include 'footer.php'; ?>