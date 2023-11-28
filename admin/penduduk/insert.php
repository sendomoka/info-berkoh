<?php
session_start();
include '../../config/models.php';

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
$createdat = $_POST['createdat'];
$insert = $_POST['insert'];

if (isset($insert)) {
    $insert = "INSERT INTO penduduk (nik,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,agama,status_perkawinan,status_keluarga,status_kerja,status_hidup,createdat) VALUES ('$nik','$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','RT $rt RW $rw','$agama','$status_perkawinan','$status_keluarga','$status_kerja','$status_hidup','$createdat')";
    $query = mysqli_query($conn, $insert);
    if ($query) {
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
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>

<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
        <h1>Tambah Data Penduduk</h1>
        <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
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
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>
                        <select name="jenis_kelamin" id="jenis_kelamin">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
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
                        <input type="date" name="tanggal_lahir" value="2000-01-01">
                    </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>
                        RT
                        <input type="text" name="rt" style="width: 35px" maxlength="3">
                        RW
                        <input type="text" name="rw" style="width: 35px" maxlength="3">
                    </td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>
                        <select name="agama">
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghuchu">Konghuchu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Status Perkawinan</td>
                    <td>:</td>
                    <td>
                        <select name="status_perkawinan" id="status_perkawinan">
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                        </select>
                    </td>
                </tr>
                <tr id="statusKeluargaRow">
                    <td>Status Keluarga</td>
                    <td>:</td>
                    <td>
                        <select name="status_keluarga" id="status_keluarga">
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Anggota Keluarga">Anggota Keluarga</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Status Kerja</td>
                    <td>:</td>
                    <td>
                        <select name="status_kerja" id="status_kerja">
                            <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                            <option value="Bekerja">Bekerja</option>
                            <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Status Hidup</td>
                    <td>:</td>
                    <td>
                        <select name="status_hidup" id="status_hidup">
                            <option value="Hidup">Hidup</option>
                            <option value="Wafat">Wafat</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Dibuat</td>
                    <td>:</td>
                    <td>
                        <input type="text" name="createdat" value="<?php echo date("Y-m-d"); ?>" readonly>
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
