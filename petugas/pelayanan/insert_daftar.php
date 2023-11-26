<?php
session_start();
include '../../config/models.php';

$pelayananID = $_POST['pelayananID'];
$tanggal = $_POST['tanggal'];
$status = $_POST['status'];
$insert = $_POST['insert'];

if(isset($insert)){
    $nik = implode(',', $_POST['nik']);
	$insert="insert into daftar_pelayanan(pelayananID,nik,tanggal,status) values('$pelayananID','$nik','$tanggal','$status') ";
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
    <title>Daftarkan Pelayanan - Petugas</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/petugas/sidenav.php' ?>
    <main>
        <h1>Daftarkan Pelayanan</h1>
        <form name='formulir' method='POST' 
    action='<?php $_SERVER['PHP_SELF']; ?>'>
        <table border='0'>
            <tr>
                <td>Pelayanan yang dibuka</td>
                <td>:</td>
                <td>
                <select name='pelayananID'>
                    <?php
                    $s = "SELECT * FROM pelayanan";
                    $q = mysqli_query($conn, $s);
                    while($row = mysqli_fetch_array($q)){
                        echo "<option value='$row[pelayananID]'>$row[nama_pelayanan]</option>";
                    }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Penduduk yang mengikuti</td>
                <td>:</td>
                <td id="penduduk-container">
                    <!-- Wadah (container) untuk elemen select -->
                    <div id="select-container">
                        <select name='nik[]'>
                            <?php
                            $s = "SELECT * FROM penduduk";
                            $q = mysqli_query($conn, $s);
                            while ($row = mysqli_fetch_array($q)) {
                                echo "<option value='$row[nik]'>$row[nik] - $row[nama]</option>";
                            }
                            ?>
                        </select>
                        <br>
                    </div>
                </td>
                <td>
                <button type="button" id="addPenduduk">+</button>
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>
                <input type="date" name="tanggal" id="tanggal">
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                <select name='status'>
                    <option value='Belum Dilaksanakan'>Belum Dilaksanakan</option>
                    <option value='Berlangsung'>Berlangsung</option>
                    <option value='Selesai'>Selesai</option>
                </select>
                </td>
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
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const addPendudukBtn = document.getElementById("addPenduduk");
        const pendudukContainer = document.getElementById("penduduk-container");
        const selectContainer = document.getElementById("select-container");

        addPendudukBtn.addEventListener("click", function () {
            const newSelect = document.createElement("select");
            newSelect.name = 'nik[]';

            <?php
            $s = "SELECT * FROM penduduk";
            $q = mysqli_query($conn, $s);
            while ($row = mysqli_fetch_array($q)) {
                echo "{
                    const option = document.createElement('option');
                    option.value = '$row[nik]';
                    option.text = '$row[nik] - $row[nama]';
                    newSelect.add(option);
                }";
            }
            ?>

            const newBr = document.createElement("br");

            selectContainer.appendChild(newSelect);
            selectContainer.appendChild(newBr);
        });
    });
</script>
    <?php include '../../components/admin/footer.php' ?>
</body>
</html>