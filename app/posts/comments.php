<?php

declare(strict_types=1);

require __DIR__ .'/../autoload.php';


if (isset($_POST['comment'], $_POST['post-id'])) {
    $comment = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

    $postId = filter_var($_POST['post-id'], FILTER_SANITIZE_STRING);

    $date = date('Y-m-d H:i:s');

    $user = (int) $_SESSION['user']['id'];

    $statement = $pdo->prepare('INSERT INTO comments (post_id, comment_by, comment, date)
    VALUES (:post_id, :comment_by, :comment, :date)');

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute([
        ':post_id'    => $postId,
        ':comment_by' => $user,
        ':comment'    => $comment,
        ':date'       => $date,
    ]);
}

redirect('/../../feed.php');
