<?php
// 1. Koneksi ke database
$host = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "Session10";

$conn = mysqli_connect($host, $user, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// 2. Query data
$sql = "SELECT * FROM User";
$result = mysqli_query($conn, $sql);

// 3. Tampilkan data
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Nama: " . $row["Name"] . " - Email: " . $row["Email"] . "<br>";
    }
} else {
    echo "Tidak ada data.";
}

// 4. Tutup koneksi
mysqli_close($conn);
?>
