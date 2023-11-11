<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
$penggunaID = $_POST['penggunaID'];
$isi = $_POST['isi'];
$tanggal_dikirim = $_POST['tanggal_dikirim'];
$update = $_POST['update'];

if(isset($update)){
    $isi = mysqli_real_escape_string($conn, $isi);
    $update="UPDATE berita SET penggunaID='$penggunaID',isi='',tanggal_dikirim='$tanggal_dikirim' WHERE beritaID='$id'";
    $query = mysqli_query($conn,$update);
	if($query){
		?>
		<script>alert('Data Berhasil Dimasukkan!'); document.location='index.php';</script>
		<?php
	}
}

$sql = "SELECT * FROM berita INNER JOIN pengguna ON berita.penggunaID = pengguna.penggunaID WHERE berita.beritaID = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Berita - Admin</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
    <h1>Edit Data Berita</h1>
    <?php
    if($data['beritaID'] != "") {
    ?>
    <form name='formulir' method='POST' 
action='<?php $_SERVER['PHP_SELF']; ?>'>
<input type="hidden" name="beritaID" value="<?= $data['beritaID'] ?>">
    <table border='0'>
        <tr>
            <td>Pengirim</td>
            <td>:</td>
            <td>
            <select name='penggunaID'>
                    <?php
                    $s = "SELECT * FROM pengguna";
                    $q = mysqli_query($conn, $s);
                    while($row = mysqli_fetch_array($q)){
                        if ($row['penggunaID'] == $data['penggunaID']) {
                            echo "<option value='$row[penggunaID]' selected>$row[penggunaID] - $row[nama_pengguna]</option>";
                        } else {
                            echo "<option value='$row[penggunaID]'>$row[penggunaID] - $row[nama_pengguna]</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Isi</td>
            <td>:</td>
            <td>
            <div id="editor" name="isi"><?= $data['isi'] ?></div>
            </td>
        </tr>
        <tr>
            <td>Tanggal Dikirim</td>
            <td>:</td>
            <td>
            <input type="date" name="tanggal_dikirim" value="<?= $data['tanggal_dikirim'] ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
            <input type='submit' name='update' value='Edit Data'>
            </td>
        </tr>
    </table>
    </form>
    <?php
    } else {
        echo "Data tidak ditemukan!";
    }
    ?>
    </main>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'font': []}, {'align': [] }],
                    ['bold', 'italic', 'underline', 'code-block'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'color': [] }, { 'background': [] }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });
    </script>
</body>
</html>