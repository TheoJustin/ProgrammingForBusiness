<?php
ini_set('session.cookie_lifetime', 0); // Ends session when browser closes
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

// Check for valid login cookie on page load
if (!isset($_SESSION['logged_in_user']) && isset($_COOKIE['remember_user'])) {
    $username = $_COOKIE['remember_user'];
    $_SESSION['logged_in_user'] = $username;
}
?>