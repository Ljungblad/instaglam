<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>Register</h1>

    <form action="app/users/registration.php" method="post">
        <div class="registration-form">
            <label for="name">Name</label>
            <input type="name" name="name" required>
            <small>Please enter your full name.</small>
        </div>

        <div class="registration-form">
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="your@email.com" required>
            <small>Please enter your email adress.</small>
        </div>

        <div class="registration-form">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="password" required>
            <small>Please provide the your password (passphrase).</small>
        </div>

        <button type="submit">Register</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>