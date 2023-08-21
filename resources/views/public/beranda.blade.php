@extends('layout.app')

@section('content')
    <section class="hero">
        <h1>Selamat Datang di Info Berkoh</h1>
        <p>Temukan informasi terkini tentang kelurahan Berkoh di sini.</p>
    </section>

    <section class="profil">
        <h2>Profil Kelurahan Berkoh</h2>
        <div class="grid">
            <div class="point">
                <h3>Sejarah</h3>
                <p>Deskripsi singkat tentang sejarah kelurahan Berkoh.</p>
            </div>
            <div class="point">
                <h3>Infrastruktur</h3>
                <p>Informasi tentang infrastruktur yang ada di kelurahan Berkoh.</p>
            </div>
            <div class="point">
                <h3>Pendidikan</h3>
                <p>Informasi tentang fasilitas pendidikan yang tersedia.</p>
            </div>
            <!-- Tambahkan poin penting lainnya -->
        </div>
    </section>

    <section class="lurah">
        <h2>Lurah Saat Ini</h2>
        <div class="lurah-info">
            <img src="path-to-lurah-image.jpg" alt="Foto Lurah">
            <div class="info">
                <h3>Nama Lurah</h3>
                <p>Deskripsi singkat tentang Lurah saat ini dan tanggung jawabnya.</p>
            </div>
        </div>
    </section>
@endsection