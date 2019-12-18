<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php'; ?>

<article>
    <h1>Create your post</h1>
</article>

<article>
    <?php require __DIR__.'/views/error.php'; ?>
    <form action="app/posts/store.php" method="POST" enctype="multipart/form-data">
            <label for="post_image">Choose image</label>
            <input type="file" name="post_image" required>
            <label for="post_content">Please enter your content</label>
            <textarea type="text" name="post_content" rows="8" cols="40" required></textarea>
            <button type="submit">Upload post</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
