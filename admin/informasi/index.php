<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
if ($id != "") {
    // Ambil nama file gambar dari database sebelum menghapus
    $sqlGetImage = "SELECT konten FROM informasi WHERE informasiID='$id'";
    $queryGetImage = mysqli_query($conn, $sqlGetImage);
    $rowGetImage = mysqli_fetch_assoc($queryGetImage);

    // Ambil nama file gambar dari konten kolom
    preg_match('/src="([^"]+)"/', $rowGetImage['konten'], $matches);
    $gambarFilenameToDelete = isset($matches[1]) ? $matches[1] : '';

    // Hapus gambar dari direktori
    if ($gambarFilenameToDelete !== '') {
        $gambarPath = '../../assets/images/informasi/' . basename($gambarFilenameToDelete);
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }
    }

    // Hapus data informasi dari database
    $delete = "DELETE FROM informasi WHERE informasiID='$id'";
    $query = mysqli_query($conn, $delete);
    if ($query) {
        ?>
        <script>alert('Data Berhasil Dihapus!'); document.location='index.php';</script>
        <?php
    }
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
                        <a class='update' href='update.php?id=$row[informasiID]'>Update</a> | 
                        <a class='delete' href='?id=$row[informasiID]'>Delete</a>
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