<?php
include 'utils/db.php';

// Create database if not exists
// mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS $dbname");
// mysqli_select_db($conn, $dbname);

// Create users table
$createUsers = "
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
)";

$createPosts = "
CREATE TABLE IF NOT EXISTS posts (
    postId INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    userId INT NOT NULL,
    FOREIGN KEY (userId) REFERENCES users(id) ON DELETE CASCADE
)";

mysqli_query($conn, $createUsers);
mysqli_query($conn, $createPosts);

echo "Tables created successfully!";
?>
