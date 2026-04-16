<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Package - Raya Studio</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        body {
            background-color: #f3f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container-focus {
            width: 100%;
            max-width: 1100px;
        }

        .title {
            text-align: center;
            color: #521475;
            margin-bottom: 30px;
        }

        .setup-wrapper {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .setup-card {
            background: linear-gradient(135deg, #7b2cbf, #c77dff);
            color: white;
            padding: 25px;
            border-radius: 20px;
            width: 300px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
        }

        .setup-card h3 {
            margin-bottom: 10px;
        }

        .price {
            font-size: 20px;
            font-weight: bold;
            margin: 10px 0 20px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 10px;
            margin-top: 5px;
        }

        .btn-save {
            background: white;
            color: #7b2cbf;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #eee;
        }

        .btn-cancel {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container-focus">
    <h2 class="title">Setup Package</h2>

    <div class="setup-wrapper">

        <!-- VIP -->
        <form class="setup-card" action="proses_simpan_setup.php" method="POST">
            <h3>VIP</h3>
            <div class="price">Rp 100.000</div>

            <input type="hidden" name="paket" value="VIP">
            <input type="hidden" name="harga" value="100000">

            <div class="form-group">
                <input type="text" name="judul" placeholder="Judul Paket VIP">
            </div>

            <div class="form-group">
                <textarea name="deskripsi" rows="3" placeholder="Deskripsi..."></textarea>
            </div>

            <button type="submit" class="btn-save">Pilih VIP</button>
        </form>

        <!-- VVIP -->
        <form class="setup-card" action="proses_simpan_setup.php" method="POST">
            <h3>VVIP</h3>
            <div class="price">Rp 200.000</div>

            <input type="hidden" name="paket" value="VVIP">
            <input type="hidden" name="harga" value="200000">

            <div class="form-group">
                <input type="text" name="judul" placeholder="Judul Paket VVIP">
            </div>

            <div class="form-group">
                <textarea name="deskripsi" rows="3" placeholder="Deskripsi..."></textarea>
            </div>

            <button type="submit" class="btn-save">Pilih VVIP</button>
        </form>

        <!-- VVIP+ -->
        <form class="setup-card" action="proses_simpan_setup.php" method="POST">
            <h3>VVIP+</h3>
            <div class="price">Rp 300.000</div>

            <input type="hidden" name="paket" value="VVIP+">
            <input type="hidden" name="harga" value="300000">

            <div class="form-group">
                <input type="text" name="judul" placeholder="Judul Paket VVIP+">
            </div>

            <div class="form-group">
                <textarea name="deskripsi" rows="3" placeholder="Deskripsi..."></textarea>
            </div>

            <button type="submit" class="btn-save">Pilih VVIP+</button>
        </form>

    </div>

    <a href="mitra.php" class="btn-cancel">Cancel / Kembali ke Dashboard</a>
</div>

</body>
</html>