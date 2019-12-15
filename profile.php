<?php
require_once __DIR__.'/app/autoload.php';
require __DIR__.'/views/login-wall.php';
?>

<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Profile</h1>
    <p>This is the profile page.</p>

    <?php require __DIR__.'/views/error.php'; ?>
    <?php require __DIR__.'/views/success.php'; ?>

    <div class="account-information">
        <h3>Biography</h3>
        <p><?php echo $_SESSION['user']['biography'] ?></p>
        <h3>Email</h3>
        <p><?php echo $_SESSION['user']['email'] ?></p>
        <a href="/account.php"><p>Account settings</p></a>
    </div>

</article>

<?php require __DIR__.'/views/footer.php'; ?>
