<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Sign up</h1>

    <?php require __DIR__.'/views/error.php'; ?>

    <form action="app/users/registration.php" method="post">

        <div class="registration-form">
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="registration-form">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" required>
        </div>

        <div class="registration-form">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name">
        </div>

        <div class="registration-form">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="ex: myname@example.com" required>
        </div>

        <div class="registration-form">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>

        <div class="registration-form">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button class="sign-up-btn" type="submit">Sign up</button>
    </form>

    <div class="login-link-container">
        <p>Already have an account?</p>
        <a href="/index.php"><p class="login-link">Login here</p></a>
    </div>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
