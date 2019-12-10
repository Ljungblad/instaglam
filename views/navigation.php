<nav>
    <ul>

        <li>
        <a href="/index.php">Home</a>
        </li>

        <li>
            <a href="/login.php">Login</a>
        </li>

        <?php if (isset($_SESSION['user'])): ?>
            <li>
                <a href="/profile.php">Profile</a>
            </li>
        <?php endif; ?>

        <?php if (isset($_SESSION['user'])): ?>
            <li>
                <a href="/app/users/logout.php">Logout</a>
            </li>
        <?php endif; ?>

    </ul>
</nav>