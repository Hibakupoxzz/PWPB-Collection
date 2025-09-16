<?php
require 'koneksi.php';
$query = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manajemen Stok Produk</title>
<style>
body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #eaf3ff, #ffffff);
    margin: 0;
    padding: 40px;
    color: #333;
    position: relative;
    overflow-x: hidden;
}

/* Lapisan paralaks */
.bg-layer {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1;
}

/* Bubble efek Alice */
.bg-layer span {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(163, 201, 255, 0.6), transparent 70%);
    animation: float 15s infinite ease-in-out;
}

/* Animasi bubble */
@keyframes float {
    0% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-50px) scale(1.1); }
    100% { transform: translateY(0) scale(1); }
}


.container {
    max-width: 1000px;
    margin: auto;
    background: #ffffffcc;
    padding: 25px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
    border-radius: 16px;
    backdrop-filter: blur(8px);
    border: 2px solid #c9e4ff;
}

h1 {
    text-align: center;
    color: #3a4d7a;
    font-size: 2rem;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 3px dashed #a3c9ff;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    margin-bottom: 20px;
    color: #fff;
    background: linear-gradient(135deg, #7aa6ff, #9ecbff);
    text-decoration: none;
    border-radius: 25px;
    font-weight: bold;
    transition: all 0.3s ease;
    box-shadow: 0 4px 8px rgba(122,166,255,0.3);
}
.btn:hover {
    background: linear-gradient(135deg, #5e8bff, #82b4ff);
    transform: scale(1.05);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    border-radius: 12px;
    overflow: hidden;
}

th, td {
    border: none;
    padding: 14px;
    text-align: left;
}

th {
    background: #7aa6ff;
    color: #fff;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f4f8ff;
}

tr:hover {
    background-color: #e6f0ff;
}

.actions a {
    margin-right: 8px;
    text-decoration: none;
    padding: 8px 14px;
    border-radius: 20px;
    font-size: 0.9em;
    font-weight: bold;
    transition: all 0.3s ease;
}

.actions .edit {
    background: linear-gradient(135deg, #62d28a, #8de4aa);
    color: white;
    box-shadow: 0 4px 8px rgba(98,210,138,0.3);
}
.actions .delete {
    background: linear-gradient(135deg, #ff6f91, #ff8ba0);
    color: white;
    box-shadow: 0 4px 8px rgba(255,111,145,0.3);
}

.actions a:hover {
    transform: translateY(-2px);
    opacity: 0.9;
}

/* Empty row style */
.empty-row {
    text-align:center; 
    color:#888; 
    font-style: italic; 
    background: #fefcff;
}
</style>
</head>
<body>
<div class="bg-layer">
  <span style="width:200px; height:200px; top:20%; left:10%;"></span>
  <span style="width:300px; height:300px; top:60%; left:70%; background: radial-gradient(circle, rgba(255, 200, 250, 0.5), transparent 70%);"></span>
  <span style="width:150px; height:150px; top:80%; left:20%;"></span>
</div>
<div class="container">
    <h1>Daftar Produk</h1>
    <a href="tambah.php" class="btn">Tambah Produk Baru</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= htmlspecialchars($row['name']); ?></td>
                    <td><?= htmlspecialchars($row['description']); ?></td>
                    <td>Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
                    <td><?= $row['stock']; ?></td>
                    <td class="actions">
                        <a href="edit.php?id=<?= $row['id']; ?>" class="edit">Edit</a>
                        <a href="hapus.php?id=<?= $row['id']; ?>" class="delete" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="empty-row">Belum ada produk.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
