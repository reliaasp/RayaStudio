<!DOCTYPE html>
<html>
<head>
    <title>Login - Raya</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css?v=4">
</head>
<body>

<div class="auth-container">

    <!-- LEFT -->
    <div class="auth-left">
        <h2>Welcome Back!</h2>
    </div>

    <!-- RIGHT -->
    <div class="auth-right">
        <h2>Login to Your Account</h2>

        <form action="proses_login.php" method="POST">

            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Login</button>

        </form>

        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>

</div>

<?php if (isset($_GET['success'])) { ?>
<div class="popup">
    <div class="popup-box">
        <h2>🎉 Login Successful!</h2>
        <p>Welcome back to Raya Studio</p>
        <a href="dashboard/customer.php" class="popup-btn">Continue</a>
    </div>
</div>
<?php } ?>

</body>
</html>