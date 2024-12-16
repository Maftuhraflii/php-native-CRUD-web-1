<?php
include "service/database.php";
session_start(); // Mulai session

// Periksa apakah user sudah login
if (!isset($_SESSION['user'])) {
    header("Location: login.php"); // Jika belum login, arahkan ke halaman login
    exit;
}

// Ambil data user dari session
$user = $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

.content h2 {
    color: #2e7d32;
    font-size: 28px;
    margin-bottom: 20px;
}

.container {
    width: 90%;
    max-width: 1000px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 128, 0, 0.8);
       /* Menambahkan minimal tinggi atau fleksibilitas tinggi */
    min-height: 60vh; /* Membuat container setinggi viewport */
    display: flex;
    flex-direction: column; /* Membuat konten mengalir secara vertikal */
}

h1 {
    color: #2c6e49; /* Warna hijau tua untuk judul */
    text-align: center;
    margin-bottom: 20px;
}

.patient-table {
    width: 100%;
    height: 100%; /* Mengatur tabel agar mengisi tinggi container */
    border-collapse: collapse;
    font-size: 20px;
    flex-grow: 1; /* Membuat tabel tumbuh sesuai ruang yang tersedia */
}

.patient-table th, .patient-table td {
    padding: 20px;
    text-align: left;
    vertical-align: middle;
}

.patient-table th {
    width: 35%;
    background-color: #2c6e49; /* Warna hijau tua */
    color: #ffffff;
    font-weight: bold;
}

.patient-table td {
    background-color: #f0f8f5; /* Warna hijau muda untuk kolom data */
    color: #2c6e49;
    border-bottom: 1px solid #c8e6c9; /* Garis bawah sel */
}

.patient-table tr:last-child td {
    border-bottom: none; /* Hapus garis bawah pada baris terakhir */
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
                    <li><a href="dashboard_user.php">Profil Pasien</a></li>
                    <li><a href="user_beli_obat.php">Pembelian Obat</a></li>
                    <li><a href="user_riwayat_obat.php">Riwayat Pembelian Obat</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Konten Utama -->
        <main class="content">
            <section id="home">
                <h2>Selamat Datang <?php echo $user['nama']; ?> di Dashboard Klinik Amanda</h2>
                <div class="container">
        <h1>Detail Data Pasien</h1>
        <table class="patient-table">
            <tbody>
                <tr>
                    <th>Nama</th>
                    <td id="nama"><?php echo $user['nama']; ?></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td id="alamat"><?php echo $user['address']; ?></td>
                </tr>
                <tr>
                    <th>gender</th>
                    <td id="jenisKelamin"><?php echo $user['gender']; ?></td>
                </tr>
                <tr>
                    <th>email</th>
                    <td id="email"><?php echo $user['email']; ?></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td id="phoneNumber"><?php echo $user['phone']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>
            </section>
        </main>
    </div>

    <div class="logout-container">
    <a href="login.php">
        <button class="logout-btn">Log Out</button>
    </a>
    </div>

</body>


</html>