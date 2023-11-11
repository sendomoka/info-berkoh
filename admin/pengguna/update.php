<?php
session_start();
include '../../config/models.php';
$id = $_GET['id'];

if (isset($_POST['update'])) {
    // Process the update logic here
    // ...

    // Redirect to index.php after updating
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
            <!-- Input fields for updating user data go here -->
            <input type='submit' name='update' value='Update Data'>
        </form>
    </main>
</body>
</html>
