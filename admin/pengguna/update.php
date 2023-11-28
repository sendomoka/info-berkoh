<?php
session_start();
include '../../config/models.php';
$idupd = $_GET['id'];
if(isset($_POST['update'])){
    $username = $_POST['username'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
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
    $update = $_POST['update'];
    $update_query = "UPDATE pengguna SET username = '$username', nama_pengguna = '$nama_pengguna', email = '$email', password = '$password', role = '$role', jabatan = '$jabatan', avatar = '$avatar_name' WHERE penggunaID = '$idupd'";
    $query = mysqli_query($conn, $update_query);
    if($query){
        ?>
        <script>alert('Data Berhasil Diupdate!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT * FROM pengguna WHERE penggunaID = '$idupd'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pengguna - Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
        <h1>Update Data Pengguna</h1>
        <?php
        if($data['penggunaID'] != "") {
        ?>
        <form method='POST' action='<?php $_SERVER['PHP_SELF']; ?>' enctype="multipart/form-data">
            <input type="hidden" name="penggunaID" value="<?php echo $data['penggunaID']; ?>">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" value="<?php echo $data['username']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama_pengguna" value="<?php echo $data['nama_pengguna']; ?>" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="email" name="email" value="<?php echo $data['email']; ?>" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="text" name="password" value="<?php echo $data['password']; ?>" required></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td>
                        <select name="role">
                            <option value="Petugas" <?php if ($data['role'] === 'Petugas') echo 'selected'; ?>>Petugas</option>
                            <option value="Admin" <?php if ($data['role'] === 'Admin') echo 'selected'; ?>>Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>
                        <select name="jabatan">
                            <option value="Kepala Dusun" <?php if ($data['jabatan'] === 'Kepala Dusun') echo 'selected'; ?>>Kepala Dusun</option>
                            <option value="Kasi Pemerintahan" <?php if ($data['jabatan'] === 'Kasi Pemerintahan') echo 'selected'; ?>>Kasi Pemerintahan</option>
                            <option value="Kasi Kesejahteraan" <?php if ($data['jabatan'] === 'Kasi Kesejahteraan') echo 'selected'; ?>>Kasi Kesejahteraan</option>
                            <option value="Kasi Pelayanan" <?php if ($data['jabatan'] === 'Kasi Pelayanan') echo 'selected'; ?>>Kasi Pelayanan</option>
                            <option value="Kaur Keuangan" <?php if ($data['jabatan'] === 'Kaur Keuangan') echo 'selected'; ?>>Kaur Keuangan</option>
                            <option value="Kaur Tata Usaha & Umum" <?php if ($data['jabatan'] === 'Kaur Tata Usaha & Umum') echo 'selected'; ?>>Kaur Tata Usaha & Umum</option>
                            <option value="Kaur Perencanaan" <?php if ($data['jabatan'] === 'Kaur Perencanaan') echo 'selected'; ?>>Kaur Perencanaan</option>
                            <option value="Sekretaris" <?php if ($data['jabatan'] === 'Sekretaris') echo 'selected'; ?>>Sekretaris</option>
                            <option value="BPD" <?php if ($data['jabatan'] === 'BPD') echo 'selected'; ?>>BPD</option>
                            <option value="Kepala Desa" <?php if ($data['jabatan'] === 'Kepala Desa') echo 'selected'; ?>>Kepala Desa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td>:</td>
                    <td style="display: inline-flex; align-items: center; gap: 10px;">
                        <input type="file" name="avatar" accept="image/png, image/gif, image/jpeg">
                        <img src="<?php echo '/assets/images/pengguna/' . $data['avatar']; ?>" width="50">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <input type='submit' name='update' value='Update Data'>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        } else {
            echo "Data tidak ditemukan!";
        }
        ?>
    </main>
    <?php include '../../components/admin/footer.php' ?>
</body>
</html>