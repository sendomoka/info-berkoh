<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
if ($id != "") {
    // Ambil nama file gambar dari database sebelum menghapus
    $sqlGetImage = "SELECT pesan FROM pengaduan WHERE pengaduanID='$id'";
    $queryGetImage = mysqli_query($conn, $sqlGetImage);
    $rowGetImage = mysqli_fetch_assoc($queryGetImage);

    // Ambil nama file gambar dari pesan kolom
    preg_match('/src="([^"]+)"/', $rowGetImage['pesan'], $matches);
    $gambarFilenameToDelete = isset($matches[1]) ? $matches[1] : '';

    echo "<script>
        var confirmDelete = confirm('Yakin untuk hapus?');
        if (confirmDelete) {
    ";

    // Hapus gambar dari direktori
    if ($gambarFilenameToDelete !== '') {
        $gambarPath = '../../assets/images/pengaduan/' . basename($gambarFilenameToDelete);
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }
    }

    // Hapus data pengaduan dari database
    $delete = "DELETE FROM pengaduan WHERE pengaduanID='$id'";
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

$sql = "SELECT pengaduan.pengaduanID, penduduk.nama AS nik, pengaduan.pesan AS pesan FROM pengaduan INNER JOIN penduduk ON pengaduan.nik = penduduk.nik";
$query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan - Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
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
                <th>Pesan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no=1;
            while ($row = mysqli_fetch_array($query)) {
                $pattern = "/<img [^>]*src/i";
                preg_match($pattern, $row['pesan'], $matches);
                if(!empty($matches)) {
                    $row['pesan'] = preg_replace('/<img ([^>]*)src/i', '<img $1width="100px" src', $row['pesan']);
                }
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[nik]</td>
                    <td>$row[pesan]</td>
                    <td>
                        <a class='update' href='update.php?id=$row[pengaduanID]'>
                            <img src='../../assets/images/edit.svg'>
                        </a> 
                        <a class='delete' href='?id=$row[pengaduanID]'>
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
