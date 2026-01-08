<section class="dashboard">
    <h1 class="title">dashboard</h1>
    <div class="box-container">
        <div class="box">
            <h3><?= formatPrice($stats['total_pendings']) ?></h3>
            <p>total pendings</p>
        </div>
        <div class="box">
            <h3><?= formatPrice($stats['total_completed']) ?></h3>
            <p>completed payments</p>
        </div>
        <div class="box">
            <h3><?= $stats['total_orders'] ?></h3>
            <p>order placed</p>
        </div>
        <div class="box">
            <h3><?= $stats['total_products'] ?></h3>
            <p>products added</p>
        </div>
        <div class="box">
            <h3><?= $stats['total_users'] ?></h3>
            <p>normal users</p>
        </div>
        <div class="box">
            <h3><?= $stats['total_admins'] ?></h3>
            <p>admin users</p>
        </div>
        <div class="box">
            <h3><?= $stats['total_accounts'] ?></h3>
            <p>total accounts</p>
        </div>
        <div class="box">
            <h3><?= $stats['total_messages'] ?></h3>
            <p>new messages</p>
        </div>
    </div>
</section>