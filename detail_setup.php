<?php
session_start();

// Ambil paket dari URL
$paket = $_GET['paket'] ?? '';

// Data paket (manual, tidak dari database)
$data_paket = [
    "VIP" => [
        "harga" => 100000,
        "deskripsi" => "Paket basic untuk pemula. Cocok untuk setup streaming sederhana dengan kebutuhan standar."
    ],
    "VVIP" => [
        "harga" => 200000,
        "deskripsi" => "Paket menengah dengan fitur lebih lengkap. Cocok untuk streamer yang ingin tampil lebih profesional."
    ],
    "VVIP+" => [
        "harga" => 300000,
        "deskripsi" => "Paket premium full setup + support. Cocok untuk content creator serius dengan kebutuhan maksimal."
    ]
];

// Cek apakah paket valid
if (!isset($data_paket[$paket])) {
    echo "Paket tidak ditemukan!";
    exit;
}

$harga = $data_paket[$paket]['harga'];
$deskripsi = $data_paket[$paket]['deskripsi'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment - Setup Package</title>
    <link rel="stylesheet" href="style.css?v=20">
    <style>
        .payment-container {
            display: flex;
            gap: 20px;
            padding: 40px;
        }

        .payment-left {
            flex: 1;
            background: linear-gradient(135deg, #7b2cbf, #c77dff);
            color: white;
            padding: 30px;
            border-radius: 20px;
        }

        .payment-right {
            flex: 1;
            background: white;
            padding: 30px;
            border-radius: 20px;
        }

        .price {
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            background: #7b2cbf;
            color: white;
            border-radius: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="payment-container">

    <!-- LEFT -->
    <div class="payment-left">
        <h2><?= $paket; ?></h2>

        <p><?= $deskripsi; ?></p>

        <p class="price">Rp <?= number_format($harga,0,',','.'); ?></p>
    </div>

    <!-- RIGHT -->
    <div class="payment-right">
        <h2>Payment</h2>

        <form action="proses_payment.php" method="POST">

            <input type="hidden" name="paket" value="<?= $paket; ?>">
            <input type="hidden" name="harga" value="<?= $harga; ?>">

            <label>Nama</label>
            <input type="text" name="nama" required>

            <label>Paket</label>
            <input type="text" value="<?= $paket; ?>" readonly>

            <label>Metode Pembayaran</label>
            <select name="metode">
                <option value="qris">QRIS</option>
                <option value="transfer">Transfer Bank</option>
            </select>

            <button type="submit">Bayar Sekarang</button>

        </form>
    </div>

</div>

</body>
</html>