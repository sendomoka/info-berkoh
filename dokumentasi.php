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
    <?php include 'components/footer.php'; ?>
</body>
</html>
