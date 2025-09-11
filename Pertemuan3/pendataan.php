<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendataan Siswa</title>
  <style>
    body {
      font-family: "Segoe UI", Arial, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #a8d0f0, #f8c4d8);
      padding: 20px;
    }

    .container, .data-display {
      background: rgba(255, 255, 255, 0.85);
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0, 78, 146, 0.2);
      width: 100%;
      max-width: 600px;
      margin-bottom: 25px;
      backdrop-filter: blur(10px);
      transition: transform 0.2s ease;
    }

    .container:hover, .data-display:hover {
      transform: translateY(-3px);
    }

    h2 {
      text-align: center;
      color: #004e92;
      margin-bottom: 20px;
      font-size: 1.6em;
      letter-spacing: 1px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #004e92;
    }

    input[type="text"],
    input[type="number"],
    select {
      width: 100%;
      padding: 12px;
      margin-bottom: 18px;
      border: 2px solid #a8d0f0;
      border-radius: 10px;
      font-size: 1em;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input:focus, select:focus {
      border-color: #004e92;
      outline: none;
      box-shadow: 0 0 6px rgba(0, 78, 146, 0.3);
    }

    button {
      width: 100%;
      padding: 14px;
      background: linear-gradient(135deg, #a8d0f0, #004e92);
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 1.1em;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 78, 146, 0.3);
    }

    button:hover {
      background: linear-gradient(135deg, #004e92, #a8d0f0);
      transform: scale(1.02);
      box-shadow: 0 6px 14px rgba(0, 78, 146, 0.4);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
      border-radius: 12px;
      overflow: hidden;
    }

    th, td {
      padding: 12px;
      text-align: center;
      border: 1px solid #ddd;
    }

    th {
      background: #004e92;
      color: white;
      font-weight: 600;
    }

    tr:nth-child(even) {
      background-color: #f1f7fc;
    }

    tr:hover {
      background-color: #e0effa;
    }

    .message {
      text-align: center;
      color: #004e92;
      margin-top: 15px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Form Input Data Siswa</h2>
    <form action="" method="post">
      <label for="nama">Nama Lengkap:</label>
      <input type="text" id="nama" name="nama" required>

      <label for="kelas">Kelas:</label>
      <select id="kelas" name="kelas" required>
        <option value="">-- Pilih Kelas --</option>
        <option value="XI RPL 1">XI RPL 1</option>
        <option value="XI RPL 2">XI RPL 2</option>
        <option value="XI RPL 3">XI RPL 3</option>
      </select>

      <label for="umur">Umur:</label>
      <input type="number" id="umur" name="umur" min="15" max="20" required>

      <button type="submit" name="submit_data">Tambah Siswa</button>
    </form>
  </div>

  <div class="data-display">
    <h2>Daftar Siswa</h2>
    <?php 
      session_start();

      if (!isset($_SESSION['daftar_siswa'])) {
        $_SESSION['daftar_siswa'] = [];
      }

      if (isset($_POST['submit_data'])) {
        $nama  = htmlspecialchars($_POST['nama']);
        $kelas = htmlspecialchars($_POST['kelas']);
        $umur  = (int)$_POST['umur'];

        $siswaBaru = [
          "nama"  => $nama,
          "kelas" => $kelas,
          "umur"  => $umur
        ];

        $_SESSION['daftar_siswa'][] = $siswaBaru;

        echo "<p class='message'>✨Data siswa <b>{$nama}</b> berhasil ditambahkan!</p>";
      }

      if (!empty($_SESSION['daftar_siswa'])) {
        echo "<table>";
        echo "<thead><tr><th>No.</th><th>Nama</th><th>Kelas</th><th>Umur</th></tr></thead>";
        echo "<tbody>";

        $nomor = 1;
        foreach ($_SESSION['daftar_siswa'] as $data) {
          echo "<tr>";
          echo "<td>" . $nomor++ . "</td>";
          echo "<td>" . $data['nama'] . "</td>";
          echo "<td>" . $data['kelas'] . "</td>";
          echo "<td>" . $data['umur'] . "</td>";
          echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
      } else {
        echo "<p class='message'>Belum ada data siswa. Silakan tambahkan!</p>";
      }
    ?>
  </div>
</body>
</html>
