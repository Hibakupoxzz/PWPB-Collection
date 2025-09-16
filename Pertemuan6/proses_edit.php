<?php
require 'koneksi.php';
$id = $_POST['id'];
$name = mysqli_real_escape_string($koneksi, $_POST['name']);
$desc = mysqli_real_escape_string($koneksi, $_POST['description']);
$price = $_POST['price'];
$stock = $_POST['stock'];
if (!is_numeric($id) || !is_numeric($price) || !is_numeric($stock)) {
 die("Input tidak valid.");
}
$query = "UPDATE products SET name='$name', description='$desc', price='$price', 
stock='$stock' WHERE id=$id";
if (mysqli_query($koneksi, $query)) {
 header("Location: index.php");
 exit;
} else {
 echo "Error: " . mysqli_error($koneksi);
}
?>