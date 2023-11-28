<?php
session_start();
include 'config/models.php';
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
        header('Location: admin');
    } else if ($_SESSION['role'] == 'Petugas') {
        header('Location: petugas');
    }
}
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
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
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
            <img src="assets/images/mdi_user.png">
            <input type="text" name="username" placeholder="Masukkan Username" required>
        </div>
        <div class="password">
            <img src="assets/images/mdi_eye.png">
            <input type="password" name="password" placeholder="Masukkan Password" required>
        </div>
        <div class="buttons">
            <button name="login" type="submit">Login</button>
            <a href="index.php">Kembali</a>
        </div>
    </form>
</div>
</body>
</html>