<?php
session_start();
include '../../config/models.php';

$id = $_GET['id'];
$penggunaID = $_POST['penggunaID'];
$nama_pelayanan = $_POST['nama_pelayanan'];
$deskripsi = $_POST['deskripsi'];
$update = $_POST['update'];

if(isset($update)){
    $deskmedia = $_POST['pesan'];
    preg_match_all('/<img[^>]+>/i', $deskripsi, $matches);
    $folderPath = '../../assets/images/pelayanan/';
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }
    foreach ($matches[0] as $imgTag) {
        preg_match('/src="([^"]+)"/i', $imgTag, $srcMatch);
        $imgSrc = $srcMatch[1];
        if (strpos($imgSrc, 'data:image') !== false) {
            preg_match('/data:image\/(.*?);/i', $imgSrc, $imageType);
            $imageExtension = $imageType[1];
            $imgName = uniqid('img_') . '.' . $imageExtension;
            $imgPath = $folderPath . $imgName;
            file_put_contents($imgPath, base64_decode(explode(',', $imgSrc)[1]));
            $deskripsi = str_replace($imgSrc, '../../assets/images/pelayanan/' . $imgName, $deskripsi);
        }
    }
    $update_query="UPDATE pelayanan p JOIN pengguna u ON u.penggunaID = p.penggunaID SET p.penggunaID = '$penggunaID',p.nama_pelayanan = '$nama_pelayanan', p.deskripsi = '$deskripsi' WHERE p.pelayananID = '$id'";
    $query = mysqli_query($conn,$update_query);
    if($query){
        ?>
        <script>alert('Data Berhasil Diupdate!'); document.location='index.php';</script>
        <?php
    }
}

$sql = "SELECT * FROM pelayanan INNER JOIN pengguna ON pelayanan.penggunaID = pengguna.penggunaID WHERE pelayanan.pelayananID = '$id'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pelayanan - Admin</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link rel="stylesheet" href="../../css/admin_data.css">
</head>
<body>
    <?php include '../../components/admin/sidenav.php' ?>
    <main>
    <h1>Edit Data Pelayanan</h1>
    <?php
    if($data['pelayananID'] != "") {
    ?>
    <form name='formulir' method='POST' action='<?php $_SERVER['PHP_SELF']; ?>'>
        <input type="hidden" name="pelayananID" value="<?= $data['pelayananID'] ?>">
        <table border='0'>
            <tr>
                <td>Penanggung Jawab</td>
                <td>:</td>
                <td>
                <select name='penggunaID'>
                    <?php
                    $s = "SELECT * FROM pengguna";
                    $q = mysqli_query($conn, $s);
                    while($row = mysqli_fetch_array($q)){
                        if ($row['penggunaID'] == $data['penggunaID']) {
                            echo "<option value='$row[penggunaID]' selected>$row[jabatan] - $row[nama_pengguna]</option>";
                        } else {
                            echo "<option value='$row[penggunaID]'>$row[jabatan] - $row[nama_pengguna]</option>";
                        }
                    }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>Nama Pelayanan</td>
                <td>:</td>
                <td>
                    <input type="text" name="nama_pelayanan" value="<?php echo $data['nama_pelayanan']; ?>">
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td>
                    <?php
                    if ($data['deskripsi'] != "") {
                        $deskmedia = str_replace('src="../../assets/images/pelayanan/', 'src="../../assets/images/pelayanan/', $data['deskripsi']);
                        $deskmediasize = str_replace('<img ', '<img style="max-width: 300px;" ', $deskmedia);
                    }
                    ?>
                    <div id="editor-update"><?= $deskmediasize ?></div>
                    <input type="hidden" name="deskripsi" id="deskripsi">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type='submit' name='update' value='Update Data'>
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
        var quillUpdate = new Quill('#editor-update', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'font': [] }, { 'align': [] }],
                    ['bold', 'italic', 'underline', 'code-block'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                    [{ 'script': 'sub' }, { 'script': 'super' }],
                    [{ 'indent': '-1' }, { 'indent': '+1' }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'color': [] }, { 'background': [] }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });
        document.forms['formulir'].addEventListener('submit', function () {
            var quillHtml = quillUpdate.root.innerHTML.trim();
            document.getElementById('deskripsi').value = quillHtml;
        });
    </script>
    <?php include '../../components/admin/footer.php' ?>
</body>
</html>