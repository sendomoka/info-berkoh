<?php
include 'config/models.php';

$queryPenduduk = "SELECT COUNT(*) as totalPenduduk FROM penduduk WHERE createdat >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
$resultPenduduk = mysqli_query($conn, $queryPenduduk);
$rowPenduduk = mysqli_fetch_assoc($resultPenduduk);
$selectPenduduk = $rowPenduduk['totalPenduduk'];

// Query to get the count of 'Kawin' status
$queryKawin = "SELECT COUNT(*) as totalKawin FROM penduduk WHERE status_perkawinan='Kawin' AND createdat >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
$resultKawin = mysqli_query($conn, $queryKawin);
$rowKawin = mysqli_fetch_assoc($resultKawin);
$selectKawin = $rowKawin['totalKawin'];

// Query to get the count of 'Wafat' status
$queryWafat = "SELECT COUNT(*) as totalWafat FROM penduduk WHERE status_hidup='Wafat' AND createdat >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
$resultWafat = mysqli_query($conn, $queryWafat);
$rowWafat = mysqli_fetch_assoc($resultWafat);
$selectWafat = $rowWafat['totalWafat'];

// Query to get the count of 'Kepala Keluarga' status
$queryKeluarga = "SELECT COUNT(*) as totalKeluarga FROM penduduk WHERE status_keluarga='Kepala Keluarga' AND createdat >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
$resultKeluarga = mysqli_query($conn, $queryKeluarga);
$rowKeluarga = mysqli_fetch_assoc($resultKeluarga);
$selectKeluarga = $rowKeluarga['totalKeluarga'];

$queryChart = "SELECT MONTHNAME(createdat) AS namabulan, COUNT(*) AS jumlahpenduduk FROM penduduk WHERE createdat >= CURDATE() - INTERVAL 1 YEAR GROUP BY namabulan;";
foreach ($conn->query($queryChart) as $rowChart) {
    $namaBulan[] = $rowChart['namabulan'];
    $jumlahPenduduk[] = $rowChart['jumlahpenduduk'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penduduk - @infoberkoh</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        main {
            padding-top: 8rem;
            background: #3e5670;
            color: #fff;
        }
        #statistik {
            margin-bottom: 4rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
        }
        #statistik h1 {
            font-size: 3rem;
            font-weight: 700;
        }
        #statistik .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }
        #statistik .item {
            background: #fff;
            padding: 1rem;
            border-radius: 1rem;
            text-align: start;
            color: black;
        }
        #statistik .item p {
            font-size: .7rem;
            font-weight: 500;
        }
        #statistik .item h3 {
            font-size: 2rem;
            font-weight: 700;
            margin: .5rem 0;
        }
        #statistik .item p:last-child {
            color: gray;
        }
        #kenaikan {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
        }
        #kenaikan h1 {
            font-size: 2rem;
            font-weight: 700;
        }
        #kenaikan .canvas {
            width: 100%;
            max-width: 800px;
            height: 400px;
            background: white;
            border-radius: 1rem;
            padding: 2rem;
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
            margin-top: 3rem;
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
    <section id="statistik">
        <h1>Statistik Penduduk</h1>
        <div class="grid">
            <div class="item">
                <p>Jumlah Penduduk</p>
                <h3><?= $selectPenduduk ?></h3>
                <p>Satu Tahun Terakhir</p>
            </div>
            <div class="item">
                <p>Jumlah Penduduk yang sudah Menikah</p>
                <h3><?= $selectKawin ?></h3>
                <p>Satu Tahun Terakhir</p>
            </div>
            <div class="item">
                <p>Jumlah Penduduk yang sudah Wafat</p>
                <h3><?= $selectWafat ?></h3>
                <p>Satu Tahun Terakhir</p>
            </div>
            <div class="item">
                <p>Jumlah Kepala Keluarga</p>
                <h3><?= $selectKeluarga ?></h3>
                <p>Satu Tahun Terakhir</p>
            </div>
        </div>
    </section>
    <section id="kenaikan">
        <h1>Kenaikan Data Penduduk</h1>
        <div class="canvas">
            <canvas id="myChart"></canvas>
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
<script>
    const labels = <?= json_encode($namaBulan) ?>;
    const data = {
    labels: labels,
    datasets: [{
        label: 'Jumlah Penduduk per Bulan (Satu Tahun Terakhir)',
        data: <?= json_encode($jumlahPenduduk) ?>,
        backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
        ],
        borderWidth: 1
    }]
    };
    const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        },
        maintainAspectRatio: false,
    },
    };
    var myChart = new Chart(
    document.getElementById('myChart'),
    config
    );
</script>
</body>
</html>
