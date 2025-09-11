<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Manajemen Stok Barang</title>
<style>
  /* Font */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

  body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    min-height: 100vh;
    background: linear-gradient(135deg, #a8d0f0, #f8c4d8);
    color: #333;
  }

  .container {
    width: 100%;
    max-width: 950px;
    background: rgba(255, 255, 255, 0.9);
    padding: 35px;
    border-radius: 16px;
    box-shadow: 0 8px 24px rgba(0, 78, 146, 0.2);
    backdrop-filter: blur(8px);
  }

  h1, h2 {
    text-align: center;
    color: #004e92;
    font-weight: 600;
    margin-bottom: 20px;
  }

  .form-section {
    background: rgba(240, 248, 255, 0.7);
    border: 1px solid #dbeafe;
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 35px;
    box-shadow: 0 4px 10px rgba(0, 78, 146, 0.15);
  }

  .form-group { margin-bottom: 18px; }

  label {
    display: block;
    margin-bottom: 6px;
    font-weight: 500;
    color: #004e92;
  }

  input[type="text"], textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #a8d0f0;
    border-radius: 10px;
    box-sizing: border-box;
    transition: border-color 0.3s, box-shadow 0.3s;
  }

  input:focus, textarea:focus {
    outline: none;
    border-color: #004e92;
    box-shadow: 0 0 6px rgba(0, 78, 146, 0.3);
  }

  .btn-submit {
    background: linear-gradient(135deg, #a8d0f0, #004e92);
    color: #fff;
    padding: 14px 20px;
    border: none;
    cursor: pointer;
    border-radius: 12px;
    font-weight: 600;
    width: 100%;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 78, 146, 0.3);
  }

  .btn-submit:hover {
    background: linear-gradient(135deg, #004e92, #a8d0f0);
    transform: scale(1.02);
    box-shadow: 0 6px 14px rgba(0, 78, 146, 0.4);
  }

  .table-section table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    border-radius: 12px;
    overflow: hidden;
  }

  .table-section th, .table-section td {
    padding: 14px;
    text-align: left;
    border: 1px solid #dbeafe;
  }

  .table-section th {
    background: #004e92;
    color: #fff;
    font-weight: 600;
  }

  .table-section tr:nth-child(even) {
    background-color: #f0f9ff;
  }

  .table-section tr:hover {
    background-color: #e0effa;
  }

  @media (max-width: 600px) {
    body { padding: 10px; }
    .container { padding: 20px; }
    .table-section table, 
    .table-section thead, 
    .table-section tbody, 
    .table-section th, 
    .table-section td, 
    .table-section tr { display: block; }
    .table-section thead tr { position: absolute; top: -9999px; left: -9999px; }
    .table-section tr { margin: 0 0 1rem 0; }
    .table-section td {
      border: none;
      border-bottom: 1px solid #e5e7eb;
      position: relative;
      padding-left: 50%;
      text-align: right;
    }
    .table-section td:before {
      position: absolute;
      top: 6px; left: 6px;
      width: 45%;
      padding-right: 10px;
      white-space: nowrap;
      text-align: left;
      font-weight: 600;
    }
    .table-section td:nth-of-type(1):before { content: "No"; }
    .table-section td:nth-of-type(2):before { content: "Nama Produk"; }
    .table-section td:nth-of-type(3):before { content: "Harga"; }
    .table-section td:nth-of-type(4):before { content: "Stok"; }
    .table-section td:nth-of-type(5):before { content: "Deskripsi"; }
  }
</style>
</head>
<body>

<div class="container">
  <h1>✨ Sistem Manajemen Stok Barang ✨</h1>

  <div class="form-section">
    <h2>Tambah Produk Baru</h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="name">Nama Produk:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="price">Harga:</label>
        <input type="text" id="price" name="price" required>
      </div>
      <div class="form-group">
        <label for="stock">Stok:</label>
        <input type="text" id="stock" name="stock" required>
      </div>
      <div class="form-group">
        <label for="description">Deskripsi:</label>
        <textarea id="description" name="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn-submit">Tambah Produk</button>
    </form>
  </div>

  <div class="table-section">
    <h2>Data Produk</h2>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Produk</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="5" style="text-align: center; color: #6b7280;">Belum ada data.</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
