<?php
    include "service/database.php";

    $register_massage = "";

    if(isset($_POST["register"])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];

    try{
        $sql = "INSERT INTO patients (name, username, password, gender, phone, email, address) values 
        ('$nama', '$username', '$password', '$gender', '$phone', '$email', '$address')";

        if($conn->query($sql)) {
            $register_massage = "daftar akun anda berhasil, silahkan login";

            header("location: login.php");
        }else{
            $register_massage = "akun tidak ditemukan silahkan coba lagi";
        }
    }catch (mysqli_sql_exception){
        $register_massage = "ada sesuatu yang salah, silahkan ganti username atau password...";
    }
    $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pasien</title>
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
        width: 800px; /* Lebar lebih besar */
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
        padding: 15px; /* Perbesar padding input */
        margin: 15px 0; /* Tambah ruang antar input */
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
            <h3>DAFTAR SEKARANG</h3>
            <i><?= $register_massage ?></i>
            <form action="Register.php" method="post">
                <input type="text" placeholder="Masukkan nama Anda..." name="nama" />
                <input type="text" placeholder="Masukkan username Anda.." name="username" />
                <input type="text" placeholder="Masukkan password Anda.." name="password" />
                <input type="text" placeholder="Masukkan nomor telepon Anda..." name="phone" />
                <input type="text" placeholder="Masukkan Email Anda..." name="email" />
                <input type="text" placeholder="Masukkan Alamat Anda..." name="address" />
            <label>
                <input type="radio" name="gender" value="Laki-laki" required>
                Laki-laki
            </label>
            <label>
                <input type="radio" name="gender" value="Perempuan" required>
                Perempuan
            </label>
                <button type="submit" name="register">Register Now</button> 
            </form>
        </div>
    </div>
</body>

</html>