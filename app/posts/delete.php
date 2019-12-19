<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isLoggedIn()) {
    redirect('/');
}

// DELETE FROM users WHERE id = :id AND user_id = :user_id;

//TODO: ADD FUNCTION THAT CHECKS THE OWNER OF THE POST WITH THE ID

if (isset($_GET['post_id'], $_POST['password'])) {
    $userId = $_SESSION['user']['id'];
    $postId = (int) filter_var($_GET['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $password = $_POST['password'];

    //TODO: IMPLEMENT REST OF THE SCRIPT
}
