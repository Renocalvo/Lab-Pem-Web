<?php
// Pindahkan semua require_once ke paling atas
require_once 'Controller/Layanan.php';
require_once 'Service/JasaTitip.php';
require_once 'Service/JasaAngkut.php';
require_once 'Controller/SistemLayanan.php';

session_start();  // Pastikan session_start() dipanggil setelah require_once

// Inisialisasi sistem layanan jika belum ada di session
if (!isset($_SESSION['sistem'])) {
    $_SESSION['sistem'] = new JasaTitipAngkut\SistemLayanan();
}

$sistem = $_SESSION['sistem'];

// Proses form jika ada request POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $harga = (int)$_POST['harga'];
    $kapasitas = (int)$_POST['kapasitas'];
    $layanan = $_POST['layanan'];

    if ($layanan === 'titip') {
        $objLayanan = new JasaTitipAngkut\JasaTitip($nama, $harga, $kapasitas);
    } else {
        $objLayanan = new JasaTitipAngkut\JasaAngkut($nama, $harga, $kapasitas);
    }

    $sistem->tambahLayanan($objLayanan);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Jasa Titip Angkut</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f5;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 15px 0;
        }

        h1 {
            margin: 0;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            flex-grow: 1;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
            padding: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="text"]:focus, input[type="number"]:focus, select:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        button {
            width: 100%;
            max-width: 300px;
            margin: 20px auto;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .service-list {
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        .service-item {
            background-color: #e7f3e7;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        footer {
            text-align: center;
            padding: 10px 0;
            background-color: #333;
            color: white;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: 15px;
            }

            form {
                padding: 10px;
            }

            button {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 24px;
            }

            input[type="text"], input[type="number"], select {
                font-size: 14px;
            }

            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Sistem Jasa Titip Angkut</h1>
    </header>

    <div class="container">
        <form method="POST" action="">
            <label for="layanan">Pilih Layanan:</label>
            <select name="layanan" id="layanan" required>
                <option value="titip">Jasa Titip Barang</option>
                <option value="angkut">Jasa Angkut Barang</option>
            </select>

            <label for="nama">Nama Layanan:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="harga">Harga (Rp):</label>
            <input type="number" id="harga" name="harga" required>

            <label for="kapasitas">Kapasitas/Maksimal Barang:</label>
            <input type="number" id="kapasitas" name="kapasitas" required>

            <button type="submit">Tambah Layanan</button>
        </form>

        <div class="service-list">
            <h2>Daftar Layanan Tersedia:</h2>
            <ul>
                <?php
                if (!empty($sistem->layanan)) {
                    foreach ($sistem->layanan as $layanan) {
                        echo "<li class='service-item'>" . $layanan->deskripsi() . "</li>";
                    }
                } else {
                    echo "<li class='service-item'>Belum ada layanan tersedia.</li>";
                }
                ?>
            </ul>
        </div>
    </div>

    <footer>
        &copy; 2024 Sistem Jasa Titip Angkut. All rights reserved.
    </footer>
</body>
</html>
