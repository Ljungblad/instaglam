<?php
    require __DIR__.'/views/header.php';
    require __DIR__.'/views/login-wall.php';
    $user = getUserById($_SESSION['user']['id'], $pdo);
?>

<div class="profile-wrapper">
    <article class="profile-top-section">
        <div class="profile-picture">
            <img src="<?php echo "/uploads/".$user['profile_avatar'] ?>" alt="profile picture" loading="lazy">
        </div>
    </article>


    <article class="profile-username-wrapper">
        <div class="profile-username-settings">
            <h1 class="profile-username"><?php echo $user['username'] ?></h1>
            <a href="/account.php"><img src="/icons/settings.svg" alt="Settings" loading="lazy"></a>
        </div>
        <p class="profile-biography-description"><?php echo $user['biography'] ?></p>
    </article>

    <div class="profile-posts">
        <?php foreach (getAllUsersPosts($user['id'], $pdo) as $post): ?>
            <div class="profile-post-image">
                <a href="<?php echo '/view-post.php?post_id='.$post['post_id'] ?>"><img src="<?php echo '/uploads/'.$post['image']; ?>" alt="post image" loading="lazy"></a>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php require __DIR__.'/views/footer.php'; ?>
