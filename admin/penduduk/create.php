<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Penduduk</title>
</head>
<body>
    <h1>Tambah Data Penduduk</h1>
    <form method="post" action="simpan_data.php">
        <label for="NIK">NIK:</label>
        <input type="text" name="NIK" id="NIK" required><br>
        <label for="Nama">Nama:</label>
        <input type="text" name="Nama" id="Nama" required><br>
        <label for="Tempat_Lahir">Tempat Lahir:</label>
        <input type="text" name="Tempat_Lahir" id="Tempat_Lahir"><br>
        <label for="Tanggal_Lahir">Tanggal Lahir:</label>
        <input type="date" name="Tanggal_Lahir" id="Tanggal_Lahir"><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
