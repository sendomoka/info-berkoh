<?php
include 'config/models.php';
$sql = "SELECT * FROM dokumentasi";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumentasi - @infoberkoh</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        main {
            padding: 8rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        main h1 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 2rem;
        }
        .dok {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .dok img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 1rem;
        }
        .dok p {
            font-size: 1rem;
            margin-top: 1rem;
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
        <h1>Kumpulan Dokumentasi</h1>
        <div class="grid">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $nama = $row['nama'];
                $imgPath = "assets/images/dokumentasi/" . $row['media'];
                echo "<div class='dok'>
                        <img src='$imgPath' alt='$nama'>
                        <p>$nama</p>
                    </div>";
                }
            ?>
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
</body>
</html>
