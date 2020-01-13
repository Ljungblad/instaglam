<?php
    require __DIR__.'/views/header.php';
    require __DIR__.'/views/login-wall.php';

    if (!profileExist($_GET['user_id'], $pdo)) {
        redirect('/views/404.php');
    }

    $loggedInUserId = $_SESSION['user']['id'];
    $user = getUserById($_GET['user_id'], $pdo);
?>

<div class="profile-wrapper">
    <article class="profile-top-section">
        <div class="profile-picture">
            <img src="<?php echo "/uploads/".$user['profile_avatar'] ?>" alt="profile picture" width="400">
        </div>
    </article>


    <article>
        <div class="profile-username-settings">
            <h1 class="profile-username"><?php echo $user['username'] ?></h1>
            <?php if (isOwnerOfProfile($user['id'], $loggedInUserId)): ?>
            <a href="/account.php"><img src="/icons/settings.svg" alt="Settings"></a>
            <?php endif ?>
        </div>
        <p class="profile-biography-description"><?php echo $user['biography'] ?></p>
    </article>

    <div class="profile-posts">
        <?php foreach (getAllUsersPosts($user['id'], $pdo) as $post): ?>
            <div class="profile-post-image">
                <a href="<?php echo '/view-post.php?post_id='.$post['post_id'] ?>"><img src="<?php echo '/uploads/'.$post['image']; ?>" alt=""></a>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php require __DIR__.'/views/footer.php'; ?>
