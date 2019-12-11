<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Sign up</h1>

    <form action="app/users/registration.php" method="post">

        <div class="registration-form">
            <label for="username">Username</label>
            <input type="text" name="username" required>
            <small>Please enter your username.</small>
        </div>

        <div class="registration-form">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" required>
            <small>Please enter your first name.</small>
        </div>

        <div class="registration-form">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name">
            <small>Please enter your last name.</small>
        </div>

        <div class="registration-form">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="your@email.com" required>
            <small>Please enter your email adress.</small>
        </div>

        <div class="registration-form">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password" required>
            <small>Please enter your password.</small>
        </div>

        <div class="registration-form">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="password" required>
            <small>Confirm your password.</small>
        </div>

        <button type="submit">Sign up</button>

    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
