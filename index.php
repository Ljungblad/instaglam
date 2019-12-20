<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1><?php echo $config['title']; ?></h1>
    <?php if (isset($_SESSION['user'])): ?>
        <?php $user = getUserById($_SESSION['user']['id'], $pdo); ?>
        <h2>Hello, <?php echo $user['first_name'] ?>!</h2>
    <?php endif; ?>
    <p>This is the home page.</p>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
