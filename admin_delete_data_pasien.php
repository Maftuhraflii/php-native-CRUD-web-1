<?php
include "service/database.php";
session_start();

// Pastikan ID pasien diterima lewat URL
if (!isset($_GET['patient_id'])) {
    die("ID pasien tidak ditemukan.");
}

$patient_id = $_GET['patient_id'];

// Mulai transaksi
$conn->begin_transaction();

try {
    // Query untuk menghapus data di tabel pembelian yang terkait dengan pasien
    $delete_pembelian_query = "DELETE FROM pembelian WHERE patient_id = ?";
    $stmt1 = $conn->prepare($delete_pembelian_query);
    $stmt1->bind_param("i", $patient_id);

    if (!$stmt1->execute()) {
        throw new Exception("Gagal menghapus data pembelian.");
    }

    // Query untuk menghapus data pasien
    $delete_patient_query = "DELETE FROM patients WHERE patient_id = ?";
    $stmt2 = $conn->prepare($delete_patient_query);
    $stmt2->bind_param("i", $patient_id);

    if (!$stmt2->execute()) {
        throw new Exception("Gagal menghapus data pasien.");
    }

    // Jika semua query berhasil, commit transaksi
    $conn->commit();

    echo "<script>alert('Data pasien berhasil dihapus!'); window.location.href='dashboard_data_pasien.php';</script>";
} catch (Exception $e) {
    // Jika ada error, rollback transaksi
    $conn->rollback();

    echo "Error: " . $e->getMessage();
}
?>

