<?php require __DIR__ . '/views/header.php'; ?>
<article>

    <form action="search.php" method="get">

        <div>
            <label for="search">Search for users</label>
            <input class="form-control" type="text" name="search"> </input>
        </div>
        <button type="submit"> Search</button>
    </form>


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


                <!-- <?php if (isOwnerOfPost($user['user_id'], $user['id'])) : ?>
                    <a class="post-creator-edit-link" href="<?php echo '/edit-post.php?post_id=' . $post['post_id']; ?>"><img class="link-edit-post" src="/icons/edit.svg" alt="edit" loading="lazy"></a>
                <?php endif; ?> -->

            </div>
        <?php endforeach; ?>

    <?php endif; ?>



</article>


<?php require __DIR__ . '/views/footer.php'; ?>