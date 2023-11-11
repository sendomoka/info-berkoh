<?php
session_start();
include '../../config/models.php';

$informasiID = $_POST['informasiID'];
$nama = $_POST['nama'];
$konten = $_POST['konten'];
$media = $_FILES['media']['name'];
if ($media != '') {
    $upload = 'images/' . $media;
    move_uploaded_file($_FILES["media"]["tmp_name"], $upload);
}
if(isset($insert)){
	$insert="insert into penduduk(informasiID,nama,konten,media) values('$informasiID','$nama','$konten','$upload') ";
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
    <title>Tambah Data Penduduk - Admin</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        td {
            text-align: left;
        }
        h1 {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <?php include '../components/sidenav.php' ?>
    <main>
        <h1>Tambah Data Penduduk</h1>
        <form name='formulir' method='POST' 
    action='<?php $_SERVER['PHP_SELF']; ?>'>
        <table>
            <tr>
                <td>InformasiID</td>
                <td>:</td>
                <td>
                <input type="text" name="informasiID" required>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                <input type="text" name="nama" required>
                </td>
            </tr>
            <tr>
                <td>Konten</td>
                <td>:</td>
                <td>
                <textarea name="konten" id="konten" cols="20" rows="5"></textarea>
                </td>
            </tr>
            <tr>
            <td>Upload Media</td>
            <td>
                <input type="file" name="media" accept=".png, .jpg">
            </td>
        </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                <input type='submit' name='insert' class='insert' value='Insert Data'>
                </td>
            </tr>
        </table>
        </form>
    </main>
</body>
</html>