<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Login</h1>

    <?php require __DIR__.'/views/error.php'; ?>

    <form action="app/users/login.php" method="post">
        <div class="login-form">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Username" required>
            <small>Please enter your username.</small>
        </div>

        <div class="login-form">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <small>Please enter your password.</small>
        </div>

        <button type="submit">Login</button>
    </form>

    <a href="/registration.php"><p>Not registered yet?</p></a>

</article>

<?php require __DIR__.'/views/footer.php'; ?>
