<?php 
require 'koneksi.php'; 

// --- LOGIKA PENCARIAN --- 
$search = ''; 
$search_query_part = ''; 
if (isset($_GET['search'])) { 
    $search = mysqli_real_escape_string($koneksi, $_GET['search']); 
    $search_query_part = " WHERE name LIKE '%$search%' OR description LIKE '%$search%'"; 
} 

// --- PAGINATION --- 
$limit = 10; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; 
if ($page < 1) $page = 1; 
$offset = ($page - 1) * $limit; 

$total_result_query = "SELECT COUNT(id) AS total FROM products" . $search_query_part; 
$total_result = mysqli_query($koneksi, $total_result_query); 
$total_rows = mysqli_fetch_assoc($total_result)['total']; 
$total_pages = ceil($total_rows / $limit); 

$query = "SELECT * FROM products" . $search_query_part . " ORDER BY id DESC LIMIT $limit OFFSET $offset"; 
$result = mysqli_query($koneksi, $query); 
?>


<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manajemen Stok Produk</title>
<style>
/* --- Global Style --- */
body {
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(135deg, #eaf3ff, #ffffff);
    margin: 0;
    padding: 40px;
    color: #333;
    overflow-x: hidden;
    position: relative;
}

/* --- Background Layer Alice --- */
.bg-layer {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    overflow: hidden;
    z-index: -1;
    pointer-events: none;
}

.bg-layer span {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(163, 201, 255, 0.6), transparent 70%);
    animation: float 12s infinite ease-in-out;
}

@keyframes float {
    0% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-50px) scale(1.1); }
    100% { transform: translateY(0) scale(1); }
}

/* --- Container --- */
.container {
    max-width: 1000px;
    margin: auto;
    background: #ffffffcc;
    padding: 25px;
    border-radius: 16px;
    backdrop-filter: blur(10px);
    border: 2px solid #c9e4ff;
    box-shadow: 0 6px 15px rgba(0,0,0,0.1);
}

/* --- Heading --- */
h1 {
    text-align: center;
    color: #3a4d7a;
    font-size: 2rem;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 3px dashed #a3c9ff;
}

/* --- Search bar --- */
form.search-form {
    display: flex;
    justify-content: flex-end;
    margin-bottom: 20px;
    gap: 8px;
}

form.search-form input {
    padding: 10px 14px;
    border: 1px solid #cfd8dc;
    border-radius: 20px;
    outline: none;
    transition: all 0.3s ease;
}

form.search-form input:focus {
    border-color: #7aa6ff;
    box-shadow: 0 0 6px rgba(122,166,255,0.5);
}

form.search-form button {
    padding: 10px 16px;
    border: none;
    border-radius: 20px;
    background: linear-gradient(135deg, #7aa6ff, #9ecbff);
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: 0.3s;
}

form.search-form button:hover {
    background: linear-gradient(135deg, #5e8bff, #82b4ff);
    transform: scale(1.05);
}

/* --- Buttons --- */
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

/* --- Table --- */
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

tr:nth-child(even) { background-color: #f4f8ff; }
tr:hover { background-color: #e6f0ff; }

/* --- Actions --- */
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
.actions a:hover { transform: translateY(-2px); opacity: 0.9; }

/* --- Empty Row --- */
.empty-row {
    text-align:center; 
    color:#888; 
    font-style: italic; 
    background: #fefcff;
}

/* --- Pagination --- */
.pagination a {
    padding: 8px 12px;
    border-radius: 6px;
    margin: 0 3px;
    text-decoration: none;
    color: #007bff;
    border: 1px solid #cfd8dc;
    transition: 0.3s;
}
.pagination a:hover {
    background: #007bff;
    color: white;
}
.pagination .active {
    background: #007bff;
    color: white;
    border-color: #007bff;
}
</style>
</head>
<body>
<!-- Background Bubble Layer -->
<div class="bg-layer">
  <span style="width:200px; height:200px; top:20%; left:10%;"></span>
  <span style="width:300px; height:300px; top:60%; left:70%; background: radial-gradient(circle, rgba(255, 200, 250, 0.5), transparent 70%);"></span>
  <span style="width:150px; height:150px; top:80%; left:20%;"></span>
</div>

<div class="container">
    <h1>Daftar Produk</h1>

    <form class="search-form" action="index.php" method="GET"> 
        <input type="text" name="search" placeholder="Cari produk..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>"> 
        <button type="submit">Cari</button> 
    </form>

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

    <div class="pagination" style="margin-top: 20px; text-align: center;"> 
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?> 
            <a href="?page=<?= $i; ?>&search=<?= htmlspecialchars($search); ?>" class="<?= ($i == $page) ? 'active' : ''; ?>"> 
                <?= $i; ?> 
            </a> 
        <?php endfor; ?> 
    </div>
</div>
</body>
</html>
