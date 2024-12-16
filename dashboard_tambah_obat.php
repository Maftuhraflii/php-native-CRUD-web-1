<?php
include "service/database.php";  // Pastikan koneksi ke database sudah diatur
session_start();  // Mulai session

// Proses jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form dan pastikan data tidak kosong
    $nama_obat = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $harga = isset($_POST['harga']) ? trim($_POST['harga']) : '';
    $stok = isset($_POST['stok']) ? trim($_POST['stok']) : '';

    // Cek apakah ada data yang kosong
    if ($nama_obat == '' || $harga == ''  || $stok == '') {
        echo "<script>alert('Semua kolom harus diisi!');</script>";
    } else {
        // Persiapkan SQL query untuk mencegah SQL injection
        // Gunakan 's' untuk string dan 'i' untuk integer (harga dan stok adalah angka)
        $stmt = $conn->prepare("INSERT INTO obat (nama_obat, harga, stok) 
                                VALUES (?, ?, ?)");
        $stmt->bind_param("sii", $nama_obat, $harga, $stok);  // 's' untuk string, 'i' untuk integer

        // Eksekusi query dan periksa apakah berhasil
        if ($stmt->execute()) {
            echo "<script>alert('Obat berhasil ditambahkan!');</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        // Tutup prepared statement
        $stmt->close();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah obat</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: Arial, sans-serif;
        background-color: #e8f5e9; /* Latar belakang hijau muda */
        display: flex;
        height: 100vh;
        color: #2e7d32; /* Hijau tua */
    }
    
    <?php include "styles/dashboard_style.html" ?>
    
    /* Kontainer untuk form */
    .form-container {
        background-color: #e6f2e6;
        padding: 20px 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 128, 0, 0.2);
        max-width: 400px;
        width: 100%;
        text-align: center;
    }
    
    .form-container h1 {
        color: #3d7f3d;
        margin-bottom: 20px;
        font-size: 24px;
    }
    
    /* Gaya untuk grup form */
    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }
    
    .form-group label {
        color: #2e6b2e;
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }
    
    .form-group input[type="text"],
    .form-group input[type="number"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #c1e1c1;
        border-radius: 5px;
        background-color: #fff;
        color: #333;
        font-size: 16px;
    }
    
    /* Gaya tombol tambah */
    .tambah-button {
        background-color: #3d7f3d;
        color: #fff;
        padding: 12px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
    }
    
    .tambah-button:hover {
        background-color: #2e6b2e;
    }
    
    <?php include "styles/logout_btn.html" ?>
    
    
</style>

<body>
<div class="dashboard-container">
        <!-- Sidebar Dashboard -->
    <aside class="dashboard">
    <h1 class="dashboard-title">Dashboard</h1>
        <nav class="dashboard-menu">
            <ul>
                <li><a href="dashboard_admin.php">Tambah Dokter</a></li>
                <li><a href="dashboard_Tambah_obat.php">Tambah Obat</a></li>
                <li><a href="dashboard_data_dokter.php">Data Dokter</a></li>
                <li><a href="dashboard_data_obat.php">Data Obat</a></li>
                <li><a href="dashboard_data_pasien.php">Data Pasien</a></li>  
                <li><a href="dashboard_data_Pembelian_obat.php">Data Pembelian Obat</a></li>
            </ul>
        </nav>
    </aside>

        <!-- Konten Utama -->
        <main class="content">
            <div class="form-container">
                <h1>Tambah Obat Baru klinik amanda</h1>
                    <form action="dashboard_tambah_obat.php" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Obat</label>
                                <input type="text" id="nama" name="nama" placeholder="Masukkan nama obat" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Obat</label>
                                <input type="number" id="harga" name="harga" min="500" step="500" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">jumlah Stok Obat</label>
                                <input type="number" id="stok" name="stok" min="1" required>
                        </div>
                            <button type="submit" class="tambah-button">Tambah</button>
                    </form>
            </div>
        </main>
</div>
</body>
</html>