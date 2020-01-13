<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

//Checking if all variables are set
if (isset($_POST['username'], $_POST['password'])) {
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $password = $_POST['password'];

    // Collecting the username from the database
    $user = getUserByUsername($username, $pdo);

    // Displays error message if the username does not exist
    if (!$user) {
        $_SESSION['error'] = 'This user does not exist.';
    }

    // Checking if the password is correct
    if (password_verify($password, $user['password'])) {
        unset($user['password']);
        $_SESSION['user'] = $user;
        redirect('/feed.php');
    } else {
        $_SESSION['error'] = 'The password is not correct!';
    }
}
redirect('/index.php');
