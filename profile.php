<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php'; ?>
<?php $user = getUserById($_SESSION['user']['id'], $pdo) ?>

<div class="profile-wrapper">
    <article>
        <h1>Profile</h1>
        <p>This is the profile page.</p>
        <div class="profile-picture">
        <img src="<?php echo "/uploads/".$user['profile_avatar'] ?>" alt="" width="400">
        </div>
    </article>

    <article class="image-form">

        <?php require __DIR__.'/views/error.php'; ?>
        <?php require __DIR__.'/views/success.php'; ?>

        <form action="app/users/upload-profile-picture.php" method="POST" enctype="multipart/form-data">
            <label for="profile_picture">Edit your profile picture</label>
            <input type="file" name="profile_picture">
            <button type="submit">Upload profile picture</button>
        </form>
    </article>

    <article>
            <h3>Biography</h3>
            <p><?php echo $user['biography'] ?></p>
            <h3>Email</h3>
            <p><?php echo $user['email'] ?></p>
            <a href="/account.php"><p>Account settings</p></a>
    </article>

</div>

<?php require __DIR__.'/views/footer.php'; ?>
