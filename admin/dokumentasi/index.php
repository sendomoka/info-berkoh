<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
if ($id != "") {
    echo "<script>
        var confirmDelete = confirm('Yakin untuk hapus?');
        if (confirmDelete) {
    ";
    $delete = "DELETE FROM dokumentasi WHERE dokumentasiID=$id";
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

$sql = "SELECT * FROM dokumentasi";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi - Admin</title>
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
                <th>Nama</th>
                <th>Media</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_array($query)) {
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[nama]</td>
                    <td>
                    ";
                        if ($row['media'] == "") {
                            echo "";
                        } else {
                            echo "<img src='../../assets/images/dokumentasi/$row[media]' height='100px'>";
                        }
                    echo "
                    </td>
                    <td>
                        <a class='update' href='update.php?id=$row[dokumentasiID]'>
                            <img src='../../assets/images/edit.svg'>
                        </a> 
                        <a class='delete' href='?id=$row[dokumentasiID]'>
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
