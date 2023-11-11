<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];

if(isset($_POST['update'])){
    $NIK = $_POST['NIK'];
    $pesan = $_POST['pesan'];

    if(isset($_FILES['media'])){
        $media_name = $_FILES['media']['name'];
        $media_tmp = $_FILES['media']['tmp_name'];
        $media_destination = "upload/" . $media_name;

        if(move_uploaded_file($media_tmp, $media_destination)){
            $update_query = "UPDATE pengaduan SET NIK='$NIK', pesan='$pesan', media='$media_name' WHERE pengaduanID='$id'";
            $query = mysqli_query($conn, $update_query);

            if($query){
                echo '<script>alert("Data Berhasil Diupdate!"); document.location="index.php";</script>';
            } else {
                echo '<script>alert("Gagal mengupdate data!");</script>';
            }
        } else {
            echo '<script>alert("Gagal mengunggah file media!");</script>';
        }
    }
}

$sql = "SELECT * FROM pengaduan WHERE pengaduanID = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pengaduan - Admin</title>
</head>
<body>
    <h1>Update Data Pengaduan</h1>
    <a href="index.php">Kembali</a>
    <?php
    if($data['pengaduanID'] != "") {
    ?>
    <form name='formulir' method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
        <input type="hidden" name="pengaduanID" value="<?= $data['pengaduanID'] ?>">
        <table border='0'>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>
                <select name='nik'>
     <?php
     $s = "SELECT * FROM penduduk";
     $q = mysqli_query($conn, $s);
     while($row = mysqli_fetch_array($q)){
         if ($row['nik'] == $data['nik']) {
             echo "<option value='$row[nik]' selected>$row[nik] - $row[nama]</option>";
         } else {
             echo "<option value='$row[nik]'>$row[nik] - $row[nama]</option>";
         }
     }
     ?>
 </select>

                </td>
            </tr>
            <tr>
                <td>Pesan</td>
                <td>:</td>
                <td>
                    <textarea name="pesan" id="pesan" cols="30" rows="10"><?= $data['pesan'] ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Media</td>
                <td>:</td>
                <td>
                    <input type="text" name="media" value="<?= $data['media'] ?>">
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
