<?php require_once __DIR__.'/../app/autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $config['title']; ?></title>
    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Petit+Formal+Script&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/navigation.css">
    <link rel="stylesheet" href="/assets/styles/profile.css">
    <link rel="stylesheet" href="/assets/styles/feed.css">
    <link rel="stylesheet" href="/assets/styles/search.css">
    <link rel="stylesheet" href="/assets/styles/edit-post.css">
    <link rel="stylesheet" href="/assets/styles/login.css">
    <link rel="stylesheet" href="/assets/styles/registration.css">
    <link rel="stylesheet" href="/assets/styles/account.css">
    <link rel="stylesheet" href="/assets/styles/create-post.css">
    <link rel="stylesheet" href="/assets/styles/404.css">
</head>

<body>
    <?php require __DIR__.'/navigation.php'; ?>
    <div class="page-wrapper">