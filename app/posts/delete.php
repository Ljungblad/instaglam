<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isLoggedIn() && isset($_POST['id'])) {
    // ALWAYS CHECK AGAINS THE USER WHEN DELETING OR CHANGING STUFF
    // DELETE FROM users WHERE id = :id AND user_id = :user_id;
}