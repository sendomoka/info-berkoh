<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
$informasiID = $_POST['informasiID'];
$nama = $_POST['nama'];
$update = $_POST['update'];

if (isset($update)) {
    // Ambil konten dari Quill editor
    $konten = $_POST['konten'];

    // Tangkap semua tag img dari konten
    preg_match_all('/<img[^>]+>/i', $konten, $matches);

    // Lokasi folder untuk menyimpan gambar
    $folderPath = '../../assets/images/informasi/';

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
            $konten = str_replace($imgSrc, 'assets/images/informasi/' . $imgName, $konten);
        }
    }

    $update = "UPDATE informasi SET nama='$nama', konten='$konten' WHERE informasiID='$id'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        ?>
        <script>alert('Data Berhasil Dimasukkan!'); document.location='index.php';</script>
    <?php
    }
}

$sql = "SELECT * FROM informasi WHERE informasiID = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Informasi - Admin</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
        <h1>Edit Data Informasi</h1>
        <?php
        if ($data['informasiID'] != "") {
        ?>
            <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
                <input type="hidden" name="informasiID" value="<?= $data['informasiID'] ?>">
                <table border='0'>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="nama" value="<?= $data['nama'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Konten</td>
                        <td>:</td>
                        <td>
                        <?php
                        if ($data['konten'] != "") {
                            // Menyesuaikan path gambar
                            $kontenContent = str_replace('src="assets/images/informasi/', 'src="../../assets/images/informasi/', $data['konten']);
                            // Menambahkan gaya CSS untuk membatasi lebar gambar
                            $kontenContent = str_replace('<img ', '<img style="max-width: 300px;" ', $kontenContent);
                        }
                        ?>
                            <div id="editor-update"><?= $kontenContent ?></div>
                            <input type="hidden" name="konten" id="konten">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <input type='submit' name='update' class="insert" value='Update Data'>
                        </td>
                    </tr>
                </table>
            </form>
            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
            <script>
                var quillUpdate = new Quill('#editor-update', {
                    theme: 'snow',
                    modules: {
                        toolbar: [
                            [{ 'font': [] }, { 'align': [] }],
                            ['bold', 'italic', 'underline', 'code-block'],
                            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                            [{ 'script': 'sub' }, { 'script': 'super' }],
                            [{ 'indent': '-1' }, { 'indent': '+1' }],
                            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                            [{ 'color': [] }, { 'background': [] }],
                            ['link', 'image'],
                            ['clean']
                        ]
                    }
                });
                document.forms['formulir'].addEventListener('submit', function () {
                    var quillHtml = quillUpdate.root.innerHTML.trim();
                    document.getElementById('konten').value = quillHtml;
                });
            </script>
        <?php
        } else {
            echo "Data tidak ditemukan.";
        }
        ?>
    </main>
    <?php include '../../components/admin/footer.php' ?>
</body>
</html>
