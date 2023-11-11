<?php
session_start();
include 'config/models.php';
// panggil fungsi login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    login($username, $password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - @infoberkoh</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<img src="assets/images/logo.svg" width="200px">
<div class="box">
    <h1>Selamat Datang Kembali</h1>
    <p class="sub-header">Mohon masukkan kredensial Anda untuk akses ke kontrol</p>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="username">
            <img src="assets/images/mdi_user.png" width="24">
            <input type="text" name="username" placeholder="Masukkan Username" required>
        </div>
        <div class="password">
            <span>Password</span>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>
        <div class="buttons">
            <a href="index.php">Kembali</a>
            <button name="login" type="submit">Login</button>
        </div>
    </form>
</div>
</body>
</html>