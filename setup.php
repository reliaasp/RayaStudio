<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Setup Package - Raya Studio</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f3f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 1000px;
            text-align: center;
        }

        .title {
            color: #521475;
            margin-bottom: 30px;
        }

        .wrapper {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .card {
            background: linear-gradient(135deg, #7b2cbf, #c77dff);
            color: white;
            padding: 25px;
            border-radius: 20px;
            width: 280px;
        }

        .price {
            font-weight: bold;
            margin: 10px 0;
        }

        button {
            background: white;
            color: #7b2cbf;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #eee;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="title">Pilih Setup Package</h2>

    <div class="wrapper">

        <!-- VIP -->
        <div class="card">
            <h3>VIP</h3>
            <p>Paket basic untuk pemula</p>
            <div class="price">Rp 100.000</div>
            <button onclick="window.location.href='payment.php?paket=VIP'">
                Pilih VIP
            </button>
        </div>

        <!-- VVIP -->
        <div class="card">
            <h3>VVIP</h3>
            <p>Fitur lebih lengkap & profesional</p>
            <div class="price">Rp 200.000</div>
            <button onclick="window.location.href='payment.php?paket=VVIP'">
                Pilih VVIP
            </button>
        </div>

        <!-- VVIP+ -->
        <div class="card">
            <h3>VVIP+</h3>
            <p>Paket premium full support</p>
            <div class="price">Rp 300.000</div>
            <button onclick="window.location.href='payment.php?paket=VVIP+'">
                Pilih VVIP+
            </button>
        </div>

    </div>
</div>

</body>
</html>