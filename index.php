<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Amanda</title>
    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<?php include "layout/header.html" ?>

<style>
        /* Mengatur tampilan seluruh halaman agar gambar background penuh */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            font-family: 'Poppins', sans-serif;
        }

        /* Gaya background full image */
        .background {
            background-image: url('foto/background1.jpg'); /* Ganti 'gambar-anda.jpg' dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 0;
        }

        /* Konten utama (Full Screen) */
        .content {
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3); /* Background semi-transparan */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0;
            margin: 0;
        }

        h1 {
            font-size: 70px;
            margin-bottom: 20px;
            padding: 0;
            font-weight: 700;
        }

        p {
            font-size: 28px;
            margin-bottom: 30px;
            max-width: 800px;
            padding: 0;
            color: black;
            font-weight: 500;
        }

        /* Tombol Register */
        .register-btn {
            display: inline-block;
            padding: 15px 30px;
            background-color: #28a745;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .register-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="background">
        <div class="content">
            <p>Sistem Informasi</p>
            <h1>Klinik Amanda</h1>
            <a href="register.php" class="register-btn">Register Now</a>
        </div>
    </div>
</body>

<?php include "layout/footer.html" ?>
</html>