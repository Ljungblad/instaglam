<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isLoggedIn()) {
    redirect('/');
}

//TODO: ADD FUNCTION THAT CHECKS THE OWNER OF THE POST WITH THE ID

// Checking if post id and password is set
if (isset($_GET['post_id'], $_POST['password'])) {
    $id = (int) $_SESSION['user']['id'];
    $user = getUserById($id, $pdo);
    $userId = (int) $user['id'];
    $postId = (int) filter_var($_GET['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $password = $_POST['password'];

    // Checking if the password is correct
    if (password_verify($password, $user['password'])) {
        unset($user['password']);

        // Removes the image from the uploads folder
        $currentPostImage = getImageNameById($userId, $postId, $pdo);
        unlink(__DIR__."/../../uploads/".$currentPostImage['image']);

        // Removes the post from the database
        $statement = $pdo->prepare('DELETE FROM posts WHERE post_id = :post_id AND user_id = :user_id');
        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }
        $statement->execute([
          ':post_id' => $postId,
          'user_id' => $userId,
        ]);
        $_SESSION['success'] = 'Your post was successfully deleted!';
        redirect('/../../feed.php');
    } else {
        $_SESSION['error'] = 'The password is not correct!';
    }
}
redirect('/../../edit-post.php?post_id='.$postId);
