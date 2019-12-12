<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

//Checking if all variables are set
if (isset($_POST['username'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['password_confirmation'])) {

    // Checking if the password matches
    if ($_POST['password'] === $_POST['password_confirmation']) {

        // Checking if the email address is valid
        $email = trim(strtolower(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error'] = "The email address is not valid!";
            redirect('/../../registration.php');
        }

            // Collects and sanitize all the form data
            $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
            $firstName = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
            $lastName = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Checking if the username is in use
            $user = getUserByUsername($username, $pdo);
            if (!empty($user)) {
                $_SESSION['error'] = "This username is already taken, pick another one!";
                redirect('/../../registration.php');
            }

            // Checking if the email address is in use
            $user = getUserByEmail($email, $pdo);
            if (!empty($user)) {
                $_SESSION['error'] = "This email is already in use!";
                redirect('/../../registration.php');
            }


            // Inserts all the form data to the database
            $statement = $pdo->query('SELECT * FROM users');
            $users = $statement->fetchAll(PDO::FETCH_ASSOC);
            $query = 'INSERT INTO users (username, first_name, last_name, email, password) VALUES (:username, :first_name, :last_name, :email, :password)';
            $statement = $pdo->prepare($query);

            // REMOVE THIS IF STATEMENT LATER!!!!!!
            if (!$statement) {
                die(var_dump($pdo->errorInfo()));
            }

            $statement->bindParam(':username', $username, PDO::PARAM_STR);
            $statement->bindParam(':first_name', $firstName, PDO::PARAM_STR);
            $statement->bindParam(':last_name', $lastName, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':password', $hash_password, PDO::PARAM_STR);

            $statement->execute();

            // Get the user from the database and starts a new session for the user
            $user = getUserByUsername($username, $pdo);
            $_SESSION['user'] = $user;

            redirect('/../../profile.php');

    } else {
        // If the password does not match
        $_SESSION['error'] = "The two passwords do not match";
    }
    redirect('/../../registration.php');
}

redirect('/');
