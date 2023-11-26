<?php
session_start();
include '../../config/models.php';
$nikupd = $_GET['nik'];
if(isset($_POST['update'])){
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    $agama = $_POST['agama'];
    $status_perkawinan = $_POST['status_perkawinan'];
    $status_keluarga = $_POST['status_keluarga'];
    $status_kerja = $_POST['status_kerja'];
    $status_hidup = $_POST['status_hidup'];
    $update_query = "UPDATE penduduk SET nik='$nik',nama='$nama',jenis_kelamin='$jenis_kelamin',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',alamat='RT $rt RW $rw',agama='$agama',status_perkawinan='$status_perkawinan',status_keluarga='$status_keluarga',status_kerja='$status_kerja',status_hidup='$status_hidup' WHERE nik='$nikupd'";
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
    <title>Update Data Penduduk - Admin</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
<?php include '../../components/admin/sidenav.php' ?>
<main>
    <h1>Update Data Penduduk</h1>
    <?php
    if($data['nik'] != "") {
    ?>
    <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
        <input type="hidden" name="nik" value="<?= $data['nik'] ?>">
        <table border='0'>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>">
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
                $list = ['Laki-Laki', 'Perempuan'];
                foreach ($list as $jenis_kelamin) {
                    $selected = ($jenis_kelamin == $data['jenis_kelamin']) ? "selected" : "";
                    echo "<option value='$jenis_kelamin' $selected>$jenis_kelamin</option>";
                }
                ?>
            </select>
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
                <?php
                $alamat_parts = explode(' ', $data['alamat']);
                $rt = $alamat_parts[1]; // Mendapatkan nilai RT
                $rw = $alamat_parts[3]; // Mendapatkan nilai RW
                ?>
                RT
                <input type="text" name="rt" style="width: 35px" maxlength="3" value="<?php echo $rt ?>">
                RW
                <input type="text" name="rw" style="width: 35px" maxlength="3" value="<?php echo $rw ?>">
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
                $list = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghuchu'];
                foreach ($list as $agama) {
                    $selected = ($agama == $data['agama']) ? "selected" : "";
                    echo "<option value='$agama' $selected>$agama</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Status Perkawinan</td>
            <td>:</td>
            <td>
            <select name='status_perkawinan' id="status_perkawinan">
                <?php
                $s = "SELECT DISTINCT status_perkawinan FROM penduduk";
                $q = mysqli_query($conn, $s);
                $list = ['Belum Kawin', 'Kawin'];
                foreach ($list as $status_perkawinan) {
                    $selected = ($status_perkawinan == $data['status_perkawinan']) ? "selected" : "";
                    echo "<option value='$status_perkawinan' $selected>$status_perkawinan</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr id="statusKeluargaRow">
            <td>Status Keluarga</td>
            <td>:</td>
            <td>
            <select name='status_keluarga' id="status_keluarga">
                <?php
                $s = "SELECT DISTINCT status_keluarga FROM penduduk";
                $q = mysqli_query($conn, $s);
                $list = ['Kepala Keluarga', 'Anggota Keluarga'];
                foreach ($list as $status_keluarga) {
                    $selected = ($status_keluarga == $data['status_keluarga']) ? "selected" : "";
                    echo "<option value='$status_keluarga' $selected>$status_keluarga</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Status Kerja</td>
            <td>:</td>
            <td>
            <select name='status_kerja' id="status_kerja">
                <?php
                $s = "SELECT DISTINCT status_kerja FROM penduduk";
                $q = mysqli_query($conn, $s);
                $list = ['Bekerja', 'Belum/Tidak Bekerja', 'Pelajar/Mahasiswa'];
                foreach ($list as $status_kerja) {
                    $selected = ($status_kerja == $data['status_kerja']) ? "selected" : "";
                    echo "<option value='$status_kerja' $selected>$status_kerja</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Status Hidup</td>
            <td>:</td>
            <td>
            <select name='status_hidup'>
                <?php
                $s = "SELECT DISTINCT status_hidup FROM penduduk";
                $q = mysqli_query($conn, $s);
                $list = ['Hidup', 'Wafat'];
                foreach ($list as $status_hidup) {
                    $selected = ($status_hidup == $data['status_hidup']) ? "selected" : "";
                    echo "<option value='$status_hidup' $selected>$status_hidup</option>";
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
            <input type='submit' name='update' class="insert" value='Update Data'>
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
<?php include '../../components/admin/footer.php' ?>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil elemen status_perkawinan dan status_keluarga
        var statusPerkawinan = document.getElementById("status_perkawinan");
        var statusKeluargaRow = document.getElementById("statusKeluargaRow");
        var statusKeluarga = document.getElementById("status_keluarga");

        // Atur event listener untuk perubahan pada status_perkawinan
        statusPerkawinan.addEventListener("change", function () {
            // Jika status_perkawinan adalah "Kawin", tampilkan status_keluarga
            if (statusPerkawinan.value === "Kawin") {
                statusKeluargaRow.style.display = "table-row";
                // Set nilai default atau pertahankan nilai sebelumnya jika ada
                statusKeluarga.value = statusKeluarga.value || "Kepala Keluarga";
            } else {
                // Jika status_perkawinan adalah "Belum Kawin", sembunyikan status_keluarga
                statusKeluargaRow.style.display = "none";
                // Set nilai status_keluarga menjadi null
                statusKeluarga.value = null;
            }
        });

        // Inisialisasi untuk menentukan tampilan awal
        statusPerkawinan.dispatchEvent(new Event("change"));
    });
</script>
</body>
</html>