<?php require __DIR__.'/views/header.php'; ?>
<?php require __DIR__.'/views/login-wall.php'; ?>

<article class="create-post-article">
    <h1 class="create-post-header">Create new post</h1>
    <?php require __DIR__.'/views/error.php'; ?>
    <form class="create-post-form" action="app/posts/store.php" method="POST" enctype="multipart/form-data">
            <label class="create-post-label" for="post_image">Choose image</label>
            <div class="upload-btn-wrapper">
                <button class="upload-btn"><img class="create-post-upload-icon" src="/icons/folder.svg"><p>Add image</p></button>
                <input class="create-post-input" type="file" name="post_image">
            </div>
            <label class="create-post-label" for="post_content">Please enter your description</label>
            <textarea class="create-post-textarea" type="text" name="post_content" rows="8" cols="40" required></textarea>
            <button class="create-post-button" type="submit">Upload post</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
