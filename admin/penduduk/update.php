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
$update = $_POST['update'];

if(isset($update)){
    $update="UPDATE penduduk SET nama='$nama',nohp='$nohp', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat',agama='$agama', gol_darah='$gol_darah', jenis_kelamin='$jenis_kelamin',status_perkawinan='$status_perkawinan',pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan' WHERE nik='$id'";
    $query = mysqli_query($conn,$update);
    if($query){
        ?>
        <script>alert('Data Berhasil Diupdate!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT * FROM penduduk WHERE nik = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data penduduk - Admin</title>
</head>
<body>
    <h1>Update Data penduduk</h1>
    <a href="index.php">Kembali</a>
    <?php
    if($data['nik'] != "") {
    ?>
    <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
        <input type="hidden" name="nik" value="<?= $data['nik'] ?>">
        <table border='0'>
            <tr>
            <td>Nama penduduk</td>
            <td>:</td>
            <td>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>">
            </td>
        </tr>
        <tr>
            <td>No HP</td>
            <td>:</td>
            <td>
            <input type="text" name="noh" value="<?php echo $data['nohp']; ?>">
            </td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td>
            <input type="text" name="tempatlahir" <?php echo $data['tempat_lahir']; ?>>
            </td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>
            <input type="text" name="tgllahir" <?php echo $data['tanggal_lahir']; ?>>
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
            <textarea name="alamat" id="alamat" cols="30" rows="10"><?php echo $data['alamat']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
            <input type="text" name="agama" value="<?php echo $data['agama']; ?>">
            </td>
        </tr>
        <tr>
            <td>Gol Darah</td>
            <td>:</td>
            <td>
            <input type="text" name="goldar" <?php echo $data['gol_darah']; ?>>
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
            <select name='penggunaID'>
                    <?php
                    $s = "SELECT * FROM penduduk";
                    $q = mysqli_query($conn, $s);
                    while($row = mysqli_fetch_array($q)){
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
    <?php
    } else {
        echo "Data tidak ditemukan!";
    }
    ?>
</body>
</html>