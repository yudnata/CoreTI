<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? 'Login - CoreTI') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>

<body>
    <?= flashMessages() ?>

    <div class="form-container">
        <form action="<?= url('/login') ?>" method="post">
            <h3>Sign in</h3>
            <h2 class="logo">CoreTI</h2>
            <?= csrf_field() ?>
            <input type="email" name="email" placeholder="enter your email" required class="box" value="<?= e(old('email')) ?>">
            <input type="password" name="password" placeholder="enter your password" required class="box">
            <input type="submit" name="submit" value="login now" class="btn">
            <p>don't have an account? <a href="<?= url('/register') ?>">register now</a></p>
        </form>
    </div>

</body>

</html>