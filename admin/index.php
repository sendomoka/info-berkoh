<?php
session_start();
include '../backend/config.php';

// sistem logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("location: ../login.php");
    exit;
}

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    // Jika bukan admin, redirect ke halaman login
    header("location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin @infoberkoh</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h2>Dashboard</h2>
    <h1>Selamat Datang, Admin!</h1>
    <a href="/admin/penduduk">Penduduk</a>
    <a href="/admin/pelayanan">Pelayanan</a>
    <br>
    <a name="logout" href="index.php?logout=1">Logout</a>
</body>
</html>