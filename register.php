<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string(
        $conn,
        md5($_POST['password'])
    );
    $cpass = mysqli_real_escape_string(
        $conn,
        md5($_POST['cpassword'])
    );
    $user_type = $_POST['user_type'];
    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE
email = '$email' AND password = '$pass'") or die('query failed');
    if (mysqli_num_rows($select_users) > 0) {
        $message[] = 'user already exist!';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm password not matched!';
        } else {
            mysqli_query($conn, "INSERT INTO `users`(name, email,
password, user_type) VALUES('$name', '$email', '$cpass',
'$user_type')") or die('query failed');
            $message[] = 'registered successfully!';
            header('location:index.php');
        }
    }
}
?>
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