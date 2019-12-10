<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    $name = trim(filter_var($_POST['name'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];

    //INSERT CREATE ACOUNT LOGIC HERE
}