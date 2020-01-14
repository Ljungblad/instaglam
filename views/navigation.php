<nav>
    <ul class="nav-ul">

        <?php if (!isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/index.php"><img class="nav-img" src="/icons/home.svg" alt="Login" loading="lazy"></a>
            </li>
        <?php endif; ?>

        <?php if (!isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/registration.php"><img class="nav-img" src="/icons/register.svg" alt="Registration" loading="lazy"></a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/feed.php"><img class="nav-img" src="/icons/home.svg" alt="Home" loading="lazy"></a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/create-post.php"><img class="nav-img" src="/icons/new-post.svg" alt="Create new post" loading="lazy"></a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/profile.php"><img class="nav-img" src="/icons/profile.svg" alt="Profile" loading="lazy"></a>
            </li>
        <?php endif; ?>

        <?php if (isLoggedIn()): ?>
            <li class="nav-li">
                <a href="/app/users/logout.php"><img class="nav-img" src="/icons/logout.svg" alt="Logout" loading="lazy"></a>
            </li>
        <?php endif; ?>

    </ul>
</nav>
