<?php
$usersFile = 'user.json';

// Load users
if (file_exists($usersFile)) {
    $users = json_decode(file_get_contents($usersFile), true);
} else {
    $users = [];
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (isset($users[$username]) && $users[$username] === $password) {
        // Set cookie for 1 hour
        setcookie('logged_in_user', $username, time() + 3600, "/");
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
