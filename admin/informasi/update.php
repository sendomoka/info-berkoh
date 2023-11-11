<?php
session_start();
include '../../config/models.php';
$informasiIDupd = $_GET['informasiID'];
if(isset($_POST['update'])){
    $informasiID = $_POST['informasiID'];
    $nama = $_POST['nama'];
    $konten = $_POST['konten'];
    $update = $_POST['update'];
    $update_query="UPDATE informasi SET nama='$nama',konten='$konten' WHERE informasiID='$informasiIDupd'";
    $query = mysqli_query($conn,$update_query);
    if ($foto != '') {
        $upload = 'images/' . $foto;
        move_uploaded_file($_FILES["foto"]["tmp_name"], $upload);
        $update = "update informasi set informasiID = '$informasiID', nama = '$nama', konten='$konten', foto='$upload' where informasiID='$informasiIDupd'";
    } else {
        $update = "update informasi set informasiID = '$informasiID', nama = '$nama', konten='$konten', where informasiID='$informasiIDupd'";
    }
    if($query){
        ?>
        <script>alert('Data Berhasil Diupdate!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT * FROM informasi WHERE informasiID = '$informasiIDupd'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Informasi - Admin</title>
</head>
<body>
    <h1>Update Data informasi</h1>
    <a href="index.php">Kembali</a>
    <?php
    if($data['informasiID'] != "") {
    ?>
    <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
        <input type="hidden" name="informasiID" value="<?= $data['informasiID'] ?>">
        <table border='0'>
        <tr>
            <td>Nama informasi</td>
            <td>:</td>
            <td>
            <input type="text" name="nama" value="<?php echo $data['nama']; ?>">
            </td>
        </tr>
        <tr>
            <td>Konten</td>
            <td>:</td>
            <td>
            <textarea name="konten" id="konten" cols="30" rows="10"><?php echo $data['konten']; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Upload Foto</td>
                <td>
                    <img src="<?php echo $row['foto']; ?>" width="100" height="100"> <br>
                    <input type="file" name="foto" accept=".png, .jpg">
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