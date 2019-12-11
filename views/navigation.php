<nav>
    <ul>

        <li>
        <a href="/index.php">Home</a>
        </li>

        <li>
        <a href="/about.php">About</a>
        </li>

        <?php if (!isLoggedIn()): ?>
            <li>
                <a href="/login.php">Login</a>
            </li>
        <?php endif; ?>

        <?php if (!isLoggedIn()): ?>
            <li>
                <a href="/registration.php">Registration</a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li>
                <a href="/feed.php">Feed</a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li>
                <a href="/profile.php">Profile</a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li>
                <a href="/app/users/logout.php">Logout</a>
            </li>
        <?php endif; ?>

    </ul>
</nav>
