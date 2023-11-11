<?php
session_start();
include '../../config/models.php';

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
                <td>NIK</td>
                <td>:</td>
                <td>
                <input type="text" name="nik" required>
                </td>
            </tr>
            <tr>
                <td>Nama Penduduk</td>
                <td>:</td>
                <td>
                <input type="text" name="nama" required>
                </td>
            </tr>
            <tr>
                <td>No HP</td>
                <td>:</td>
                <td>
                <input type="text" name="nohp">
                </td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td>
                <input type="text" name="tempat_lahir">
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>
                <input type="date" name="tanggal_lahir">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                <textarea name="alamat" id="alamat" cols="20" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>
                <select name="agama">
                    <option value="ISLAM">ISLAM</option>
                    <option value="KRISTEN">KRISTEN</option>
                    <option value="KATOLIK">KATOLIK</option>
                    <option value="HINDU">HINDU</option>
                    <option value="BUDHA">BUDHA</option>
                    <option value="KONGHUCU">KONGHUCU</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Gol Darah</td>
                <td>:</td>
                <td>
                <select name="gol_darah">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                    <option value="-">-</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                <select name="jenis_kelamin" id="jenis_kelamin">
                    <option value="PEREMPUAN">PEREMPUAN</option>
                    <option value="LAKI">LAKI-LAKI</option>
                </select>
                </td>
            </tr>
            <tr>
                <td>Status Perkawinan</td>
                <td>:</td>
                <td>
                <select name="status_perkawinan" id="status_perkawinan">
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
                <select name="kewarganegaraan">
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                </select>
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