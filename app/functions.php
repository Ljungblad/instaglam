<?php

declare(strict_types=1);

if (!function_exists('redirect'))
{
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

/**
 * Checks if the user is logged in
 *
 * @return boolean
 */
function isLoggedIn()
{
    return isset($_SESSION['user']);
}

/**
 * Displays errors
 *
 * @return void
 */
function displayError() {
        return isset($_SESSION['error']);
}


