<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (!isLoggedIn()) {
    redirect('/');
}

if (isset($_FILES['profile_picture'])) {
    $file = $_FILES['profile_picture'];
    $id = (int) $_SESSION['user']['id'];
    $currentProfilePicture = $_SESSION['user']['profile_avatar'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = ['jpg', 'jpeg', 'png'];

    // Checking if the uploaded file has the right format
    if (in_array($fileActualExt, $allowed)) {

        // Checking if there was no errors while uploading the file
        if ($fileError === 0) {

            // Checking if the uploaded file has the right file size
            if ($fileSize < 3145728) {

                $fileNameNew = time().".".$id.".".$fileActualExt;
                $fileDestination = '/../../uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, __DIR__.$fileDestination);

                // Updates the profile picture in the database
                $statement = $pdo->prepare('UPDATE users SET profile_avatar = :profile_avatar WHERE id = :id');
                if (!$statement) {
                    die(var_dump($pdo->errorInfo()));
                }
                $statement->execute([
                    ':id' => $id,
                    ':profile_avatar' => $fileNameNew,
                    ]);

                if ($currentProfilePicture !== NULL) {
                    unlink(__DIR__."/../../uploads/".$currentProfilePicture);
                }

                // $_SESSION['user']['profile_avatar'] = $fileNameNew;
                $_SESSION['success'] = 'You have successfully uploaded your profile avatar!';
            } else {
                $_SESSION['error'] = 'Your file was too big!';
            }
        } else {
            $_SESSION['error'] = 'There was an error uploading your file!';
        }
    } else {
        $_SESSION['error'] = 'You cannot upload this type of file!';
    }
}
redirect('/../../profile.php');
