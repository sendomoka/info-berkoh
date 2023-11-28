<?php
include 'config/models.php';
// Fungsi untuk mengambil data dari tabel informasi berdasarkan nama
function getInformasi($nama) {
    global $conn;
    $query = "SELECT konten FROM informasi WHERE nama='$nama'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['konten'];
    } else {
        return "Error fetching data";
    }
}

// Mendapatkan data konten berdasarkan nama
$heroTitle = getInformasi('hero-title');
$heroDesc = getInformasi('hero-desc');

$queryPengaduan = "SELECT COUNT(*) as totalPengaduan FROM pengaduan";
$resultPengaduan = mysqli_query($conn, $queryPengaduan);
$rowPengaduan = mysqli_fetch_assoc($resultPengaduan);
$selectPengaduan = $rowPengaduan['totalPengaduan'];

$queryPelayanan = "SELECT COUNT(*) as totalPelayanan FROM pelayanan";
$resultPelayanan = mysqli_query($conn, $queryPelayanan);
$rowPelayanan = mysqli_fetch_assoc($resultPelayanan);
$selectPelayanan = $rowPelayanan['totalPelayanan'];

$queryBerita = "SELECT COUNT(*) as totalBerita FROM berita";
$resultBerita = mysqli_query($conn, $queryBerita);
$rowBerita = mysqli_fetch_assoc($resultBerita);
$selectBerita = $rowBerita['totalBerita'];

// Function to extract image URLs from HTML content
function getImageUrls($html) {
    $dom = new DOMDocument;
    libxml_use_internal_errors(true);
    $dom->loadHTML($html);
    libxml_clear_errors();

    $images = $dom->getElementsByTagName('img');
    $urls = [];

    foreach ($images as $image) {
        $urls[] = $image->getAttribute('src');
    }

    return $urls;
}

// Fungsi untuk membatasi teks berdasarkan jumlah kata
function limitTextByWords($text, $limit) {
    $words = str_word_count($text, 1); // Mendapatkan array kata-kata dari teks
    $limitedWords = array_slice($words, 0, $limit); // Mengambil sejumlah kata sesuai batas
    $limitedText = implode(' ', $limitedWords); // Menggabungkan kembali kata-kata menjadi teks
    return $limitedText;
}

// ...

// Function to extract text (without images) from HTML content and limit by words
function getTextWithoutImagesAndLimit($html, $limit) {
    $dom = new DOMDocument;
    libxml_use_internal_errors(true);
    $dom->loadHTML($html);
    libxml_clear_errors();

    $paragraphs = $dom->getElementsByTagName('p');
    $text = '';

    foreach ($paragraphs as $paragraph) {
        // Check if the paragraph contains any images
        $images = $paragraph->getElementsByTagName('img');
        if ($images->length === 0) {
            $text .= $dom->saveHTML($paragraph);
        }
    }

    // Limit the text by words
    $text = limitTextByWords(strip_tags($text), $limit);

    return $text;
}

