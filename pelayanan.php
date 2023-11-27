<?php
include 'config/models.php';

// Function to extract image URLs from HTML content
function getImageUrls($html)
{
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
function limitTextByWords($text, $limit)
{
    $words = str_word_count($text, 1); // Mendapatkan array kata-kata dari teks
    $limitedWords = array_slice($words, 0, $limit); // Mengambil sejumlah kata sesuai batas
    $limitedText = implode(' ', $limitedWords); // Menggabungkan kembali kata-kata menjadi teks
    return $limitedText;
}

// ...

// Function to extract text (without images) from HTML content and limit by words
function getTextWithoutImagesAndLimit($html, $limit)
{
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

// Query to get data from 'Pelayanan' table
$queryPelayanan = "SELECT * FROM pelayanan ";
$resultPelayanan = mysqli_query($conn, $queryPelayanan);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan - @infoberkoh</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            background: #3E5670;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            max-width: 100%;
            overflow-x: hidden;
        }

        /* Pelayanan */
        #Pelayanan {
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Memposdeskripsikan konten secara vertikal di tengah */
            align-items: center;
            /* Memposdeskripsikan konten secara horizontal di tengah */
            padding: 3rem;
            height: fit-content;
            background: #3e5670;
            color: white;
            padding-top: 90px;
        }

        #Pelayanan h1 {
            font-size: 2.3rem;
            font-weight: 700;
            line-height: 30px;
            margin-bottom: 1rem;
            text-align: center;
            /* Memposdeskripsikan teks ke tengah */
            margin-bottom: 20px;
            /* Menambahkan margin antara h1 dan grid */
        }

        #Pelayanan .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 3rem;
            margin-top: 20px;
            /* Menambahkan margin antara h1 dan grid */
        }

        #Pelayanan .item {
            display: flex;
            flex-direction: column;
            background: white;
            border-radius: 5px;
            padding: 1rem;
            height: 350px;
            width: 400px;
            color: black;
            gap: 0.5rem;
            /* Mengurangi gap antara elemen */
        }

        #Pelayanan .item img {
            height: 150px;
            width: 200px;
            margin: auto;
            /* Menengahkan gambar */
            display: block;
            /* Membuat gambar menjadi elemen block */
            margin-bottom: 0.5rem;
            /* Jarak antara gambar dan nama_pelayanan */
        }

        #Pelayanan .item .text {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        #Pelayanan .item .text p {
            font-size: 13px;
            align-items: center;
        }

        .section-title {
            color: white;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 20px;
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
    <section id="Pelayanan">
        <h1>Pelayanan Publik</h1>
        <div class="grid">
            <?php
            while ($rowPelayanan = mysqli_fetch_assoc($resultPelayanan)) {
                // Mengganti penggunaID dengan nama pengguna dari tabel pengguna
                $queryPengguna = mysqli_query($conn, "SELECT nama_pengguna FROM pengguna WHERE penggunaID = '" . $rowPelayanan['penggunaID'] . "'");
                $rowPengguna = mysqli_fetch_assoc($queryPengguna);
                $penanggungjawab = $rowPengguna['nama_pengguna'];

                // Extracting image URLs using the new function
                $imageUrls = getImageUrls($rowPelayanan['deskripsi']);

                echo '<div class="item">';
                echo '<div class="text">';
                echo '<img src="' . $imageUrls[0] . '">';
                echo '<p style="font-weight: bold; font-size: 1.3em; margin-bottom: 10px; text-align: center;">' . $rowPelayanan['nama_pelayanan'] . '</p>';
                echo '<p style="font-weight: bold; font-size: 1em; margin-bottom: 5px;"> Penanggung Jawab : ' .  $penanggungjawab . '</p>'; // Menggunakan variabel penanggungjawab
                echo '<p style="font-size: 0.9em; margin-bottom: 0;">' . getTextWithoutImagesAndLimit($rowPelayanan['deskripsi'], 2000) . '</p>';
                echo '</div>';
                echo '</div>';
            }
            ?>
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
    <?php include 'components/footer.php'; ?>
</body>

</html>