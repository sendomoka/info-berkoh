<?php
error_reporting(E_ALL ^ E_NOTICE and E_DEPRECATED);
$conn = mysqli_connect("localhost", "root", "", "info_berkoh");

function login($username, $password) {
    global $conn;
    $query = "SELECT * FROM pengguna WHERE username = '$username' AND password = '$password'";
    $findUser = mysqli_query($conn, $query);
    $find = mysqli_num_rows($findUser);
    if ($find > 0) {
        $getRole = mysqli_fetch_array($findUser);
        $role = $getRole['role'];
        if ($role == 'admin') {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header("Location: admin");
        } else if ($role == 'petugas') {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header("Location: petugas");
        } else {
            echo "<script>alert('Username atau password salah!')</script>";
        }
    }
}
?>