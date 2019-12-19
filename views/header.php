<?php require_once __DIR__.'/../app/autoload.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $config['title']; ?></title>
    <link rel="stylesheet" href="/assets/styles/main.css">
    <link rel="stylesheet" href="/assets/styles/profile.css">
    <link rel="stylesheet" href="/assets/styles/feed.css">
    <link rel="stylesheet" href="/assets/styles/edit-post.css">
</head>
<body>
    <?php require __DIR__.'/navigation.php'; ?>
