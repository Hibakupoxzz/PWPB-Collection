<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kalkulator</title>
  <style>
    body {
      font-family: "Courier New", monospace;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #FDFCFB 40%, #F8B4B4 100%);
      color: #5A6472;
    }

    .calculator {
      background: #5A6472;
      border: 8px solid #AEDBF2;
      border-radius: 14px;
      padding: 30px;
      width: 440px;
      position: relative;
      box-shadow: 8px 8px 0 #333;
      transition: all 0.3s ease;
    }

    h2 {
      padding: 14px;
      font-size: 1.8em;
      margin-bottom: 20px;
      text-align: center;
      background: #F8B4B4;
      border: 4px solid #FDFCFB;
      border-radius: 8px;
      color: #5A6472;
      font-weight: bold;
      box-shadow: 4px 4px 0 #333;
    }

    .calculator input[type="number"] {
      width: calc(100% - 24px);
      padding: 14px;
      margin-bottom: 14px;
      border-radius: 6px;
      font-size: 1.2em;
      border: 2px solid #AEDBF2;
      background: #FAF9F6;
      transition: all 0.3s ease;
    }

    .buttons {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 14px;
      margin-top: 14px;
    }

    .buttons button {
      padding: 16px;
      font-size: 1.5em;
      cursor: pointer;
      font-weight: bold;
      border-radius: 10px;
      background: #AEDBF2;
      border: 3px solid #FDFCFB;
      color: #5A6472;
      transition: all 0.2s ease-in-out;
      box-shadow: 4px 4px 0 #333;
    }

    .buttons button:hover {
      background: #FDFCFB;
      color: #F8B4B4;
      transform: translate(-2px, -2px);
      box-shadow: 6px 6px 0 #333;
    }

    .result {
      margin-top: 24px;
      padding: 18px;
      font-size: 1.4em;
      font-weight: bold;
      border-radius: 10px;
      background: #FFE8D2;
      border: 5px solid #F8B4B4;
      color: #5A6472;
      text-align: center;
      box-shadow: 3px 3px 0 #333;
      transition: all 0.3s ease;
    }
  </style>
</head>
<body>
  <div class="calculator">
    <h2>Kalkulator</h2>
    <form action="" method="post">
      <input type="number" name="angka1" placeholder="Angka Pertama" required>
      <input type="number" name="angka2" placeholder="Angka Kedua" required>
      <div class="buttons">
        <button type="submit" name="operasi" value="tambah">+</button>
        <button type="submit" name="operasi" value="kurang">-</button>
        <button type="submit" name="operasi" value="kali">×</button>
        <button type="submit" name="operasi" value="bagi">÷</button>
      </div>
    </form>
    <div class="result">
      <?php 
      if (isset($_POST['operasi'])) { 
          $angka1 = $_POST['angka1']; 
          $angka2 = $_POST['angka2']; 
          $operasi = $_POST['operasi']; 
          $hasil = 0; 
          switch ($operasi) { 
              case 'tambah': $hasil = $angka1 + $angka2; break; 
              case 'kurang': $hasil = $angka1 - $angka2; break; 
              case 'kali': $hasil = $angka1 * $angka2; break; 
              case 'bagi': 
                  $hasil = ($angka2 != 0) ? $angka1 / $angka2 : "Tidak bisa dibagi nol!"; 
                  break; 
              default: $hasil = "Operasi tidak valid!"; break; 
          } 
          echo "Hasil: " . $hasil; 
      } else { 
          echo "Masukkan angka dan pilih operasi."; 
      } 
      ?>
    </div>
  </div>
</body>
</html>
