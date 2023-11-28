<?php
session_start();
include '../../config/models.php';

$penggunaID = $_POST['penggunaID'];
$nama_pelayanan = $_POST['nama_pelayanan'];
$deskripsi = $_POST['deskripsi'];
$insert = $_POST['insert'];

if(isset($insert)){
	$deskmedia = $_POST['deskripsi'];
    preg_match_all('/<img[^>]+>/i', $deskripsi, $matches);
    $folderPath = '../../assets/images/pelayanan/';
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }
    foreach ($matches[0] as $imgTag) {
        preg_match('/src="([^"]+)"/i', $imgTag, $srcMatch);
        $imgSrc = $srcMatch[1];
        if (strpos($imgSrc, 'data:image') !== false) {
            preg_match('/data:image\/(.*?);/i', $imgSrc, $imageType);
            $imageExtension = $imageType[1];
            $imgName = uniqid('img_') . '.' . $imageExtension;
            $imgPath = $folderPath . $imgName;
            file_put_contents($imgPath, base64_decode(explode(',', $imgSrc)[1]));
            $deskripsi = str_replace($imgSrc, '../../assets/images/pelayanan/' . $imgName, $deskripsi);
        }
    }
    $insert="insert into pelayanan(penggunaID,nama_pelayanan,deskripsi) values('$penggunaID','$nama_pelayanan','$deskripsi') ";
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
    <title>Tambah Data Pelayanan - Petugas</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/petugas/sidenav.php' ?>
    <main>
        <h1>Tambah Data Pelayanan</h1>
        <form name='formulir' method='POST' 
    action='<?php $_SERVER['PHP_SELF']; ?>'>
        <table border='0'>
            <tr>
                <td>Penanggung Jawab</td>
                <td>:</td>
                <td>
                <select name='penggunaID'>
                    <?php
                    $s = "SELECT * FROM pengguna";
                    $q = mysqli_query($conn, $s);
                    while($row = mysqli_fetch_array($q)){
                        echo "<option value='$row[penggunaID]'>$row[jabatan] - $row[nama_pengguna]</option>";
                    }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Nama Pelayanan</td>
                <td>:</td>
                <td>
                <input type="text" name="nama_pelayanan">
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td>
                <div id="editor-insert"></div>
                <input type="hidden" name="deskripsi" id="deskripsi">
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
            document.getElementById('deskripsi').value = quillHtml;
        });
    </script>
</body>
</html>