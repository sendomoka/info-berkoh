<?php
session_start();
include '../../backend/config.php';

$id = $_GET['id'];
if($id != ""){
    $delete = "DELETE FROM pelayanan WHERE pelayananID='$id'";
    $query = mysqli_query($conn,$delete);
    if($query){
        ?>
        <script>alert('Data Berhasil Dihapus!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT pelayanan.pelayananID, pengguna.nama_pengguna AS penanggung_jawab, pelayanan.nama_pelayanan, pelayanan.deskripsi FROM pelayanan INNER JOIN pengguna ON pelayanan.penggunaID = pengguna.penggunaID";
$query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan - Admin</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="sidenav">
        <a href="/">
            <img src="../../images/logo.svg" width="180">
        </a>
        <div class="menu">
            <a href="/admin">
                <img src="../../images/dashboard.svg" width="20">
                Dashboard
            </a>
            <a href="/admin/informasi">
                <img src="../../images/informasi.svg" width="20">
                Informasi Umum
            </a>
            <a href="/admin/penduduk">
                <img src="../../images/penduduk.svg" width="20">
                Data Penduduk
            </a>
            <a href="/admin/pelayanan">
                <img src="../../images/pelayanan.svg" width="20">
                Pelayanan Publik
            </a>
            <a href="/admin/berita">
                <img src="../../images/berita.svg" width="20">
                Berita Terkini
            </a>
            <a href="/admin/pengaduan">
                <img src="../../images/pengaduan.svg" width="20">
                Lapor Pengaduan
            </a>
            <a href="/admin/dokumentasi">
                <img src="../../images/dokumentasi.svg" width="20">
                Dokumentasi
            </a>
            <a href="/admin/pengguna">
                <img src="../../images/pengguna.svg" width="20">
                Manajemen Akun
            </a>
            <a name="logout" style="margin-top: 7rem;" href="index.php?logout=1">
                <img src="../../images/keluar.svg" width="20">
                Keluar
            </a>
        </div>
    </div>
    <main>
        <h1>Pelayanan</h1>
        <a class="insert" href="insert.php">
            <img src="../../images/circle-add.svg">
            Tambah Data
        </a>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Penanggung Jawab</th>
                <th>Nama Pelayanan</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no=1;
            while($row=mysqli_fetch_array($query)){
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[penanggung_jawab]</td>
                    <td>$row[nama_pelayanan]</td>
                    <td>$row[deskripsi]</td>
                    <td>
                    <a class='update' href='update.php?id=$row[pelayananID]'>Update</a>| 
                    <a class='delete' href='?id=$row[pelayananID]'>Delete</a>
                    </td>
                </tr>
                ";
                $no++;
            }
            ?>
        </table>
        <a href="/admin">Kembali</a>
    </main>
</body>
</html>