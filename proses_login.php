<?php
session_start();
include "database.php";

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($data);

if ($user && $password == $user['password']) {

    $_SESSION['user'] = $user;
    $_SESSION['user_id'] = $user['id'];

    // redirect dengan status sukses
    header("Location: dashboard_customer.php");
    
} else {
    header("Location: login.php?error=1");
}
?>