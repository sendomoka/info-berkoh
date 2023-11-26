<!-- detail.php -->
<?php
include '../../config/models.php';

$id = $_GET['id'];
$sql = "SELECT judul, isi, tanggal_dikirim, nama_pengguna FROM berita 
        INNER JOIN pengguna ON berita.penggunaID = pengguna.penggunaID 
        WHERE beritaID = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Berita - Petugas</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <style>
        /* Gaya CSS untuk judul, pengirim, dan tanggal_dikirim */
        #judul {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .sub-berita {
            display: flex;
            gap: 10px;
        }

        #pengirim {
            color: #666;
            margin-bottom: 5px;
        }

        #tanggal {
            float: right;
            color: #666;
        }

        #isiContainer img {
            max-width: 300px;
            height: auto;
        }
    </style>
</head>
<body>
    <?php include '../../components/petugas/sidenav.php' ?>
    <main>
        <?php
        if ($data['isi'] != "") {
            // Menyesuaikan path gambar
            $isiContent = str_replace('src="assets/images/berita/', 'src="../../assets/images/berita/', $data['isi']);
            // Menambahkan gaya CSS untuk membatasi lebar gambar
            $isiContent = str_replace('<img ', '<img style="max-width: 300px;" ', $isiContent);
        ?>
        <h1 id="judul"><?= $data['judul'] ?></h1>
        <div class="sub-berita">
            <p id="pengirim">Pengirim: <?= $data['nama_pengguna'] ?></p>
            <p id="tanggal">Tanggal: <?= $data['tanggal_dikirim'] ?></p>
        </div>
        <div id='isiContainer'>
            <?= $isiContent ?>
        </div>
        <?php
        } else {
            echo "Data tidak ditemukan!";
        }
        ?>
    </main>
    <?php include '../../components/admin/footer.php' ?>
</body>
</html>
