<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Berkoh</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <ul>
            @foreach(['Beranda', 'Tentang', 'Berita Terkini', 'Data Penduduk', 'Kontak', 'Laporan'] as $menu)
                <li><a href="{{ strtolower(str_replace(' ', '', $menu)) }}">{{ $menu }}</a></li>
            @endforeach
        </ul>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} - Info Berkoh</p>
    </footer>
</body>
</html>
