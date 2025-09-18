<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Produk - Alice Theme</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #eaf3ff, #ffffff);
      padding: 40px;
      margin: 0;
      color: #333;
    }

    .container {
      max-width: 520px;
      margin: auto;
      background: #ffffffcc;
      padding: 35px 30px;
      border-radius: 16px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      animation: fadeIn 0.6s ease-in-out;
      backdrop-filter: blur(8px);
      border: 2px solid #c9e4ff;
    }

    h1 {
      text-align: center;
      color: #3a4d7a;
      margin-bottom: 25px;
      padding-bottom: 10px;
      border-bottom: 3px dashed #a3c9ff;
      font-size: 24px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #34495e;
      font-size: 14px;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 12px 14px;
      box-sizing: border-box;
      border: 1px solid #cfd8dc;
      border-radius: 10px;
      font-size: 15px;
      transition: border-color 0.3s, box-shadow 0.3s;
      background: #fdfdff;
    }

    .form-group input:focus,
    .form-group textarea:focus {
      border-color: #7aa6ff;
      box-shadow: 0 0 6px rgba(122, 166, 255, 0.5);
      outline: none;
    }

    .btn {
      width: 100%;
      padding: 14px;
      font-size: 16px;
      color: #fff;
      background: linear-gradient(135deg, #7aa6ff, #9ecbff);
      border: none;
      border-radius: 30px;
      cursor: pointer;
      font-weight: bold;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(122,166,255,0.4);
    }

    .btn:hover {
      background: linear-gradient(135deg, #5e8bff, #82b4ff);
      transform: scale(1.04);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1> Tambah Produk Baru </h1>
    <form action="proses_tambah.php" method="POST">
      <div class="form-group">
        <label for="name">Nama Produk</label>
        <input type="text" name="name" id="name" required>
      </div>
      <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea name="description" id="description" rows="4"></textarea>
      </div>
      <div class="form-group">
        <label for="price">Harga</label>
        <input type="number" name="price" id="price" required>
      </div>
      <div class="form-group">
        <label for="stock">Stok</label>
        <input type="number" name="stock" id="stock" required>
      </div>
      <button type="submit" class="btn">Simpan Produk</button>
    </form>
  </div>
</body>
</html>
