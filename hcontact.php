<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Klinik Amanda</title>

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
            background-color: #f9f9f9;
        }

        /* Background dengan gambar */
        .background {
            background-image: url('foto/background_contact.jpg'); /* Ganti dengan path gambar Anda */
            background-size: cover;
            background-position: center;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

            /* Overlay transparan */
    .background::before {
        content: '';
        position: absolute;
        top: 100px;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5); /* Warna overlay hitam transparan */
        z-index: 1; /* Pastikan overlay di atas background image */
    }

    /* Gaya untuk Title */
.title-container {
    position: absolute;
    top: 180px; /* Jarak dari atas layar */
    left: 50%;
    transform: translateX(-50%);
    z-index: 2; /* Pastikan berada di atas background */
    text-align: center;
}

.title-container h1 {
    font-size: 80px;
    color: white;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); /* Efek bayangan */
    margin: 0;
    padding: 10px 20px;

}


        /* Kontainer utama */
        .content-container {
            background-color: rgba(255, 255, 255, 0.8); /* Putih semi-transparan */
            padding: 20px 30px;
            position: absolute;
        top: 400px; /* 50px dari bagian atas container relatif */
        left: 0px; /* 20px dari sisi kanan container relatif */
        bottom: 0;
        z-index: 2; /* Pastikan konten berada di atas overlay */
            width: 100%;
            max-width: 100%;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        /* Foto admin berbentuk lingkaran */
        .admin-photo {
            flex: 1 1 200px;
            text-align: center;
        }

        .admin-photo img {
            width: 400px;
            height: 450px;
            border-radius: 50%;
            border: 3px solid #0D6402; /* Warna hijau */
            object-fit: cover;
        }

        .admin-photo h3 {
            margin-top: 10px;
            font-size: 20px;
            color: #333;
        }

        /* Informasi kontak */
        .contact-info {
    display: flex;
    justify-content: space-between;
    gap: 40px; /* Jarak antar kolom lebih besar */
}

.contact-column {
    flex: 1; /* Kolom tetap proporsional */
    background: white;
    border-radius: 15px; /* Sudut lebih membulat */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Bayangan lebih besar */
    padding: 40px; /* Padding lebih besar */
    max-width: 800px; /* Atur ukuran maksimal kolom */
    height: 500px;
   
}

.contact-column h2 {
    color: #0D6402;
    font-size: 24px;
    margin-bottom: 15px;
    text-align: center;
    border-bottom: 2px solid #0D6402;
    padding-bottom: 10px;
}

.contact-column ul {
    list-style: none;
    padding: 0;
}

.contact-column ul li {
    margin-bottom: 10px;
    font-size: 16px;
    color: #333;
    line-height: 1.6;
}

.contact-column ul li span {
    font-weight: 600;
    color: #0D6402;
}

.contact-column ul li a {
    color: #0D6402;
    text-decoration: none;
    transition: color 0.3s;
}

.contact-column ul li a:hover {
    color: #555;
}

    </style>
</head>
<body>
    <div class="background">
    
        <div class="title-container">
            <h1>CONTACT US</h1>
        </div>

        <div class="content-container">
            <!-- Foto Admin -->
            <div class="admin-photo">
                <img src="gambar/maftuhmerah.jpg" alt="Foto Admin">
                <h3>Chief Executive Officer</h3>
                <h4>Maftuh Rafly Ramadhan</h4>

        </div>

        <!-- Informasi Kontak -->
        <div class="contact-info">
        <!-- Kontak Klinik -->
        <div class="contact-column">
           <h2>Kontak Klinik</h2>
            <ul>
               <li><span>Email Klinik:</span> klinikamanda@gmail.com</li>
               <li><span>Telepon Klinik:</span> +628-9526-4431</li>
               <li><span>Instagram:</span> amandaa.klinikkuu</li>
               <li><span>Facebook:</span> <a href="https://facebook.com/klinikamanda" target="_blank">facebook.com/klinikamanda</a></li>
            </ul>
        </div>

        <!-- Kontak Admin -->
        <div class="contact-column">
          <h2>Kontak Admin</h2>
            <ul>
               <li><span>Email Admin:</span> maftuhrafly21@gmail.com</li>
               <li><span>Telepon Admin:</span> 0895-2696-2821</li>
               <li><span>Instagram:</span> maftuhraflii_</li>
               <li><span>Facebook Admin:</span> <a href="https://facebook.com/maftuhraflii_" target="_blank">facebook.com/adminamanda</a></li>
            </ul>
        </div>
    </div>

</body>

<?php include "layout/footer.html" ?>
</html>