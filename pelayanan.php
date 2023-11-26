<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
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

        nav {
    overflow: hidden;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 20px; /* Tambahkan padding pada navbar */
    width: 100%;
    background-color: #3E5670;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
}

        .nav-links {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 16px;
            font-weight: normal;
            transition: font-weight 0.3s;
        }

        nav a.bold {
            font-weight: bold;
        }

        .logo img {
            max-height: 50px;
            margin-right: 20px; /* Tambahkan margin kanan */
        }

        .cards-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 20px;
            gap: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-subtitle {
            font-size: 18px;
            color: #555;
            margin-bottom: 10px;
        }

        .card-description {
            font-size: 16px;
            color: #777;
        }

        .section-title {
            color: white;
            font-size: 28px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        footer {
            background-color: white;
            color: black;
            text-align: left;
            padding: 20px;
            width: 100%;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .cards-container {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 100%;
            }
        }
        .green-footer {
            background-color: #468662;
            color: white;
            text-align: left;
            padding: 20px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .green-footer .logo {
            margin-bottom: 20px;
        }

        .green-footer .contact-info {
            text-align: left;
        }

        .green-footer .social-media-icons {
            display: flex;
            justify-content: flex-start;
            margin-top: 10px;
        }

        .green-footer p {
            margin: 5px 0;
        }

        .social-media-icons a {
            color: white;
            margin-right: 10px;
            font-size: 20px;
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo">
            <img src="assets/images/logo.svg" alt="Logo" width="220px">
        </div>
        <ul class="nav-links">
            <li><a href="#home" onclick="setBold(this)">Beranda</a></li>
            <li><a href="#about" onclick="setBold(this)">Data Penduduk</a></li>
            <li><a href="#population" onclick="setBold(this)">Berita Terkini</a></li>
            <li><a href="#news" onclick="setBold(this)">Lapor Pengaduan</a></li>
            <li><a href="#report" onclick="setBold(this)">Pelayanan Publik</a></li>
            <li><a href="#documentation" onclick="setBold(this)">Dokumentasi</a></li>
        </ul>
    </nav>

    <div class="section-title">Pelayanan Publik</div>

    <div class="cards-container">
        <div class="card">
            <div class="profile-image">
                <img src="path/to/profile-image.jpg" alt="Profile Image">
            </div>
            <div class="card-title">Linmas (Lingkaran Keamanan)</div>
            <div class="card-subtitle">Pak Adi - Koordinator Linmas</div>
            <div class="card-description">
                Linmas (Lingkaran Keamanan) bertugas menjaga keamanan dan ketertiban desa dengan patroli dan kerja sama dengan aparat keamanan.
            </div>
        </div>

        <div class="card">
            <div class="profile-image">
                <img src="path/to/profile-image.jpg" alt="Profile Image">
            </div>
            <div class="card-title">Bansos ( Bantuan Sosial)</div>
            <div class="card-subtitle">Pak Didiet - Kepala Desa</div>
            <div class="card-description">
               Program Bantuan Sosial memberikan bantuan kepada keluarga-keluarga yang membutuhkan, termasuk paket sembako dan dukungan finansial.
            </div>
        </div>
    </div>
    <div class="green-footer">
        <div class="logo">
            <img src="assets/images/logo-white.svg" alt="Logo" width="150px">
        </div>
        <div class="contact-info">
            <p>Website Resmi Pemerintah Desa Berkoh, Kecamatan Purwokerto Selatan, Kabupaten Banyumas</p>
            <p>Jl. Gerilya Timur No.26, Sokabaru, Berkoh, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53146</p>
            <p>Telepon/Fax: 0281633014</p>
            <p>Email: berkoh.banyumas@gmail.com</p>
        </div>
        <div class="social-media-icons">
            <a href="#" target="_blank">Instagram</a>
            <a href="#" target="_blank">Twitter</a>
            <a href="#" target="_blank">Facebook</a>
            <a href="#" target="_blank">LinkedIn</a>
        </div>
    </div>

    <footer>© 2023, INFO BERKOH</footer>

    <script>
        function setBold(element) {
            // Remove bold class from all links
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.classList.remove('bold');
            });

            // Add bold class to the clicked link
            element.classList.add('bold');
        }
    </script>
</body>
</html>
