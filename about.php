<?php
include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="heading">
        <h3>about us</h3>
        <p><a href="home.php">home</a> / about</p>
    </div>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="images/about-img.jpg" alt="">
            </div>
            <div class="content">
                <h3>why choose us?</h3>
                <p>kami menyediakan solusi hardware terbaik yang dirancang untuk memenuhi kebutuhan teknologi Anda. Kami
                    memastikan bahwa Anda mendapatkan produk-produk berkualitas tinggi yang tersedia di pasaran. Layanan
                    pelanggan kami berdedikasi dan berpengetahuan, siap membantu Anda di setiap langkah. Pilih CoreTI
                    untuk keandalan, inovasi, dan kualitas unggul, memastikan teknologi Anda selalu berfungsi dengan
                    optimal. 🚀✨</p>
                <a href="contact.php" class="btn">contact us</a>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h1 class="title">client's reviews</h1>
        <div class="box-container">
            <div class="box">
                <img src="images/pic-1.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam, Dabit ei nomen amicitiae, cuius hoc scito est, et animum et corpus a se tale nullum desiderare.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
            </div>
            <div class="box">
                <img src="images/pic-2.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam, Dabit ei nomen amicitiae, cuius hoc scito est, et animum et corpus a se tale nullum desiderare.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
            </div>
            <div class="box">
                <img src="images/pic-3.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam, Dabit ei nomen amicitiae, cuius hoc scito est, et animum et corpus a se tale nullum desiderare.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>john deo</h3>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
</body>

</html>