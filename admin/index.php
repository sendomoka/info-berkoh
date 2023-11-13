<?php
session_start();
include '../config/models.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin @infoberkoh</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
</head>
<body>
    <?php include '../components/admin/sidenav.php' ?>
    <main>
        <?php include '../components/admin/header.php' ?>
        <h1>Selamat Datang, Admin!</h1>
        
    </main>
</body>
</html>