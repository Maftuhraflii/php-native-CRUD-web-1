<?php
include "service/database.php";
session_start();

// Pastikan ID dokter diterima lewat URL
if (!isset($_GET['dokter_id'])) {
    die("ID dokter tidak ditemukan.");
}

$dokter_id = $_GET['dokter_id'];

// Query untuk mengambil data dokter berdasarkan dokter_id
$query = "SELECT * FROM dokter WHERE dokter_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $dokter_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    die("Dokter tidak ditemukan.");
}

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data yang diinputkan dan lakukan update
    $nama = $_POST['nama'];
    $phone = $_POST['phone'];
    $spesialisasi = $_POST['spesialisasi'];
    $jadwal_waktu = $_POST['jadwal_waktu'];

    $update_query = "UPDATE dokter SET nama = ?, phone = ?, spesialisasi = ?, jadwal_waktu = ? WHERE dokter_id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssssi", $nama, $phone, $spesialisasi, $jadwal_waktu, $dokter_id);

    if ($update_stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='dashboard_data_dokter.php';</script>";
    } else {
        echo "Error: " . $update_stmt->error;
    }
}
?>

<style>

    /* Reset margin, padding, and box-sizing */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f1f8e9; /* Latar belakang hijau muda */
    color: #2e7d32; /* Hijau tua */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

h1 {
    text-align: top;
    color: #388e3c; /* Hijau gelap */
    font-size: 24px;
    margin-bottom: 30px;
}

form {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    width: 400px;
    text-align: left;
}

label {
    font-size: 16px;
    color: #388e3c;
    margin-bottom: 8px;
    display: block;
}

input[type="text"],
input[type="time"] {
    width: 100%;
    padding: 10px;
    margin: 10px 0 20px 0;
    border: 2px solid #c8e6c9;
    border-radius: 8px;
    font-size: 16px;
    transition: border 0.3s;
}

input[type="text"]:focus,
input[type="time"]:focus {
    border: 2px solid #388e3c;
    outline: none;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #388e3c; /* Hijau gelap */
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #66bb6a; /* Hijau muda saat hover */
}

button:focus {
    outline: none;
}

form .form-group {
    margin-bottom: 20px;
}

/* Responsif untuk perangkat mobile */
@media (max-width: 600px) {
    form {
        width: 90%;
        padding: 20px;
    }

    h1 {
    text-align: center;
    color: #388e3c; /* Hijau gelap */
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 30px; /* Memberikan jarak bawah yang cukup */
    margin-top: 0; /* Menghilangkan jarak atas */
    padding-top: 20px; /* Memberikan ruang atas agar tidak terlalu dekat dengan tepi atas */
}

}

</style>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Dokter</title>
</head>
<body>
    <form method="POST" action="">
    <h1>Update Data Dokter</h1>
        <label for="nama">Nama Dokter:</label>
        <input type="text" id="nama" name="nama" value="<?= $row['nama'] ?>" required><br><br>

        <label for="phone">Nomor Telepon:</label>
        <input type="text" id="phone" name="phone" value="<?= $row['phone'] ?>" required><br><br>

        <label for="spesialisasi">Spesialisasi:</label>
        <input type="text" id="spesialisasi" name="spesialisasi" value="<?= $row['spesialisasi'] ?>" required><br><br>

        <label for="jadwal_waktu">Jadwal Waktu:</label>
        <input type="time" id="jadwal_waktu" name="jadwal_waktu" value="<?= $row['jadwal_waktu'] ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
