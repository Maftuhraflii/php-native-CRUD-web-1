<?php
include "service/database.php";
session_start();

// Pastikan ID dokter diterima lewat URL
if (!isset($_GET['dokter_id'])) {
    die("ID dokter tidak ditemukan.");
}

$dokter_id = $_GET['dokter_id'];

// Query untuk menghapus data dokter berdasarkan dokter_id
$delete_query = "DELETE FROM dokter WHERE dokter_id = ?";
$stmt = $conn->prepare($delete_query);
$stmt->bind_param("i", $dokter_id);

if ($stmt->execute()) {
    echo "<script>alert('Data dokter berhasil dihapus!'); window.location.href='dashboard_data_dokter.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}
?>
