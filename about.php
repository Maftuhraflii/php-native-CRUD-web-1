<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang klinik amanda</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<?php include "layout/header.html" ?>

<style>
    /* Gaya umum */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, html {
        height: 100%;
        font-family: 'Poppins', sans-serif;
    }

    /* Gaya background dengan overlay transparan */
    .background {
        position: relative;
        background-image: url('foto/background_about.jpg'); /* Ganti dengan path gambar Anda */
        background-size: cover;
        background-position: center;
        height: 100vh;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Konten utama */
    .content-container {
        position: absolute;
        top: 0px; /* 50px dari bagian atas container relatif */
        left: 0px; /* 20px dari sisi kanan container relatif */
        bottom: 0;
        z-index: 2; /* Pastikan konten berada di atas overlay */
        width: 60%;
        max-width: 1200px;
        background-color: rgba(255, 255, 255, 0.7);  /* Background putih semi-transparan */
        padding: 20px 30px;
        color: #333;
        text-align: left;
    }

    /* Gaya teks */
    h1 {
        color: #0D6402; /* Warna teks utama */
        text-align: left;
        margin-bottom: 20px;
        font-weight: bold;
        padding : 10px 20px;
    }

    p {
        color: #000000;
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 20px;
        padding : 20px;
    }

    /* Gaya gambar */
    .images {
        display: flex;
        gap: 20px;
        margin-top: 30px;
        flex-wrap: wrap;
    }

    .containerr {
        position: absolute; /* Tetap pada posisi absolut untuk fleksibilitas */
    bottom: 550px; /* Ubah posisi vertikal sesuai kebutuhan */
    right: 650px; /* Ubah posisi horizontal sesuai kebutuhan */
    display: flex;
    justify-content: space-between;
}

.image-containerr {
    display: flex;
    gap: 10px;
}

.image {
    position: relative;
    min-width: 350px;
        max-width: 48%;
        height: 200px;
        border-radius: 10px;
        border: 2px solid #ddd;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;    
}

.image1 {
    position: absolute;
    top: -320px;
    right: -550px;
}

.image2 {
    position: absolute;
    top: -40px;
    right: -400px;
}

.image3 {
    position: absolute;
    top: 230px;
    right: -550px;
}


    /* Tombol read more */
    .read-more {
        position: absolute;
    top: 738px;
    right:65px;
        justify-content: right;
        margin-top: 30px;
    }

    .read-more button {
        background-color: #85AFD1;
        color: #000;
        border: none;
        padding: 10px 20px;
        font-size: 18px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .read-more button:hover {
        background-color: #75F37D;
    }
</style>

<body>
    <div class="background">
        <div class="content-container">
            <h1>Selamat datang di Klinik Amanda </h1>
            <h4>Kesehatan Anda Adalah Prioritas Kami!</h4>
            <p>
             Klinik Amanda adalah lembaga pelayanan kesehatan yang didirikan dengan misi untuk menyediakan perawatan 
             kesehatan yang berkualitas tinggi dan terjangkau bagi seluruh lapisan masyarakat. 
             Berdiri sejak 2017, kami telah melayani ribuan pasien dengan beragam keluhan medis, 
             dan berkomitmen untuk terus berkembang guna memenuhi kebutuhan kesehatan yang semakin kompleks.
            <p>
             Di Klinik Amanda, kami percaya bahwa setiap pasien berhak mendapatkan perhatian yang penuh,
             perawatan yang nyaman, serta solusi medis yang tepat. Untuk itu, kami selalu berupaya memberikan 
             pelayanan kesehatan yang berfokus pada kebutuhan individu, dengan pendekatan yang humanis dan berbasis 
             pada standar medis yang tinggi. Dengan didukung oleh tim medis yang berkompeten dan fasilitas kesehatan yang modern, 
             kami siap memberikan pelayanan terbaik untuk menjaga kesehatan Anda dan keluarga.
            </p>
            <p>
             Kami mengundang Anda untuk datang dan merasakan sendiri pelayanan terbaik yang kami tawarkan. Klinik Amanda adalah 
             pilihan tepat untuk Anda yang menginginkan perawatan kesehatan yang tidak hanya profesional tetapi juga penuh perhatian. 
             Kesehatan Anda adalah prioritas kami, dan kami berkomitmen untuk selalu memberikan yang terbaik untuk Anda dan keluarga.
            </p>
            <div class="read-more">
                <button onclick="window.location.href='detail_about.html'">Read More</button>
            </div>
        </div>   
        
        <div class="containerr">
            <div class="image-container">
                <img src="gambar/sehat1.jpg" alt="Image 1" class="image image1">
                <img src="gambar/sehat2.jpg" alt="Image 2" class="image image2">
                <img src="gambar/sehat3.jpg" alt="Image 3" class="image image3">
            </div>
        </div>
    </div>
    
    
</body>
<?php include "layout/footer.html" ?>
</html>