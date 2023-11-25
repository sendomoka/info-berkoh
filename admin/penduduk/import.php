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
                $nohp = $line[2];
                $tempat_lahir = $line[3];
                $tanggal_lahir = $line[4];
                $alamat = $line[5];
                $agama = $line[6];
                $gol_darah = $line[7];
                $jenis_kelamin = $line[8];
                $status_perkawinan = $line[9];
                $pekerjaan = $line[10];
                $kewarganegaraan = $line[11];
                $prevQuery = "SELECT nik FROM penduduk WHERE nik = '".$line[0]."'";
                $prevResult = $conn->query($prevQuery);
                if($prevResult->num_rows > 0){
                    $update = "UPDATE penduduk SET nama='$nama', nohp='$nohp', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', agama='$agama', gol_darah='$gol_darah', jenis_kelamin='$jenis_kelamin', status_perkawinan='$status_perkawinan', pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan' WHERE nik='$nik'";
                    $conn->query($update);
                } else {
                    $insert = "INSERT INTO penduduk(nik,nama,nohp,tempat_lahir,tanggal_lahir,alamat,agama,gol_darah,jenis_kelamin,status_perkawinan,pekerjaan,kewarganegaraan) VALUES('$nik','$nama','$nohp', '$tempat_lahir','$tanggal_lahir','$alamat','$agama','$gol_darah','$jenis_kelamin','$status_perkawinan','$pekerjaan','$kewarganegaraan')";
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
