<?php
session_start();
include '../../config/models.php';
$id = $_GET['id'];

if (isset($_POST['update'])) {
    $update="UPDATE pelayanan SET penggunaID='$penggunaID',nama_pelayanan='$nama_pelayanan',deskripsi='$deskripsi' WHERE pelayananID='$id'";
    $query = mysqli_query($conn,$update);
    if($query){
        ?>
        <script>alert('Data Berhasil Diupdate!'); document.location='index.php';</script>
        <?php
    }
    header("Location: index.php");
    exit();
}

$sql = "SELECT * FROM pengguna WHERE penggunaID = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pengguna - Admin</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <?php include '../components/sidenav.php' ?>
    <main>
        <h1>Update Data Pengguna</h1>
        <a href="index.php">Kembali</a>
        <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF'] . "?id=$id"; ?>'>
        <input type="hidden" name="penggunaID" value="<?= $data['penggunaID'] ?>">
        <table border='0'>
            <tr>
                <td>ID Pengguna</td>
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
                <td>Username</td>
                <td>:</td>
                <td>
                <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                <input type="text" name="nama">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                <input type="password" name="pass">
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>:</td>
                <td>
                <input type="text" name="role">
                </td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td>
                <input type="text" name="jabatan">
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
    </main>
</body>
</html>
