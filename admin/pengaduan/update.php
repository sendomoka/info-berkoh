<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
$pengaduanID = $_POST['pengaduanID'];
$nik = $_POST['nik'];
$pesan = $_POST['pesan'];
$update = $_POST['update'];

if (isset($update)) {
    // Ambil isi dari Quill editor
    $isi = $_POST['pesan'];

    // Tangkap semua tag img dari isi
    preg_match_all('/<img[^>]+>/i', $pesan, $matches);

    // Lokasi folder untuk menyimpan gambar
    $folderPath = '../../assets/images/pengaduan/';

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

            // Ganti src dalam isi dengan path lokal baru
            $isi = str_replace($imgSrc, 'assets/images/pengaduan/' . $imgName, $pesan);
        }
    }

    $update = "UPDATE pengaduan SET nik='$nik', pesan='$pesan' WHERE pengaduanID='$id'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        ?>
        <script>alert('Data Berhasil Dimasukkan!'); document.location='index.php';</script>
    <?php
    }
}

$sql = "SELECT * FROM pengaduan INNER JOIN penduduk ON pengaduan.nik = penduduk.nik WHERE pengaduan.pengaduanID = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Pengaduan - Admin</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
        <h1>Edit Data Pengaduan</h1>
        <?php
        if ($data['pengaduanID'] != "") {
        ?>
            <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
                <input type="hidden" name="pengaduanID" value="<?= $data['pengaduanID'] ?>">
                <table border='0'>
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>
                            <select name='nik'>
                                <?php
                                $s = "SELECT * FROM penduduk";
                                $q = mysqli_query($conn, $s);
                                while ($row = mysqli_fetch_array($q)) {
                                    if ($row['nik'] == $data['nik']) {
                                        echo "<option value='$row[nik]' selected>$row[nik] - $row[nama]</option>";
                                    } else {
                                        echo "<option value='$row[nik]'>$row[nik] - $row[nama]</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Pesan dan Media</td>
                        <td>:</td>
                        <td>
                        <?php
                        if ($data['pesan'] != "") {
                            // Menyesuaikan path gambar
                            $pesanContent = str_replace('src="assets/images/pengaduan/', 'src="../../assets/images/pengaduan/', $data['pesan']);
                            // Menambahkan gaya CSS untuk membatasi lebar gambar
                            $pesanmediaContent = str_replace('<img ', '<img style="max-width: 300px;" ', $pesanContent);
                        }
                        ?>
                            <div id="editor-update"><?= $pesanContent ?></div>
                            <input type="hidden" name="pesan" id="pesan">
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
                    document.getElementById('pesan').value = quillHtml;
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
