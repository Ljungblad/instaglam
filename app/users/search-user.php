<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

header('Content-Type: application/json');

$userId = $_GET['search'];

$search = getUserFromSearch($userId, $pdo);

echo json_encode($search);
exit;

// foreach ($search as $person) {
//     $username = $person['username'];
//     $id = $person['id'];
//     $avatar = $person['profile_avatar'];

//     $json = ([
//         'username' => $username,
//         'id' => $id,
//         'avatar' => $avatar
//     ]);

//     echo json_encode($json);
//     exit;
// }

// Try with fetch here?

// if (isset($_POST['search'])) {

//     $search = trim(filter_var($_POST['search'], FILTER_SANITIZE_STRING));
//     $search = '%' . $search . '%';


//     $statement = $pdo->prepare('SELECT username, id, profile_avatar FROM users WHERE username LIKE :search');
//     if (!$statement) {
//         die(var_dump($pdo->errorInfo()));
//     }

//     $statement->bindParam(':search', $search, PDO::PARAM_STR);

//     $statement->execute();
//     $usersFromSearch = $statement->fetchAll(PDO::FETCH_ASSOC);

//     return $usersFromSearch;
// }


// redirect('/../../search.php?search=' . $userId);
