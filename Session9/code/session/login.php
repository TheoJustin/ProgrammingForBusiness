<?php
include 'users.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (isset($_SESSION['users'][$username]) && $_SESSION['users'][$username] === $password) {
        $_SESSION['logged_in_user'] = $username;
        header('Location: index.php');
        exit;
    } else {
        $message = "Invalid username or password!";
    }
}
?>
<h2>Login</h2>
<form method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button type="submit">Login</button>
</form>
<p><?php echo $message; ?></p>
