<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php'; ?>
<?php
$user = getUserById($_SESSION['user']['id'], $pdo);
$post = getPostById($_GET['post'], $user['id'], $pdo);
?>


<article>
    <h1>Edit post</h1>
    <?php require __DIR__.'/views/error.php'; ?>
    <?php require __DIR__.'/views/success.php'; ?>
    <form action="app/posts/update.php" method="POST" enctype="multipart/form-data">
        <img src="<?php echo '/uploads/'.$post['image']; ?>" alt="">
        <label for="edit_post_image">Edit image</label>
        <input type="file" name="edit_post_image">
        <label for="edit_post_content">Edit content</label>
        <textarea type="text" name="post_content" rows="8" cols="40"><?php echo $post['content']; ?></textarea>
        <button type="submit">Update post</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
