<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
if ($id != "") {
    // Ambil nama file gambar dari database sebelum menghapus
    $sqlGetImage = "SELECT isi FROM berita WHERE beritaID='$id'";
    $queryGetImage = mysqli_query($conn, $sqlGetImage);
    $rowGetImage = mysqli_fetch_assoc($queryGetImage);

    // Ambil nama file gambar dari isi kolom
    preg_match('/src="([^"]+)"/', $rowGetImage['isi'], $matches);
    $gambarFilenameToDelete = isset($matches[1]) ? $matches[1] : '';

    // Hapus gambar dari direktori
    if ($gambarFilenameToDelete !== '') {
        $gambarPath = '../../assets/images/berita/' . basename($gambarFilenameToDelete);
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }
    }

    // Hapus data berita dari database
    $delete = "DELETE FROM berita WHERE beritaID='$id'";
    $query = mysqli_query($conn, $delete);
    if ($query) {
        ?>
        <script>alert('Data Berhasil Dihapus!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT berita.*, pengguna.nama_pengguna AS pengirim FROM berita INNER JOIN pengguna ON berita.penggunaID = pengguna.penggunaID";
$query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terkini - Petugas</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_index.css">
    <link rel="stylesheet" href="../../css/admin_header.css">
</head>
<body>
<?php include '../../components/petugas/sidenav.php'; ?>
    <main>
    <?php include '../../components/petugas/header.php' ?>
        <a class="insert" href="insert.php">
            <img src="../../assets/images/circle-add.svg">
            Tambah Data
        </a>
        <table>
            <tr>
                <th>No</th>
                <th>Pengirim</th>
                <th>Judul</th>
                <th>Tanggal Dikirim</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no=1;
            while ($row = mysqli_fetch_array($query)) {
                echo "
                <tr>
                    <td>$no</td>
                    <td style='text-align:left'>$row[pengirim]</td>
                    <td style='text-align:left'>$row[judul]</td>
                    <td>$row[tanggal_dikirim]</td>
                    <td style='display: flex; gap: 5px; justify-content: center;'>
                        <a class='delete' href='detail.php?id=$row[beritaID]'>
                            <img src='../../assets/images/detail.svg'>
                        </a>
                        <a class='update' href='update.php?id=$row[beritaID]'>
                            <img src='../../assets/images/edit.svg'>
                        </a> 
                        <a class='delete' href='?id=$row[beritaID]'>
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