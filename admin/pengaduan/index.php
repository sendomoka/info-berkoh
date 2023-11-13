<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
if($id != ""){
    $delete = "DELETE FROM pengaduan WHERE pengaduanID='$id'";
    $query = mysqli_query($conn,$delete);
    if($query){
        ?>
        <script>alert('Data Berhasil Dihapus!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT pengaduan.*, penduduk.nama AS nik FROM pengaduan INNER JOIN penduduk ON pengaduan.nik = penduduk.nik";
$query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terkini - Admin</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_index.css">
    <link rel="stylesheet" href="../../css/admin_header.css">
    <style>
        td img {
            max-width: 300px;
            height: auto;
        }
    </style>
</head>
<body>
<?php include '../../components/admin/sidenav.php'; ?>
    <main>
    <?php include '../../components/admin/header.php' ?>
        <a class="insert" href="insert.php">
            <img src="../../assets/images/circle-add.svg">
            Tambah Data
        </a>
        <table>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Pesan dan Media</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no=1;
            while ($row = mysqli_fetch_array($query)) {
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[nik]</td>
                    <td>$row[pesan]</td>
                    <td>
                        <a class='detail' href='detail.php?id=$row[pengaduanID]'>Detail</a> |
                        <a class='update' href='update.php?id=$row[pengaduanID]'>Update</a> | 
                        <a class='delete' href='?id=$row[pengaduanID]'>Delete</a>
                    </td>
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
