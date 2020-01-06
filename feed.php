<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php'; ?>
<?php $user = getUserById($_SESSION['user']['id'], $pdo); ?>

<article>
    <h1>Feed</h1>
    <p>This is the feed page.</p>
    <?php require __DIR__.'/views/error.php'; ?>
    <?php require __DIR__.'/views/success.php'; ?>
    <a href="/create-post.php"><p>Create New Post</p></a>
</article>

<?php foreach (getAllPosts($pdo) as $post): ?>
<?php $likes = countLikes($post['post_id'], $pdo); ?>
    <article class="feed-post-article">
        <div class="post-wrapper">

            <div class="post-creator">
                <img class="post-profile-picture" src="<?php echo '/uploads/'.$post['profile_avatar']; ?>">
                <a href="#"><h3 class="post-username"><?php echo $post['username']; ?></h3></a>
                <?php if (isOwnerOfPost($post['user_id'], $user['id'])): ?>
                    <a href="<?php echo '/edit-post.php?post_id='.$post['post_id']; ?>"><p class="link-edit-post">Edit</p></a>
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
                <?php if (!likedPost($user['id'], $post['post_id'], $pdo)): ?>
                    <form method="post" class="post-like-form">
                        <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                        <button class="like-btn" type="submit">Like</button>
                    </form>
                <?php else: ?>
                    <form method="post" class="post-unlike-form">
                        <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                        <button class="unlike-btn" type="submit">Unlike</button>
                    </form>
                <?php endif; ?>
            </div>

        </div>
    </article>
<?php endforeach; ?>

<script src="assets/scripts/like.js"></script>
<script src="assets/scripts/unlike.js"></script>
<?php require __DIR__.'/views/footer.php'; ?>
