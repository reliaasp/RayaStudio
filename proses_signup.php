<?php
include "database.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$role = $_POST['role'];

if ($password != $confirm) {
    header("Location: signup.php?error=password");
    exit;
}

mysqli_query($conn, "INSERT INTO users (username,email,password,role)
VALUES ('$username','$email','$password','$role')");

// 👉 redirect dengan status sukses
header("Location: signup.php?success=1");
?>