<?php
include 'utils/db.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $stmt = mysqli_prepare($conn, "SELECT id, password FROM users WHERE username=?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $hashedPassword);
    mysqli_stmt_fetch($stmt);

    if ($id && password_verify($password, $hashedPassword)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;

        if ($remember) {
            setcookie("remember_user", $username, time() + 86400 * 30, "/");
        }
        header("Location: posts.php");
        exit;
    } else {
        $_SESSION['error'] = "Invalid username or password.";
    }
}
?>
<h2>Login</h2>
<form method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    Remember Me: <input type="checkbox" name="remember"><br><br>
    <button type="submit">Login</button>
</form>
</body></html>
