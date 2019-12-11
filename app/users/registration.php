<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

$statement = $pdo->query('SELECT * FROM users');

$users = $statement->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['password_confirmation'])) {
    $firstName = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
    $lastName = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['password_confirmation'];
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $query = 'INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)';

    $statement = $pdo->prepare($query);

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':first_name', $firstName, PDO::PARAM_STR);
    $statement->bindParam(':last_name', $lastName, PDO::PARAM_STR);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $hash_password, PDO::PARAM_STR);

    $statement->execute();
    
    // if (empty($firstName)) { array_push($_SESSION['errors'], "First name is required"); }
    // if (empty($lastName)) { array_push($_SESSION['errors'], "Last Name is required"); }
    // if (empty($email)) { array_push($_SESSION['errors'], "Email is required"); }
    // if (empty($password)) { array_push($_SESSION['errors'], "Password is required"); }
    // if (empty($passwordConfirmation)) { array_push($_SESSION['errors'], "Password is required"); }
    // if ($password != $passwordConfirmation) {
    //     array_push($_SESSION['errors'], "The two passwords do not match");
    // }
    

}

redirect('/');