<h1 align="center">Selamat datang di Info Berkoh! 👋</h1>

![Landing Page](https://github.com/jehianth/info-berkoh/blob/main/public/images/homepage.png?raw=true)

[![All Contributors](https://img.shields.io/github/contributors/jehianth/info-berkoh)](https://github.com/jehianth/info-berkoh/graphs/contributors)
![GitHub last commit](https://img.shields.io/github/last-commit/jehianth/info-berkoh)

---

<h2 id="tentang">🤔 Apa itu Info Berkoh?</h2>

Info Berkoh adalah website yang menyajikan informasi terkait data penduduk, infografis, dan profil kelurahan Berkoh secara komprehensif. Platform ini akan menampilkan informasi dengan fokus pada integritas data, navigasi yang intuitif, serta fakta yang dapat diakses secara online.

<h2 id="fitur">🤨 Fitur apa saja yang tersedia di Info Berkoh?</h2>

-   [Mazer Bootstrap Template](https://github.com/zuramai/mazer)
    -   <i>Dark</i> dan <i>Light</i> mode
    -   <i>Dashboard UI</i>
-   Landing Page
    -   Beranda
    -   Tentang
    -   Berita Terkini
    -   Data Penduduk
    -   Kontak
    -   Laporan
-   Authentication
    -   <i>Registration</i>
    -   <i>Login</i>
-   Multi User
    -   <i>Admin</i>
        -   Mengelola <i>informasi umum</i>
        -   Mengelola <i>data penduduk</i>
        -   Mengelola <i>berita</i>
        -   Menanggapi <i>laporan</i>
        -   Mengelola <i>galeri</i>
        -   Mengelola <i>users</i>
        -   <i>Account</i>
    -   <i>Petugas</i>
        -   Mengelola <i>data penduduk</i>
        -   Mengelola <i>berita</i>
        -   Menanggapi <i>laporan</i>
        -   Mengelola <i>galeri</i>
        -   <i>Account</i>
    -   <i>Pengunjung</i>
        -   Membagikan berita
        -   Membuat <i>laporan</i>
-   Account
    -   <i>Profile</i>
    -   <i>Setting</i>
    -   <i>Change Password</i>
-   CRUD (Create, Read, Update, and Delete)
    -   <i>Informasi Umum</i>
    -   <i>Data Penduduk</i>
    -   <i>Berita</i>
    -   <i>Laporan</i>
    -   <i>Galeri</i>
    -   <i>User</i>
-   Pencarian <i>Berita</i> di <i>Halaman Berita</i>

<h2 id="testing-account">👤 Default Account for Testing</h2>

#### Admin

-   Username: ...
-   Password: ...

#### Petugas

-   Username: ...
-   Password: ...

<h2 id="demo">🏠 Demo Page</h2>

<p>Halaman demo saat ini tidak tersedia. Oleh karenanya, lebih baik kamu mencoba di <i>local</i> dengan mengikuti tahapan instalasi di bawah ini.</p>

<h2 id="syarat">💾 Pre-requisite</h2>

<p>Berikut adalah <i>pre-requisite</i> yang diperlukan ketika melakukan instalasi dan <i>running</i> aplikasi.</p>

-   PHP ^8.0 & Web Server (XAMPP, LAMPP, MAMPP, atau Laragon)
-   Web Browser (Chrome, Firefox, Safari, Opera, atau Brave)

<h2 id="download">💻 Install</h2>

1. Clone repository

```bash
git clone https://github.com/jehianth/info-berkoh.git
cd info-berkoh
composer install
npm install
copy .env.example .env
```

2. Konfigurasi database melalui `.env`

```
DB_PORT=3306
DB_DATABASE=info-berkoh
DB_USERNAME=root
DB_PASSWORD=
```

3. Migrasi dan symlinks

```bash
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
```

4. Jalankan website

```bash
npm run dev
# Run in different terminal
php artisan serve
```

<h2 id="kontribusi">🤝 Contributing</h2>

<p>
<i>Contributions, issues and feature requests</i> sangat diapresiasi karena website ini jauh dari kata sempurna. Jangan ragu untuk melakukan <i>pull request</i> dan membuat perubahan pada <i>project</i> ini, yaaa!
</p>

<h2 id="lisensi">📝 License</h2>

<p>Info Berkoh is open-sourced software licensed under the MIT license.</p>

<h2 id="inspired">👀 Inspired</h2>

<p>Terinspirasi dari website <a href="https://github.com/hradiluhung/desa-semboja">desa semboja</a> yang dibuat oleh Kak <a href="https://github.com/hradiluhung/desa-semboja">Adi</a> dengan <i>tech stack Next JS</i>.</p>

<h2 id="pembuat">🧍 Author</h2>

<p>Info Berkoh dibuat oleh <a href="https://github.com/jehianth">Jehian</a>, <a href="https://github.com/MutiaNandhika">Nandhi</a> dan <a href="https://github.com/khansakhalda">Khansa</a>.</p>