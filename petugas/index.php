<?php
session_start();
include '../config/models.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Petugas') {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Petugas @infoberkoh</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php include '../components/admin/sidenav.php' ?>
    <main>
        <h2>Dashboard</h2>
        <h1>Selamat Datang, Petugas!</h1>
    </main>
</body>
</html>