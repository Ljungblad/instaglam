<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isLoggedIn()) {
    redirect('/');
}

if (isset($_FILES['edit_post_image'])) {

}

if (isset($_POST['edit_post_content'])) {

}
