<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
$penggunaID = $_POST['penggunaID'];
$judul = $_POST['judul'];
$tanggal_dikirim = $_POST['tanggal_dikirim'];
$update = $_POST['update'];

if (isset($update)) {
    // Ambil isi dari Quill editor
    $isi = $_POST['isi'];

    // Tangkap semua tag img dari isi
    preg_match_all('/<img[^>]+>/i', $isi, $matches);

    // Lokasi folder untuk menyimpan gambar
    $folderPath = '../../assets/images/berita/';

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
            $isi = str_replace($imgSrc, 'assets/images/berita/' . $imgName, $isi);
        }
    }

    $update = "UPDATE berita SET penggunaID='$penggunaID', judul='$judul', isi='$isi', tanggal_dikirim='$tanggal_dikirim' WHERE beritaID='$id'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        ?>
        <script>alert('Data Berhasil Dimasukkan!'); document.location='index.php';</script>
    <?php
    }
}

$sql = "SELECT * FROM berita INNER JOIN pengguna ON berita.penggunaID = pengguna.penggunaID WHERE berita.beritaID = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Berita - Admin</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
        <h1>Edit Data Berita</h1>
        <?php
        if ($data['beritaID'] != "") {
        ?>
            <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
                <input type="hidden" name="beritaID" value="<?= $data['beritaID'] ?>">
                <table border='0'>
                    <tr>
                        <td>Pengirim</td>
                        <td>:</td>
                        <td>
                            <select name='penggunaID'>
                                <?php
                                $s = "SELECT * FROM pengguna";
                                $q = mysqli_query($conn, $s);
                                while ($row = mysqli_fetch_array($q)) {
                                    if ($row['penggunaID'] == $data['penggunaID']) {
                                        echo "<option value='$row[penggunaID]' selected>$row[penggunaID] - $row[nama_pengguna]</option>";
                                    } else {
                                        echo "<option value='$row[penggunaID]'>$row[penggunaID] - $row[nama_pengguna]</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td>:</td>
                        <td>
                            <input type="text" name="judul" value="<?= $data['judul'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Isi</td>
                        <td>:</td>
                        <td>
                        <?php
                        if ($data['isi'] != "") {
                            // Menyesuaikan path gambar
                            $isiContent = str_replace('src="assets/images/berita/', 'src="../../assets/images/berita/', $data['isi']);
                            // Menambahkan gaya CSS untuk membatasi lebar gambar
                            $isiContent = str_replace('<img ', '<img style="max-width: 300px;" ', $isiContent);
                        }
                        ?>
                            <div id="editor-update"><?= $isiContent ?></div>
                            <input type="hidden" name="isi" id="isi">
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Dikirim</td>
                        <td>:</td>
                        <td>
                            <input type="date" name="tanggal_dikirim" value="<?= $data['tanggal_dikirim'] ?>">
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
                    document.getElementById('isi').value = quillHtml;
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
