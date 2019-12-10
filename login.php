<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Login</h1>

    <form action="app/users/login.php" method="post">
        <div class="login-form">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="your@email.com" required>
            <small>Please enter your email adress.</small>
        </div>

        <div class="login-form">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password" required>
            <small>Please provide the your password (passphrase).</small>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>