// Query to get data from 'berita' table
$queryBerita = "SELECT * FROM berita LIMIT 3";
$resultBerita = mysqli_query($conn, $queryBerita);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@infoberkoh</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        #hero, #data, #keuntungan {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 5rem;
            height: 100vh;
            gap: 3rem;
        }
        #hero .left {
            width: 50%;
        }
        #hero .left h1, #data h1 {
            font-size: 2.3rem;
            font-weight: 700;
            line-height: 30px;
            margin-bottom: 1rem;
        }
        #hero .left p {
            font-size: 1rem;
            font-weight: 400;
            margin: 3rem 0;
            text-align: justify;
        }
        #hero .left a {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 1rem 2rem;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            border: 1px solid #46627e;
            border-radius: 10px;
            color: #46627e;
        }
        #hero .left a img {
            padding-top: 5px;
        }
        #hero .left a:hover {
            background-color: #c9d0d7;
        }
        #hero .right {
            width: 50%;
        }
        #hero .right img {
            width: 100%;
        }
        /* data */
        #data {
            height: fit-content;
            padding: 5rem;
            background: #3e5670;
            color: white;
            justify-content: center;
            gap: 8rem;
        }
        #data div {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* keuntungan */
        #keuntungan {
            flex-direction: column;
            justify-content: center;
            height: fit-content;
            padding: 5rem;
        }
        #keuntungan h1 {
            font-size: 2.3rem;
            font-weight: 700;
            line-height: 30px;
            margin-bottom: 1rem;
        }
        #keuntungan .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
        #keuntungan .item {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            border: 1px solid #c9d0d7;
            border-radius: 10px;
            padding: 1rem;
        }
        #keuntungan .item b {
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 30px;
        }
        #keuntungan .item p {
            font-size: 1rem;
            font-weight: 400;
            text-align: justify;
            margin-top: -10px;
        }
        /* solusi */
        #solusi {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5rem 8rem;
            height: fit-content;
            gap: 15rem;
            background: #3e5670;
            color: white;
        }
        #solusi .left {
            width: 50%;
        }
        #solusi .left h1 {
            font-size: 2.3rem;
            font-weight: 700;
            line-height: 50px;
            margin-bottom: 1rem;
        }
        #solusi .left p {
            font-size: 1rem;
            font-weight: 400;
            text-align: justify;
        }
        #solusi .right {
            width: 50%;
            color: black;
        }
        #solusi .right.grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 3rem;
        }
        #solusi .right .item {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            border: 1px solid #c9d0d7;
            border-radius: 10px;
            padding: 1rem;
            background: white;
            box-shadow: 10px 10px 4px 0px rgba(0, 0, 0, 0.25);
        }
        #solusi .right .item .title {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        #solusi .right .item .title img {
            width: 30px;
        }
        #solusi .right .item .title h3 {
            font-size: 1.2rem;
            font-weight: 700;
            line-height: 30px;
        }
        #solusi .right .item p {
            font-size: 1rem;
            font-weight: 400;
            text-align: center;
            margin-top: -10px;
        }
        /* kata */
        #kata {
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: start;
            padding: 3rem;
            height: fit-content;
        }
        #kata h1 {
            font-size: 2.3rem;
            font-weight: 700;
            line-height: 30px;
            margin-bottom: 1rem;
        }
        #kata .sub-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 3rem;
        }
        #kata .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 13rem;
        }
        #kata .item {
            display: flex;
            flex-direction: row;
            gap: 1rem;
        }
        #kata .item img {
            height: 140px;
        }
        #kata .item .text {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        #kata .item .text hr {
            border: 1px solid rgba(0, 0, 0, 0.25);
        }
        /* berita */
        #berita {
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: start;
            padding: 3rem;
            height: fit-content;
            background: #3e5670;
            color: white;
        }
        #berita h1 {
            font-size: 2.3rem;
            font-weight: 700;
            line-height: 30px;
            margin-bottom: 1rem;
        }
        #berita .sub-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 3rem;
        }
        #berita .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }
        #berita .item {
            display: flex;
            flex-direction: row;
            background: white;
            border-radius: 10px;
            padding: 1rem;
            height: fit-content;
            color: #3e5670;
            gap: 1rem;
        }
        #berita .item img {
            height: 140px;
        }
        #berita .item .text {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        #berita .item .text p {
            font-size: 11px;
            text-align: justify;
        }
        /* ucapan */
        #ucapan {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 5rem;
            height: fit-content;
            gap: 5rem;
        }
        #ucapan .left h1 {
            font-size: 2.3rem;
            font-weight: 700;
            line-height: 40px;
            margin-bottom: 1rem;
        }
        #ucapan .left a {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 1rem 4rem;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 600;
            border: 1px solid #46627e;
            border-radius: 10px;
            background: #46627e;
            color: white;
        }
        #ucapan .right img {
            margin-top: -100px;
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
        <section id="hero">
            <div class="left">
                <?= $heroTitle ?>
                <?= $heroDesc ?>
                <a href="">
                    Selengkapnya
                    <img src="assets/images/ep_right.svg">
                </a>
            </div>
            <div class="right">
                <img src="assets/images/hero-img.png">
            </div>
        </section>
        <section id="data">
            <div class="menikah">
                <h1><?= $selectPengaduan ?></h1>
                <p>Jumlah Lapor Pengaduan Warga</p>
            </div>
            <div class="wafat">
                <h1><?= $selectPelayanan ?></h1>
                <p>Jumlah Pelayanan yang Tersedia</p>
            </div>
            <div class="keluarga">
                <h1><?= $selectBerita ?></h1>
                <p>Jumlah Berita yang Diunggah</p>
            </div>
        </section>
        <section id="keuntungan">
            <h1>Keuntungan <span style="color: #008a00">Layanan</span></h1>
            <div class="grid">
                <div class="item">
                    <b>Akses Mudah ke Informasi</b>
                    <p>INFO BERKOH menyediakan akses mudah ke informasi umum terkait kelurahan, seperti sejarah, geografi, dan data demografis. Ini memungkinkan warga desa untuk lebih memahami lingkungan tempat tinggal mereka.</p>
                </div>
                <div class="item">
                    <b>Respons Cepat terhadap Pengaduan</b>
                    <p>INFO BERKOH memungkinkan admin untuk melihat, menangani, dan memantau pengaduan yang masuk dari pengunjung atau petugas. Ini memastikan pengaduan mendapatkan perhatian yang cepat dan sesuai.</p>
                </div>
                <div class="item">
                    <b>Pelayanan Publik yang Terintegrasi</b>
                    <p>INFO BERKOH mencakup tabel pelayanan publik yang menghubungkan penduduk dengan layanan seperti Posyandu, imunisasi, ibu PKK, petugas pemilu, Linmas, dan bansos. </p>
                </div>
                <div class="item">
                    <b>Manajemen Data Penduduk yang Efisien dan Publikasi Berita yang Aktual</b>
                    <p>Admin dapat dengan mudah mengelola data penduduk, termasuk pencarian, pembaruan, dan penghapusan data. Ini mendukung administrasi yang lebih efisien dan akurat.</p>
                </div>
            </div>
        </section>
        <section id="solusi">
            <div class="left">
                <h1>Solusi Unggulan untuk Desa Berkoh</h1>
                <p>Pemerintah Desa Berkoh berkomitmen sepenuhnya  untuk melayani dan memajukan masyarakat. Sebagai Desa yang  mandiri, Berkoh terus tumbuh dan berkembang bersama dengan  warganya.</p>
            </div>
            <div class="right grid">
                <div class="item">
                    <div class="title">
                        <img src="assets/images/profil.svg">
                        <h3>Profil</h3>
                    </div>
                    <p>Salah satu desa yang berada di Kecamatan Pagerbarang, Kabupaten Tegal, Provinsi Jawa Tengah, Indonesia</p>
                </div>
                <div class="item">
                    <div class="title">
                        <img src="assets/images/pembangunan.svg" style="width: 20px;">
                        <h3>Pembangunan</h3>
                    </div>
                    <p>Program Desa diawali dengan musyawarah Desa untuk membahas dan menyepakati program pembangunan, pemerintahan, dan pemberdayaan masyarakat.</p>
                </div>
                <div class="item">
                    <div class="title">
                        <img src="assets/images/layanan.svg">
                        <h3>Layanan</h3>
                    </div>
                    <p>Pemerintah Desa selalu berusaha memberikan layanan publik secara prima kepada masyarakat.</p>
                </div>
                <div class="item">
                    <div class="title">
                        <img src="assets/images/potensi.svg">
                        <h3>Potensi</h3>
                    </div>
                    <p>Potensi desa kami berfokus pada beberapa sumber daya seperti alam, manusia, sosial, dan ekonomi</p>
                </div>
            </div>
        </section>
        <section id="kata">
            <h1>Apa Kata Mereka?</h1>
            <p class="sub-title">Mengenai <span style="color:#468662">INFO BERKOH</span></p>
            <div class="grid">
                <div class="item">
                    <img src="assets/images/amin.png">
                    <div class="text">
                        <b>Testimoni</b>
                        <p>“Desa saya menjadi maju dengan adanya sistem INFO BERKOH, semua yang dibutuhkan terasa lebih mudah dan ringan”</p>
                        <hr>
                        <p>Amin, Petani Desa Berkoh</p>
                    </div>
                </div>
                <div class="item">
                    <img src="assets/images/dimas.png">
                    <div class="text">
                        <b>Testimoni</b>
                        <p>“Desa saya menjadi maju dengan adanya sistem INFO BERKOH, semua yang dibutuhkan terasa lebih mudah dan ringan”</p>
                        <hr>
                        <p>Dimas, Petani Desa Berkoh</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="berita">
            <h1>Berita Desa Berkoh</h1>
            <p class="sub-title">Rangkuman berita terbaru dan terpilih dari Desa Berkoh</p>
            <div class="grid">
                <?php
                while ($rowBerita = mysqli_fetch_assoc($resultBerita)) {
                    // Extracting image URLs using the new function
                    $imageUrls = getImageUrls($rowBerita['isi']);
                    echo '<div class="item">';
                    echo '<img src="' . $imageUrls[0] . '">';
                    echo '<div class="text">';
                    echo '<b>' . $rowBerita['judul'] . '</b>';
                    echo '<p>' . getTextWithoutImagesAndLimit($rowBerita['isi'], 28) . '...</p>';
                    echo '<hr>';
                    echo '<a href="berita-terkini.php" style="color: #3e5670"><b>Selengkapnya</b></a>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </section>
        <section id="ucapan">
            <div class="left">
                <h1>Mari Bersama Menjadikan <span style="color: #468662">Desa</span> Lebih Maju dan Terintegrasi</h1>
                <a href="login.php">Login</a>
            </div>
            <div class="right">
                <img src="assets/images/ucapan.png">
            </div>
        </section>
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
    </main>
    <?php include 'components/footer.php'; ?>
</body>
</html>