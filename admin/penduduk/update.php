<?php
session_start();
include '../../config/models.php';
$nikupd = $_GET['nik'];
if(isset($_POST['update'])){
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
    $update_query="UPDATE penduduk SET nama='$nama',nohp='$nohp', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat',agama='$agama', gol_darah='$gol_darah', jenis_kelamin='$jenis_kelamin',status_perkawinan='$status_perkawinan',pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan' WHERE nik='$nikupd'";
    $query = mysqli_query($conn,$update_query);
    if($query){
        ?>
        <script>alert('Data Berhasil Diupdate!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT * FROM penduduk WHERE nik = '$nikupd'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data penduduk - Admin</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
<?php include '../../components/admin/sidenav.php' ?>
<main>
    <h1>Update Data penduduk</h1>
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
            <input type="text" name="nohp" value="<?php echo $data['nohp']; ?>">
            </td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td>
            <input type="text" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" >
            </td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>
            <input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>">
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
            <textarea name="alamat" id="alamat" cols="20" rows="5"><?php echo $data['alamat']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td>
            <select name='agama'>
                <?php
                $s = "SELECT DISTINCT agama FROM penduduk";
                $q = mysqli_query($conn, $s);
                $list = ['ISLAM', 'KRISTEN', 'KATOLIK', 'HINDU', 'BUDHA', 'KONGHUCHU'];
                foreach ($list as $agama) {
                    $selected = ($agama == $data['agama']) ? "selected" : "";
                    echo "<option value='$agama' $selected>$agama</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Gol Darah</td>
            <td>:</td>
            <td>
            <select name='gol_darah'>
                <?php
                $s = "SELECT DISTINCT gol_darah FROM penduduk";
                $q = mysqli_query($conn, $s);
                $list = ['A', 'B', 'AB', 'O', '-'];
                foreach ($list as $gol_darah) {
                    $selected = ($gol_darah == $data['gol_darah']) ? "selected" : "";
                    echo "<option value='$gol_darah' $selected>$gol_darah</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>
            <select name='jenis_kelamin'>
                <?php
                $s = "SELECT DISTINCT jenis_kelamin FROM penduduk";
                $q = mysqli_query($conn, $s);
                $list = ['LAKI-LAKI', 'PEREMPUAN'];
                foreach ($list as $jenis_kelamin) {
                    $selected = ($jenis_kelamin == $data['jenis_kelamin']) ? "selected" : "";
                    echo "<option value='$jenis_kelamin' $selected>$jenis_kelamin</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>
            <select name='status_perkawinan'>
                <?php
                $s = "SELECT DISTINCT status_perkawinan FROM penduduk";
                $q = mysqli_query($conn, $s);
                $list = ['KAWIN', 'BELUM KAWIN'];
                foreach ($list as $status_perkawinan) {
                    $selected = ($status_perkawinan == $data['status_perkawinan']) ? "selected" : "";
                    echo "<option value='$status_perkawinan' $selected>$status_perkawinan</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>
            <input type="text" name="pekerjaan" value="<?php echo $data['pekerjaan']; ?>">
            </td>
        </tr>
        <tr>
            <td>Kewarganegaraan</td>
            <td>:</td>
            <td>
            <select name='kewarganegaraan'>
                <?php
                $s = "SELECT DISTINCT kewarganegaraan FROM penduduk";
                $q = mysqli_query($conn, $s);
                $list = ['WNI', 'WNA'];
                foreach ($list as $kewarganegaraan) {
                    $selected = ($kewarganegaraan == $data['kewarganegaraan']) ? "selected" : "";
                    echo "<option value='$kewarganegaraan' $selected>$kewarganegaraan</option>";
                }
                ?>
            </select>
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
    <?php
    } else {
        echo "Data tidak ditemukan!";
    }
    ?>
</main>
</body>
</html>