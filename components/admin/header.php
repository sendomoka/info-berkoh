<?php
$ambilurl = explode('/', $_SERVER['REQUEST_URI']); 
$ambilslash = $ambilurl[count($ambilurl)-2];
if ($ambilslash == 'admin') {
    $menu = 'Dashboard';  
} elseif ($ambilslash == 'profil') {
    $menu = 'Profil';
} elseif ($ambilslash == 'informasi') {
    $menu = 'Informasi Umum';
} elseif ($ambilslash == 'penduduk') {
    $menu = 'Data Penduduk';
} elseif ($ambilslash == 'pelayanan') {
    $menu = 'Pelayanan Publik';
} elseif ($ambilslash == 'berita') {
    $menu = 'Berita Terkini';
} elseif ($ambilslash == 'pengaduan') {
    $menu = 'Lapor Pengaduan';
} elseif ($ambilslash == 'dokumentasi') {
    $menu = 'Dokumentasi';
} elseif ($ambilslash == 'pengguna') {
    $menu = 'Manajemen Akun';
}
?>

<header>
    <h2><?= $menu ?></h2>
    <a href="/admin/profil/index.php?id=<?= isset($_SESSION['penggunaID']) ? $_SESSION['penggunaID'] : '' ?>">
        <div class="box-pengguna">
        <img src="../../assets/images/pengguna/<?= isset($_SESSION['avatar']) && $_SESSION['avatar'] != '' ? $_SESSION['avatar'] : 'user.png' ?>">
            <div class="pengguna">
                <p class="nama"><?= isset($_SESSION['nama_pengguna']) && $_SESSION['nama_pengguna'] != '' ? $_SESSION['nama_pengguna'] : 'Beri Nama' ?></p>
                <p class="role"><?= isset($_SESSION['jabatan']) && $_SESSION['jabatan'] != '' ? $_SESSION['jabatan'] : 'Beri Jabatan' ?></p>
            </div>
        </div>
    </a>
</header>