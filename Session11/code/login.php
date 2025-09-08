<?php
include 'utils/db.php';
include 'header.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $stmt = mysqli_prepare($conn, "SELECT id, password FROM users WHERE username=?"); // bikin prepared statement
    mysqli_stmt_bind_param($stmt, "s", $username); // bind the param
    mysqli_stmt_execute($stmt); // execute the query
    mysqli_stmt_bind_result($stmt, $id, $hashedPassword); // variable ke hasilnya
    mysqli_stmt_fetch($stmt); // ambil first colomn dari result

    if ($id && password_verify($password, $hashedPassword)) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;

        if ($remember) {
            setcookie("remember_user_id", $id, time() + 86400 * 30, "/");
            setcookie("remember_username", $username, time() + 86400 * 30, "/");
        }
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['error'] = "Invalid username or password.";
        header("Location: login.php");
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
