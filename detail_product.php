<?php
include "database.php";

if (!isset($_GET['id'])) {
    echo "Produk tidak ditemukan";
    exit;
}

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$product = mysqli_fetch_assoc($data);

if (!$product) {
    echo "Data tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="detail-container">
    <a href="dashboard_customer.php" class="back-btn">← Kembali</a>
    <div class="detail-card">

        <div class="detail-img">
            <?= $product['icon']; ?>
        </div>

        <div class="detail-info">
            <h2><?= $product['name']; ?></h2>

            <p>
                <?= $product['description']; ?>
            </p>

            <h3>Rp <?= $product['price']; ?></h3>

            <a href="payment.php?product_id=<?= $product['id']; ?>" class="btn">
                Beli Sekarang
            </a>
        </div>

    </div>

</div>

</body>
</html>

