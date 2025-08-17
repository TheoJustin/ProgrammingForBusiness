<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username && $password) {
        // Load existing users from cookie
        $users = isset($_COOKIE['users']) ? json_decode($_COOKIE['users'], true) : [];

        if (!isset($users[$username])) {
            $users[$username] = $password;

            // Save back to cookie (expire in 1 hour)
            setcookie('users', json_encode($users), time() + 3600, "/");

            $message = "Registration successful! <a href='login.php'>Login here</a>";
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
<p><?php echo $message; ?></p>
