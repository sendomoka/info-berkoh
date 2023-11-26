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

// Query to get the count of 'Kawin' status
$queryKawin = "SELECT COUNT(*) as totalKawin FROM penduduk WHERE status_perkawinan='Kawin'";
$resultKawin = mysqli_query($conn, $queryKawin);
$rowKawin = mysqli_fetch_assoc($resultKawin);
$selectKawin = $rowKawin['totalKawin'];

// Query to get the count of 'Wafat' status
$queryWafat = "SELECT COUNT(*) as totalWafat FROM penduduk WHERE status_hidup='Wafat'";
$resultWafat = mysqli_query($conn, $queryWafat);
$rowWafat = mysqli_fetch_assoc($resultWafat);
$selectWafat = $rowWafat['totalWafat'];

// Query to get the count of 'Kepala Keluarga' status
$queryKeluarga = "SELECT COUNT(*) as totalKeluarga FROM penduduk WHERE status_keluarga='Kepala Keluarga'";
$resultKeluarga = mysqli_query($conn, $queryKeluarga);
$rowKeluarga = mysqli_fetch_assoc($resultKeluarga);
$selectKeluarga = $rowKeluarga['totalKeluarga'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@infoberkoh</title>
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
            padding: 5rem;
            height: fit-content;
            gap: 3rem;
            background: #3e5670;
            color: white;
        }
        #solusi .left {
            width: 50%;
        }
        #solusi .left h1 {
            font-size: 2.3rem;
            font-weight: 700;
            line-height: 30px;
            margin-bottom: 1rem;
        }
        #solusi .left p {
            font-size: 1rem;
            font-weight: 400;
            text-align: justify;
            margin-top: -10px;
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
        }
        #solusi .right .item .title {
            display: flex;
            align-items: center;
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
            text-align: justify;
            margin-top: -10px;
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
                <h1><?= $selectKawin ?></h1>
                <p>Jumlah Warga yang Menikah</p>
            </div>
            <div class="wafat">
                <h1><?= $selectWafat ?></h1>
                <p>Jumlah Warga yang Wafat</p>
            </div>
            <div class="keluarga">
                <h1><?= $selectKeluarga ?></h1>
                <p>Jumlah Kepala Keluarga</p>
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
                        <img src="assets/images/profil.svg">
                        <h3>Profil</h3>
                    </div>
                    <p>Salah satu desa yang berada di Kecamatan Pagerbarang, Kabupaten Tegal, Provinsi Jawa Tengah, Indonesia</p>
                </div>
                <div class="item">
                    <div class="title">
                        <img src="assets/images/profil.svg">
                        <h3>Profil</h3>
                    </div>
                    <p>Salah satu desa yang berada di Kecamatan Pagerbarang, Kabupaten Tegal, Provinsi Jawa Tengah, Indonesia</p>
                </div>
                <div class="item">
                    <div class="title">
                        <img src="assets/images/profil.svg">
                        <h3>Profil</h3>
                    </div>
                    <p>Salah satu desa yang berada di Kecamatan Pagerbarang, Kabupaten Tegal, Provinsi Jawa Tengah, Indonesia</p>
                </div>
            </div>
        </section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>
</html>