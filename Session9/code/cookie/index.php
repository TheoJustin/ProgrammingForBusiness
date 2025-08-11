<?php
if (!isset($_COOKIE['logged_in_user'])) {
    header('Location: login.php');
    exit;
}
?>
<h2>Welcome, <?php echo htmlspecialchars($_COOKIE['logged_in_user']); ?>!</h2>
<p><a href="logout.php">Logout</a></p>
