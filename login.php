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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <center>
    <h1>Login</h1>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" placeholder="Masukkan username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" placeholder="Masukkan password" required></td>
            </tr>
            <tr>
                <td colspan="3" align="right">
                    <a href="index.php">Kembali</a>
                    <button name="login" type="submit">Login</button>
                </td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>