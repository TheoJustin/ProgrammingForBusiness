<?php
session_start();
session_destroy();
setcookie("remember_user_id", "", time() - 3600, "/");
setcookie("remember_username", "", time() - 3600, "/");
header("Location: login.php");
exit;
