<?php
session_start();
unset($_SESSION['logged_in_user']);
setcookie('remember_user', '', time() - 3600);
header('Location: login.php');
exit;
