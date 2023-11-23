<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];

if ($id != "") {
    $delete = "DELETE FROM pengguna WHERE penggunaID=$id";
    $query = mysqli_query($conn, $delete);

    if ($query) {
        ?>
        <script>alert('Data Berhasil Dihapus!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT * FROM pengguna";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna - Admin</title>
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
            <img src="../../images/circle-add.svg">
            Tambah Data
        </a>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Jabatan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;

            while ($row = mysqli_fetch_array($query)) {
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[username]</td>
                    <td>$row[nama_pengguna]</td>
                    <td>$row[email]</td>
                    <td>$row[password]</td>
                    <td>$row[role]</td>
                    <td>$row[jabatan]</td>
                    <td>
                        <a class='update' href='update.php?id=$row[penggunaID]'>Update</a> | 
                        <a class='delete' href='?id=$row[penggunaID]'>Delete</a>
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
