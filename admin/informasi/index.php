<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
if($id != "") {
    // Get image name
    $sqlGetImage = "SELECT konten FROM informasi WHERE informasiID='$id'";
    $queryGetImage = mysqli_query($conn, $sqlGetImage);
    $rowGetImage = mysqli_fetch_assoc($queryGetImage);

    // Get image name from content column
    preg_match('/src="([^\"]+)"/', $rowGetImage['konten'], $matches);  
    $gambarFilenameToDelete = isset($matches[1]) ? $matches[1] : '';

    echo "<script>
        var confirmDelete = confirm('Yakin untuk hapus?');
        if (confirmDelete) {
    ";

    // Delete image  
    if($gambarFilenameToDelete !== '') {
        $gambarPath = '../../assets/images/informasi/' . basename($gambarFilenameToDelete);
        if(file_exists($gambarPath)) {
            unlink($gambarPath);
        }
    }

    // Delete data
    $deleteSQL = "DELETE FROM informasi WHERE informasiID='$id'";
    $deleteQuery = mysqli_query($conn, $deleteSQL);
    echo "
        alert('Data berhasil terhapus!');
        window.location.href = 'index.php';
        } else {
            window.history.back();
        }
        </script>";
}

$sql = "SELECT * FROM informasi";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Umum - Admin</title>
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
                <th>Nama</th>
                <th>Konten</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no=1;
            while ($row = mysqli_fetch_array($query)) {
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[nama]</td>
                    <td>$row[konten]</td>
                    <td>
                        <a class='update' href='update.php?id=$row[informasiID]'>
                            <img src='../../assets/images/edit.svg'>
                        </a> 
                        <a class='delete' href='?id=$row[informasiID]'>
                            <img src='../../assets/images/delete.svg'>
                        </a>
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