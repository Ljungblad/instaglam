<?php

declare(strict_types=1);

if (!isLoggedIn()) {
    redirect('/');
}

?>
