<?php
session_start();
include '../../config/models.php';

$id = isset($_GET['id']) ? mysqli_real_escape_string($conn, $_GET['id']) : '';

if ($id != "") {
    $delete = "DELETE FROM pengaduan WHERE pengaduanID='$id'";
    $query = mysqli_query($conn, $delete);
    if ($query) {
        echo '<script>alert("Data Berhasil Dihapus!"); document.location="index.php";</script>';
    }
}

$sql = "SELECT pengaduanID, NIK, pesan, media FROM pengaduan";
$query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan - Admin</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php'; ?>
    <main>
        <h1>Pengaduan</h1>
        <a class="insert" href="insert.php">
            <img src="../../assets/images/circle-add.svg">
            Tambah Data
        </a>

        <table border="1">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Pesan</th>
                <th>Media</th>
            </tr>

            <?php
            $no = 1;

            while ($row = mysqli_fetch_array($query)) {
                echo "
                <tr>
                    <td>$no</td>
                    <td>{$row['NIK']}</td>
                    <td>{$row['pesan']}</td>
                    <td>{$row['media']}</td>
                    <td>
                        <a class='update' href='update.php?id={$row['pengaduanID']}'>Update</a> | 
                        <a class='delete' href='?id={$row['pengaduanID']}'>Delete</a>
                    </td>
                </tr>
                ";
                $no++;
            }
            ?>
        </table>
        <br><br>
        <div class="footer-admin">
            &copy; 2023.INFO BERKOH
        </div>
    </main>
</body>
</html>
