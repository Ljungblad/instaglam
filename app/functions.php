<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

/**
 * Checks if the user is logged in.
 *
 * @return bool
 */
function isLoggedIn()
{
    return isset($_SESSION['user']);
}

/**
 * Displays error messages.
 *
 * @return void
 */
function displayError()
{
    return isset($_SESSION['error']);
}

/**
 * Displays success messages.
 *
 * @return void
 */
function displaySuccess()
{
    return isset($_SESSION['success']);
}

/**
 * Checking if the user is the owner of the post.
 *
 * @param int $postUserId
 * @param int $userId
 *
 * @return bool
 */
function isOwnerOfPost(int $postUserId, int $userId): bool
{
    return $postUserId === $userId;
}

/**
 * Checking if the logged in user is the owner of visited profile.
 *
 * @param int $profileUserId
 * @param int $loggedInUserId
 *
 * @return bool
 */
function isOwnerOfProfile(int $profileUserId, int $loggedInUserId): bool
{
    return $profileUserId === $loggedInUserId;
}
