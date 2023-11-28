<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
$query = "SELECT * FROM pengguna WHERE penggunaID='$id'";
$find = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($find);

if (isset($_POST['submit'])) {
    $query_old = "SELECT * FROM pengguna WHERE penggunaID='$id'";
    $result_old = mysqli_query($conn, $query_old);
    $data = mysqli_fetch_assoc($result_old);
    if (!empty($data['avatar']) && $data['avatar'] != 'user.png') {
        $old_avatar_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/pengguna/' . $data['avatar'];
        if (file_exists($old_avatar_path)) {
            unlink($old_avatar_path);
        }
    }
    $username = $_POST['username'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $jabatan = $_POST['jabatan'];
    $avatar = $_FILES['avatar'];
    $avatar_name = $avatar['name'];
    $avatar_tmp = $avatar['tmp_name'];
    $avatar_name = time() . '_' . $avatar_name;
    $destination = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/pengguna/' . $avatar_name;
    if (move_uploaded_file($avatar_tmp, $destination)) {
        $avatar_name = $avatar_name;
    } else {
        $avatar_name = $data['avatar'];
    }
    $query = "UPDATE pengguna SET nama_pengguna='$nama_pengguna', email='$email', password='$password', avatar='$avatar_name' WHERE penggunaID='$id'";
    $update = mysqli_query($conn, $query);
    $_SESSION['avatar'] = $avatar_name;
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
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
    <link rel="stylesheet" href="../../css/admin_header.css">
</head>
<body>
<?php include '../../components/petugas/sidenav.php' ?>
    <main>
        <?php include '../../components/petugas/header.php' ?>
        <?php
        if ($user['penggunaID'] != "") {
        ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" value="<?=$user['username']?>" readonly></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama_pengguna" value="<?=$user['nama_pengguna']?>" required></td>
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
                    <td>Role</td>
                    <td>:</td>
                    <td><input type="text" name="role" value="<?=$user['role']?>" readonly></td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><input type="text" name="jabatan" value="<?=$user['jabatan']?>" readonly></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td>:</td>
                    <td style="display: flex; align-items: center; gap: 10px">
                        <input type="file" name="avatar" value="<?=$user['avatar']?>">
                        <?php
                        if ($user['avatar'] != '') {
                            echo "<img src='../../assets/images/pengguna/$user[avatar]' accept='image/png, image/gif, image/jpeg' width='50'>";
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
    <?php include '../../components/admin/footer.php' ?>
</body>
</html>