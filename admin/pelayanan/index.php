<?php
session_start();
include '../../config/models.php';

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
    <?php include '../components/sidenav.php' ?>
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
        <br><br>
        <p>#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Table Gabungan dari Data Master Penduduk dan Pelayanan</p>
        <table border="1">
            <tr>
                <th>No</th>
                <th>ID (Pelayanan)</th>
                <th>Nama Pelayanan</th>
                <th>NIK</th>
                <th>Nama Penduduk</th>
            </tr>
            <?php
            $no=1;
            $fksql = "SELECT penduduk_terdaftar_pelayanan.pelayananID AS pelayananID, pelayanan.nama_pelayanan AS nama_pelayanan, penduduk_terdaftar_pelayanan.nik AS nik, penduduk.nama AS nama_penduduk FROM penduduk_terdaftar_pelayanan, pelayanan, penduduk WHERE pelayanan.pelayananID = penduduk_terdaftar_pelayanan.pelayananID AND penduduk.nik = penduduk_terdaftar_pelayanan.nik";
            $fkquery = mysqli_query($conn,$fksql);
            while($row=mysqli_fetch_array($fkquery)){
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[pelayananID]</td>
                    <td>$row[nama_pelayanan]</td>
                    <td>$row[nik]</td>
                    <td>$row[nama_penduduk]</td>
                </tr>
                ";
                $no++;
            }
            ?>
        </table>
        <div class="footer-admin">
            &copy; 2023.INFO BERKOH
        </div>
    </main>
</body>
</html>