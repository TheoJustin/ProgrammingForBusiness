<?php
if (!isset($_COOKIE['logged_in_user'])) {
    header('Location: login.php');
    exit;
}

echo "<h2>Welcome, " . htmlspecialchars($_COOKIE['logged_in_user']) . "!</h2>";
echo "<a href='logout.php'>Logout</a>";
