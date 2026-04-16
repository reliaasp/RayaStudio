<?php
session_start();
include "database.php";

$product_id = $_GET['product_id'] ?? '';
$paket = $_GET['paket'] ?? '';

$product = null;
$nama_produk = "";
$harga = "";

/* =========================
   CEK PRODUCT (DIGITAL)
========================= */
if ($product_id) {
    $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$product_id'");
    $product = mysqli_fetch_assoc($query);

    if ($product) {
        $nama_produk = $product['name'];
        $harga = $product['price'];
    }
}

/* =========================
   CEK SETUP PACKAGE
========================= */
$paket_list = [
    "VIP" => 100000,
    "VVIP" => 200000,
    "VVIP+" => 300000
];

if ($paket && isset($paket_list[$paket])) {
    $nama_produk = $paket . " Package";

    $deskripsi_list = [
        "VIP" => "Paket basic untuk pemula, cocok untuk setup sederhana.",
        "VVIP" => "Paket menengah dengan fitur lebih lengkap dan profesional.",
        "VVIP+" => "Paket premium full setup + support maksimal."
    ];

    $deskripsi = $deskripsi_list[$paket];
    $harga = $paket_list[$paket];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment - Raya</title>
    <link rel="stylesheet" href="style.css?v=20">
</head>
<body>

<div class="payment-container">

    <!-- LEFT -->
    <div class="payment-left">
        <h2>Checkout Now!</h2>

        <p class="product-name"><?= $nama_produk; ?></p>

        <?php if (!empty($deskripsi)): ?>
            <p style="font-size: 14px; opacity: 0.9;"><?= $deskripsi; ?></p>
        <?php endif; ?>

        <p class="price">Rp <?= number_format($harga,0,',','.'); ?></p>
    </div>

    <!-- RIGHT -->
    <div class="payment-right">
        <h2>Payment</h2>

        <form action="proses_payment.php" method="POST">

            <!-- Kirim data -->
            <input type="hidden" name="product_id" value="<?= $product_id; ?>">
            <input type="hidden" name="paket" value="<?= $paket; ?>">
            <input type="hidden" name="harga" value="<?= $harga; ?>">

            <label>Nama</label>
            <input type="text" name="nama" required>

            <label>Nama Product</label>
            <input type="text" value="<?= $nama_produk; ?>" readonly>

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