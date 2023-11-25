<?php
session_start();
include '../../config/models.php';

$nama = $_POST['nama'];
$media = $_FILES['media'];
$insert = $_POST['insert'];

if (isset($insert)) {
    // Memeriksa apakah ada file yang diunggah
    if ($media['error'] === UPLOAD_ERR_OK) {
        $media_name = $media['name'];
        $media_tmp = $media['tmp_name'];
        
        // Lokasi tujuan untuk menyimpan file media
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/dokumentasi/';
        $media_name = time() . '_' . $media_name; // Menambahkan timestamp ke nama file
        $destination = $upload_dir . $media_name;

        // Memindahkan file media ke lokasi tujuan
        if (move_uploaded_file($media_tmp, $destination)) {
            // Jika berhasil, lakukan penambahan data ke database
            $insert_query = "INSERT INTO dokumentasi(nama, media) VALUES ('$nama', '$media_name')";
            
            $query = mysqli_query($conn, $insert_query);
            if ($query) {
                ?>
                <script>alert('Data Berhasil Dimasukkan!'); document.location='index.php';</script>
                <?php
            } else {
                echo "Gagal menambahkan data ke database.";
            }
        } else {
            echo "Gagal menyimpan file media.";
        }
    } else {
        echo "Error dalam mengunggah file media.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data dokumentasi - Admin</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
        <h1>Tambah Data dokumentasi</h1>
        <form name='formulir' method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                <input type="text" name="nama" required>
                </td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td>
                <input type="file" name="media" accept="image/png, image/gif, image/jpeg" required>
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
