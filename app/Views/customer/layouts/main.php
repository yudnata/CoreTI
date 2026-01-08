<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title ?? 'CoreTI') ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>

<body>
    <?= flashMessages() ?>

    <?php include __DIR__ . '/../partials/header.php'; ?>

    <?= $content ?>

    <?php include __DIR__ . '/../partials/footer.php'; ?>

    <script src="<?= asset('js/script.js') ?>"></script>
</body>

</html>