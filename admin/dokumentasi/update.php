<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
$dokumentasiID = $_POST['dokumentasiID'];
$nama = $_POST['nama'];
$update = $_POST['update'];

if (isset($update)) {
    // Ambil konten dari Quill editor
    $media = $_POST['media'];

    // Tangkap semua tag img dari konten
    preg_match_all('/<img[^>]+>/i', $media, $matches);

    // Lokasi folder untuk menyimpan gambar
    $folderPath = '../../assets/images/dokumentasi/';

    // Pastikan folder sudah ada atau buat jika belum
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    // Loop melalui setiap tag img
    foreach ($matches[0] as $imgTag) {
        // Ekstrak src dari tag img
        preg_match('/src="([^"]+)"/i', $imgTag, $srcMatch);
        $imgSrc = $srcMatch[1];

        // Hanya proses gambar lokal (tidak dari URL eksternal)
        if (strpos($imgSrc, 'data:image') !== false) {
            // Dapatkan tipe gambar (jpeg, png, dll.)
            preg_match('/data:image\/(.*?);/i', $imgSrc, $imageType);
            $imageExtension = $imageType[1];

            // Generate nama unik untuk gambar
            $imgName = uniqid('img_') . '.' . $imageExtension;

            // Lokasi penyimpanan gambar
            $imgPath = $folderPath . $imgName;

            // Simpan gambar ke folder
            file_put_contents($imgPath, base64_decode(explode(',', $imgSrc)[1]));

            // Ganti src dalam konten dengan path lokal baru
            $media = str_replace($imgSrc, 'assets/images/dokumentasi/' . $imgName, $media);
        }
    }

    $update = "UPDATE dokumentasi SET nama='$nama', media='$media' WHERE dokumentasiID='$id'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        ?>
        <script>alert('Data Berhasil Dimasukkan!'); document.location='index.php';</script>
    <?php
    }
}

$sql = "SELECT * FROM dokumentasi WHERE dokumentasiID = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dokumentasi - Admin</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
        <h1>Edit Data Dokumentasi</h1>
        <?php
        if ($data['dokumentasiID'] != "") {
        ?>
            <form name='formulir' method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>' enctype="multipart/form-data">

                <input type="hidden" name=" dokumentasiID" value="<?= $data['dokumentasiID'] ?>">
                <table border='0'>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama" value="<?= $data['nama'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Media</td>
                        <td>:</td>
                        <td>
                        <div id="editor"></div>
                        <?php
                        // Pernyataan debugging
                        echo 'Path Gambar: ' . $data['media'] . '<br>';
                        if ($data['media'] != "") {
                            // Sesuaikan path untuk gambar di sini
                            $mediaContent = str_replace('src="assets/images/dokumentasi/', 'src="../../assets/images/dokumentasi/', $data['media']);
                            // Menambahkan gaya CSS untuk membatasi lebar gambar
                            $mediaContent = str_replace('<img ', '<img style="max-width: 300px;" ', $mediaContent);
                            echo $mediaContent;
                        }
                        ?>
                            <input type="file" name="media" id="media">
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
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    document.forms['formulir'].addEventListener('submit', function () {
        var quillHtml = quill.root.innerHTML.trim();
        document.getElementById('media').value = quillHtml;
    });
</script>

        <?php
        } else {
            echo "Data tidak ditemukan.";
        }
        ?>
    </main>
</body>
</html>
