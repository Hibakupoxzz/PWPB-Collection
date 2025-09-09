<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana PHP</title>
    <style>
        /* CSS Sederhana untuk tampilan */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh; /* Setidaknya 80% tinggi viewport */
            background-color: #f0f0f0;
        }
        .calculator {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .calculator input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1.1em;
        }
        .calculator .buttons button {
            width: 48%;
            padding: 12px;
            margin: 5px 1%;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .calculator .buttons button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Kalkulator Sederhana</h2>
        <form action="" method="post">
            <input type="number" name="angka1" placeholder="Angka Pertama" required>
            <input type="number" name="angka2" placeholder="Angka Kedua" required>
            <div class="buttons">
                <button type="submit" name="operasi" value="tambah">+</button>
                <button type="submit" name="operasi" value="kurang">-</button>
                <button type="submit" name="operasi" value="kali">*</button>
                <button type="submit" name="operasi" value="bagi">/</button>
            </div>
        </form>
        <div class="result">
            <?php
            // Kode PHP untuk kalkulator akan ditempatkan di sini
            // Ini akan diproses setelah form disubmit
            ?>
        </div>
    </div>
</body>
</html>
