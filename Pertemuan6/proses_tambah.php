<?php
require 'koneksi.php';
$name = mysqli_real_escape_string($koneksi, $_POST['name']);
$desc = mysqli_real_escape_string($koneksi, $_POST['description']);
$price = $_POST['price'];
$stock = $_POST['stock'];
$query = "INSERT INTO products (name, description, price, stock) VALUES ('$name', '$desc', 
'$price', '$stock')";
if (mysqli_query($koneksi, $query)) {
 header("Location: index.php");
 exit;
} else {
 echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
?>