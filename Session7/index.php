<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// =====================
// Basic PHP Tutorial
// =====================

// ----- 1. ECHO (output ke browser) -----
echo "<h2>Belajar Dasar PHP</h2>";
echo "Halo, dunia!<br>";

// ----- 2. COMMENTS -----
// Ini adalah single-line comment
# Ini juga single-line comment
/*
   Ini multi-line comment
   Bisa dipakai untuk menjelaskan panjang lebar
*/

// ----- 3. VARIABLES -----
$nama = "Budi";
$umur = 15;
$tinggi = 170.5;

echo "Nama: $nama<br>";
echo "Umur: $umur tahun<br>";
echo "Tinggi: $tinggi cm<br>";

// ----- 4. OPERATOR -----
$a = 10;
$b = 3;

echo "<br><b>Operator:</b><br>";
echo "Penjumlahan: " . ($a + $b) . "<br>";  // 13
echo "Pengurangan: " . ($a - $b) . "<br>";  // 7
echo "Perkalian: " . ($a * $b) . "<br>";    // 30
echo "Pembagian: " . ($a / $b) . "<br>";    // 3.333...
echo "Modulus: " . ($a % $b) . "<br>";      // 1

// ----- 5. IF STATEMENT -----
echo "<br><b>If Statement:</b><br>";
if ($umur >= 18) {
    echo "Kamu sudah dewasa.<br>";
} else if ($umur >= 12){
    echo "Kamu masih remaja.<br>";
} else{
    echo "Kamu masih anak anak. <br>";
}

$day = "Monday";

switch ($day) {
    case "Monday":
        echo "Today is Monday!";
        break;

    case "Tuesday":
        echo "Today is Tuesday!";
        break;

    case "Wednesday":
        echo "Today is Wednesday!";
        break;

    default:
        echo "It's another day.";
}

// ----- 6. LOOP -----
// For loop
echo "<br><b>For Loop:</b><br>";
for ($i = 1; $i <= 5; $i++) {
    echo "Perulangan ke-$i<br>";
}

// While loop
echo "<br><b>While Loop:</b><br>";
$x = 1;
while ($x <= 3) {
    echo "Nilai x: $x<br>";
    $x++;
}

// Foreach loop (biasanya untuk array)
echo "<br><b>Foreach Loop:</b><br>";
$buah = ["Apel", "Jeruk", "Mangga"];
foreach ($buah as $b) {
    echo "Buah: $b<br>";
}
?>

</body>
</html>