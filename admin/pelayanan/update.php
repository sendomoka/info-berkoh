<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
$penggunaID = $_POST['penggunaID'];
$nama_pelayanan = $_POST['nama_pelayanan'];
$deskripsi = $_POST['deskripsi'];
$update = $_POST['update'];

if(isset($update)){
    $update="UPDATE pelayanan SET penggunaID='$penggunaID',nama_pelayanan='$nama_pelayanan',deskripsi='$deskripsi' WHERE pelayananID='$id'";
    $query = mysqli_query($conn,$update);
    if($query){
        ?>
        <script>alert('Data Berhasil Diupdate!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT * FROM pelayanan INNER JOIN pengguna ON pelayanan.penggunaID = pengguna.penggunaID WHERE pelayanan.pelayananID = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pelayanan - Admin</title>
</head>
<body>
    <h1>Update Data Pelayanan</h1>
    <a href="index.php">Kembali</a>
    <?php
    if($data['pelayananID'] != "") {
    ?>
    <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
        <input type="hidden" name="pelayananID" value="<?= $data['pelayananID'] ?>">
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
                <td>Nama Pelayanan</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_pelayanan" value="<?php echo $data['nama_pelayanan']; ?>">
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"><?php echo $data['deskripsi']; ?></textarea>
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
</body>
</html>