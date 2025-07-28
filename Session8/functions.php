<?php

// Built-in date function in PHP
$today = date("l, F j Y"); // Example: Monday, July 28 2025
echo "Today is: $today\n\n";

// User-defined function: sayHello
function sayHello($name) {
    echo "Hello, " . $name . "\n";
}

// Function: tambah
function tambah($a, $b) {
    return $a + $b;
}

// Function: luasPersegi
function luasPersegi($sisi) {
    return $sisi * $sisi;
}

// Call the functions
sayHello("Theo"); // Output: Hello, Theo

echo "Hasil tambah 5 + 3 = " . tambah(5, 3) . "\n";

$hasil = luasPersegi(4);
echo "Luas persegi dengan sisi 4 = $hasil";
?>
