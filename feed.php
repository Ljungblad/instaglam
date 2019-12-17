<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php'; ?>

<article>
    <h1>Feed</h1>
    <p>This is the feed page.</p>
</article>

<?php foreach (getAllPosts($pdo) as $post): ?>
    <img src="<?php echo $post['image'] ?>" alt="">
    <p><?php echo $post['content'] ?></p>
<?php endforeach; ?>

<?php require __DIR__.'/views/footer.php'; ?>
