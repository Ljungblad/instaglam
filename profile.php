<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php'; ?>


<article>
    <h1>Profile</h1>
    <p>This is the profile page.</p>
    <img src="<?php echo "/uploads/".$_SESSION['user']['profile_avatar'] ?>" alt="" width="400">

    <?php require __DIR__.'/views/error.php'; ?>
    <?php require __DIR__.'/views/success.php'; ?>

    <form action="app/users/upload-profile-picture.php" method="POST" enctype="multipart/form-data">
        <label for="profile_picture">Edit your profile picture</label>
        <input type="file" name="profile_picture">
        <button type="submit">Upload profile picture</button>
    </form>

    <div class="account-information">
        <h3>Biography</h3>
        <p><?php echo $_SESSION['user']['biography'] ?></p>
        <h3>Email</h3>
        <p><?php echo $_SESSION['user']['email'] ?></p>
        <a href="/account.php"><p>Account settings</p></a>
    </div>

</article>

<?php require __DIR__.'/views/footer.php'; ?>
