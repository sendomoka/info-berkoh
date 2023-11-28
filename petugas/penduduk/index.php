<?php
session_start();
include '../../config/models.php';

$sql = "SELECT * FROM penduduk ORDER BY nama ASC";
$query = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penduduk - Petugas</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
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
        td {
            font-size: 12px;
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
                <th>Jenis Kelamin</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Agama</th>
                <th>Status Perkawinan</th>
                <th>Status Kerja</th>
                <th>Status Hidup</th>
                <th>Dibuat</th>
            </tr>
            <?php
            $no=1;
            while($row=mysqli_fetch_array($query)){
                echo "
                <tr>
                    <td>$no</td>
                    <td>$row[nik]</td>
                    <td>$row[nama]</td>
                    <td>$row[jenis_kelamin]</td>
                    <td>$row[tempat_lahir],<br>$row[tanggal_lahir]</td>
                    <td>$row[alamat]</td>
                    <td>$row[agama]</td>
                    <td>
                        $row[status_perkawinan]
                        "; 
                        if($row['status_perkawinan'] == "Kawin"){
                            echo "sebagai <i>$row[status_keluarga]</i>";
                        }
                        echo "
                    </td>
                    <td>$row[status_kerja]</td>
                    <td>$row[status_hidup]</td>
                    <td>$row[createdat]</td>
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