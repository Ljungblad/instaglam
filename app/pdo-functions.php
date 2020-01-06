<?php

declare(strict_types=1);

/**
 * Collects the username from the database
 *
 * @param string $username
 * @param PDO $pdo
 * @return array
 */
function getUserByUsername(string $username, PDO $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        return $user;
    }
    return $user = [];
}

/**
 * Collects the email from the database
 *
 * @param string $email
 * @param PDO $pdo
 * @return array
 */
function getUserByEmail(string $email, PDO $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        return $user;
    }
    return $user = [];
}


/**
 * Collects the id from the database
 *
 * @param int $id
 * @param PDO $pdo
 * @return array
 */
function getUserById(int $id, PDO $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        return $user;
    }
    return $user = [];
}

/**
 * Collects all posts from the database
 *
 * @param PDO $pdo
 * @return array
 */
function getAllPosts(PDO $pdo): array
{
    $statement = $pdo->query('SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY date_created DESC');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

/**
 * Collects all posts from a specific user and all their user-information
 *
 * @param int $postId
 * @param int $userId
 * @param PDO $pdo
 * @return array
 */
function getPostById(int $postId, int $userId, PDO $pdo): array {
    $statement = $pdo->prepare('SELECT * FROM posts INNER JOIN users on posts.user_id = users.id WHERE id = :user_id AND post_id = :post_id');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':user_id', $userId, PDO::PARAM_STR);
    $statement->bindParam(':post_id', $postId, PDO::PARAM_STR);
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
    if ($post) {
        return $post;
    }
    return $post = [];
}

/**
 * Collect the name of the post image
 *
 * @param integer $userId
 * @param integer $postId
 * @param PDO $pdo
 * @return array
 */
function getImageNameById(int $userId, int $postId, PDO $pdo): array
{
    $statement = $pdo->prepare('SELECT image FROM posts WHERE user_id = :user_id AND post_id = :post_id');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->execute([
        ':user_id' => $userId,
        ':post_id' => $postId,
        ]);
    $currentPostImage = $statement->fetch(PDO::FETCH_ASSOC);
    return $currentPostImage;
}

/**
 * Counts the numbers of likes on a post
 *
 * @param integer $postId
 * @param PDO $pdo
 * @return integer
 */
function countLikes(int $postId, PDO $pdo): int
{
    $statement = $pdo->prepare('SELECT COUNT(*) FROM likes WHERE post_id = :post_id');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->execute([
        ':post_id' => $postId,
        ]);
    $likes = $statement->fetch(PDO::FETCH_ASSOC);
    return (int)$likes['COUNT(*)'];
}

/**
 * Checking if the post is liked or not
 *
 * @param integer $userId
 * @param integer $postId
 * @param PDO $pdo
 * @return boolean
 */
function likedPost(int $userId, int $postId, PDO $pdo): bool
{
    $statement = $pdo->prepare('SELECT * FROM likes WHERE user_id = :user_id AND post_id = :post_id');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->execute([
        ':user_id' => $userId,
        ':post_id' => $postId,
        ]);
    $like = $statement->fetch(PDO::FETCH_ASSOC);

    if ($like) {
        return true;
    } else {
        return false;
    }
}
