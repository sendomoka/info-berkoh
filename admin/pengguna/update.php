<?php
session_start();
include '../../config/models.php';

$penggunaIDupd = $_GET['penggunaID'];

if(isset($_POST['update'])){
    $penggunaID = $_POST['penggunaID'];
    $username = $_POST['username'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $jabatan = $_POST['jabatan'];

    // Use prepared statement to prevent SQL injection
    $update_query = "UPDATE pengguna SET username=?, nama_pengguna=?, email=?, password=?, role=?, jabatan=? WHERE penggunaID=?";
    $stmt = mysqli_prepare($conn, $update_query);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssssi", $username, $nama_pengguna, $email, $password, $role, $jabatan, $penggunaIDupd);
    
    // Execute statement
    $query = mysqli_stmt_execute($stmt);

    if($query){
        ?>
        <script>alert('Data Berhasil Diupdate!'); document.location='index.php';</script>
        <?php
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

$sql = "SELECT * FROM pengguna WHERE penggunaID = '$penggunaIDupd'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data pengguna - Admin</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
<?php include '../../components/admin/sidenav.php' ?>
<main>
    <h1>Update Data pengguna</h1>
    <?php
    if($data['penggunaID'] != "") {
    ?>
    <form name='formulir' method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
        <input type="hidden" name="penggunaID" value="<?= $data['penggunaID'] ?>">
        <table border='0'>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td>
            <input type="text" name="username" value="<?php echo $data['username']; ?>">
            </td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>
            <input type="text" name="nama_pengguna" value="<?php echo $data['nama_pengguna']; ?>">
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>
            <input type="text" name="email" value="<?php echo $data['email']; ?>" >
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td>
            <input type="date" name="password" value="<?php echo $data['password']; ?>">
            </td>
        </tr>
        <tr>
            <td>Role</td>
            <td>:</td>
            <td>
            <input type="text" name="role" value="<?php echo $data['role']; ?>">
            </td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>
            <input type="text" name="jabatan" value="<?php echo $data['jabatan']; ?>">
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
