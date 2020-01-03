<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php'; ?>
<?php $user = getUserById($_SESSION['user']['id'], $pdo) ?>

<div class="profile-wrapper">
    <article class="profile-top-section">
        <div class="profile-picture">
            <img src="<?php echo "/uploads/".$user['profile_avatar'] ?>" alt="profile picture" width="400">
        </div>
        <div class="number-of-posts">
            <p>3</p>
            <p>Posts</p>
        </div>
    </article>

    <h1 class="profile-username"><?php echo $user['username'] ?></h1>

    <article>
            <h3>Biography</h3>
            <p><?php echo $user['biography'] ?></p>
            <h3>Email</h3>
            <p><?php echo $user['email'] ?></p>
            <a href="/account.php"><p>Account settings</p></a>
    </article>

</div>

<?php require __DIR__.'/views/footer.php'; ?>
