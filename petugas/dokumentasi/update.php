<?php
session_start();
include '../../config/models.php';
$idupd = $_GET['id'];
if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $media = $_FILES['media'];
    $media_name = $media['name'];
    $media_tmp = $media['tmp_name'];
    $media_name = time() . '_' . $media_name;
    $destination = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/dokumentasi/' . $media_name;
    if (move_uploaded_file($media_tmp, $destination)) {
        $media_name = $media_name;
    } else {
        $media_name = $data['media'];
    }
    $update = $_POST['update'];
    $update_query = "UPDATE dokumentasi SET nama = '$nama', media = '$media_name' WHERE dokumentasiID = '$idupd'";
    $query = mysqli_query($conn, $update_query);
    if($query){
        ?>
        <script>alert('Data Berhasil Diupdate!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT * FROM dokumentasi WHERE dokumentasiID = '$idupd'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Dokumentasi - Petugas</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/petugas/sidenav.php' ?>
    <main>
        <h1>Update Dokumentasi</h1>
        <?php
        if($data['dokumentasiID'] != "") {
        ?>
        <form method='POST' action='<?php $_SERVER['PHP_SELF']; ?>' enctype="multipart/form-data">
            <input type="hidden" name="dokumentasiID" value="<?php echo $data['dokumentasiID']; ?>">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>" required></td>
                </tr>
                <tr>
                    <td>Media</td>
                    <td>:</td>
                    <td style="display: inline-flex; align-items: center; gap: 10px;">
                        <input type="file" name="media" accept="image/png, image/gif, image/jpeg">
                        <img src="<?php echo '/assets/images/dokumentasi/' . $data['media']; ?>" width="50">
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
    <?php include '../../components/admin/footer.php' ?>
</body>
</html>