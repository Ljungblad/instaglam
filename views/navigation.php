<nav>
    <ul class="nav-ul">

        <li class="nav-li">
        <a href="/index.php"><img class="nav-img" src="/icons/home.svg" alt="Home"></a>
        </li>

        <?php if (!isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/login.php"><img class="nav-img" src="/icons/login.svg" alt="Login"></a>
            </li>
        <?php endif; ?>

        <?php if (!isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/registration.php"><img class="nav-img" src="/icons/register.svg" alt="Registration"></a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/feed.php"><img class="nav-img" src="/icons/feed.svg" alt="Feed"></a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/create-post.php"><img class="nav-img" src="/icons/new-post.svg" alt="Create new post"></a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/profile.php"><img class="nav-img" src="/icons/profile.svg" alt="Profile"></a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/app/users/logout.php"><img class="nav-img" src="/icons/logout.svg" alt="Logout"></a>
            </li>
        <?php endif; ?>

    </ul>
</nav>
