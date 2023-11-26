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
        #hero {
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
        #hero .left h1 {
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
        <section id="">

        </section>
    </main>
    <?php include 'components/footer.php'; ?>
</body>
</html>