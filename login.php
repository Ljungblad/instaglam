<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Login</h1>

    <?php require __DIR__.'/views/error.php'; ?>

    <form action="app/users/login.php" method="post">
        <div class="login-form">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter your username" required>
        </div>

        <div class="login-form">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
        </div>

        <button class="login-btn" type="submit">Login</button>
    </form>

    <div class="sign-up-container">
        <p>Not registered yet?</p>
        <a href="/registration.php"><p class="sign-up-link">SIGN UP</p></a>
    </div>

</article>

<?php require __DIR__.'/views/footer.php'; ?>
