<?php
include "service/database.php";
session_start();

// Pastikan ID pasien diterima lewat URL
if (!isset($_GET['id'])) {
    die("ID pembelian tidak ditemukan.");
}

$id = $_GET['id'];

// Mulai transaksi
$conn->begin_transaction();

try {
    // Query untuk menghapus data di tabel pembelian yang terkait dengan pasien
    $delete_pembelian_query = "DELETE FROM pembelian WHERE id = ?";
    $stmt1 = $conn->prepare($delete_pembelian_query);
    $stmt1->bind_param("i", $id);

    if (!$stmt1->execute()) {
        throw new Exception("Gagal menghapus data pembelian.");
    }

    // Jika semua query berhasil, commit transaksi
    $conn->commit();

    echo "<script>alert('Data pembelian berhasil dihapus!'); window.location.href='dashboard_data_pembelian_obat.php';</script>";
} catch (Exception $e) {
    // Jika ada error, rollback transaksi
    $conn->rollback();

    echo "Error: " . $e->getMessage();
}
?>

