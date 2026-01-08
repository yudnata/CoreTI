<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? 'Register - CoreTI') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>

<body>
    <?= flashMessages() ?>

    <div class="form-container">
        <form action="<?= url('/register') ?>" method="post">
            <h3>register now</h3>
            <?= csrf_field() ?>
            <input type="text" name="name" placeholder="enter your name" required class="box" value="<?= e(old('name')) ?>">
            <input type="email" name="email" placeholder="enter your email" required class="box" value="<?= e(old('email')) ?>">
            <input type="password" name="password" placeholder="enter your password" required class="box">
            <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
            <select name="user_type" class="box">
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register now" class="btn">
            <p>already have an account? <a href="<?= url('/login') ?>">login now</a></p>
        </form>
    </div>

</body>

</html>