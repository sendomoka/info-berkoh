<?php
include 'config/models.php';

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

$queryBerita = "SELECT * FROM berita ORDER BY tanggal_dikirim DESC";
$resultBerita = mysqli_query($conn, $queryBerita);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terkini - @infoberkoh</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        /* berita */
        #berita {
            display: flex;
            flex-direction: column;
            justify-content: start;
            align-items: start;
            padding: 4rem;
            height: fit-content;
            background: #3e5670;
            color: white;
            margin-top: 4rem;
        }
        #berita h1 {
            font-size: 2.3rem;
            font-weight: 700;
            line-height: 30px;
            margin-bottom: 3rem;
        }
        #berita .sub-title {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 3rem;
        }
        #berita .list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
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
    <section id="berita">
        <h1>Berita Terkini Desa Berkoh</h1>
        <div class="list">
            <?php
            while ($rowBerita = mysqli_fetch_assoc($resultBerita)) {
                $imageUrls = getImageUrls($rowBerita['isi']);
                echo "
                <a href=''>
                <div class='item'>
                    <img src='" . $imageUrls[0] . "' width='140px'>
                    <div class='text'>
                        <p>" . $rowBerita['tanggal_dikirim'] . "</p>
                        <h3>" . $rowBerita['judul'] . "</h3>
                        <p>" . getTextWithoutImagesAndLimit($rowBerita['isi'], 200) . "...</p>
                    </div>
                </div>
                </a>
                ";
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
</main>
<?php include 'components/footer.php'; ?>
</body>

</html>