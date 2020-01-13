<?php
    require __DIR__.'/views/header.php';
    require __DIR__.'/views/login-wall.php';
    $user = getUserById($_SESSION['user']['id'], $pdo); ?>

<article class="create-new-post-wrapper">
    <a href="/create-post.php"><button class="create-post-btn">Create new post</button></a>
    <?php require __DIR__.'/views/error.php'; ?>
    <?php require __DIR__.'/views/success.php'; ?>
</article>

<?php
    foreach (getAllPosts($pdo) as $post):
    $likes = countLikes($post['post_id'], $pdo);
    ?>
    <article class="feed-post-article">
        <div class="post-wrapper">

            <div class="post-creator">
                <img class="post-profile-picture" src="<?php echo '/uploads/'.$post['profile_avatar']; ?>">
                <a href="<?php echo '/view-profile.php?user_id='.$post['user_id'] ?>"><h3 class="post-username"><?php echo $post['username']; ?></h3></a>
                <?php if (isOwnerOfPost($post['user_id'], $user['id'])): ?>
                    <a class="post-creator-edit-link" href="<?php echo '/edit-post.php?post_id='.$post['post_id']; ?>"><img class="link-edit-post" src="/icons/edit.svg"></a>
                <?php endif; ?>
            </div>


            <div class="post-content">
                <img src="<?php echo '/uploads/'.$post['image']; ?>" alt="">
                <div class="feed-likes" >
                    <p class="like-count<?php echo $post['post_id'] ?>"><?php echo $likes; ?> likes</p>
                </div>
                <p><?php echo $post['content']; ?></p>
            </div>

            <div class="post-likes">
                    <form method="post" class="post-like-form">
                        <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                        <input type="hidden" name="action" value="<?php echo likedPost($user['id'], $post['post_id'], $pdo) ? 'liked' : 'unliked'; ?>">
                        <button class="like-btn" type="submit"><div class="<?php echo likedPost($user['id'], $post['post_id'], $pdo) ? 'like-img' : 'unlike-img'; ?>"></div></button>
                    </form>
            </div>

        </div>
    </article>
<?php endforeach; ?>

<?php require __DIR__.'/views/footer.php'; ?>
