<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
if($id != ""){
    $deskimage = "SELECT deskripsi FROM pelayanan WHERE pelayananID='$id'";
    $queryimage = mysqli_query($conn,$deskimage);
    $rowimage = mysqli_fetch_assoc($queryimage);
    preg_match('/src="([^"]+)"/', $rowimage['deskripsi'], $matches);
    $delimage = isset($matches[1]) ? $matches[1] : '';
    echo "<script>
        var confirmDelete = confirm('Yakin untuk hapus?');
        if (confirmDelete) {
    ";
    if($delimage !== ''){
        $imagePath = '../../assets/images/pelayanan/' . basename($delimage);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    $delete = "DELETE FROM pelayanan WHERE pelayananID='$id'";
    $query = mysqli_query($conn,$delete);
    if($query){
        echo "
        alert('Data berhasil terhapus!');
        window.location.href = 'index.php';
        } else {
            window.history.back();
        }
        </script>";
    }
}

$sql = "SELECT pelayanan.pelayananID, pengguna.nama_pengguna AS penanggung_jawab, pelayanan.nama_pelayanan, pelayanan.deskripsi FROM pelayanan INNER JOIN pengguna ON pelayanan.penggunaID = pengguna.penggunaID";
$query = mysqli_query($conn,$sql);

if(isset($_GET['nama_pelayanan']) && isset($_GET['tanggal'])){
    $nama_pelayanan = $_GET['nama_pelayanan'];
    $tanggal = $_GET['tanggal'];
    $delete = "DELETE FROM daftar_pelayanan WHERE pelayananID=(SELECT pelayananID FROM pelayanan WHERE nama_pelayanan='$nama_pelayanan') AND tanggal='$tanggal'";
    $query = mysqli_query($conn,$delete);
    if($query){
        ?>
        <script>alert('Data Berhasil Dihapus!'); document.location='index.php';</script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelayanan - Petugas</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_index.css">
    <link rel="stylesheet" href="../../css/admin_header.css">
</head>
<body>
    <?php include '../../components/petugas/sidenav.php' ?>
    <main style="margin-bottom: 5rem;">
    <?php include '../../components/petugas/header.php' ?>
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
                $pattern = "/<img [^>]*src/i";
                preg_match($pattern, $row['deskripsi'], $matches);
                if (!empty($matches)) {
                    $row['deskripsi'] = preg_replace('/<img ([^>]*)src/i', '<img $1height="100px" src', $row['deskripsi']);
                }
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
                <th>Aksi</th>
            </tr> 
            <?php
            $no=1;
            $fksql = "SELECT daftar_pelayanan.pelayananID AS pelayananID, pelayanan.nama_pelayanan AS nama_pelayanan, daftar_pelayanan.tanggal AS tanggal, daftar_pelayanan.status AS status, GROUP_CONCAT(penduduk.nama) AS list_nama FROM daftar_pelayanan
            INNER JOIN pelayanan ON pelayanan.pelayananID = daftar_pelayanan.pelayananID
            INNER JOIN penduduk ON FIND_IN_SET(penduduk.nik, REPLACE(daftar_pelayanan.nik, ', ', ',')) > 0
            GROUP BY pelayanan.pelayananID, daftar_pelayanan.tanggal, daftar_pelayanan.status";
            $fkquery = mysqli_query($conn,$fksql);
            while($row=mysqli_fetch_array($fkquery)){
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[nama_pelayanan]</td>
                    <td>
                        <ul>";
                            $list_nama = explode(',', $row['list_nama']);
                            foreach ($list_nama as $nama) {
                                echo "<li>$nama</li>";
                            }
                            echo "
                        </ul>
                    </td>
                    <td>$row[tanggal]</td>
                    <td>$row[status]</td>
                    <td>
                        <a class='delete' href='?nama_pelayanan=$row[nama_pelayanan]&tanggal=$row[tanggal]'>
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