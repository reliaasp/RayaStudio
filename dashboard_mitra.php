<?php
session_start();

if ($_SESSION['role'] != 'mitra') {
    header("Location: login.php");
    exit();
}
?>

<h1>Dashboard Mitra</h1>
<p>Halaman ini sedang dalam pengembangan...</p>