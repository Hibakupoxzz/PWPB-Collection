<?php
//Detail koneksi database
$host = "localhost";
$root = "root";
$pass = "";
$db = 'db_manajemen_stok2';

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $root, $pass, $db);

// Mengecek apakah koneksi berhasil atau gagal
if (!$koneksi) {
 die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>