<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

header('Content-Type: application/json');

$userId = $_GET['search'];

$search = getUserFromSearch($userId, $pdo);

echo json_encode($search);
exit;
