<?php
include "service/database.php";
session_start();

// Pastikan ID dokter diterima lewat URL
if (!isset($_GET['obat_id'])) {
    die("ID obat tidak ditemukan.");
}

$obat_id = $_GET['obat_id'];

// Query untuk menghapus data dokter berdasarkan dokter_id
$delete_query = "DELETE FROM obat WHERE obat_id = ?";
$stmt = $conn->prepare($delete_query);
$stmt->bind_param("i", $obat_id);

if ($stmt->execute()) {
    echo "<script>alert('Data obat berhasil dihapus!'); window.location.href='dashboard_data_obat.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}
?>
