<?php
include 'database.php'; // Pastikan koneksi DB sudah benar
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raya Studio - Explore</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Tambahan CSS khusus untuk Grid Produk */
        .container { padding: 40px; max-width: 1200px; margin: auto; }
        
        /* Filter Styles */
        .filter-container { margin-bottom: 30px; display: flex; gap: 10px; }
        .filter-btn { 
            padding: 10px 20px; border-radius: 20px; border: 1px solid #521475;
            background: white; color: #521475; cursor: pointer; font-weight: bold;
        }
        .filter-btn.active { background: #521475; color: white; }

        /* Responsive Grid */
        .product-grid { 
            display: grid; 
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); 
            gap: 25px; 
        }

        .product-card {
            background: white; border-radius: 15px; overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05); transition: 0.3s;
        }
        .product-card:hover { transform: translateY(-5px); }
        .product-img { width: 100%; height: 180px; object-fit: cover; }
        .product-info { padding: 20px; }
        .category-badge { 
            font-size: 10px; text-transform: uppercase; 
            background: #f0e6f5; color: #521475; 
            padding: 4px 8px; border-radius: 5px; font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Explore Products & Services</h1>
    <p>Temukan solusi digital terbaik untuk kebutuhanmu.</p>

    <div class="filter-container">
        <button class="filter-btn active" onclick="filterSelection('all')">Show all</button>
        <button class="filter-btn" onclick="filterSelection('digital')">Digital Products</button>
        <button class="filter-btn" onclick="filterSelection('course')">Course Video</button>
        <button class="filter-btn" onclick="filterSelection('setup')">Setup Service</button>
    </div>

    <div class="product-grid" id="productGrid">
        <?php
        // Ambil data dari database
        $query = mysqli_query($conn, "SELECT * FROM produk"); // Sesuaikan nama tabelmu
        while($row = mysqli_fetch_array($query)) {
        ?>
        <div class="product-card filterDiv <?php echo $row['kategori']; ?>">
            <img src="assets/<?php echo $row['gambar']; ?>" class="product-img">
            <div class="product-info">
                <span class="category-badge"><?php echo $row['kategori']; ?></span>
                <h3 style="margin: 10px 0;"><?php echo $row['judul']; ?></h3>
                <p style="color: #666; font-size: 14px;"><?php echo substr($row['deskripsi'], 0, 80); ?>...</p>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <strong style="color: #521475;">Rp <?php echo number_format($row['harga']); ?></strong>
                    <a href="detail.php?id=<?php echo $row['id']; ?>" class="btn-back" style="position:static;">Detail</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<script>
    // FUNGSI FILTER JAVASCRIPT (Kriteria No. 8 & 14 ETS)
    function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("filterDiv");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
    }

    function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
        }
    }

    function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
                arr1.splice(arr1.indexOf(arr2[i]), 1);     
            }
        }
        element.className = arr1.join(" ");
    }

    // Inisialisasi awal
    filterSelection("all");

    // Menambah class active pada tombol filter
    var btnContainer = document.querySelector(".filter-container");
    var btns = btnContainer.getElementsByClassName("filter-btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>

</body>
</html>