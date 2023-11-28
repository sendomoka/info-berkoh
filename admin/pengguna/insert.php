<?php
session_start();
include '../../config/models.php';

$username = $_POST['username'];
$nama_pengguna = $_POST['nama_pengguna'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$jabatan = $_POST['jabatan'];
$avatar = $_FILES['avatar'];
$insert = $_POST['insert'];

if (isset($insert)) {
    // Memeriksa apakah ada file yang diunggah
    if ($avatar['error'] === UPLOAD_ERR_OK) {
        $avatar_name = $avatar['name'];
        $avatar_tmp = $avatar['tmp_name'];
        
        // Lokasi tujuan untuk menyimpan file avatar
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/pengguna/';
        $avatar_name = time() . '_' . $avatar_name; // Menambahkan timestamp ke nama file
        $destination = $upload_dir . $avatar_name;

        // Memindahkan file avatar ke lokasi tujuan
        if (move_uploaded_file($avatar_tmp, $destination)) {
            // Jika berhasil, lakukan penambahan data ke database
            $insert_query = "INSERT INTO pengguna(username, nama_pengguna, email, password, role, jabatan, avatar) VALUES ('$username', '$nama_pengguna', '$email', '$password', '$role', '$jabatan', '$avatar_name')";
            
            $query = mysqli_query($conn, $insert_query);
            if ($query) {
                ?>
                <script>alert('Data Berhasil Dimasukkan!'); document.location='index.php';</script>
                <?php
            } else {
                echo "Gagal menambahkan data ke database.";
            }
        } else {
            echo "Gagal menyimpan file avatar.";
        }
    } else {
        echo "Error dalam mengunggah file avatar.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengguna - Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
        <h1>Tambah Data Pengguna</h1>
        <form name='formulir' method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td>
                <input type="text" name="username" required>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                <input type="text" name="nama_pengguna" required>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                <input type="email" name="email" required>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                <input type="text" name="password" required>
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>:</td>
                <td>
                <select name="role">
                    <option value="Petugas">Petugas</option>
                    <option value="Admin">Admin</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>
                <select name="jabatan">
                    <option value="Kepala Dusun">Kepala Dusun</option>
                    <option value="Kasi Pemerintahan">Kasi Pemerintahan</option>
                    <option value="Kasi Kesejahteraan">Kasi Kesejahteraan</option>
                    <option value="Kasi Pelayanan">Kasi Pelayanan</option>
                    <option value="Kaur Keuangan">Kaur Keuangan</option>
                    <option value="Kaur Tata Usaha & Umum">Kaur Tata Usaha & Umum</option>
                    <option value="Kaur Perencanaan">Kaur Perencanaan</option>
                    <option value="Sekretaris">Sekretaris</option>
                    <option value="BPD">BPD</option>
                    <option value="Kepala Desa">Kepala Desa</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td>
                <input type="file" name="avatar" accept="image/png, image/gif, image/jpeg" required>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                <input type='submit' name='insert' value='Insert Data'>
                </td>
            </tr>
        </tableder=>
        </form>
    </main>
    <?php include '../../components/admin/footer.php' ?>
</body>
</html>
