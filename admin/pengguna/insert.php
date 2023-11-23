<?php
session_start();
include '../../config/models.php';

$username = $_POST['username'];
$nama_pengguna = $_POST['nama_pengguna'];
$email = $_POST['email'];
$password = $_POST['pass'];
$role = $_POST['role'];
$jabatan = $_POST['jabatan'];
$insert = $_POST['insert'];

if (isset($insert)) {
    $insert_query = "INSERT INTO pengguna(username, nama_pengguna, email, password, role, jabatan)  
                  VALUES ('$username', '$nama_pengguna', '$email', '$password', '$role', '$jabatan')";
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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
        <h1>Tambah Data Pengguna</h1>
        <a href="index.php">Kembali</a>
        <form name='formulir' method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <table border='0'>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                <input type="text" name="nama_pengguna">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                <input type="password" name="pass">
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>:</td>
                <td>
                <input type="text" name="role">
                </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>
                <input type="text" name="jabatan">
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
