<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isLoggedIn()) {
    redirect('/');
}

$id = (int) $_SESSION['user']['id'];

// Edits and updates the users biography information
if (isset($_POST['edit_biography'])) {
    if (isset($_POST['biography'])) {
        $biography = filter_var($_POST['biography'], FILTER_SANITIZE_STRING);

        // Updates the information in the database
        $statement = $pdo->prepare('UPDATE users SET biography = :biography WHERE id = :id');
        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }
        $statement->execute([
            ':id' => $id,
            ':biography' => $biography,
            ]);
            $_SESSION['user']['biography'] = $biography;
            $_SESSION['success'] = 'Your biography was successfully updated';
            redirect('/../../account.php');
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
        $statement = $pdo->prepare('UPDATE users SET email = :newEmail WHERE email = :email');
        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }
        $statement->execute([
        ':newEmail' => $newEmail,
        ':email' => $email,
    ]);
    $_SESSION['user']['email'] = $newEmail;
    $_SESSION['success'] = 'Your email was successfully updated';
    redirect('/../../account.php');
    }
}

// Edits and updates the users password
if (isset($_POST['edit_password'])) {

    // Checking if the variables are set
    if (isset($_POST['current_password'], $_POST['new_password'], $_POST['confirm_new_password'])) {

        // Ckecking if the passwords matches
        if ($_POST['new_password'] === $_POST['confirm_new_password']) {
            $currentPassword = $_POST['current_password'];

            // Get the user
            $user = getUserById($id, $pdo);

            // Checking if the password is correct
            if (password_verify($_POST['current_password'], $user['password'])) {
                $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

                // Connects with the database and update the password address
                $statement = $pdo->prepare('UPDATE users SET password = :password WHERE id = :id');
                if (!$statement) {
                    die(var_dump($pdo->errorInfo()));
                }
                $statement->execute([
                ':password' => $newPassword,
                ':id' => $id,
                ]);
                $_SESSION['success'] = 'Your password was successfully updated';
                unset($user['password']);
                redirect('/../../account.php');
            } else {
                $_SESSION['error'] = 'Your current password is not correct!';
                redirect('/../../account.php');
            }
        } else {
            // If the passwords does not match
            $_SESSION['error'] = "The two passwords do not match";
            redirect('/../../account.php');
        }
    }
}

redirect('/../../account.php');
