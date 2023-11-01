<?php
session_start();
include 'backend/config.php';

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("location: admin");
    } elseif ($_SESSION['role'] == 'petugas') {
        header("location: petugas");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - @infoberkoh</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="box">
    <h1>Login</h1>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="username">
        <span>Username</span>
        <input type="text" name="username" placeholder="Masukkan username" required>
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