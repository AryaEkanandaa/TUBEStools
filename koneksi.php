<?php

// Buat koneksi
$con = mysqli_connect("localhost", "root", "", "digital bookshelf");

// Periksa koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Sekarang variabel $con berisi koneksi ke database MySQL
?>
