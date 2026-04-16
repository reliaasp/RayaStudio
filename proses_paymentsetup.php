<?php
session_start();
include "database.php";

// Ambil user login
$user_id = $_SESSION['user_id'];

// Ambil data dari form
$paket  = $_POST['paket'];
$nama   = $_POST['nama'];
$metode = $_POST['metode'];

// Set harga berdasarkan paket (biar aman)
if ($paket == "VIP") {
    $harga = 100000;
} elseif ($paket == "VVIP") {
    $harga = 200000;
} elseif ($paket == "VVIP+") {
    $harga = 300000;
} else {
    echo "Paket tidak valid!";
    exit;
}

// Simpan ke database (tanpa product_id)
mysqli_query($conn, "INSERT INTO orders (user_id, paket, harga, nama, metode, status)
VALUES ('$user_id', '$paket', '$harga', '$nama', '$metode', 'paid')");

// Redirect
header("Location: dashboard_customer.php?success=1");
exit;
?>