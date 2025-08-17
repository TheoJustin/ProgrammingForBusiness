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

    if ($username && $password) {
        if (!isset($_SESSION['users'][$username])) {
            $_SESSION['users'][$username] = $password; //dictionary username:password
            $message = "Registration successful!";
        } else {
            $message = "Username already taken!";
        }
    } else {
        $message = "Please fill in all fields!";
    }
}
?>
<h2>Register</h2>
<form method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button type="submit">Register</button>
</form>
<a href='login.php'>Login here</a>
<p><?php echo $message; ?></p>
