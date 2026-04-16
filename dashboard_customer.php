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
        <a href="login.php" style="color: #ff4d4d; font-weight: bold;">Logout</a>
    </div>
    <div class="profile">👤</div>
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
    <div style="margin-bottom: 30px; display: flex; justify-content: center;">
    <form action="dashboard_customer.php#products" method="GET" style="width: 100%; max-width: 500px; display: flex; gap: 10px;">
        <input type="text" name="search" placeholder="Cari overlay, course, atau teknisi..." 
               value="<?= $_GET['search'] ?? '' ?>"
               style="flex: 1; padding: 12px 20px; border-radius: 30px; border: 2px solid #9d4edd; outline: none;">
        <button type="submit" style="padding: 10px 25px; background: #9d4edd; color: white; border: none; border-radius: 30px; cursor: pointer; font-weight: bold;">
            Cari
        </button>
    </form>
</div>

    <<?php
include "database.php";

$category = $_GET['category'] ?? '';
$search = $_GET['search'] ?? '';

// Logika Query Gabungan Search & Filter
$sql = "SELECT * FROM products WHERE 1=1";

if ($category) {
    $sql .= " AND category='$category'";
}

if ($search) {
    $sql .= " AND (name LIKE '%$search%' OR description LIKE '%$search%')";
}

$sql .= " ORDER BY id DESC";
$data = mysqli_query($conn, $sql);
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
                
                <?php if (!empty($row['image'])): ?>
                    <img src="assets/uploads/<?= htmlspecialchars($row['image']) ?>" alt="Product" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px; margin-bottom: 15px;">
                <?php else: ?>
                    <img src="assets/lucu.jpg" alt="Default" style="width: 100%; height: 160px; object-fit: cover; border-radius: 12px; margin-bottom: 15px;">
                <?php endif; ?>

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
