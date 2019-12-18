<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php'; ?>

<article>
    <h1>Feed</h1>
    <p>This is the feed page.</p>
    <a href="/create-post.php"><p>Create New Post</p></a>
</article>

<?php foreach (getAllPosts($pdo) as $post): ?>

    <article class="feed-post-article">

        <div class="post-wrapper">

            <div class="post-creator">
                <img class="post-profile-picture" src="<?php echo '/uploads/'.$post['profile_avatar']; ?>">
                <a href="#"><h3 class="post-username"><?php echo $post['username'] ?></h3></a>
            </div>

            <div class="post-content">
                <img src="<?php echo '/uploads/'.$post['image']; ?>" alt="">
                <p><?php echo $post['content']; ?></p>
            </div>

            <div class="post-likes">

            </div>

        </div>

    </article>

<?php endforeach; ?>


<?php require __DIR__.'/views/footer.php'; ?>
