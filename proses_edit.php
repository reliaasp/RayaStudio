<?php
include "database.php";

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];

// Jika ada upload gambar baru
if (!empty($_FILES['image']['name'])) {
    $nama_file = $_FILES['image']['name'];
    $tmp_file = $_FILES['image']['tmp_name'];
    $path = "assets/uploads/" . $nama_file;
    
    move_uploaded_file($tmp_file, $path);
    // Update data termasuk gambar
    $sql = "UPDATE products SET name='$name', price='$price', description='$description', category='$category', gambar='$nama_file' WHERE id='$id'";
} else {
    // Update data tanpa mengganti gambar lama
    $sql = "UPDATE products SET name='$name', price='$price', description='$description', category='$category' WHERE id='$id'";
}

$query = mysqli_query($conn, $sql);

if($query) {
    header("Location: mitra.php");
} else {
    echo "Gagal update: " . mysqli_error($conn);
}
?>