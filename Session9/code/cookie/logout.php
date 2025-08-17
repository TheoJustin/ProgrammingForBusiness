<?php
setcookie('logged_in_user', '', time() - 3600, "/");
header('Location: login.php');
exit;
