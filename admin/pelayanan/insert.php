<?php
session_start();
include '../../backend/config.php';

$penggunaID = $_POST['penggunaID'];
$nama_pelayanan = $_POST['nama_pelayanan'];
$deskripsi = $_POST['deskripsi'];
$insert = $_POST['insert'];

if(isset($insert)){
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
    <title>Tambah Data Pelayanan - Admin</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/sidenav.php' ?>
    <main>
        <h1>Tambah Data Pelayanan</h1>
        <a href="index.php">Kembali</a>
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
                        echo "<option value='$row[penggunaID]'>$row[penggunaID] - $row[nama_pengguna]</option>";
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
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
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
</body>
</html>