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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_index.css">
    <link rel="stylesheet" href="../../css/admin_header.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
    <?php include '../../components/admin/header.php' ?>
        <a class="insert" href="insert.php">
            <img src="../../assets/images/circle-add.svg">
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
                        <a class='update' href='update.php?id=$row[pelayananID]'>
                            <img src='../../assets/images/edit.svg'>
                        </a> 
                        <a class='delete' href='?id=$row[pelayananID]'>
                            <img src='../../assets/images/delete.svg'>
                        </a>
                    </td>
                </tr>
                ";
                $no++;
            }
            ?>
        </table>
        <br><br>
        <a class="insert" href="insert_daftar.php">
            <img src="../../assets/images/circle-add.svg">
            Daftarkan Pelayanan
        </a>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Pelayanan</th>
                <th>Penduduk yang mengikuti</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
            <?php
            $no=1;
            $fksql = "SELECT pelayanan.nama_pelayanan AS nama_pelayanan, penduduk.nama AS list_nama, daftar_pelayanan.tanggal AS tanggal, daftar_pelayanan.status AS status FROM daftar_pelayanan, pelayanan, penduduk WHERE pelayanan.pelayananID = daftar_pelayanan.pelayananID AND penduduk.nik = daftar_pelayanan.nik";
            $fkquery = mysqli_query($conn,$fksql);
            while($row=mysqli_fetch_array($fkquery)){
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[nama_pelayanan]</td>
                    <td>$row[list_nama]</td>
                    <td>$row[tanggal]</td>
                    <td>$row[status]</td>
                </tr>
                ";
                $no++;
            }
            ?>
        </table>
    </main>
    <?php include '../../components/admin/footer.php' ?>
</body>
</html>