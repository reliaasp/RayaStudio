<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
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
        <a href="#footer">Blog</a>
        <a href="#" onclick="goCategory('digital')">Digital Product</a>
        <a href="#" onclick="goCategory('course')">Course</a>
        <a href="#" onclick="goCategory('setup')">Setup</a>
    </div>
    <div class="profile">👤</div>
</div>

<!-- HERO -->
<div class="hero">
    <div class="hero-text">
        <h1>Set Your Digital Needs With Us</h1>
        <p>Find the best digital solution for your streaming</p>
        <a href="#products" class="hero-btn">Explore Now</a>
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
<div class="products" id="products">
    <h2>Our Product</h2>

    <?php
    include "database.php";

    $category = $_GET['category'] ?? '';

    if ($category) {
        $data = mysqli_query($conn, "SELECT * FROM products WHERE category='$category'");
    } else {
        $data = mysqli_query($conn, "SELECT * FROM products");
    }
    ?>

    <!-- FILTER -->
    <div class="filter">
        <a href="dashboard_customer.php" class="<?= !$category ? 'active' : '' ?>">All</a>
        <a href="dashboard_customer.php?category=course" class="<?= $category=='course' ? 'active' : '' ?>">Course</a>
        <a href="dashboard_customer.php?category=digital" class="<?= $category=='digital' ? 'active' : '' ?>">Digital</a>
        <a href="dashboard_customer.php?category=setup" class="<?= $category=='setup' ? 'active' : '' ?>">Setup</a>
    </div>

    <div class="product-list">

        <?php while ($row = mysqli_fetch_assoc($data)) { ?>
            <div class="card">
                <div class="card-icon"><?= $row['icon']; ?></div>
                <h3><?= $row['name']; ?></h3>
                <p>Kategori: <?= $row['category']; ?></p>
                <p>Rp <?= $row['price']; ?></p>

            <a href="detail_product.php?id=<?= $row['id']; ?>">
                <button>Beli</button>
            </a>
            </div>
        <?php } ?>
    </div>
</div>

<?php if (isset($_GET['success'])) { ?>
<div class="popup">
    <div class="popup-box">
        <h2>🎉 Payment Successful!</h2>
        <p>Your order has been processed</p>
        <a href="dashboard_customer.php" class="popup-btn">OK</a>
    </div>
</div>
<?php } ?>

<script>
function goCategory(cat) {
    let url = "dashboard_customer.php";

    if (cat !== '') {
        url += "?category=" + cat;
    }

    window.location.href = url + "#products";
}
</script>

<div class="footer" id="footer">

    <div class="footer-content">

        <div class="footer-col">
            <h3>Raya Creative Studio</h3>
            <p>Helper for your streaming needs</p>
        </div>

        <div class="footer-col">
            <h4>Address</h4>
            <p>Jl. Kenangan No.123</p>
            <p>Surabaya, Indonesia</p>
        </div>

        <div class="footer-col">
            <h4>Contact</h4>
            <p>Phone: 0812-3456-7890</p>
            <p>Email: rayastudio@gmail.com</p>
        </div>

    </div>

    <div class="footer-bottom">
        <p>© 2026 Raya Creative Studio. All rights reserved.</p>
    </div>

</div>

</body>
</html>
