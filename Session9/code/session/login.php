<?php
include 'users.php';

$message = '';

if (isset($_SESSION['logged_in_user'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']) && $_POST['remember'] === 'on';

    if (isset($_SESSION['users'][$username]) && $_SESSION['users'][$username] === $password) {
        $_SESSION['logged_in_user'] = $username;

        // Set or clear remember_user cookie based on checkbox
        if ($remember) {
            setcookie('remember_user', $username, time() + (30 * 24 * 60 * 60), '/'); // 30 days, dan bisa diakses oleh smua halaman
        } else {
            setcookie('remember_user', '', time() - 3600, '/'); // Clear cookie
        }

        header('Location: index.php');
        exit;
    } else {
        $message = "Invalid username or password!";
    }
}
?>
<h2>Login</h2>
<form method="POST">
    Username: <input type="text" name="username" value=""><br><br>
    Password: <input type="password" name="password"><br><br>
    <label><input type="checkbox" name="remember"> Remember Me</label><br><br>
    <button type="submit">Login</button>
</form>
<a href="register.php">Register Here</a>
<p><?php echo $message; ?></p>