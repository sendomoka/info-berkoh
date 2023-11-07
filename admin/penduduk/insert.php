<?php
session_start();
include '../../backend/config.php';

$nik = $_POST['nik'];
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$agama = $_POST['agama'];
$gol_darah = $_POST['gol_darah'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$status_perkawinan = $_POST['status_perkawinan'];
$pekerjaan = $_POST['pekerjaan'];
$kewarganegaraan = $_POST['kewarganegaraan'];
$insert = $_POST['insert'];

if(isset($insert)){
	$insert="insert into penduduk(nik,nama,nohp,tempat_lahir,tanggal_lahir,alamat,agama,gol_darah,jenis_kelamin,status_perkawinan,pekerjaan,kewarganegaraan) values('$nik','$nama','$nohp', '$tempat_lahir','$tanggal_lahir','$alamat','$agama','$gol_darah','$jenis_kelamin','$status_perkawinan','$pekerjaan','$kewarganegaraan') ";
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
</head>
<body>
    <h1>Tambah Data Penduduk</h1>
    <a href="index.php">Kembali</a>
    <form name='formulir' method='POST' 
action='<?php $_SERVER['PHP_SELF']; ?>'>
    <table border='0'>
        <tr>
            <td>Nama penduduk</td>
            <td>:</td>
            <td>
            <input type="text" name="nama">
            </td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>:</td>
            <td>
            <input type="text" name="noh">
            </td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td>
            <input type="text" name="tempatlahir">
            </td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>
            <input type="text" name="tgllahir">
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
            <textarea name="alamat" id="alamat" cols="30" rows="10"></textarea>
            </td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
            <input type="text" name="agama">
            </td>
        </tr>
        <tr>
            <td>Gol Darah</td>
            <td>:</td>
            <td>
            <input type="text" name="goldar">
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
            <select name="jk" id="jk">
                <option value="PEREMPUAN">PEREMPUAN</option>
                <option value="LAKI">LAKI-LAKI</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>
            <select name="status" id="status">
                <option value="KAWIN">KAWIN</option>
                <option value="BELUM">BELUM KAWIN</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>
            <input type="text" name="pekerjaan">
            </td>
        </tr>
        <tr>
            <td>Kewarganegaraan</td>
            <td>:</td>
            <td>
            <input type="text" name="kewarganegaraan">
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
</body>
</html>