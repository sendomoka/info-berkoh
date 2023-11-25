<?php
// Start session dan koneksi database
session_start();
include '../../config/models.php';

// Variabel dari form
$penggunaID = $_POST['penggunaID'];
$update = $_POST['update'];

// Ambil data pengguna dari database
$pengguna = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM pengguna WHERE penggunaID='$penggunaID'"));

// Inisialisasi nilai variabel
$username = $pengguna['username'];
$nama_pengguna = $pengguna['nama_pengguna'];
$email = $pengguna['email'];
$password = $pengguna['password'];
$role = $pengguna['role'];
$jabatan = $pengguna['jabatan'];
$avatar = $pengguna['avatar'];

// Jika tombol update ditekan
if(isset($update)){

    // Upload avatar baru jika ada
    if($avatar['error'] === UPLOAD_ERR_OK){
        
        $avatar_name = $avatar['name'];
        $avatar_tmp = $avatar['tmp_name'];

        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/pengguna/';
        
        $avatar_name = time() . '_' . $avatar_name; 
        
        $destination = $upload_dir . $avatar_name;

        // Pindahkan file avatar
        if(move_uploaded_file($avatar_tmp, $destination)){
            
            // Hapus avatar lama
            if($pengguna['avatar'] && file_exists($upload_dir . $pengguna['avatar'])){
                unlink($upload_dir . $pengguna['avatar']); 
            }

        } else {
            echo "Gagal upload avatar baru.";
        }

    }

    // Query update data pengguna
    $update_query = "UPDATE pengguna SET  
                    username = '$username',
                    nama_pengguna = '$nama_pengguna',
                    email = '$email',
                    password = '$password',  
                    role = '$role',
                    jabatan = '$jabatan',
                    avatar = '" . (isset($avatar_name) ? $avatar_name : $pengguna['avatar']) . "'
                    WHERE penggunaID = '$penggunaID'";

    $query = mysqli_query($conn, $update_query);

    // Redirect
    if($query){
        ?>
        <script>
            alert('Data berhasil diupdate!');
            document.location='index.php';  
        </script>
        <?php
    } else {
        echo "Gagal memperbarui data.";
    }  

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pengguna - Admin</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
        <h1>Update Data Pengguna</h1>
        <form method='POST' enctype="multipart/form-data">
            <input type="hidden" name="penggunaID" value="<?php echo $penggunaID; ?>">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama_pengguna" value="<?php echo $nama_pengguna; ?>" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td><input type="email" name="email" value="<?php echo $email; ?>" required></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="text" name="password" value="<?php echo $password; ?>" required></td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>:</td>
                    <td>
                        <select name="role">
                            <option value="Petugas" <?php if ($role === 'Petugas') echo 'selected'; ?>>Petugas</option>
                            <option value="Admin" <?php if ($role === 'Admin') echo 'selected'; ?>>Admin</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>
                        <select name="jabatan">
                            <option value="Kepala Dusun" <?php if ($jabatan === 'Kepala Dusun') echo 'selected'; ?>>Kepala Dusun</option>
                            <option value="Kasi Pemerintahan" <?php if ($jabatan === 'Kasi Pemerintahan') echo 'selected'; ?>>Kasi Pemerintahan</option>
                            <option value="Kasi Kesejahteraan" <?php if ($jabatan === 'Kasi Kesejahteraan') echo 'selected'; ?>>Kasi Kesejahteraan</option>
                            <option value="Kasi Pelayanan" <?php if ($jabatan === 'Kasi Pelayanan') echo 'selected'; ?>>Kasi Pelayanan</option>
                            <option value="Kaur Keuangan" <?php if ($jabatan === 'Kaur Keuangan') echo 'selected'; ?>>Kaur Keuangan</option>
                            <option value="Kaur Tata Usaha & Umum" <?php if ($jabatan === 'Kaur Tata Usaha & Umum') echo 'selected'; ?>>Kaur Tata Usaha & Umum</option>
                            <option value="Kaur Perencanaan" <?php if ($jabatan === 'Kaur Perencanaan') echo 'selected'; ?>>Kaur Perencanaan</option>
                            <option value="Sekretaris" <?php if ($jabatan === 'Sekretaris') echo 'selected'; ?>>Sekretaris</option>
                            <option value="BPD" <?php if ($jabatan === 'BPD') echo 'selected'; ?>>BPD</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td>:</td>
                    <td style="display: inline-flex; align-items: center; gap: 10px;">
                        <input type="file" name="new_avatar" accept="image/png, image/gif, image/jpeg">
                        <img src="<?php echo '/assets/images/pengguna/' . $avatar; ?>" width="50">
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
    </main>
</body>
</html>