<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isLoggedIn()) {
    redirect('/');
}

//TODO: ADD FUNCTION THAT CHECKS THE OWNER OF THE POST WITH THE ID

if (isset($_GET['post_id'], $_FILES['edit_post_image'])) {
    $image = $_FILES['edit_post_image'];
    $userId = $_SESSION['user']['id'];
    $postId = (int) filter_var($_GET['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $imageName = $image['name'];
    $imageTmpName = $image['tmp_name'];
    $imageSize = $image['size'];
    $imageError = $image['error'];
    $imageType = $image['type'];
    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));
    $allowed = ['jpg', 'jpeg', 'png'];

    // Checking if the uploaded image has the right format
    if (in_array($imageActualExt, $allowed)) {

        // Checking if there was no errors while uploading the image
        if ($imageError === 0) {

            // Checking if the uploaded image has the right file size
            if ($imageSize < 3145728) {

                $imageNameNew = time().".".$userId.".".$imageActualExt;
                $imageDestination = '/../../uploads/'.$imageNameNew;
                move_uploaded_file($imageTmpName, __DIR__.$imageDestination);

                // Get the name of the current post image
                $statement = $pdo->prepare('SELECT image FROM posts WHERE user_id = :user_id AND post_id = :post_id');
                if (!$statement) {
                    die(var_dump($pdo->errorInfo()));
                }
                $statement->execute([
                    ':user_id' => $userId,
                    ':post_id' => $postId,
                    ]);
                $currentPostImage = $statement->fetch(PDO::FETCH_ASSOC);

                // Updates the image in the database
                $statement = $pdo->prepare('UPDATE posts SET image = :image WHERE post_id = :post_id AND user_id = :user_id');
                if (!$statement) {
                    die(var_dump($pdo->errorInfo()));
                }
                $statement->execute([
                    ':image' => $imageNameNew,
                    ':user_id' => $userId,
                    ':post_id' => $postId,
                    ]);

                // Removes the previous image from the uploads folder
                if ($currentPostImage['image'] !== NULL) {
                    unlink(__DIR__."/../../uploads/".$currentPostImage['image']);
                }
                $_SESSION['success'] = 'You have successfully updated your image!';
            } else {
                $_SESSION['error'] = 'Your image is too big!';
            }
        } else {
            $_SESSION['error'] = 'There was an error uploading your image!';
        }
    } else {
        $_SESSION['error'] = 'You cannot upload this type of file!';
    }
}

if (isset($_GET['post_id'], $_POST['edit_post_content'])) {
    $postId = (int) filter_var($_GET['post_id'], FILTER_SANITIZE_NUMBER_INT);
    $userId = $_SESSION['user']['id'];
    $contet = filter_var($_POST['edit_post_content'], FILTER_SANITIZE_STRING);

    // Updates the content in the database
    $statement = $pdo->prepare('UPDATE posts SET content = :content WHERE post_id = :post_id AND user_id = :user_id');
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->execute([
        ':post_id' => $postId,
        ':user_id' => $userId,
        ':content' => $contet,
        ]);
    $_SESSION['success'] = 'Your content were successfully updated';
}
redirect('/../../edit-post.php?post_id='.$postId);
