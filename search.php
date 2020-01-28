<?php require __DIR__ . '/views/header.php'; ?>
<article class="search-page">

    <h1 class="search-h1">Search</h1>

    <form class="search-form" action="search.php" method="get">
        <div class="search-container">
            <label for="search">Search for users</label>
            <input id="search-txt" class="form-control" type="text" name="search"> </input>
        </div>
        <button class="search-btn" type="submit"> Search</button>
    </form>

    <ul id="search-result"></ul>

    <?php if (isset($_GET['search'])) : ?>
        <?php $users = getUserFromSearch($_GET['search'], $pdo); ?>

        <?php if (empty($users)) : ?>
            <p>We didn't find any users with that name.. try again!</p>
        <?php endif; ?>

        <?php foreach ($users as $user) : ?>

            <div class="post-creator">
                <img class="post-profile-picture" src="<?php echo '/uploads/' . $user['profile_avatar']; ?>" alt="profile picture" loading="lazy">
                <a href="<?php echo '/view-profile.php?user_id=' . $user['id'] ?>">
                    <h3 class="post-username"><?php echo $user['username']; ?></h3>
                </a>
            </div>
        <?php endforeach; ?>

    <?php endif; ?>



</article>


<?php require __DIR__ . '/views/footer.php'; ?>