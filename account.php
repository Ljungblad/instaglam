<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php';?>
<?php $user = getUserById($_SESSION['user']['id'], $pdo); ?>

<article>
    <h1>My Account Settings</h1>

    <?php require __DIR__.'/views/error.php'; ?>
    <?php require __DIR__.'/views/success.php'; ?>

    <form class="account-form" action="app/users/upload-profile-picture.php" method="POST" enctype="multipart/form-data">
        <label for="profile_picture">Edit your profile picture</label>
        <div class="upload-btn-wrapper">
            <button class="upload-btn"><i class="fas fa-folder-open"></i>Select a file</button>
            <input type="file" name="profile_picture">
        </div>
        <button class="account-btn" type="submit">Upload profile picture</button>
    </form>

    <form class="account-form" action="app/users/edit.php" method="post">

        <div class="account-form-content">
            <label class="biography-label" for="biography">Update your biography</label>
            <textarea type="text" name="biography"><?php echo $user['biography'] ?></textarea>
        </div>

        <button class="account-btn" type="submit" name="edit_biography">Update biography</button>
    </form>

    <form class="account-form" action="app/users/edit.php" method="post">

        <div class="account-form-content">
            <label class="account-label" for="email">Current email</label>
            <input class="account-input" type="email" name="email" value="<?php echo $user['email'] ?>" required>
        </div>

        <div class="account-form-content">
            <label class="account-label" for="new_email">New email</label>
            <input class="account-input" type="email" name="new_email" placeholder="Enter your new email" required?>
        </div>

        <button class="account-btn" type="submit" name="edit_email">Change email</button>
    </form>

    <form class="account-form" action="app/users/edit.php" method="post">

        <div class="account-form-content">
            <label class="account-label" for="current_password">Current password</label>
            <input class="account-input" type="password" name="current_password" placeholder="Enter your current pasword" required>
        </div>

        <div class="account-form-content">
            <label class="account-label" for="new_password">New password</label>
            <input class="account-input" type="password" name="new_password" placeholder="Enter your new password" required>
        </div>

        <div class="account-form-content">
            <label class="account-label" for="confirm_new_password">Confirm new password</label>
            <input class="account-input" type="password" name="confirm_new_password" placeholder="Confirm your new password" required>
        </div>

        <button class="account-btn" type="submit" name="edit_password">Change password</button>
    </form>

</article>

<?php require __DIR__.'/views/footer.php'; ?>
