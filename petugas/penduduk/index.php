<?php
session_start();
include '../../config/models.php';

$sql = "SELECT * FROM penduduk ORDER BY nik ASC";
$query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penduduk - Petugas</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_index.css">
    <link rel="stylesheet" href="../../css/admin_header.css">
    <style>
        .buttons {
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }
        .import {
            cursor: pointer;
            background: #98D4B3;
            font-weight: 600;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            margin: 1rem 0;
            width: fit-content;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .import:hover {
            background: #7AC7A4;
        }
        table {
            margin-bottom: 3rem;
        }
    </style>
</head>
<body>
    <?php include '../../components/petugas/sidenav.php' ?>
    <main>
    <?php include '../../components/petugas/header.php' ?>
        <div class="table-wrapper">
        <table border="1">
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Penduduk</th>
                <th>No HP</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Golongan Darah</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Pekerjaan</th>
                <th>Kewarganegaraan</th>
            </tr>
            <?php
            $no=1;
            while($row=mysqli_fetch_array($query)){
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[nik]</td>
                    <td>$row[nama]</td>
                    <td>$row[nohp]</td>
                    <td>$row[tempat_lahir]</td>
                    <td>$row[tanggal_lahir]</td>
                    <td>$row[alamat]</td>
                    <td>$row[agama]</td>
                    <td>$row[gol_darah]</td>
                    <td>$row[jenis_kelamin]</td>
                    <td>$row[status_perkawinan]</td>
                    <td>$row[pekerjaan]</td>
                    <td>$row[kewarganegaraan]</td>
                </tr>
                ";
                $no++;
            }
            ?>
        </table>
        <?php include '../../components/admin/footer.php' ?>
        </div>
    </main>
</body>
</html>