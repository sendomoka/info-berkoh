<?php
session_start();
include '../../backend/config.php';

$penggunaID = $_POST['penggunaID'];
$nama_pelayanan = $_POST['nama_pelayanan'];
$deskripsi = $_POST['deskripsi'];
$insert = $_POST['insert'];

if(isset($insert)){
	$insert="insert into berita(penggunaID,nama_pelayanan,deskripsi) values('$penggunaID','$nama_pelayanan','$deskripsi') ";
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
    <title>Tambah Data Berita - Admin</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
    <h1>Tambah Data Berita</h1>
    <a href="index.php">Kembali</a>
    <form name='formulir' method='POST' 
action='<?php $_SERVER['PHP_SELF']; ?>'>
    <table border='0'>
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
            <div id="editor" name="isi"></div>
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
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
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
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });
    </script>
</body>
</html>