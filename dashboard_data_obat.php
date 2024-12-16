<?php
include "service/database.php";
session_start(); // Mulai session

// Query untuk mengambil data dokter
$query = "SELECT obat_id, nama_obat, harga, stok FROM obat";
$result = $conn->query($query);

if (!$result) {
    die("Error mengambil data obat: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat</title>
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
            <h1>Data Obat Klinik Amanda</h1>
            
            <!-- Tabel Data Dokter -->
            <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; margin-top: 20px;">
                <thead>
                    <tr>
                        <th>No Obat</th>
                        <th>Nama Obat</th>
                        <th>harga Obat</th>
                        <th>Stok Obat</th>
                        <th>Edit Data</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Menampilkan data dokter dari database
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['obat_id'] . "</td>";
                        echo "<td>" . $row['nama_obat'] . "</td>";
                        echo "<td>" . $row['harga'] . "</td>";
                        echo "<td>" . $row['stok'] . "</td>";
                        echo "<td>
                                <a href='admin_edit_data_obat.php?obat_id=" . $row['obat_id'] . "'><button>Edit</button></a>
                                <a href='admin_delete_data_obat.php?obat_id=" . $row['obat_id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data obat ini?\")'><button>Delete</button></a>
                             </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </main>
</div>

</body>

</html>
