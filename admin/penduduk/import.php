<?php
session_start();
include '../../config/models.php';

if (isset($_POST['import'])) {
    $csvMimes = array('text/x-comma-separated-values',
        'text/comma-separated-values',
        'application/octet-stream',
        'text/csv','application/csv','application/excel','application/vnd.ms-excel','text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        if(is_uploaded_file($_FILES['file']['tmp_name'])) {
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            fgetcsv($csvFile);
            while (($line = fgetcsv($csvFile)) !== FALSE) {
                $nik = $line[0];
                $nama = $line[1];
                $jenis_kelamin = $line[2];
                $tempat_lahir = $line[3];
                $tanggal_lahir = $line[4];
                $alamat = $line[5];
                $agama = $line[6];
                $status_perkawinan = $line[7];
                $status_keluarga = $line[8];
                $status_kerja = $line[9];
                $status_hidup = $line[10];
                $createdat = $line[11];
                $prevQuery = "SELECT nik FROM penduduk WHERE nik = '".$line[0]."'";
                $prevResult = $conn->query($prevQuery);
                if($prevResult->num_rows > 0){
                    $update = "UPDATE penduduk SET nama='$nama',jenis_kelamin='$jenis_kelamin',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',alamat='$alamat',agama='$agama',status_perkawinan='$status_perkawinan',status_keluarga='$status_keluarga',status_kerja='$status_kerja',status_hidup='$status_hidup',createdat='$createdat' WHERE nik = '$nik'";
                    $conn->query($update);
                } else {
                    $insert = "INSERT INTO penduduk (nik,nama,jenis_kelamin,tempat_lahir,tanggal_lahir,alamat,agama,status_perkawinan,status_keluarga,status_kerja,status_hidup,createdat) VALUES ('$nik','$nama','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$alamat','$agama','$status_perkawinan','$status_keluarga','$status_kerja','$status_hidup','$createdat')";
                    $conn->query($insert);
                }
            }
            fclose($csvFile);
            echo "<script>alert('Data Berhasil Diimport!'); document.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal Mengupload File!'); document.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('File Harus Berupa CSV!'); document.location='index.php';</script>";
    }
}
?>
