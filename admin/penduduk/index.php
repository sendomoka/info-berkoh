<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penduduk - Admin</title>
    <style>
        /* Style untuk kontainer statistik */
        .statistik-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Style untuk kotak statistik */
        .statistik-box {
            background-color: #577B9D;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 25%;
        }

        /* Style untuk grafik batang */
        .grafik-container {
            margin-top: 20px;
            text-align: center;
        }

        /* Style untuk sumbu Y dan X */
        .sumbu-y, .sumbu-x {
            display: flex;
            justify-content: space-between;
        }

        /* Style untuk bar chart */
        .bar-chart {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        /* Style untuk batang chart */
        .bar {
            background-color: #577B9D;
            width: 40px;
            height: 200px; /* Ganti tinggi sesuai data */
        }
    </style>
</head>
<body>
    <h1>Penduduk</h1>
    <button></button>
    <div class="statistik-container">
        <div class="statistik-box">
            <h3>Total Penduduk</h3>
            <p>1500</p>
            <br>
            <p>last year</p>
        </div>
        <div class="statistik-box">
            <h3>Total yang sudah menikah</h3>
            <p>900</p>
            <br>
            <p>last year</p>
        </div>
        <div class="statistik-box">
            <h3>Total yang sudah wafat</h3>
            <p>350</p>
            <br>
            <p>last year</p>
        </div>
        <div class="statistik-box">
            <h3>Jumlah Kepala Keluarga</h3>
            <p>200</p>
            <br>
            <p>last year</p>
        </div>
    </div>
    <div class="grafik-container">
        <h3>Kenaikan Data Penduduk</h3>
        <div class="sumbu-y">
            <span>600</span>
            <span>500</span>
            <span>400</span>
            <span>300</span>
            <span>200</span>
            <span>100</span>
        </div>
        <div class="bar-chart">
            <div class="bar" style="height: 200px;"></div> <!-- Ganti tinggi sesuai data -->
            <div class="bar" style="height: 300px;"></div> <!-- Ganti tinggi sesuai data -->
            <div class="bar" style="height: 400px;"></div> <!-- Ganti tinggi sesuai data -->
            <div class="bar" style="height: 500px;"></div> <!-- Ganti tinggi sesuai data -->
            <div class="bar" style="height: 600px;"></div> <!-- Ganti tinggi sesuai data -->
        </div>
        <div class="sumbu-x">
            <span>Januari</span>
            <span>Februari</span>
            <span>Maret</span>
            <span>April</span>
            <span>Mei</span>
            <span>Juni</span>
            <span>Juli</span>
            <span>Agustus</span>
            <span>September</span>
            <span>Oktober</span>
            <span>November</span>
            <span>Desember</span>
        </div>
    </div>
</body>
</html>
