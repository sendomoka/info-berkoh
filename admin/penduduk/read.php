<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "username", "password", "nama_database");

// Mengecek koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Membaca data penduduk dari database
$query = "SELECT * FROM data_penduduk";
$result = mysqli_query($koneksi, $query);

// Menampilkan data penduduk dalam tabel HTML
echo "<table>";
echo "<tr><th>NIK</th><th>Nama</th><th>Tempat Lahir</th><th>Tanggal Lahir</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['NIK'] . "</td>";
    echo "<td>" . $row['Nama'] . "</td>";
    echo "<td>" . $row['Tempat_Lahir'] . "</td>";
    echo "<td>" . $row['Tanggal_Lahir'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Tutup koneksi ke database
mysqli_close($koneksi);
?>
