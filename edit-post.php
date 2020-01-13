<?php
    require __DIR__.'/views/header.php';
    require __DIR__.'/views/login-wall.php';
    $user = getUserById($_SESSION['user']['id'], $pdo);
    $post = getPostById($_GET['post_id'], $user['id'], $pdo);

    if (!isOwnerOfPost(intval($post['user_id']), intval($user['id']))) {
        redirect('views/404.php');
    }
?>


<article class="edit-post-header">
    <h1 class="edit-post-h1">Edit post</h1>
    <?php require __DIR__.'/views/error.php'; ?>
    <?php require __DIR__.'/views/success.php'; ?>
</article>

<article>
    <form class="edit-post-form" action="<?php echo 'app/posts/update.php?post_id='.$post['post_id']; ?>" method="POST" enctype="multipart/form-data">
        <img class="edit-post-img" src="<?php echo '/uploads/'.$post['image']; ?>" alt="">
        <div class="edit-post-img-form">
            <label class="edit-post-label" for="edit_post_image">Edit image</label>
            <div class="upload-btn-wrapper">
                <button class="upload-btn"><img class="edit-post-upload-icon" src="/icons/folder.svg"><p>Select a file</p></button>
                <input type="file" name="edit_post_image">
            </div>
            <label class="edit-post-label" for="edit_post_content">Edit description</label>
            <textarea class="edit-post-textarea" type="text" name="edit_post_content" rows="8" cols="40"><?php echo $post['content']; ?></textarea>
            <button class="edit-post-btn" type="submit">Update post</button>
        </div>
    </form>
</article>

<article class="delete-post-form">
    <h2>Delete post</h2>
    <form class="edit-post-form" action="<?php echo 'app/posts/delete.php?post_id='.$post['post_id']; ?>" method="POST">
        <label class="edit-post-label" class="edit-post-label" for="password">Enter password to delete post</label>
        <input class="edit-post-input" type="password" name="password" placeholder="Password" required>
        <button class="edit-post-btn" type="submit">Delete post</button>
    </form>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
