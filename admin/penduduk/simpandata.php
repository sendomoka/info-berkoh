<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "nama_database");

// Mengecek koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Mengambil data dari formulir
$NIK = $_POST['NIK'];
$Nama = $_POST['Nama'];
$Tempat_Lahir = $_POST['Tempat_Lahir'];
$Tanggal_Lahir = $_POST['Tanggal_Lahir'];

// Menyimpan data ke database
$query = "INSERT INTO data_penduduk (NIK, Nama, Tempat_Lahir, Tanggal_Lahir) VALUES ('$NIK', '$Nama', '$Tempat_Lahir', '$Tanggal_Lahir')";
if (mysqli_query($koneksi, $query)) {
    echo "Data penduduk berhasil disimpan.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
