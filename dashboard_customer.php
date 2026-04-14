<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Raya</title>
    <link rel="stylesheet" href="style.css?v=10">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <h2>RAYA</h2>
    <div class="menu">
        <a href="#">Blog</a>
        <a href="#">Digital Product</a>
        <a href="#">Course</a>
        <a href="#">Setup</a>
    </div>
    <div class="profile">👤</div>
</div>

<!-- HERO -->
<div class="hero">
    <div class="hero-text">
        <h1>Set Your Digital Needs With Us</h1>
        <p>Find the best digital solution for your streaming</p>
        <a href="#" class="hero-btn">Explore Now</a>
    </div>

    <div class="hero-img">
        <img src="assets/hero.png">
    </div>
</div>

<!-- STATS -->
<div class="stats">
    <div>237<br>Account</div>
    <div>5<br>Years</div>
    <div>150<br>Product</div>
    <div>527<br>Visitor</div>
</div>

<!-- PRODUCTS -->
<div class="products">
    <h2>Our Product</h2>

    <div class="product-list">
<?php
include "database.php";

$category = $_GET['category'] ?? '';

if ($category) {
    $data = mysqli_query($conn, "SELECT * FROM products WHERE category='$category'");
} else {
    $data = mysqli_query($conn, "SELECT * FROM products");
}
?>

<!-- FILTER (PINDAH KE SINI) -->
<div class="filter">
    <a href="dashboard_customer.php" class="<?= !$category ? 'active' : '' ?>">All</a>
    <a href="dashboard_customer.php?category=course" class="<?= $category=='course' ? 'active' : '' ?>">Course</a>
    <a href="dashboard_customer.php?category=digital" class="<?= $category=='digital' ? 'active' : '' ?>">Digital</a>
    <a href="dashboard_customer.php?category=setup" class="<?= $category=='setup' ? 'active' : '' ?>">Setup</a>
</div>

<?php while ($row = mysqli_fetch_assoc($data)) { ?>
    <div class="card">
        <div class="card-icon"><?= $row['icon']; ?></div>
        <h3><?= $row['name']; ?></h3>
        <p>Kategori: <?= $row['category']; ?></p>
        <p>Rp <?= $row['price']; ?></p>
        <button>Beli</button>
    </div>
<?php } ?>
    </div>
</div>

</body>
</html>
