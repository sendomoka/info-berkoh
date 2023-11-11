<?php
session_start();
include '../../config/models.php';

$username = $_POST['username'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$jabatan = $_POST['jabatan'];
$insert = $_POST['insert'];

if (isset($insert)) {
    $insert_query = "INSERT INTO pengguna(username, nama, email, password, role, jabatan) 
                     VALUES ('$username', '$nama', '$email', '$password', '$role', '$jabatan')";
    $query = mysqli_query($conn, $insert_query);

    if ($query) {
        ?>
        <script>alert('Data Berhasil Dimasukkan!'); document.location='index.php';</script>
        <?php
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengguna - Admin</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/sidenav.php' ?>
    <main>
        <h1>Tambah Data Pengguna</h1>
        <a href="index.php">Kembali</a>
        <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
        <table border='0'>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                <select name='penggunaID'>
                    <?php
                    $s = "SELECT * FROM pengguna";
                    $q = mysqli_query($conn, $s);
                    while($row = mysqli_fetch_array($q)){
                        echo "<option value='$row[penggunaID]'>$row[penggunaID] - $row[nama_pengguna]</option>";
                    }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                <input type="text" name="nama">
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
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
    </main>
</body>
</html>
