<?php
session_start();
include '../../config/models.php';

if (isset($_POST['insert'])) {
    $NIK = $_POST['NIK'];
    $pesan = $_POST['pesan'];

    // Convert the Quill editor content to HTML
    $html_pesan = $_POST['html_pesan'];

    if (isset($_FILES['media'])) {
        $media_name = $_FILES['media']['name'];
        $media_tmp = $_FILES['media']['tmp_name'];
        $media_destination = $media_name;

        if (move_uploaded_file($media_tmp, $media_destination)) {
            $insert_query = "INSERT INTO pengaduan (NIK, pesan, media) VALUES ('$NIK', '$html_pesan', '$media_name')";
            $query = mysqli_query($conn, $insert_query);

            if ($query) {
                echo '<script>alert("Data Berhasil Dimasukkan!"); document.location="index.php";</script>';
            } else {
                echo '<script>alert("Gagal memasukkan data!");</script>';
            }
        } else {
            echo '<script>alert("Gagal mengunggah file media!");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pengaduan - Admin</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
    <h1>Tambah Data Pengaduan</h1>
    <a href="index.php">Kembali</a>
    <form name='formulir' method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>' enctype="multipart/form-data">

    <table border='0'>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>
                <select name='nik'>
                    <?php
                    $s = "SELECT * FROM penduduk";
                    $q = mysqli_query($conn, $s);
                    while ($row = mysqli_fetch_array($q)) {
                        echo "<option value='$row[nik]'>$row[nik] - $row[nama]</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Pesan</td>
            <td>:</td>
            <td>
                <!-- Add Quill editor for Pesan -->
                <div id="editor" name="html_pesan"></div>
                <input type="hidden" name="pesan" id="pesan">
            </td>
        </tr>
        <tr>
            <td>Media</td>
            <td>:</td>
            <td>
                <input type="file" name="media">
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <input type='submit' name='insert' value='Insert Data'>
            </td>
        </tr>
    </table>
    </form>

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

        // Save Quill content to the hidden input field
        quill.on('text-change', function() {
            var html_content = quill.root.innerHTML;
            document.getElementById('pesan').value = html_content;
        });
    </script>
</body>
</html>
