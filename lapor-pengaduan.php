<?php
include 'config/models.php';

$nik_or_nama = $_POST['nik'];
$pesan = $_POST['pesan'];
$insert = $_POST['insert'];

if(isset($insert)){
    // Pengecekan apakah input adalah NIK atau nama
    $query_check = "SELECT * FROM penduduk WHERE nik = '$nik_or_nama' OR nama = '$nik_or_nama'";
    $result_check = mysqli_query($conn, $query_check);
    if (mysqli_num_rows($result_check) > 0) {
        // Input valid, dapatkan NIK jika input adalah nama
        $row = mysqli_fetch_assoc($result_check);
        $nik = $row['nik'];
        $pesanmedia = $_POST['pesan'];
        preg_match_all('/<img[^>]+>/i', $pesan, $matches);
        $folderPath = 'assets/images/pengaduan/';
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
                $pesan = str_replace($imgSrc, 'assets/images/pengaduan/' . $imgName, $pesan);
            }
        }
        $insert_query="INSERT INTO pengaduan (nik,pesan) VALUES ('$nik','$pesan') ";
        $query = mysqli_query($conn,$insert_query);
        if($query){
            ?>
            <script>alert('Laporan Anda sudah dikirim! Jangan lupa cek WhatsApp karena staff akan menghubungi Anda!'); document.location='lapor-pengaduan.php';</script>
            <?php
        }
    } else {
        ?>
        <script>alert('NIK atau nama tidak ditemukan!'); document.location='lapor-pengaduan.php';</script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan - @infoberkoh</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        main {
            padding: 5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }
        .form {
            width: 100%;
            max-width: 600px;
            padding: 1rem;
            background-color: #fff;
            border-radius: 1rem;
            box-shadow: 0 0 1rem rgba(0, 0, 0, .1);
            
        }
        .form .input {
            display: flex;
            flex-direction: column;
        }
        .form .input label {
            font-weight: 600;
            margin-bottom: .5rem;
        }
        .form .input input, .form .input select {
            padding: .5rem;
            border: 1px solid #3E5670;
            border-radius: .5rem;
            margin-bottom: 1rem;
        }
        .form .input input[type="submit"] {
            padding: .5rem;
            border: none;
            border-radius: .5rem;
            background-color: #3E5670;
            color: #fff;
            cursor: pointer;
            margin-top: 1rem;
        }
        .form .input input[type="submit"]:hover {
            background-color: #577B9D;
        }
        .ql-container.ql-snow {
            border: 1px solid #3E5670;
            border-radius: .5rem;
        }
        .ql-editor {
            min-height: 130px;

        }
        /* kontak */
        #kontak {
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: start;
            padding: 3rem;
            height: fit-content;
            background: #336248;
            color: white;
        }
        #kontak .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;
        }
        #kontak .left img {
            margin-bottom: 1rem;
        }
        #kontak .middle {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        #kontak .middle .call {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        #kontak .right .sosmed {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 1rem;
        }
        #kontak .right .sosmed a:hover {
            background-color: rgba(0, 0, 0, 0.25);
        }
    </style>
</head>
<body>
    <?php include 'components/header.php'; ?>
    <main>
        <h1>Lapor Pengaduan</h1>
        <p>Lapor apabila ada masalah yang terjadi di sekitar anda, kami akan membantu anda untuk menyelesaikan masalah tersebut.</p>
        <div class="form">
            <form name="formulir" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="input">
                <label for="nik">NIK atau Nama Lengkap</label>
                <input type="text" name="nik">
                <!-- <select name="nik" id="nik">
                    <?php
                    // $s = "SELECT * FROM penduduk";
                    // $q = mysqli_query($conn, $s);
                    // while ($row = mysqli_fetch_array($q)) {
                    //     echo "<option value='$row[nik]'>$row[nik] - $row[nama]</option>";
                    // }
                    ?>
                </select> -->
            </div>
            <div class="input">
                <label for="pesan">Pesan dan Media</label>
                <div id="editor-insert"></div>
                <input type="hidden" name="pesan" id="pesan">
            </div>
            <div class="input">
                <input type="submit" name="insert" value="Submit">
            </div>
            </form>
        </div>
        
    </main>
    <section id="kontak">
            <div class="grid">
                <div class="left">
                    <img src="assets/images/logowhite.svg" height="50px">
                    <p>Website Resmi Pemerintah Desa Berkoh, Kecamatan Purwokerto Selatan, Kabupaten Banyumas</p>
                </div>
                <div class="middle">
                    <h3>Hubungi Kami</h3>
                    <p>Jl. Gerilya Timur No.26, Sokabaru, Berkoh, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53146</p>
                    <div class="call">
                        <img src="assets/images/telp.svg" height="24px">
                        <p>Telepon/Fax: 0281633014</p>
                    </div>
                    <div class="call">
                        <img src="assets/images/email.svg" height="24px">
                        <p>Email: berkoh.banyumas@gmail.com</p>
                    </div>
                </div>
                <div class="right">
                    <h3>Ikuti Kami</h3>
                    <div class="sosmed">
                        <a href=""><img src="assets/images/insta.svg"></a>
                        <a href=""><img src="assets/images/twit.svg"></a>
                        <a href=""><img src="assets/images/fb.svg"></a>
                        <a href=""><img src="assets/images/linked.svg"></a>
                    </div>
                </div>
            </div>
        </section>
    <?php include 'components/footer.php'; ?>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quillInsert = new Quill('#editor-insert', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'color': [] }, { 'background': [] }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });
        document.forms['formulir'].addEventListener('submit', function(){
            var quillHtml = quillInsert.root.innerHTML.trim();
            document.getElementById('pesan').value = quillHtml;
        });
    </script>
</body>
</html>
