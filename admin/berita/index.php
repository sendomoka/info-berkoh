<?php
session_start();
include '../../backend/config.php';

$id = $_GET['id'];
if($id != ""){
    $delete = "DELETE FROM berita WHERE beritaID='$id'";
    $query = mysqli_query($conn,$delete);
    if($query){
        ?>
        <script>alert('Data Berhasil Dihapus!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT berita.*, pengguna.username AS pengirim FROM berita INNER JOIN pengguna ON berita.penggunaID = pengguna.penggunaID";
$query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terkini - Admin</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/sidenav.php' ?>
    <main>
        <h1>Berita Terkini</h1>
        <a class="insert" href="insert.php">
            <img src="../../images/circle-add.svg">
            Tambah Data
        </a>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Pengirim</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Media</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no=1;
            
            while($row=mysqli_fetch_array($query)){
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[pengirim]</td>
                    <td>$row[judul]</td>
                    <td>$row[isi]</td>
                    <td>
                        // <img src='../../images/$row[media]' width='100px'>
                        // <video src='../../videos/$row[media]' width='100px' controls></video>
                        $row[media]
                    </td>
                    <td>
                    <a class='update' href='update.php?id=$row[beritaID]'>Update</a>| 
                    <a class='delete' href='?id=$row[beritaID]'>Delete</a>
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