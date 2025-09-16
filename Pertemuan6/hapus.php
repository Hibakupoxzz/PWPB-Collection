<?php
require 'koneksi.php';
$id = $_GET['id'];
if (!is_numeric($id)) {
 die("Invalid ID");
}
$query = "DELETE FROM products WHERE id=$id";
if (mysqli_query($koneksi, $query)) {
 header("Location: index.php");
 exit;
} else {
 echo "Error: " . mysqli_error($koneksi);
}
?>