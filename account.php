<?php

declare(strict_types=1);

require_once __DIR__.'/app/autoload.php';

if (!isLoggedIn()) {
    redirect('/');
}

?>

<?php require __DIR__.'/views/header.php'; ?>

<article>
    <h1>My Account</h1>
    <p>This is the account page.</p>
</article>

<?php require __DIR__.'/views/footer.php'; ?>
