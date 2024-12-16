<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f8e9;
            color: #2e7d32;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
        }

        h1 {
            color: #388e3c;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .qr-container {
            margin-bottom: 20px;
        }

        .btn-pay {
            width: 100%;
            padding: 12px;
            background-color: #388e3c;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-pay:hover {
            background-color: #66bb6a;
        }

        .btn-pay:focus {
            outline: none;
        }

        p {
            font-size: 18px;
        }

        .price {
            font-weight: bold;
            font-size: 20px;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Halaman Pembayaran</h1>
        <p>Silakan lakukan pembayaran dengan QRIS sesuai dengan jumlah yang tertera di bawah ini.</p>

        <!-- QR Code Pembayaran -->
        <div class="qr-container">
            <!-- Ganti URL ini dengan link QRIS yang sesuai atau generate QR dari layanan pembayaran -->
            <img src="gambar/qris.jpg" alt="QRIS Pembayaran">
        </div>

        <!-- Tombol Pembayaran -->
        <button class="btn-pay" onclick="window.location.href='user_riwayat_obat.php';">Konfirmasi Pembayaran</button>

    </div>
</body>
</html>
