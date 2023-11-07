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
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="sidenav">
        <a href="/">
            <img src="../images/logo.svg" width="180">
        </a>
        <div class="menu">
            <a href="/admin">
                <img src="../images/dashboard.svg" width="20">
                Dashboard
            </a>
            <a href="/admin/informasi">
                <img src="../images/informasi.svg" width="20">
                Informasi Umum
            </a>
            <a href="/admin/penduduk">
                <img src="../images/penduduk.svg" width="20">
                Data Penduduk
            </a>
            <a href="/admin/pelayanan">
                <img src="../images/pelayanan.svg" width="20">
                Pelayanan Publik
            </a>
            <a href="/admin/berita">
                <img src="../images/berita.svg" width="20">
                Berita Terkini
            </a>
            <a href="/admin/pengaduan">
                <img src="../images/pengaduan.svg" width="20">
                Lapor Pengaduan
            </a>
            <a href="/admin/dokumentasi">
                <img src="../images/dokumentasi.svg" width="20">
                Dokumentasi
            </a>
            <a href="/admin/pengguna">
                <img src="../images/pengguna.svg" width="20">
                Manajemen Akun
            </a>
            <a name="logout" style="margin-top: 7rem;" href="index.php?logout=1">
                <img src="../images/keluar.svg" width="20">
                Keluar
            </a>
        </div>
    </div>
    <main>
        <h2>Dashboard</h2>
        <h1>Selamat Datang, Admin!</h1>
        <div class="footer-admin">
            &copy; 2023.INFO BERKOH
        </div>
    </main>
</body>
</html>