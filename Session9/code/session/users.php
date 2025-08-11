<?php
ini_set('session.cookie_lifetime', 0); // Ends session when browser closes
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}
?>
