<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isLoggedIn()) {
    redirect('/');
}

// Checking if the like button is submited and delete the like from the database
if (isset($_POST['post_id'])) {
    $userId = (int) $_SESSION['user']['id'];
    $postId = (int) filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);

    $statement = $pdo->prepare('DELETE FROM likes WHERE user_id = :user_id AND post_id = :post_id');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->execute([
        ':user_id' => $userId,
        ':post_id' => $postId,
        ]);

    // Returns the number of likes on the current post
    $likes = countLikes($postId, $pdo);
    $likes = json_encode($likes);
    header('Content-Type: application/json');
    echo $likes;
}
