<?php
include 'users.php';

if (!isset($_SESSION['logged_in_user'])) {
    header('Location: login.php');
    exit;
}
?>
<h2>Welcome, <?php echo $_SESSION['logged_in_user']; ?>!</h2>
<p><a href="logout.php">Logout</a></p>
