<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Edits and updates the users biography information
if (isset($_POST['edit_biography'])) {
    if (isset($_POST['biography'])) {
        $id = (int) $_SESSION['user']['id'];
        $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);

        $update = $pdo->prepare('UPDATE users SET = biography = :biography WHERE id = :id');
        $update->execute([
            ':id' => $id,
            ':biography' => $biography,
            ]);
            die(var_dump('UPDATED!'));

    }
}

// Edits and updates the users email
if (isset($_POST['edit_email'])) {

    //Checking if all variables are set
    if (isset($_POST['email'], $_POST['new_email'] )) {

        // Checking if the email address is valid
        $email = trim(strtolower(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "The email address is not valid!";
            redirect('/../../account.php');
        }

        // Checking if the current email address is correct
        $user = getUserByEmail($email, $pdo);
        if (empty($user)) {
            $_SESSION['error'] = "This email does not exist!";
            redirect('/../../account.php');
        }

        // Checking if the new email address is valid
        $newEmail = trim(strtolower(filter_var($_POST['new_email'], FILTER_SANITIZE_EMAIL)));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "The email address is not valid!";
            redirect('/../../account.php');
        }

        // Checking if the new email address is in use
        $user = getUserByEmail($newEmail, $pdo);
        if (!empty($user)) {
            $_SESSION['error'] = "This email is already in use!";
            redirect('/../../account.php');
        }

        // Connects with the database and update the new email address
        $update = $pdo->prepare('UPDATE users SET email = :newEmail WHERE email = :email');
        $update->execute([
        ':newEmail' => $newEmail,
        ':email' => $email,
    ]);
    $_SESSION['success'] = 'Your email were successfully updated';
    redirect('/../../account.php');
    }
}

// Edits and updates the users password
if (isset($_POST['enter_password'])) {

    // Checking if the variables are set
    if (isset($_POST['current_password'], $_POST['new_password'], $_POST['confirm_new_password'])) {

        // Ckecking if the passwords matches
        if ($_POST['password'] === $_POST['password_confirmation']) {

        } else {
            // If the passwords does not match
        $_SESSION['error'] = "The two passwords do not match";
        }
    }
}

// Updates the information on the site when any of the forms are submitted?
// $id = (int) $_SESSION['id'];
// $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
// $statement->execute(([
//     ':id' => $id,
// ]));
// if (!$statement) {
//     die(var_dump($pdo->errorInfo()));
// }
// $_SESSION['user'] = $statement->fetch(PDO::FETCH_ASSOC);
redirect('/profile.php');
