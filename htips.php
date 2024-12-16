<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips Sehat Klinik Amanda</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<?php include "layout/header.html" ?>

<style>
        /* Reset dan gaya dasar */
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
            background-image: url('foto/background_tips.jpg'); /* Ganti 'foto/background_tips.jpg' dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

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

        /* Overlay transparan */
        .overlay {
            position: absolute;
              top: 102px; /* Geser ke bawah 20px dari posisi normalnya */
              left: 50%; /* Geser ke kanan 30px dari posisi normalnya */
              bottom: -102px;
            max-width: 1200px;
            background-color: rgba(255, 255, 255, 0.9); /* Putih semi-transparan */
            padding: 30px;
            text-align: left;
        }

        /* Gaya teks */
    h2 {
        color: #000000; /* Warna teks utama */
        text-align: left;
        margin-bottom: 20px;
        font-weight: bold;
        padding : 0px 20px;
    }

        p {
        color: #000000;
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 20px;
        padding : 10px;
    }

        /* Paragraf dipisahkan */
        .paragraph {
            margin-bottom: 20px;
        }

        /* Paragraf kedua dengan gambar */
        .paragraph-with-image {
            display: flex;
            gap: 80px; /* Jarak antara teks dan gambar */
            align-items: center;
        }

        .paragraph-with-image img {
            max-width: 40%; /* Gambar memenuhi 40% lebar */
            height: auto;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        /* Gambar di pojok kiri bawah */
        .corner-image-container {
            position: absolute;
            bottom: 20px;
            left: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .corner-image-container img {
            width: 550px;
            height: auto;
            position: absolute;
            bottom: -40px;
            left: 100px;
            border-radius: 10%;
        }

        .corner-image-container span {
    position: absolute; /* Tetap pada posisi absolut untuk fleksibilitas */
    bottom: 120px; /* Ubah posisi vertikal sesuai kebutuhan */
    left: 555px; /* Ubah posisi horizontal sesuai kebutuhan */
    margin-top: 10px;
    color: white;
    font-size: 1rem;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    transform: rotate(90deg); /* Memutar teks dengan sudut -25 derajat */
    white-space: nowrap; /* Mencegah teks terpotong ke baris baru */
    overflow: visible; /* Pastikan teks tidak terpotong jika terlalu panjang */
          }

          .paragrap {
    position: absolute; /* Tetap pada posisi absolut untuk fleksibilitas */
    bottom: 550px; /* Ubah posisi vertikal sesuai kebutuhan */
    left: 60px; /* Ubah posisi horizontal sesuai kebutuhan */
    margin-top: 10px;
    color: white;
    text-align: left;
    font-size: 550px; /* Ukuran font jauh lebih besar */
    font-weight: bold; /* Berat font */
    text-shadow: 10px 10px 15px rgba(0, 0, 0, 0.8); /* Bayangan teks lebih jelas */
    letter-spacing: 30px; /* Memberikan lebih banyak spasi antar huruf */
    text-transform: uppercase; /* Membuat semua huruf menjadi huruf besar */
    line-height: 1.2; /* Menyesuaikan spasi antara baris */
}

    </style>
</head>
<body>
    <div class="background">
        <div class="content">
            <div class="paragrap">
                <h1>Useful things</h1>
                <h1>for our health...</h1>
            </div>
        </div>

        <!-- Gambar di pojok kiri bawah -->
        <div class="corner-image-container">
            <img src="gambar/dr_tirta.jpg" alt="Dokter"> <!-- Ganti dengan path gambar Anda -->
            <span>dr. Tirta Mandira Hudhi, M.A.B</span>
        </div>

        <!-- Overlay putih transparan -->
        <div class="overlay">
            <!-- Paragraf 1 -->
            <div class="paragraph">
                <h2>Konsumsi Makanan Bergizi Seimbang </h2>
                <p>
                Pilih makanan yang kaya nutrisi, termasuk sayuran, buah-buahan, biji-bijian, protein tanpa lemak, dan lemak sehat.Kurangi konsumsi gula, garam, dan lemak jenuh yang berlebihan.Pastikan untuk mengonsumsi cukup serat untuk menjaga pencernaan yang sehat.
                </p>
            </div>
    
            <!-- Paragraf 2 dengan gambar -->
            <div class="paragraph-with-image">
                <img src="gambar/makanan_sehat1.jpg" alt="Gambar Dokter"> <!-- Ganti dengan path gambar Anda -->
                <p>
                 dan Tidur selama 7-8 jam setiap malam bukan hanya soal rutinitas, tetapi merupakan kebutuhan penting bagi tubuh dan pikiran untuk menjalankan fungsinya secara optimal. Saat tidur, tubuh Anda melakukan proses regenerasi, perbaikan, dan penyembuhan pada berbagai sistem tubuh, termasuk sistem kekebalan, otot, dan jaringan. Selain itu, tidur memengaruhi kesehatan mental Anda dengan memperkuat memori, meningkatkan konsentrasi, dan membantu mengelola emosi.
                </p>
            </div>

            <!-- Paragraf 3 -->
            <div class="paragraph">
            <h2>Hindari Kebiasaan Buruk</h2>
                <p>
                Mengadopsi gaya hidup sehat berarti tidak hanya menambahkan kebiasaan baik, 
                tetapi juga mengurangi atau menghilangkan kebiasaan buruk yang dapat berdampak negatif pada kesehatan fisik dan mental Anda. Alkohol, merokok, konsumsi kafein berlebihan, 
                serta pola tidur yang buruk adalah beberapa hal yang perlu dihindari demi kesejahteraan jangka panjang.
                </p>
            </div>
        </div>
    </div>
</body>

<?php include "layout/footer.html" ?>
</html>