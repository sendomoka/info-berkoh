<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
$query = "SELECT * FROM pengguna WHERE penggunaID='$id'";
$find = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($find);

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];
    $avatar = $_FILES['avatar']['name'];
    $tmp = $_FILES['avatar']['tmp_name'];
    move_uploaded_file($tmp, "../../assets/images/pengguna/$avatar");

    $query = "UPDATE pengguna SET nama_pengguna='$nama_pengguna', username='$username', email='$email', password='$password' WHERE penggunaID='$id'";
    $update = mysqli_query($conn, $query);
    $_SESSION['avatar'] = $avatar;
    $_SESSION['nama_pengguna'] = $nama_pengguna;
    $_SESSION['jabatan'] = $jabatan;

    if ($update) {
        header("Location: index.php?id=$id");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - Admin @infoberkoh</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
    <link rel="stylesheet" href="../../css/admin_header.css">
</head>
<body>
<?php include '../../components/admin/sidenav.php' ?>
    <main>
        <?php include '../../components/admin/header.php' ?>
        <?php
        if ($user['penggunaID'] != "") {
        ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" value="<?=$user['username']?>"></td>
                </tr>
                <tr>
                    <td>Nama Pengguna</td>
                    <td>:</td>
                    <td><input type="text" name="nama_pengguna" value="<?=$user['nama_pengguna']?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="email" name="email" value="<?=$user['email']?>"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="password" value="<?=$user['password']?>">
                    </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><input type="text" name="jabatan" value="<?=$user['jabatan']?>"></td>
                </tr>
                <tr>
                    <td>Foto Profil</td>
                    <td>:</td>
                    <td>
                        <input type="file" name="avatar" value="<?=$user['avatar']?>">
                        <?php
                        if ($user['avatar'] != '') {
                            echo "<img src='../../assets/images/pengguna/$user[avatar]'>";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button type="submit" name="submit">Update Profil</button></td>
                </tr>
            </table>
        </form>
        <?php
        } else {
            echo "<h1>Data tidak ditemukan!</h1>";
        }
        ?>
    </main>
</body>
</html>