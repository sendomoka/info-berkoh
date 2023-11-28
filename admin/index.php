<?php
session_start();
include '../config/models.php';
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
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
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/admin_header.css">
    <style>
        h1 {
            margin-bottom: 1rem;
        }
        .counter {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }
        .box {
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding: 1rem;
            padding-right: 7rem;
            width: fit-content;
        }
        .penduduk {
            background: #e1e7f8;
        }
        .berita {
            background: #f8e1ef;
        }
        .pengaduan {
            background: #f8ece1;
        }
        .akun {
            background: #eeeeee;
        }
        .head {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
        }
        .body {
            font-size: 2rem;
            font-weight: 700;
        }
        .about {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .about p {
            line-height: 2;
            text-align: justify;
        }
    </style>
</head>
<body>
    <?php include '../components/admin/sidenav.php' ?>
    <main>
        <?php include '../components/admin/header.php' ?>
        <h1>Selamat Datang, Admin!</h1>
        <div class="counter">
            <div class="box penduduk">
                <div class="head">
                    <img src="../assets/images/dash-penduduk.svg">
                    Jumlah Penduduk
                </div>
                <div class="body">
                    <?php
                    $sql = "SELECT COUNT(*) FROM penduduk";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($query);
                    echo $row[0];
                    ?>
                </div>
            </div>
            <div class="box berita">
                <div class="head">
                    <img src="../assets/images/dash-berita.svg">
                    Berita Terupload
                </div>
                <div class="body">
                    <?php
                    $sql = "SELECT COUNT(*) FROM berita";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($query);
                    echo $row[0];
                    ?>
                </div>
            </div>
            <div class="box pengaduan">
                <div class="head">
                    <img src="../assets/images/dash-pengaduan.svg">
                    Jumlah Pengaduan
                </div>
                <div class="body">
                    <?php
                    $sql = "SELECT COUNT(*) FROM pengaduan";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($query);
                    echo $row[0];
                    ?>
                </div>
            </div>
            <div class="box akun">
                <div class="head">
                    <img src="../assets/images/dash-akun.svg">
                    Jumlah Akun
                </div>
                <div class="body">
                    <?php
                    $sql = "SELECT COUNT(*) FROM pengguna";
                    $query = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($query);
                    echo $row[0];
                    ?>
                </div>
            </div>
        </div>
        <div class="about">
            <img src="../assets/images/foto-berkoh.png">
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terima kasih tak terhingga kami sampaikan kepada seluruh warga dan perangkat desa Berkoh yang telah dengan sukarela dan penuh semangat membantu dalam mewujudkan website <b>INFO BERKOH Integrasi Navigasi dan Fakta Online Desa Berkoh</b>. Kerjasama dan dedikasi Anda semua adalah fondasi utama dalam menghadirkan sumber informasi yang berharga ini bagi seluruh masyarakat. Website ini bukan hanya sebuah sarana untuk mendapatkan informasi, tetapi juga cerminan dari semangat gotong royong dan kolaborasi yang begitu kuat di Desa Berkoh. Terima kasih atas komitmen Anda dalam memajukan desa kita. Semoga website ini menjadi alat yang bermanfaat dan dapat terus berkembang untuk kebaikan bersama. Terima kasih sekali lagi untuk semua kontribusi berharga Anda.</p>
        </div>
    </main>
    <?php include '../components/admin/footer.php' ?>
</body>
</html>