<?php
session_start();
include '../../backend/config.php';

if(isset($_POST['insert'])){
    $pengaduID = $_POST['pengaduID'];
    $nama_pengaduan = $_POST['nama_pengaduan'];
    $alamat_pengadu = $_POST['alamat_pengadu'];
    $perihal_masalah = $_POST['perihal_masalah'];
    $isi_aduan = $_POST['isi_aduan'];
    $upload_file = $_POST['upload_file'];
    
    $insert_query = "INSERT INTO pengaduan (pengaduID, nama_pengaduan, alamat_pengadu, perihal_masalah, isi_aduan, upload_file) VALUES ('$pengaduID', '$nama_pengaduan', '$alamat_pengadu', '$perihal_masalah', '$isi_aduan', '$upload_file')";
    $query = mysqli_query($conn, $insert_query);
    
    if($query){
        echo '<script>alert("Data Berhasil Dimasukkan!"); document.location="index.php";</script>';
    } else {
        echo '<script>alert("Gagal memasukkan data!");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengaduan - Admin</title>
</head>
<body>
    <h1>Tambah Data Pengaduan</h1>
    <a href="index.php">Kembali</a>
    <form name='formulir' method='POST' 
action='<?php $_SERVER['PHP_SELF']; ?>'>
    <table border='0'>
        <tr>
            <td>Pengadu</td>
            <td>:</td>
            <td>
            <select name='pengaduID'>
                <?php
                $s = "SELECT * FROM pengaduID";
                $q = mysqli_query($conn, $s);
                while($row = mysqli_fetch_array($q)){
                    echo "<option value='$row[pengaduID]'>$row[pengaduID] - $row[nama_pengaduan]</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Nama Pengaduan</td>
            <td>:</td>
            <td>
            <input type="text" name="nama_pengaduan">
            </td>
        </tr>
        <tr>
            <td>Alamat Pengadu</td>
            <td>:</td>
            <td>
            <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>Perihal Masalah</td>
            <td>:</td>
            <td>
            <input type="text" name="perihal_masalah">
            </td>
        </tr>
        <tr>
            <td>Isi Aduan</td>
            <td>:</td>
            <td>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>Upload File</td>
            <td>:</td>
            <td>
            <input name="file" id="file" cols="30" rows="10"></input>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
            <input type='submit' name='insert' value='Insert Data'>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>