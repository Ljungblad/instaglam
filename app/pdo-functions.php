<?php

declare(strict_types=1);

/**
 * Collects the username from the database
 *
 * @param string $username
 * @param object $pdo
 * @return array
 */
function getUserByUsername(string $username, object $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
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
 * @param object $pdo
 * @return array
 */
function getUserByEmail(string $email, object $pdo): array
{
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        return $user;
    }

    return $user = [];

}


// TODO: implement this function on the page
/**
 * Collects the id from the database
 *
 * @param string $id
 * @param string $pdo
 * @return array
 */
// function getUserById(string $id, string $pdo = 'sqlite:app/database/database.db'): array
// {
//     $pdo = New PDO($pdo);
//     $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
//     $statement->bindParam(':id', $id, PDO::PARAM_STR);
//     $statement->execute();
//     $user = $statement->fetch(PDO::FETCH_ASSOC);
//     if ($user) {
//         return $user;
//     }
//     return $user = [];

// }


// TODO: REMOVE THIS FUNCTION WHEN THE ONE ABSOVE WORKS
/**
 * Undocumented function
 *
 * @param string $id
 * @param object $pdo
 * @return array
 */
function getUserById(string $id, object $pdo): array
{

    $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        return $user;
    }
    return $user = [];

}
