<?php
include "service/database.php";
session_start(); // Mulai session

// Cek apakah pengguna sudah login
if (!isset($_SESSION['pasien'])) {
    // Jika pengguna belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

// Ambil data pasien yang login dari session
$patient_id = $_SESSION['pasien']['patient_id']; // Mengambil patient_id dari session

// Query untuk mengambil data pembelian berdasarkan patient_id
$query = "SELECT * FROM pembelian WHERE patient_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $patient_id); // Bind parameter untuk menghindari SQL injection
$stmt->execute();
$result = $stmt->get_result();

// Ambil data user dari session
$user = $_SESSION['user'] ?? null; // Data pengguna yang login

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pembelian obat</title>
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
<?php include "styles/edit_data_file.html"  ?>

/* Tabel Data Dokter */
.table-container {
    width: 90%;
    margin: 30px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #388e3c; /* Hijau gelap elegan */
    color: white;
    font-size: 18px;
    border-bottom: 2px solid #4caf50;
}

td {
    background-color: #e8f5e9; /* Hijau muda */
    font-size: 16px;
    border-bottom: 1px solid #c8e6c9;
}

tr:nth-child(even) td {
    background-color: #dcedc8; /* Hijau muda untuk baris genap */
}

tr:hover td {
    background-color: #c8e6c9; /* Efek hover pada baris */
    transition: background-color 0.3s ease;
}

.table-container a {
    color: #388e3c;
    text-decoration: none;
    font-weight: bold;
}

.table-container a:hover {
    text-decoration: underline;
}

/* Styling untuk pesan pembelian */
.message-container {
    background-image: url('gambar/chillguy.jpg');
    height: 80%;
    max-height: 1000px;
    width: 60%; /* Lebar kontainer pesan */
    max-width: 700px; /* Membatasi lebar kontainer */
    margin: 100px auto; /* Mengatur margin agar berada di tengah halaman secara vertikal dan horizontal */
    padding: 20px;
    text-align: center; /* Mengatur teks agar berada di tengah */
    border: 1px solid #f5c6cb; /* Border dengan warna yang lebih gelap untuk kontras */
    border-radius: 10px; /* Sudut border membulat */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Memberikan bayangan agar tampak lebih modern */
}

.message-container p {
    font-size: 18px; /* Ukuran font yang lebih besar agar mudah dibaca */
    color: #721c24; /* Warna teks merah untuk menunjukkan peringatan */
    font-weight: bold; /* Membuat teks lebih tebal */
}

.message-container a {
    color: #155724; /* Warna hijau untuk link yang bisa diklik */
    text-decoration: none; /* Menghapus garis bawah pada link */
    font-weight: bold; /* Membuat link lebih jelas */
}

.message-container a:hover {
    text-decoration: underline; /* Menambahkan garis bawah pada link saat hover */
}


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
            <h1>Riwayat Pembelian Anda</h1>

            <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Tanggal Pembelian</th>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['tanggal_pembelian']); ?></td>
                        <td><?php echo htmlspecialchars($row['nama_obat']); ?></td>
                        <td><?php echo htmlspecialchars($row['jumlah']); ?></td>
                        <td><?php echo "Rp " . number_format($row['total_harga'], 0, ',', '.'); ?></td>
                        <td><?php echo htmlspecialchars($row['cara_pembayaran']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="message-container">
            <p>Anda belum melakukan pembelian.</p>
            <!-- Jika ada link untuk mengarahkan pengguna ke halaman pembelian -->
            <a href="user_beli_obat.php">Klik di sini untuk melakukan pembelian</a>
        </div>

    <?php endif; ?>
                 
        </main>
               
</body>
</html>

<?php
// Menutup koneksi setelah selesai
$stmt->close();
$conn->close();
?>