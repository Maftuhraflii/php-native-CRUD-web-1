<?php
include "service/database.php"; // Koneksi database

session_start();

$register_message = ""; // Pesan status pembelian

// Cek apakah pengguna sudah login
if (!isset($_SESSION['pasien'])) {
    // Jika pengguna belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

if (isset($_POST['beli'])) {
    // Pastikan variabel $_POST['nama_obat'] ada
    if (isset($_POST['nama_obat'])) {
        $obat_id = $_POST['nama_obat'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];
        $bayar = $_POST['bayar'];

        $patient_id = $_SESSION['pasien']['patient_id']; // Ambil ID pasien dari session

        try {
            // Ambil nama obat, harga, dan stok berdasarkan ID obat yang dipilih
            $query = "SELECT nama_obat, harga, stok FROM obat WHERE obat_id = '$obat_id'";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                $obat_data = $result->fetch_assoc();
                $nama_obat = $obat_data['nama_obat'];
                $harga = $obat_data['harga'];
                $stok = $obat_data['stok'];

                if ($jumlah > $stok) {
                    $register_message = "Jumlah pembelian melebihi stok yang tersedia!";
                } else {
                    // Mengurangi stok obat
                    $new_stok = $stok - $jumlah;
                    $update_stok_query = "UPDATE obat SET stok = $new_stok WHERE obat_id = '$obat_id'";
                    if (!$conn->query($update_stok_query)) {
                        $register_message = "Gagal memperbarui stok obat: " . $conn->error;
                    } else {
                        // Menyimpan pembelian ke database
                        $sql = "INSERT INTO pembelian (nama_obat, jumlah, total_harga, cara_pembayaran, patient_id) 
                                VALUES ('$nama_obat', '$jumlah', '$total', '$bayar', '$patient_id')";

                        if (!$conn->query($sql)) {
                            $register_message = "Gagal menyimpan pembelian: " . $conn->error;
                        } else {
                            $register_message = "Pembelian Anda berhasil!";
                            header("Location: user_konfirmasi_pembayaran.php"); // Redirect ke riwayat pembelian
                            exit(); // Jangan lupa exit setelah redirect
                        }
                    }
                }
            } else {
                $register_message = "Obat yang dipilih tidak ditemukan.";
            }
        } catch (mysqli_sql_exception $e) {
            $register_message = "Ada masalah, silakan coba lagi: " . $e->getMessage();
        }
    }
}

// Ambil data obat dari database
$query = "SELECT obat_id, nama_obat, harga, stok FROM obat"; // Ambil data obat
$result = $conn->query($query);

if (!$result) {
    die("Error mengambil data obat: " . $conn->error); // Menampilkan pesan error SQL
}

$obat_list = [];
while ($row = $result->fetch_assoc()) {
    $obat_list[] = $row; // Ambil setiap data obat dan simpan dalam array
}

$user = $_SESSION['pasien'] ?? null; // Data pengguna yang login
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Obat</title>
</head>

<?php include "styles/beliobat.html" ?>

<body>
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

    <main class="content">
        <h2>Pembelian Obat</h2>
        <?php if ($register_message): ?>
            <div class="message"><?php echo $register_message; ?></div>
        <?php endif; ?>
        <form action="user_beli_obat.php" method="POST">
            <div class="form-group">
                <label for="nama_obat">Nama Obat:</label>
                <select name="nama_obat" id="nama_obat" required>
                    <option value="" disabled selected>Pilih Obat</option>
                    <?php foreach ($obat_list as $obat): ?>
                        <option value="<?php echo $obat['obat_id']; ?>">
                            <?php echo $obat['nama_obat']; ?> - Rp <?php echo $obat['harga']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" min="1" required>
            </div>

            <div class="form-group">
                <label for="total">Total Harga (Rp):</label>
                <input type="text" id="total" name="total" readonly>
            </div>

            <label>
                <input type="radio" name="bayar" value="cash" required>
                Cash
            </label>
            <label>
                <input type="radio" name="bayar" value="Transfer" required>
                Transfer
            </label>

            <button type="submit" class="submit-btn" name="beli">Tambah Pembelian</button>
        </form>
    </main>

    <script>
        const jumlahInput = document.getElementById('jumlah');
        const namaObatSelect = document.getElementById('nama_obat');
        const totalInput = document.getElementById('total');
        const obatList = <?php echo json_encode($obat_list); ?>;

        namaObatSelect.addEventListener('change', updateStockAndCalculateTotal);
        jumlahInput.addEventListener('input', calculateTotal);

        function updateStockAndCalculateTotal() {
            const selectedObat = obatList.find(obat => obat.obat_id == namaObatSelect.value);

            if (selectedObat) {
                const maxStock = selectedObat.stok; // Ambil stok dari data obat
                jumlahInput.max = maxStock; // Set nilai maksimum pada input jumlah
                jumlahInput.value = ""; // Reset nilai jumlah
                totalInput.value = ""; // Reset total harga
                alert(`Stok tersedia untuk ${selectedObat.nama_obat}: ${maxStock}`);
            }
        }

        function calculateTotal() {
            const selectedObat = obatList.find(obat => obat.obat_id == namaObatSelect.value);
            const harga = selectedObat ? selectedObat.harga : 0;
            const jumlah = parseInt(jumlahInput.value) || 0;

            if (jumlah > jumlahInput.max) {
                alert("Jumlah melebihi stok yang tersedia!");
                jumlahInput.value = jumlahInput.max; // Batasi ke stok maksimum
            }

            totalInput.value = harga * jumlah; // Hitung total harga
        }
    </script>
</body>
</html>
