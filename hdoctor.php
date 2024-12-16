<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tentang Dokter</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

</head>

<?php include "layout/header.html" ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body, html {
        height: 100%;
        font-family: 'Poppins', sans-serif;
    }

    .background {
        background-image: url('foto/background_doctor.jpg');
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

    .overlay {
        background-color: rgba(255, 255, 255, 0.2); /* Semi-transparent white */
        position: absolute;
        top: 100px;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 2;
        width: 100%;
        height: 100%; /* Make overlay fill entire screen */
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .overlay h1 {
        position: absolute;
        top: 100px;
        left: 0;
        right: 0;
        bottom: 0;
        font-weight: bold; /* Berat font */
        color: #333;
    }

    .overlay h2 {
        position: absolute;
        top: 800px;
        left: 0;
        right: 0;
        bottom: 0;
        font-weight: bold; /* Berat font */
        color: #333;
    }

    .image-gallery {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    width: 100%;
    height: 400px; /* Menetapkan tinggi menjadi lebih pendek, sesuaikan sesuai kebutuhan */
    max-width: 1500px;
}

.image-gallery .image-card {
    flex: 1;
    text-align: center;
    height: 100%; /* Membuat kartu gambar mengisi tinggi yang telah ditentukan */
}

.image-gallery img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Gambar akan mengisi ruang yang tersedia */
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}



    .image-gallery .description {
        margin-top: 10px;
        font-size: 1rem;
        color: #000;
        font-weight: bold;
    }

</style>

<body>
    <div class="background">
        <div class="overlay">
            <h1>"Aktif bergerak, tubuh kuat dan sehat!"</h1>

            <div class="image-gallery">
                <div class="image-card">
                    <img src="gambar/arsitadokter.jpg" alt="Dokter wanita">
                    <p class="description">dr. Arsita Ayu Irmayanti, Sp.B</p>
                </div>
                <div class="image-card">
                    <img src="gambar/Maftuhdokter.jpg" alt="Dokter laki">
                    <p class="description">dr.Maftuh Rafly Ramadhan, Sp.THT-KL</p>
                    <h1></h1>
                </div>
                <div class="image-card">
                    <img src="gambar/tiadokter.jpg" alt="Dokter wanitaa">
                    <p class="description">dr. Tia Artika Putri, Sp.A</p>
                </div>
            </div>

            <h2>- Hubungi kami untuk informasi jadwal konsultasi atau membuat janji temu dengan dokter ahli. -</h2>
        </div>
    </div>

</body>

<?php include "layout/footer.html" ?>
</html>