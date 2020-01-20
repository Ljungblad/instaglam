<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// Try with fetch here?

if (isset($_POST['search'])) {

    $search = trim(filter_var($_POST['search'], FILTER_SANITIZE_STRING));
    $search = '%' . $search . '%';


    $statement = $pdo->prepare('SELECT username, id, profile_avatar FROM users WHERE username LIKE :search');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':search', $search, PDO::PARAM_STR);

    $statement->execute();
    $usersFromSearch = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $usersFromSearch;
}
