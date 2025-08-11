<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mini App</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        nav a { margin-right: 10px; }
        .error { color: red; }
    </style>
</head>
<body>
<nav>
    <?php if (isset($_SESSION['user_id'])): ?>
        Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> |
        <a href="posts.php">Posts</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php endif; ?>
</nav>
<hr>
<?php if (!empty($_SESSION['error'])): ?>
    <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
<?php endif; ?>
