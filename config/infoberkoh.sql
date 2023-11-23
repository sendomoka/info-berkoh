DROP DATABASE IF EXISTS infoberkoh;
CREATE DATABASE infoberkoh;
USE infoberkoh;

CREATE TABLE penduduk (
    nik BIGINT PRIMARY KEY,
    nama VARCHAR(50),
    nohp VARCHAR(20),
    tempat_lahir VARCHAR(50),
    tanggal_lahir DATE,
    alamat VARCHAR(300),
    agama VARCHAR(50),
    gol_darah VARCHAR(5),
    jenis_kelamin VARCHAR(50),
    status_perkawinan VARCHAR(50),
    pekerjaan VARCHAR(50),
    pendidikan VARCHAR(50)
);

CREATE TABLE pengguna (
    penggunaID INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50),
    nama_pengguna VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(300),
    role VARCHAR(50),
    jabatan VARCHAR(50),
    avatar TEXT
);

CREATE TABLE pelayanan (
    pelayananID INT PRIMARY KEY AUTO_INCREMENT,
    penggunaID INT,
    nama_pelayanan VARCHAR(50),
    deskripsi LONGTEXT,
    tanggal DATE,
    FOREIGN KEY (penggunaID) REFERENCES pengguna(penggunaID)
);

CREATE TABLE pengaduan (
    pengaduanID INT PRIMARY KEY AUTO_INCREMENT,
    nik BIGINT,
    pesan LONGTEXT,
    tanggal DATE,
    FOREIGN KEY (nik) REFERENCES penduduk(nik)
);

CREATE TABLE berita (
    beritaID INT PRIMARY KEY AUTO_INCREMENT,
    penggunaID INT,
    judul VARCHAR(300),
    judul VARCHAR(300),
    isi LONGTEXT,
    tanggal_dikirim DATE,
    FOREIGN KEY (penggunaID) REFERENCES pengguna(penggunaID)
);

CREATE TABLE informasi (
    informasiID INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(50),
    konten LONGTEXT
);

CREATE TABLE dokumentasi (
    dokumentasiID INT PRIMARY KEY AUTO_INCREMENT,
    nama VARCHAR(300),
    media VARCHAR(300)
);