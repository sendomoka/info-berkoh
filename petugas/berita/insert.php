<?php
session_start();
include '../../config/models.php';

$penggunaID = $_POST['penggunaID'];
$judul = $_POST['judul'];
$tanggal_dikirim = $_POST['tanggal_dikirim'];
$insert = $_POST['insert'];

if(isset($insert)){
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
    $insert="INSERT INTO berita (penggunaID,judul,isi,tanggal_dikirim) VALUES ('$penggunaID','$judul','$isi','$tanggal_dikirim') ";
    $query = mysqli_query($conn,$insert);
	if($query){
		?>
		<script>alert('Data Berhasil Dimasukkan!'); document.location='index.php';</script>
		<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Berita - Petugas</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/petugas/sidenav.php' ?>
    <main>
    <h1>Tambah Data Berita</h1>
    <form name='formulir' method='POST' 
action='<?php $_SERVER['PHP_SELF']; ?>'>
    <table>
        <tr>
            <td>Pengirim</td>
            <td>:</td>
            <td>
            <select name='penggunaID'>
                <?php
                $s = "SELECT * FROM pengguna";
                $q = mysqli_query($conn, $s);
                while($row = mysqli_fetch_array($q)){
                    echo "<option value='$row[penggunaID]'>$row[penggunaID] - $row[nama_pengguna]</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>:</td>
            <td>
            <input type="text" name="judul">
            </td>
        </tr>
        <tr>
            <td>Isi</td>
            <td>:</td>
            <td>
            <div id="editor-insert"></div>
            <input type="hidden" name="isi" id="isi">
            </td>
        </tr>
        <tr>
            <td>Tanggal Dikirim</td>
            <td>:</td>
            <td>
            <input type="date" name="tanggal_dikirim">
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
            <input type='submit' name='insert' value='Insert Data'>
            </td>
        </tr>
    </table>
    </form>
    </main>
    <?php include '../../components/admin/footer.php' ?>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quillInsert = new Quill('#editor-insert', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'font': []}, {'align': [] }],
                    ['bold', 'italic', 'underline', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'color': [] }, { 'background': [] }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });
        document.forms['formulir'].addEventListener('submit', function(){
            var quillHtml = quillInsert.root.innerHTML.trim();
            document.getElementById('isi').value = quillHtml;
        });
    </script>
</body>
</html>