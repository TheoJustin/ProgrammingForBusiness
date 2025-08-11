<?php
include 'users.php';

$message = '';
$usersFile = 'user.json';

// Load existing users
if (file_exists($usersFile)) {
    $users = json_decode(file_get_contents($usersFile), true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($username && $password) {
        if (!isset($users[$username])) {
            $users[$username] = $password;
            file_put_contents($usersFile, json_encode($users));
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
