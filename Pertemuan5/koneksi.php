<?php 
$host = 'localhost'; 
$user = 'root'; 
$pass = '';  
$db   = 'db_manajemen_stok2'; 

$koneksi = mysqli_connect($host, $user, $pass, $db); 
if (!$koneksi) {
die("Koneksi ke database gagal: " . mysqli_connect_error());}
?> 