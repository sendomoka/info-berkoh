<?php
error_reporting(E_ALL ^ E_NOTICE and E_DEPRECATED);
$conn = mysqli_connect("localhost", "root", "", "info_berkoh");

function login($username, $password) {
    global $conn;
    $query = "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'";
    $findUser = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($findUser);
    $_SESSION['penggunaID'] = $user['penggunaID'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['nama_pengguna'] = $user['nama_pengguna'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['jabatan'] = $user['jabatan'];
    $_SESSION['avatar'] = $user['avatar'];
    if ($user['role'] == 'Admin') {
        header("Location: admin");
    } else if ($user['role'] == 'Petugas') {
        header("Location: petugas");
    } else {
        echo "<script>alert('Username atau password salah!')</script>";
    }
}
?>