<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
if ($id != "") {
    echo "<script>
        var confirmDelete = confirm('Yakin untuk hapus?');
        if (confirmDelete) {
    ";
    $delete = "DELETE FROM pengguna WHERE penggunaID=$id";
    $query = mysqli_query($conn, $delete);
    if ($query) {
        echo "
        alert('Data berhasil terhapus!');
        window.location.href = 'index.php';
        } else {
            window.history.back();
        }
        </script>";
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
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
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
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Jabatan</th>
                <th>Foto</th>
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
                    <td>$row[role]</td>
                    <td>$row[jabatan]</td>
                    <td>
                    ";
                        if ($row['avatar'] == "") {
                            echo "";
                        } else {
                            echo "<img src='../../assets/images/pengguna/$row[avatar]' width='50px'>";
                        }
                    echo "
                    </td>
                    <td>
                        <a class='update' href='update.php?id=$row[penggunaID]'>
                            <img src='../../assets/images/edit.svg'>
                        </a> 
                        <a class='delete' href='?id=$row[penggunaID]'>
                            <img src='../../assets/images/delete.svg'>
                        </a>
                    </td>
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
