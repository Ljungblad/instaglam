<?php
require_once __DIR__.'/app/autoload.php';
require __DIR__.'/views/login-wall.php';

// TODO: Add function that get user infromation from the database
$user = getUserById($_SESSION['user']['id'], $pdo);

?>

<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>My Account Settings</h1>
    <p>Edit your profile.</p>

    <?php require __DIR__.'/views/error.php'; ?>
    <?php require __DIR__.'/views/success.php'; ?>

    <form action="app/users/edit.php" method="post">

        <div class="account-form">
            <label for="biography">Biography</label>
            <textarea type="text" name="biography" rows="8" cols="50"><?php echo $user['biography'] ?></textarea>

        </div>

        <button type="submit" name="edit_biography">Update</button>
    </form>

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
