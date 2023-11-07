<?php
session_start();
include '../../backend/config.php';

if(isset($_POST['insert'])){
    $NIK = $_POST['NIK'];
    $pesan = $_POST['pesan'];
    $media = $_POST['media'];
    
    $insert_query = "INSERT INTO pengaduan (NIK, pesan, media) VALUES ('$NIK', '$pesan', '$media')";
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
    <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
    <table border='0'>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>
                <input type="text" name="NIK">
            </td>
        </tr>
        <tr>
            <td>Pesan</td>
            <td>:</td>
            <td>
                <textarea name="pesan" id="pesan" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>Media</td>
            <td>:</td>
            <td>
                <input type="text" name="media">
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
