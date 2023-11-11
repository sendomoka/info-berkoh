<?php
session_start();
include '../../config/models.php';

$nik = $_GET['nik'];
if($nik != ""){
    $delete = "DELETE FROM penduduk WHERE nik='$nik'";
    $query = mysqli_query($conn,$delete);
    if($query){
        ?>
        <script>alert('Data Berhasil Dihapus!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT * FROM penduduk ORDER BY nik ASC";
$query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penduduk - Admin</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/sidenav.php' ?>
    <main>
        <h1>Penduduk</h1>
        <a class="insert" href="insert.php">
            <img src="../../images/circle-add.svg">
            Tambah Data
        </a>
        <div class="table-wrapper">
        <table border="1">
            <tr>
                <th>NIK</th>
                <th>Nama Penduduk</th>
                <th>No HP</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Golongan Darah</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Pekerjaan</th>
                <th>Kewarganegaraan</th>
                <th>Aksi</th>
            </tr>
            <?php
            while($row=mysqli_fetch_array($query)){
                echo "
                <tr>
                    <td>$row[nik]</td>
                    <td>$row[nama]</td>
                    <td>$row[nohp]</td>
                    <td>$row[tempat_lahir]</td>
                    <td>$row[tanggal_lahir]</td>
                    <td>$row[alamat]</td>
                    <td>$row[agama]</td>
                    <td>$row[gol_darah]</td>
                    <td>$row[jenis_kelamin]</td>
                    <td>$row[status_perkawinan]</td>
                    <td>$row[pekerjaan]</td>
                    <td>$row[kewarganegaraan]</td>
                    <td>
                    <a class='update' href='update.php?nik=$row[nik]'>Update</a>| 
                    <a class='delete' href='?nik=$row[nik]'>Delete</a>
                    </td>
                </tr>
                ";
            }
            ?>
        </table>
        </div>
        <div class="footer-admin">
            &copy; 2023.INFO BERKOH
        </div>
    </main>
</body>
</html>