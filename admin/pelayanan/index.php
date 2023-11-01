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
</head>
<body>
    <h1>Pelayanan</h1>
    <a href="insert.php">Tambah Data</a>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Penanggung Jawab</th>
            <th>Nama Pelayanan</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        <?php
        while($row=mysqli_fetch_array($query)){
            echo "
            <tr>
                <td>$row[pelayananID]</td>
                <td>$row[penanggung_jawab]</td>
                <td>$row[nama_pelayanan]</td>
                <td>$row[deskripsi]</td>
                <td>
                <a href='update.php?id=$row[pelayananID]'>Update</a>| 
                <a href='?id=$row[pelayananID]'>Delete</a>
                </td>
            </tr>
            ";
        }
        ?>
    </table>
</body>
</html>