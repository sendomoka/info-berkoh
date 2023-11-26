<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengaduan</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .logo img {
            max-height: 50px;
            margin-right: 20px;
        }

        .form-container {
            padding-top: 80px;
            display: flex;
            width: 80%;
            margin-bottom: 20px; /* Tambahkan margin-bottom sesuai kebutuhan */
        }

        .form-image {
            flex: 1;
            position: relative;
        }

        .form-image img {
            width: 500px;
            height: 500px;
        }

        .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    height: 50%;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* Change align-items to flex-start */
    align-items: center;
}

        .form-fields {
            flex: 1;
            background-color: white;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box; /* Add this to ensure padding is included in the width */
        }

        .form-fields label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block; /* Add display block to labels for better spacing */
        }

        .form-fields input,
.form-fields textarea,
.form-fields select {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
    border: 1px solid #577B9D; /* Add border styling */
    border-radius: 4px; /* Optional: Add border-radius for rounded corners */
}

.form-fields input[type="file"] {
    margin-top: 10px;
}

.form-fields input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    height: 40px;
    border: none;
    cursor: pointer;
    width: 100%;
    border: 1px solid #577B9D; /* Add border styling */
    border-radius: 4px; /* Optional: Add border-radius for rounded corners */
}

.form-fields input[type="submit"]:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
    <?php include 'components/header.php'; ?>
    <div class="form-container">
        <div class="form-image">
            <img src="assets/images/pengaduan/img_6550aa47de00f.png" alt="Image">
            <div class="overlay">
                <div class="overlay-content">
                    <h2>Halaman Pengaduan</h2>
                    <p>Sebuah halaman pengaduan biasanya adalah tempat di situs web atau aplikasi yang memungkinkan pengguna untuk melaporkan masalah, memberikan umpan balik, atau mengajukan keluhan.</p>
                </div>
            </div>
        </div>
        <div class="form-fields">
            <label for="fullname">Nama Lengkap</label>
            <input type="text" name="fullname" id="fullname">

            <label for="address">Alamat</label>
            <input type="text" name="address" id="address">

            <label for="issue">Perihal Masalah</label>
            <input type="text" name="issue" id="issue">

            <label for="complaint">Isi Aduan</label>
            <textarea name="complaint" id="complaint"></textarea>

            <label for="file">Upload File</label>
            <input type="file" name="file" id="file">

            <input type="submit" value="Submit">
        </div>
    </div>

    <script>
        function setBold(element) {
            document.querySelectorAll('.nav-links a').forEach(link => {
                link.classList.remove('bold');
            });
            element.classList.add('bold');
        }
    </script>
    <?php include 'components/footer.php'; ?>
</body>
</html>
