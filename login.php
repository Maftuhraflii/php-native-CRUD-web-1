<?php
include "service/database.php";
session_start();

$login_message = ""; // Perbaikan variabel nama dari $login_massage ke $login_message

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Gunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("SELECT * FROM patients WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Simpan data pengguna ke sesi
        $_SESSION['user'] = [
            'patient_id' => $data['patient_id'],
            'nama' => $data['name'],
            'address' => $data['address'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
        ];

        // Contoh saat pengguna login
$_SESSION['pasien'] = [
    'patient_id' => $data['patient_id'], // Ambil dari database
    'username' => $data['username'], // Data lain yang diperlukan
];


        // Redirect berdasarkan role pengguna
        if ($data['role'] === 'admin') {
            header("Location: dashboard_admin.php"); // Dashboard admin
        } elseif ($data['role'] === 'pasien') {
            header("Location: dashboard_user.php"); // Dashboard pasien
        } else {
            $login_message = "Role tidak valid.";
        }
        exit(); // Pastikan tidak ada kode yang dieksekusi setelah redirect
    } else {
        $login_message = "Username atau password salah.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HALAMAN LOGIN</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-image: url('foto/sakit_pinggang.jpg'); /* Ganti dengan path gambar Anda */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        height: 100vh;
        color: #fff;
    }
    
    .overlay {
        background-color: rgba(0, 0, 0, 0.3); /* Overlay putih tipis */
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
    
    .left-section {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-left: 50px;
        color: #fff;
        font-size: 24px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Efek bayangan teks */
    }
    
    .left-section h1 {
        font-weight: bold;
    }
    
    .right-section {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .login-form {
        background-color: rgba(255, 255, 255, 0.2); /* Hijau elegan dengan transparansi */
        border-radius: 10px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3); /* Bayangan lebih jelas */
        padding: 70px; /* Tambah padding untuk membuat area lebih luas */
        width: 500px; /* Lebar lebih besar */
        text-align: center;
    }
    
    .login-form h3 {
        margin-bottom: 40px; /* Beri lebih banyak ruang di bawah judul */
        font-size: 36px; /* Perbesar ukuran font judul */
        font-weight: bold;
        color: #000;
    }
    
    .login-form input {
        width: calc(100% - 30px); /* Sesuaikan ukuran input agar tidak terlalu sempit */
        padding: 20px; /* Perbesar padding input */
        margin: 20px 0; /* Tambah ruang antar input */
        border: none;
        border-radius: 8px; /* Bikin sudut lebih membulat */
        font-size: 20px; /* Perbesar ukuran teks input */
    }
    
    .login-form button {
        width: calc(100% - 30px);
        padding: 20px; /* Perbesar ukuran tombol */
        background-color: #004d00; /* Hijau gelap */
        color: #fff;
        border: none;
        border-radius: 8px; /* Sama seperti input */
        cursor: pointer;
        font-size: 22px; /* Perbesar ukuran font tombol */
        margin-top: 30px; /* Beri lebih banyak ruang di atas tombol */
    }
    
    .login-form button:hover {
        background-color: #006600;
    }
    
    .login-form a {
        display: inline-block;
        margin-top: 20px; /* Tambah ruang di atas link */
        color: #cce7cc;
        text-decoration: none;
        font-size: 18px; /* Perbesar ukuran font link */
    }
    
    .login-form a:hover {
        text-decoration: underline;
        font-weight: bold;
    }
    
    
    .back-to-home {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: rgba(0, 128, 0, 0.8); /* Hijau elegan */
        color: #fff;
        padding: 10px 15px;
        text-decoration: none;
        font-size: 16px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s;
    }
    
    .back-to-home:hover {
        background-color: #006600; /* Hijau lebih gelap saat hover */
    }
    
    
    </style>

<body>
    <div class="overlay"></div>

    <!-- Tombol kembali ke home -->
    <a href="index.php" class="back-to-home">Home</a>

    <div class="left-section">
        <h1>Klinik Amanda</h1>
        <div>"Kesehatan bukan segalanya, tapi tanpa kesehatan segalanya tak berarti."</div>
        
    </div>
    <div class="right-section">
        <div class="login-form">
            <h3>MASUK AKUN</h3>
            <i><?php $login_massage ?></i>
            <form action="login.php" method="POST">
                <input type="text" placeholder="Masukkan username Anda..." name="username" />
                <input type="password" placeholder="Masukkan password Anda..." name="password" />
                <button type="submit" name="login">Log in</button>
            </form>
            <a href="register.php">Register</a>
        </div>
    </div>
</body>


</html>