<?php
include 'utils/db.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (empty($username) || empty($_POST['password'])) {
        $_SESSION['error'] = "Please fill in all fields.";
    } else {
        $stmt = mysqli_prepare($conn, "INSERT INTO users (username, password) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: login.php");
            exit;
        } else {
            $_SESSION['error'] = "Username already exists.";
        }
    }
}
?>
<h2>Register</h2>
<form method="POST">
    Username: <input type="text" name="username"><br><br>
    Password: <input type="password" name="password"><br><br>
    <button type="submit">Register</button>
</form>
</body></html>
