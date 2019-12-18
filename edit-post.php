<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php'; ?>
<?php $user = getUserById($_SESSION['user']['id'], $pdo); ?>


<article>
    <h1>Edit post</h1>

    <article>
    <?php require __DIR__.'/views/error.php'; ?>
    <?php require __DIR__.'/views/success.php'; ?>
    <form action="app/posts/update.php" method="POST" enctype="multipart/form-data">
            <label for="edit_post_image">Edit image</label>
            <input type="file" name="edit_post_image">
            <label for="edit_post_content">Edit content</label>
            <textarea type="text" name="post_content" rows="8" cols="40" required></textarea>
            <button type="submit">Upload post</button>
    </form>
</article>

    <form action="app/users/edit.php" method="post">

        <div class="account-form">
            <label for="email">Current email</label>
            <input type="email" name="email" value="<?php echo $user['email'] ?>" required>
            <small>Your current email.</small>
        </div>

        <div class="account-form">
            <label for="new_email">Enter new email</label>
            <input type="email" name="new_email" placeholder="New email" required?>
            <small>Please enter your new email.</small>
        </div>

        <button type="submit" name="edit_email">Update</button>
    </form>

    <form action="app/users/edit.php" method="post">

        <div class="account-form">
            <label for="current_password">Current password</label>
            <input type="password" name="current_password" placeholder="Current pasword" required>
            <small>Please submit your current password.</small>
        </div>

        <div class="account-form">
            <label for="new_password">New password</label>
            <input type="password" name="new_password" placeholder="New password" required>
            <small>Please submit your new password.</small>
        </div>

        <div class="account-form">
            <label for="confirm_new_password">Confirm new password</label>
            <input type="password" name="confirm_new_password" placeholder="Confirm new password" required>
        </div>

        <button type="submit" name="edit_password">Update</button>
    </form>

</article>

<?php require __DIR__.'/views/footer.php'; ?>
