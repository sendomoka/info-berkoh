<?php
error_reporting(E_ALL ^ E_NOTICE and E_DEPRECATED);
$conn = mysqli_connect("localhost", "root", "", "info_berkoh");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM manajemen_akun WHERE username='$username' AND password='$password'";
    $query = mysqli_query($conn, $sql);
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $cekRole = mysqli_fetch_assoc($query);
        if ($cekRole['role'] == 'admin') {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'admin';
            header("location: ../admin");
        } else if ($cekRole['role'] == 'petugas') {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'petugas';
            header("location: ../petugas");
        }
    } else {
        echo "<script>alert('Username atau password salah!')</script>";
    }
}


?>