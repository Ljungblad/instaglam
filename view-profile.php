<?php
require __DIR__.'/views/header.php';
require __DIR__.'/views/login-wall.php';

if (!profileExist($_GET['user_id'], $pdo)) {
    redirect('/views/404.php');
}

$loggedInUserId = $_SESSION['user']['id'];
$user = getUserById($_GET['user_id'], $pdo);
$profileId = $_GET['user_id'];
?>

<div class="profile-wrapper">
    <article class="profile-top-section">
        <div class="profile-picture">
            <img src="<?php echo '/uploads/'.$user['profile_avatar'] ?>" alt="profile picture" loading="lazy">
        </div>
    </article>


    <article class="profile-username-wrapper">
        <div class="profile-username-settings">
            <h1 class="profile-username"><?php echo $user['username'] ?></h1>
            <?php if (isOwnerOfProfile($user['id'], $loggedInUserId)) { ?>
                <a href="/account.php"><img src="/icons/settings.svg" alt="Settings" loading="lazy"></a>
                <a href="/app/users/logout.php"><img src="/icons/logout.svg" alt="Logout" loading="lazy"></a>
            <?php } ?>
        </div>
        <p class="profile-biography-description"><?php echo $user['biography'] ?></p>
    </article>


    <?php $followers = followers($profileId, $pdo) ?>
    <p class="followers">Followers: <?php echo $followers ?></p>

    <?php $following = following($profileId, $pdo) ?>
    <p>Following: <?php echo $following ?> </p>

    <?php if ($_SESSION['user']['id'] !== $profileId) { ?>

        <form class="following" action="app/users/follow.php" method="post">

            <input type="hidden" name="profile" value="<?php echo $profileId ?> ">

            <button class="follow-btn" type="submit">

                <?php if (isFollowing($_SESSION['user']['id'], $profileId, $pdo)) { ?>

                    Unfollow

                <?php } else {   ?>
                    Follow

                <?php } ?>

            </button>
        </form>

    <?php } ?>


    <div class="profile-posts">
        <?php foreach (getAllUsersPosts($user['id'], $pdo) as $post) { ?>
            <div class="profile-post-image">
                <a href="<?php echo '/view-post.php?post_id='.$post['post_id'] ?>"><img src="<?php echo '/uploads/'.$post['image']; ?>" alt="post image" loading="lazy"></a>
            </div>
        <?php } ?>
    </div>

</div>

<?php require __DIR__.'/views/footer.php'; ?>