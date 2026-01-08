<div class="heading">
    <h3>contact us</h3>
    <p><a href="<?= url('/home') ?>">home</a> / contact</p>
</div>

<section class="contact">
    <form action="<?= url('/contact') ?>" method="post">
        <?= csrf_field() ?>
        <h3>say something!</h3>
        <input type="text" name="name" required placeholder="enter your name" class="box" value="<?= e(old('name')) ?>">
        <input type="email" name="email" required placeholder="enter your email" class="box" value="<?= e(old('email')) ?>">
        <input type="number" name="number" required placeholder="enter your number" class="box" value="<?= e(old('number')) ?>">
        <textarea name="message" class="box" placeholder="enter your message" cols="30" rows="10"><?= e(old('message')) ?></textarea>
        <input type="submit" value="send message" name="send" class="btn">
    </form>
</section>