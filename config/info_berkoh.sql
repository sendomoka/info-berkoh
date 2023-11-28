-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 28, 2023 at 01:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info_berkoh`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `beritaID` int NOT NULL,
  `penggunaID` int NOT NULL,
  `judul` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_dikirim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`beritaID`, `penggunaID`, `judul`, `isi`, `tanggal_dikirim`) VALUES
(1, 1, 'Open Recuitment Panitia Pemilu', '<p><img src=\"assets/images/berita/img_6563b2fdf3209.png\"></p><p>Dengan penuh semangat dan antusias, kami dengan bangga mengumumkan kesempatan emas bagi Anda untuk bergabung dalam perjalanan sejarah demokrasi kita. Pada tahun 2024, kami membuka rekrutmen untuk individu yang memiliki komitmen tinggi dan keinginan kuat untuk ikut serta dalam penyelenggaraan pemilihan presiden. Inilah momen untuk menjadi bagian dari panitia pemilihan presiden kami, tempat di mana Anda tidak hanya dapat mengamati, tetapi juga secara aktif berkontribusi dalam mewujudkan peristiwa bersejarah ini.\r\n\r\nDengan bergabung dalam tim panitia, Anda akan menjadi bagian integral dari kelancaran dan keberhasilan pemilihan presiden 2024. Tantangan ini bukan hanya sekadar kesempatan untuk menyaksikan proses demokrasi, tetapi juga untuk merasakan getaran langsungnya, menjadi penggerak perubahan, dan memberikan sumbangsih berarti untuk masa depan demokratis kita.\r\n\r\nKami mengundang Anda untuk melibatkan diri, berkolaborasi dengan individu yang berkomitmen, dan menjadikan diri Anda sebagai agen perubahan. Dengan bergabung dalam panitia pemilihan presiden, Anda tidak hanya menjadi saksi sejarah, tetapi juga penulis sejarah. Mari bersama-sama wujudkan perubahan dan keberhasilan dalam pemilihan presiden 2024. Ayo, bergabunglah, dan menjadi bagian dari gerbong demokrasi yang berkobar-kobar!</p>', '2023-11-27'),
(2, 1, 'Baksos \"Berbagi Kasih\" Mencerahkan Masyarakat', '<p><img src=\"assets/images/berita/img_6563b383b7a6a.png\"></p><p>\r\nAcara bakti sosial \"Berbagi Kasih\" di Desa Berkoh menyentuh hati banyak orang. Sukarelawan dari berbagai latar belakang bergabung untuk membantu keluarga kurang mampu dengan memberikan bantuan pangan, pakaian, dan perlengkapan sekolah. Kebersamaan dan semangat gotong royong terasa kuat, menciptakan ikatan yang erat di antara warga desa. Aksi ini tidak hanya memberikan manfaat materi, tetapi juga membawa kehangatan dan harapan bagi masyarakat Desa Berkoh.</p>', '2023-11-27'),
(3, 1, 'Lomba 17 Agustus 2023', '<p><img src=\"assets/images/berita/img_6563b3c32bd0c.png\"></p><p>Desa Berkoh mengadakan lomba 17 Agustus yang meriah dan penuh semangat sebagai bagian dari perayaan Hari Kemerdekaan. Lomba ini dihadiri oleh warga desa yang berkompetisi dalam berbagai cabang perlombaan, mulai dari lomba makan kerupuk, tarik tambang, hingga balap kelereng. Semangat persaingan dan kebersamaan begitu terasa, menciptakan momen keakraban yang tak terlupakan di tengah kemeriahan peringatan Hari Kemerdekaan Desa Berkoh. Acara tersebut juga diramaikan oleh penampilan seni dari anak-anak sekolah setempat, menambah warna ceria dan kehangatan dalam merayakan semangat kemerdekaan. Suasana kegembiraan dan kebanggaan atas kemerdekaan Indonesia begitu kental terasa, memperkuat ikatan sosial di Desa Berkoh.</p>', '2023-11-27'),
(4, 3, 'Kesepakatan Penegasan Batas Desa', '<p><img src=\"assets/images/berita/img_65653f0d3b569.jpeg\"></p><p>Penegasan batas Desa untuk Desa dilakukan melalui tahapan penelitian dokumen, pelacakan dan penentuan posisi batas, pemasangan dan pengukuran pilar batas, dan pembuatan peta batas Desa serta diberita acarakan.</p><p>Seperti yang tercantum dalam&nbsp;<a href=\"https://ciptadesa.com/permendagri-45-tahun-2016/\" target=\"_blank\" style=\"color: rgb(25, 94, 169);\">Permendagri Nomor 45 Tahun 2016</a>&nbsp;tentang Penetapan dan Penegasan Batas Desa, pada Pasal 14 ayat (2) menyebutkan bahwasetiap tahapan penegasan batas dituangkan dalam berita acara kesepakatan antar Desa yang berbatasan.</p>', '2023-11-27'),
(36, 12, 'Bhabinkamtibmas Silaturahmi ke Warga, Sambang Tomas Sampaikan Kamtibmas', '<p><img src=\"assets/images/berita/img_65653f79be764.png\"></p><p>Dalam rangka dukung harkamtibmas serta pelayanan prima kepolisian Aipda Yunix Andra S selaku Bhabinkamtibmas desa Prunggahan Wetan Kec. Semanding Kab Tuban melaksanakan giat rutin di wilayah binaan sambang kepada Tokoh Masyarakat Bpk. Sutarman warga desa Prunggahan Wetan kecamatan Semanding.</p><p><br></p><p>Giat sambang ini dalam rangka memberikan pelayanan rasa aman bagi masyarakat sesuai dengan arahan dari Bapak Kapolsek Iptu Muhammad Yusuf SH kepada bhabinkamtibmas dengan melakukan blusukan bisa menyerap informasi berkaitan dengan permasalahan kamtibmas di lapangan.</p><p><br></p><p>“Demi tertib amannya lingkungan di desa kita, diharapkan menggalakkan kembali tamu wajib lapor 1×24 jam dan untuk hadir siskamling atau ronda malam kemudian apabila memarkir kendaraan parkirkanlah di tempat yang aman dan tambahkan kunci ganda guna meminimalkan kesempatan pelaku kriminal melakukan kejahatan” ujar Aipda Yunix Andra S.</p>', '2023-11-28'),
(37, 1, 'Kasus Dugaan Penyalahgunaan Tanah Desa Kembali Terjadi', '<p><img src=\"assets/images/berita/img_6565400986fb7.jpeg\"></p><p>Kali ini, kasus tersebut terjadi di Padukuhan Keyongan, Kalurahan Sabdodadi, Kapanewon&nbsp;<a href=\"https://jogja.tribunnews.com/tag/bantul\" target=\"_blank\" style=\"color: rgb(39, 170, 225);\">Bantul</a>, Kabupaten&nbsp;<a href=\"https://jogja.tribunnews.com/tag/bantul\" target=\"_blank\" style=\"color: rgb(39, 170, 225);\">Bantul</a>.</p><p>Lurah Sabdodadi, Siti Fatimah, mengatakan, tanah dengan luas total sekitar satu hektare di Padukuhan Keyongan tersebut ada yang sebagian diuruk alias ditimbun, serta digunakan untuk kegiatan tempat dagangan jual beli joglo oleh seorang perangkat wilayah setempat.&nbsp;</p><p>\"Padahal, itu kan lahan subur dan berstatus hijau, alias hanya boleh dipergunakan untuk&nbsp;lahan pertanian,\" ucapnya kepada awak media, Senin (27/11/2023).</p>', '2023-11-20'),
(38, 11, 'Desa Berkoh Penghargaan Proklim dari KLHK', '<p><img src=\"assets/images/berita/img_65654070c869e.jpeg\"></p><p><span style=\"background-color: rgb(255, 255, 255); color: rgb(51, 51, 51);\">Dalam penghargaan tersebut, kata Arifin,&nbsp;</span><a href=\"https://www.bangsaonline.com/tag/trenggalek\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(39, 170, 225);\">Trenggalek</a><span style=\"background-color: rgb(255, 255, 255); color: rgb(51, 51, 51);\">&nbsp;disebut sebagai salah satu kabupaten pembina Proklim terbaik tingkat nasional.&nbsp;Sesuai apa yang disampaikan Menteri LHK, diharapkan Proklim ke depan berbasis Proklim&nbsp;</span><em style=\"background-color: rgb(255, 255, 255); color: rgb(51, 51, 51);\">community</em><span style=\"background-color: rgb(255, 255, 255); color: rgb(51, 51, 51);\">&nbsp;atau pendekatan komunitas, dan di&nbsp;</span><a href=\"https://www.bangsaonline.com/tag/trenggalek\" target=\"_blank\" style=\"background-color: rgb(255, 255, 255); color: rgb(39, 170, 225);\">Trenggalek</a><span style=\"background-color: rgb(255, 255, 255); color: rgb(51, 51, 51);\">&nbsp;terdapat adipura desa yang nantinya diatur untuk melibatkan komunitas Proklim.</span></p>', '2023-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pelayanan`
--

CREATE TABLE `daftar_pelayanan` (
  `pelayananID` int NOT NULL,
  `nik` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_pelayanan`
--

INSERT INTO `daftar_pelayanan` (`pelayananID`, `nik`, `tanggal`, `status`) VALUES
(1, '123456789, 234567809, 1234567809', '2023-10-23', 'Selesai'),
(1, '4567810234,8091234567,33218032843452', '2023-12-09', 'Belum Dilaksanakan'),
(2, '1234567810, 1234567890, 1345678091, 2345678091, 2345678102', '2023-11-26', 'Berlangsung'),
(11, '330218031803827,330218031803826,330218031803824,330218031803831,330218031803824,330218031803829', '2021-06-12', 'Berlangsung'),
(12, '330218031803825,330218031803826,330218031803827,330218031803828,330218031803830,330218031803831,330218031803832,330218031803833,330218031803835,330218031803836', '2022-11-23', 'Selesai'),
(13, '330218031803824,330218031803826,330218031803828,330218031803969,330218031803919,330218031803967,330218031803963,330218031803968,330218031803972', '2020-03-25', 'Belum Dilaksanakan'),
(16, '330218031803965,330218031803916,330218031803902,330218031803960,330218031803962,330218031803959,330218031803961,330218031803970', '2022-05-24', 'Selesai'),
(17, '330218031803827,330218031803956,330218031803964,330218031803971,330218031803973,330218031803972,330218031803824,330218031803824', '2023-08-30', 'Berlangsung');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `dokumentasiID` int NOT NULL,
  `nama` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `media` varchar(300) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumentasi`
--

INSERT INTO `dokumentasi` (`dokumentasiID`, `nama`, `media`) VALUES
(1, 'Perempatan', '1700885127_foto-berkoh.png'),
(11, 'Gapura Kampung KB', '1701046722_gapura kampung kb.jpeg'),
(12, 'TK Aisyiyah', '1701046737_tkaisyiyah.jpg'),
(13, 'Taman Satria', '1701046753_taman satria.jpg'),
(14, 'SDN 1', '1701046766_sdn1.jpg'),
(15, 'SDN 3', '1701046782_sdn3.jpg'),
(16, 'Taman RW 003', '1701046802_taman.jpg'),
(17, 'Kantor Desa', '1701046815_kantordesa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `informasiID` int NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `konten` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`informasiID`, `nama`, `konten`) VALUES
(1, 'hero-title', '<h1><strong>Mengelola </strong><strong style=\"color: rgb(0, 138, 0);\">Desa</strong><strong> Menjadi </strong></h1><h1><strong>Lebih Mudah</strong></h1>'),
(2, 'hero-desc', '<p>Penuhi beragam kebutuhan desa Anda melalui berbagai solusi layanan digital yang disediakan oleh INFO BERKOH. Dengan komitmen kuat kami, kami berusaha untuk memberikan dukungan kepada Anda dalam meningkatkan kualitas hidup di desa, sehingga Anda dapat melihat desa Anda berkembang dengan lebih nyaman, aman, dan efisien.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `pelayananID` int NOT NULL,
  `penggunaID` int NOT NULL,
  `nama_pelayanan` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`pelayananID`, `penggunaID`, `nama_pelayanan`, `deskripsi`) VALUES
(11, 14, 'Posyandu untuk Ibu Hamil dan Balita', '<p>Posyandu merupakan pusat pelayanan kesehatan yang fokus pada ibu hamil dan balita. Di sini, para ibu dapat memperoleh informasi, konsultasi, serta layanan kesehatan yang mendukung perkembangan optimal bagi mereka dan balita mereka.</p><p><img src=\"../../assets/images/pelayanan/img_65644c7d658ce.jpeg\"></p>'),
(12, 1, 'Imunisasi dan Konsultasi Kesehatan Masyarakat', '<p>Memberikan pelayanan imunisasi kepada masyarakat untuk melindungi mereka dari penyakit tertentu. Selain itu, memberikan konsultasi kesehatan secara umum, memberikan informasi kesehatan preventif</p><p><img src=\"../../assets/images/pelayanan/img_65644c4b75cfc.jpeg\"></p>'),
(13, 2, 'Pengelolaan Sampah Rumah Tangga', '<p>Program ini bertujuan untuk mengelola sampah rumah tangga secara efisien. Melibatkan pemberdayaan masyarakat dalam praktik-praktik daur ulang dan pengurangan sampah untuk menciptakan lingkungan yang bersih dan sehat.</p><p><img src=\"../../assets/images/pelayanan/img_65644cba514de.jpeg\"></p>'),
(14, 5, 'Penerbitan Surat Keterangan untuk Keperluan Usaha dan Kegiatan Ekonomi', '<p>Memberikan dukungan administratif untuk usaha dan kegiatan ekonomi masyarakat dengan menerbitkan surat keterangan yang diperlukan untuk proses perizinan dan kegiatan bisnis.</p><p><img src=\"../../assets/images/pelayanan/img_65644d0146e3f.jpeg\"></p>'),
(15, 1, 'Informasi dan Bantuan Terkait Sertifikat Tanah', '<p>Menyediakan informasi dan bantuan kepada masyarakat terkait perolehan, perpanjangan, atau pemahaman terhadap sertifikat tanah. Membantu dalam mengatasi permasalahan terkait kepemilikan tanah.</p><p><img src=\"../../assets/images/pelayanan/img_65644d5735c5c.jpeg\"></p>'),
(16, 6, 'Program Pemberdayaan Masyarakat', '<p>Mengembangkan program-program yang memberdayakan masyarakat secara ekonomi, sosial, dan budaya. Bertujuan untuk meningkatkan kemandirian dan kesejahteraan masyarakat.</p><p><img src=\"../../assets/images/pelayanan/img_65644d88d1f13.jpeg\"></p>'),
(17, 7, 'Program Beasiswa untuk Siswa Berprestasi', '<p>Memberikan peluang pendidikan lebih lanjut dengan memberikan beasiswa kepada siswa yang telah menunjukkan prestasi akademik atau prestasi di berbagai bidang. Mendorong pengembangan potensi generasi muda.</p><p><img src=\"../../assets/images/pelayanan/img_65644dc302b55.jpeg\"></p>'),
(18, 8, 'Perencanaan dan Pembangunan Infrastruktur', '<p>Melibatkan perencanaan dan pembangunan jalan, jembatan, dan fasilitas umum untuk meningkatkan konektivitas dan aksesibilitas masyarakat terhadap fasilitas penting.</p><p><img src=\"../../assets/images/pelayanan/img_65644df2898e2.png\"></p>'),
(19, 9, 'Mediasi dalam Penyelesaian Sengketa', '<p>Menyediakan layanan mediasi untuk membantu masyarakat dalam menyelesaikan sengketa secara damai dan adil tanpa melibatkan proses hukum yang panjang.</p><p><img src=\"../../assets/images/pelayanan/img_65644e1d0d62a.jpeg\"></p>'),
(20, 10, 'Pengelolaan Air Bersih dan Sanitasi', '<p>Memastikan ketersediaan air bersih dan penyediaan fasilitas sanitasi yang baik. Program ini bertujuan untuk meningkatkan kesehatan masyarakat dan mencegah penyakit terkait air.</p><p><img src=\"../../assets/images/pelayanan/img_65644e7044907.jpeg\"></p>'),
(21, 11, 'Pencatatan Resmi Kelahiran dan Kematian', '<p>Memberikan layanan pencatatan resmi terkait kelahiran dan kematian, termasuk penerbitan akta kelahiran dan kematian. Penting untuk administrasi dan hak-hak hukum.</p><p><img src=\"../../assets/images/pelayanan/img_65644eae31c89.png\"></p>'),
(22, 12, 'Program Keagamaan untuk Masyarakat Desa', '<p>Mengorganisir program-program keagamaan, seperti kegiatan ibadah, pelatihan agama, dan kegiatan sosial keagamaan untuk memenuhi kebutuhan spiritual masyarakat desa.</p><p><img src=\"../../assets/images/pelayanan/img_65644ed647711.jpeg\"></p>');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` bigint NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `agama` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `status_perkawinan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status_keluarga` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_kerja` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_hidup` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `createdat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `agama`, `status_perkawinan`, `status_keluarga`, `status_kerja`, `status_hidup`, `createdat`) VALUES
(330218031803824, 'Jehian Athaya', 'Laki-Laki', 'Banyumas', '2004-01-27', 'RT 001 RW 002', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2022-07-03'),
(330218031803825, 'Kartika Sari', 'Perempuan', 'Banjarnegara', '1984-06-03', 'RT 002 RW 003', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-07-04'),
(330218031803826, 'Bambang Sulistyo', 'Laki-Laki', 'Cilacap', '1963-10-20', 'RT 001 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-07-05'),
(330218031803827, 'Siti Aminah', 'Perempuan', 'Jakarta', '1965-08-23', 'RT 001 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-07-06'),
(330218031803828, 'Joko Santoso', 'Laki-Laki', 'Surabaya', '2000-04-12', 'RT 004 RW 002', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-07-07'),
(330218031803829, 'Ratna Widya', 'Perempuan', 'Bandung', '1982-11-30', 'RT 003 RW 004', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-07-08'),
(330218031803830, 'Slamet Widodo', 'Laki-Laki', 'Medan', '1990-06-17', 'RT 005 RW 003', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-07-09'),
(330218031803831, 'Dewi Lestari', 'Perempuan', 'Semarang', '1973-02-08', 'RT 002 RW 002', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-07-10'),
(330218031803832, 'Hadi Nugroho', 'Laki-Laki', 'Makassar', '2001-09-25', 'RT 002 RW 004', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-07-11'),
(330218031803833, 'Siti Hartati', 'Perempuan', 'Palembang', '1987-07-14', 'RT 005 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-07-12'),
(330218031803834, 'Budi Susanto', 'Laki-Laki', 'Tangerang', '1960-12-03', 'RT 003 RW 002', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-07-13'),
(330218031803835, 'Mariani Soemarno', 'Perempuan', 'Depok', '1975-10-21', 'RT 004 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-07-14'),
(330218031803836, 'Surya Wardhana', 'Laki-Laki', 'Bekasi', '2002-03-19', 'RT 003 RW 003', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-08-15'),
(330218031803837, 'Ani Rahayu', 'Perempuan', 'Bogor', '1988-01-05', 'RT 002 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-08-16'),
(330218031803838, 'Sigit Prabowo', 'Laki-Laki', 'Malang', '1967-06-29', 'RT 001 RW 003', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-08-17'),
(330218031803839, 'Yuli Kusuma', 'Perempuan', 'Yogyakarta', '1971-09-11', 'RT 001 RW 002', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-08-18'),
(330218031803840, 'Sugeng Riyanto', 'Laki-Laki', 'Batam', '2003-04-27', 'RT 005 RW 004', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-08-19'),
(330218031803841, 'Sri Wulandari', 'Perempuan', 'Padang', '1998-08-02', 'RT 004 RW 004', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-08-20'),
(330218031803842, 'Edi Suharto', 'Laki-Laki', 'Bandar Lampung', '1963-11-15', 'RT 002 RW 001', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-08-21'),
(330218031803843, 'Yuni Setiawati', 'Perempuan', 'Balikpapan', '1979-05-07', 'RT 005 RW 002', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-09-22'),
(330218031803844, 'Agus Purwanto', 'Laki-Laki', 'Banjarmasin', '2004-02-24', 'RT 004 RW 001', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-09-23'),
(330218031803845, 'Yuniarti Utami', 'Perempuan', 'Samarinda', '1969-07-01', 'RT 003 RW 001', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-09-24'),
(330218031803846, 'Adi Supriyanto', 'Laki-Laki', 'Pekanbaru', '1976-03-10', 'RT 001 RW 004', 'Hindu', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-09-25'),
(330218031803847, 'Nurul Hidayah', 'Perempuan', 'Pontianak', '1989-09-28', 'RT 003 RW 005', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-09-26'),
(330218031803848, 'Hadi Kurniawan', 'Laki-Laki', 'Manado', '2000-08-14', 'RT 001 RW 005', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-09-27'),
(330218031803849, 'Nia Suryani', 'Perempuan', 'Denpasar', '1997-12-22', 'RT 001 RW 001', 'Kristen', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-09-28'),
(330218031803850, 'Joko Nugroho', 'Laki-Laki', 'Pekalongan', '1970-04-02', 'RT 004 RW 003', 'Buddha', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-09-29'),
(330218031803851, 'Retno Puspitasari', 'Perempuan', 'Cirebon', '1962-01-18', 'RT 005 RW 001', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-09-30'),
(330218031803852, 'Hendro Wahyudi', 'Laki-Laki', 'Jambi', '2001-10-08', 'RT 004 RW 001', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-01'),
(330218031803853, 'Maya Indah', 'Perempuan', 'Serang', '1958-06-26', 'RT 005 RW 003', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-02'),
(330218031803854, 'Hadi Sutrisno', 'Laki-Laki', 'Probolinggo', '1993-03-13', 'RT 004 RW 005', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-03'),
(330218031803855, 'Eni Wahyuni', 'Perempuan', 'Salatiga', '1966-11-04', 'RT 001 RW 005', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-03'),
(330218031803856, 'Ari Setiawan', 'Laki-Laki', 'Magelang', '2002-01-31', 'RT 002 RW 003', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-04'),
(330218031803857, 'Yunita Damayanti', 'Perempuan', 'Kediri', '1986-05-20', 'RT 005 RW 004', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-05'),
(330218031803858, 'Suryanto Wibowo', 'Laki-Laki', 'Surakarta', '1953-09-07', 'RT 001 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-06'),
(330218031803859, 'Lina Kartika', 'Perempuan', 'Pasuruan', '1996-06-14', 'RT 004 RW 004', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-07'),
(330218031803860, 'Supriyadi Hidayat', 'Laki-Laki', 'Banjarbaru', '2006-02-25', 'RT 003 RW 004', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-08'),
(330218031803861, 'Siti Rahmawati', 'Perempuan', 'Tarakan', '1977-08-15', 'RT 003 RW 001', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-09'),
(330218031803862, 'Joko Susilo', 'Laki-Laki', 'Mataram', '1981-12-04', 'RT 002 RW 001', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-10'),
(330218031803863, 'Retno Purnomo', 'Perempuan', 'Ambon', '1991-10-22', 'RT 001 RW 001', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-11'),
(330218031803864, 'Slamet Santoso', 'Laki-Laki', 'Pematangsiantar', '2005-05-11', 'RT 005 RW 001', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-12'),
(330218031803865, 'Sri Wahyuni', 'Perempuan', 'Palu', '1974-01-23', 'RT 004 RW 003', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-13'),
(330218031803866, 'Bambang Supriadi', 'Laki-Laki', 'Tanjungpinang', '1985-07-09', 'RT 002 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-14'),
(330218031803867, 'Dewi Kusumawati', 'Perempuan', 'Kendari', '1956-03-28', 'RT 005 RW 002', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-15'),
(330218031803868, 'Slamet Wahono', 'Laki-Laki', 'Palangkaraya', '2007-09-03', 'RT 005 RW 005', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-16'),
(330218031803869, 'Ani Rahayu', 'Perempuan', 'Gorontalo', '1963-04-16', 'RT 001 RW 003', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-17'),
(330218031803870, 'Surya Wijaya', 'Laki-Laki', 'Singkawang', '1978-11-02', 'RT 003 RW 003', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-18'),
(330218031803871, 'Lina Agustina', 'Perempuan', 'Bontang', '1994-02-09', 'RT 003 RW 002', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-19'),
(330218031803872, 'Joko Prasetyo', 'Laki-Laki', 'Tebingtinggi', '2008-05-26', 'RT 002 RW 002', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-20'),
(330218031803873, 'Ratna Sari', 'Perempuan', 'Dumai', '1983-12-13', 'RT 004 RW 002', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-21'),
(330218031803874, 'Budi Cahyono', 'Laki-Laki', 'Sorong', '1959-08-31', 'RT 004 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-22'),
(330218031803875, 'Wulan Sari', 'Perempuan', 'Palopo', '1990-04-19', 'RT 002 RW 005', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-23'),
(330218031803876, 'Fadhila Galih Maheswara', 'Laki-Laki', 'Jakarta', '2004-01-27', 'RT 001 RW 002', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-07-03'),
(330218031803877, 'Muthia Khanza', 'Perempuan', 'Surabaya', '1984-06-03', 'RT 002 RW 003', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-07-04'),
(330218031803878, 'Brian Cahya Purnama', 'Laki-Laki', 'Bandung', '1963-10-20', 'RT 001 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-07-05'),
(330218031803879, 'Ahmad Rian Syaifullah Ritonga', 'Perempuan', 'Medan', '1965-08-23', 'RT 001 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-07-06'),
(330218031803880, 'Ukhti nisa', 'Laki-Laki', 'Semarang', '2000-04-12', 'RT 004 RW 002', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-07-07'),
(330218031803881, 'Muhammad Ifan Sidiq Maulana ', 'Perempuan', 'Makassar', '1982-11-30', 'RT 003 RW 004', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-07-08'),
(330218031803882, 'Melyana Rizky Ramadhani ', 'Laki-Laki', 'Palembang', '1990-06-17', 'RT 005 RW 003', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-07-09'),
(330218031803883, 'Rifana Zulkhanisa', 'Perempuan', 'Tangerang', '1973-02-08', 'RT 002 RW 002', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-07-10'),
(330218031803884, 'Aura Devany Salsabila Bachtiar ', 'Laki-Laki', 'Depok', '2001-09-25', 'RT 002 RW 004', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-07-11'),
(330218031803885, 'Ageng Praba Wijaya', 'Perempuan', 'Bekasi', '1987-07-14', 'RT 005 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-07-12'),
(330218031803886, 'Luthfi Emillulfata ', 'Laki-Laki', 'Batam', '1960-12-03', 'RT 003 RW 002', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-07-13'),
(330218031803887, 'Hendra Latieful Maajid', 'Perempuan', 'Padang', '1975-10-21', 'RT 004 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-07-14'),
(330218031803888, 'Kintan Kinasih Mahaputri ', 'Laki-Laki', 'Bandar Lampung', '2002-03-19', 'RT 003 RW 003', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-08-15'),
(330218031803889, 'Nadhifa Zahra Kurniawan ', 'Perempuan', 'Denpasar', '1988-01-05', 'RT 002 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-08-16'),
(330218031803890, 'Regita Maulia Gani Nur Rahman', 'Laki-Laki', 'Malang', '1967-06-29', 'RT 001 RW 003', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-08-17'),
(330218031803891, 'Arya Galuh Saputra', 'Perempuan', 'Yogyakarta', '1971-09-11', 'RT 001 RW 002', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-08-18'),
(330218031803892, 'Zia Khusnul Fauzi Akhmad', 'Laki-Laki', 'Pekanbaru', '2003-04-27', 'RT 005 RW 004', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-08-19'),
(330218031803893, 'Yacobus Daeli', 'Perempuan', 'Samarinda', '1998-08-02', 'RT 004 RW 004', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-08-20'),
(330218031803894, 'Muhammad Syaiful Latif', 'Laki-Laki', 'Cirebon', '1963-11-15', 'RT 002 RW 001', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-08-21'),
(330218031803895, 'Anindya Diva Talitha', 'Perempuan', 'Balikpapan', '1979-05-07', 'RT 005 RW 002', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-09-22'),
(330218031803896, 'Sesa Ajeng Maesara ', 'Laki-Laki', 'Banjarmasin', '2004-02-24', 'RT 004 RW 001', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-09-23'),
(330218031803897, 'Fenny Dwi Veliana', 'Perempuan', 'Bogor', '1969-07-01', 'RT 003 RW 001', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-09-24'),
(330218031803898, 'Repo Wianata Barus', 'Laki-Laki', 'Serang', '1976-03-10', 'RT 001 RW 004', 'Hindu', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-09-25'),
(330218031803899, 'Bagus Wijoyoseno', 'Perempuan', 'Tasikmalaya', '1989-09-28', 'RT 003 RW 005', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-09-26'),
(330218031803900, 'Athifa Nathania', 'Laki-Laki', 'Pontianak', '2000-08-14', 'RT 001 RW 005', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-09-27'),
(330218031803901, 'Arindra Mahardika', 'Perempuan', 'Ambon', '1997-12-22', 'RT 001 RW 001', 'Kristen', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-09-28'),
(330218031803902, 'Solani', 'Laki-Laki', 'Manado', '1970-04-02', 'RT 004 RW 003', 'Buddha', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-09-29'),
(330218031803903, 'Dwita Isma Aprilia ', 'Perempuan', 'Mataram', '1962-01-18', 'RT 005 RW 001', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-09-30'),
(330218031803904, 'Kamila Fajar Pertiwi ', 'Laki-Laki', 'Kendari', '2001-10-08', 'RT 004 RW 001', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-01'),
(330218031803905, 'Amar Said', 'Perempuan', 'Palu', '1958-06-26', 'RT 005 RW 003', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-02'),
(330218031803906, 'Khansa Delphi Nareswari', 'Laki-Laki', 'Jambi', '1993-03-13', 'RT 004 RW 005', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-03'),
(330218031803907, 'Dila Saputra', 'Perempuan', 'Surakarta', '1966-11-04', 'RT 001 RW 005', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-03'),
(330218031803908, 'Abdul Aziz Fahmi Alauddin', 'Laki-Laki', 'Palangkaraya', '2002-01-31', 'RT 002 RW 003', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-04'),
(330218031803909, 'Fatur Sakti Arrafi', 'Perempuan', 'Singkawang', '1986-05-20', 'RT 005 RW 004', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-05'),
(330218031803910, 'Ivan Darmawan', 'Laki-Laki', 'Pematangsiantar', '1953-09-07', 'RT 001 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-06'),
(330218031803911, 'Dzakwan Irfan Ramdhani', 'Perempuan', 'Dumai', '1996-06-14', 'RT 004 RW 004', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-07'),
(330218031803912, 'Rayhan Aghnat ', 'Laki-Laki', 'Salatiga', '2006-02-25', 'RT 003 RW 004', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-08'),
(330218031803913, 'Destian Ardan Alfatanu', 'Perempuan', 'Mojokerto', '1977-08-15', 'RT 003 RW 001', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-09'),
(330218031803914, 'Mochamad Azizan ', 'Laki-Laki', 'Tegal', '1981-12-04', 'RT 002 RW 001', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-10'),
(330218031803915, 'Rizky Budi Saputra', 'Perempuan', 'Kupang', '1991-10-22', 'RT 001 RW 001', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-11'),
(330218031803916, 'Zaki Jamali Arafi', 'Laki-Laki', 'Binjai', '2005-05-11', 'RT 005 RW 001', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-12'),
(330218031803917, 'Calista Anindita ', 'Perempuan', 'Tanjungpinang', '1974-01-23', 'RT 004 RW 003', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-13'),
(330218031803918, 'Claresta Berthalita Jatmika', 'Laki-Laki', 'Magelang', '1985-07-09', 'RT 002 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-14'),
(330218031803919, 'Qurrota Ayun', 'Perempuan', 'Sorong', '1956-03-28', 'RT 005 RW 002', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-15'),
(330218031803920, 'Muhamad Galih', 'Laki-Laki', 'Batu', '2007-09-03', 'RT 005 RW 005', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-16'),
(330218031803921, 'Nicholas Hasian', 'Perempuan', 'Bukittinggi', '1963-04-16', 'RT 001 RW 003', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-17'),
(330218031803922, 'Adnan Fito Dharmawan', 'Laki-Laki', 'Jayapura', '1978-11-02', 'RT 003 RW 003', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-18'),
(330218031803923, 'Daniel Abdillah Arif', 'Perempuan', 'Payakumbuh', '1994-02-09', 'RT 003 RW 002', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-19'),
(330218031803924, 'Muhammad Rafi Attariq', 'Laki-Laki', 'Pekalongan', '2008-05-26', 'RT 002 RW 002', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-20'),
(330218031803925, 'Argo Iqbal Suranata', 'Perempuan', 'Pasuruan', '1983-12-13', 'RT 004 RW 002', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-21'),
(330218031803926, 'Nabilla Tsani Ayasi ', 'Laki-Laki', 'Tomohon', '1959-08-31', 'RT 004 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-22'),
(330218031803927, 'Muhammad Khadziq', 'Perempuan', 'Banjarbaru', '1990-04-19', 'RT 002 RW 005', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-23'),
(330218031803928, 'Imam Muzakki ', 'Laki-Laki', 'Langsa', '2004-01-27', 'RT 001 RW 002', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-07-03'),
(330218031803929, 'Luthfi Arie Zulfikri', 'Perempuan', 'Lubuklinggau', '1984-06-03', 'RT 002 RW 003', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-07-04'),
(330218031803930, 'Rifqi Alrasid ', 'Laki-Laki', 'Ternate', '1963-10-20', 'RT 001 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-07-05'),
(330218031803931, 'Achmad Aulia Difiputra ', 'Perempuan', 'Bitung', '1965-08-23', 'RT 001 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-07-06'),
(330218031803932, 'Amarramitha Poodja Thantawi', 'Laki-Laki', 'Metro', '2000-04-12', 'RT 004 RW 002', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-07-07'),
(330218031803933, 'Nailia Farah Isnaeni ', 'Perempuan', 'Palopo', '1982-11-30', 'RT 003 RW 004', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-07-08'),
(330218031803934, 'Tahta Setyo Nugroho ', 'Laki-Laki', 'Subulussalam', '1990-06-17', 'RT 005 RW 003', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-07-09'),
(330218031803935, 'Fawwaz Afkar Muzakky ', 'Perempuan', 'Pariaman', '1973-02-08', 'RT 002 RW 002', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-07-10'),
(330218031803936, 'Rassya Hafizh Suharjo', 'Laki-Laki', 'Sabang', '2001-09-25', 'RT 002 RW 004', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-07-11'),
(330218031803937, 'Rafli Hudanul Sidiq', 'Perempuan', 'Tebingtinggi', '1987-07-14', 'RT 005 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-07-12'),
(330218031803938, 'Hasna Mumtazah Khairunnisa', 'Laki-Laki', 'Bontang', '1960-12-03', 'RT 003 RW 002', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-07-13'),
(330218031803939, 'Jasmine Adzra Fakhirah ', 'Perempuan', 'Pangkalpinang', '1975-10-21', 'RT 004 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-07-14'),
(330218031803940, 'Ghaza Indra Pratama', 'Laki-Laki', 'Lubukpakam', '2002-03-19', 'RT 003 RW 003', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-08-15'),
(330218031803941, 'Rifqi Nur Fauzi', 'Perempuan', 'Tidore', '1988-01-05', 'RT 002 RW 005', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-08-16'),
(330218031803942, 'Gery Prayoga', 'Laki-Laki', 'Gunungsitoli', '1967-06-29', 'RT 001 RW 003', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-08-17'),
(330218031803943, 'Panky Bintang Pradana Yosua', 'Perempuan', 'Pangkalan Bun', '1971-09-11', 'RT 001 RW 002', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-08-18'),
(330218031803944, 'Mutia Nandhika', 'Laki-Laki', 'Sawahlunto', '2003-04-27', 'RT 005 RW 004', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-08-19'),
(330218031803945, 'Muhammad Iqbal Firmansyah', 'Perempuan', 'Tanjungbalai', '1998-08-02', 'RT 004 RW 004', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-08-20'),
(330218031803946, 'M Afnan Baihaqi', 'Laki-Laki', 'Langkat', '1963-11-15', 'RT 002 RW 001', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-08-21'),
(330218031803947, 'Adila Zahira Hasyati', 'Perempuan', 'Palopo', '1979-05-07', 'RT 005 RW 002', 'Islam', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-09-22'),
(330218031803948, 'Mochamad Gilang Fadil Hakim ', 'Laki-Laki', 'Pangkal Pinang', '2004-02-24', 'RT 004 RW 001', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-09-23'),
(330218031803949, 'Alfido Mazdan Marsyadi', 'Perempuan', 'Pariaman', '1969-07-01', 'RT 003 RW 001', 'Islam', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-09-24'),
(330218031803950, 'Yulio Putra Wardana', 'Laki-Laki', 'Salatiga', '1976-03-10', 'RT 001 RW 004', 'Hindu', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-09-25'),
(330218031803951, 'Khansa Khalda ', 'Perempuan', 'Samarinda', '1989-09-28', 'RT 003 RW 005', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-09-26'),
(330218031803952, 'Youvan Alfiz Farandi Putra Hermawan', 'Laki-Laki', 'Serang', '2000-08-14', 'RT 001 RW 005', 'Islam', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-09-27'),
(330218031803953, 'Desvania Tirta Izzati', 'Perempuan', 'Subulussalam', '1997-12-22', 'RT 001 RW 001', 'Kristen', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-09-28'),
(330218031803954, 'Endini Nurlaily', 'Laki-Laki', 'Sungaipenuh', '1970-04-02', 'RT 004 RW 003', 'Buddha', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-09-29'),
(330218031803955, 'Azzam Dicky Umar Widadi ', 'Perempuan', 'Surakarta', '1962-01-18', 'RT 005 RW 001', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-09-30'),
(330218031803956, 'Rizqullah Abiyyu Hade', 'Laki-Laki', 'Tangerang', '2001-10-08', 'RT 004 RW 001', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-01'),
(330218031803957, 'Rasyad Dhawiabyaz', 'Perempuan', 'Purbalingga', '1958-06-26', 'RT 005 RW 003', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-02'),
(330218031803958, 'Dea Afni Azizah', 'Laki-Laki', 'Tanjungpinang', '1993-03-13', 'RT 004 RW 005', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-03'),
(330218031803959, 'Maulana Syams Wibowo', 'Perempuan', 'Purwodadi', '1966-11-04', 'RT 001 RW 005', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-03'),
(330218031803960, 'Afiftha Ravi Aufa Yubiharto ', 'Laki-Laki', 'Tasikmalaya', '2002-01-31', 'RT 002 RW 003', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-04'),
(330218031803961, 'Syifa Rahmadani Hemi Syafitri', 'Perempuan', 'Tebingtinggi', '1986-05-20', 'RT 005 RW 004', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-05'),
(330218031803962, 'Hamas Izzuddin Fathi', 'Laki-Laki', 'Tegal', '1953-09-07', 'RT 001 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-06'),
(330218031803963, 'Abhirama Rizqi Pratama ', 'Perempuan', 'Ternate', '1996-06-14', 'RT 004 RW 004', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-07'),
(330218031803964, 'Dharma Adhi Prabandaru', 'Laki-Laki', 'Tidore', '2006-02-25', 'RT 003 RW 004', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-08'),
(330218031803965, 'Muhammad Levi Asshidiqi', 'Perempuan', 'Tomohon', '1977-08-15', 'RT 003 RW 001', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-09'),
(330218031803966, 'Muhammad Sultan Alhakim', 'Laki-Laki', 'Tual', '1981-12-04', 'RT 002 RW 001', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-10'),
(330218031803967, 'Panji Bagaskara', 'Perempuan', 'Ungaran', '1991-10-22', 'RT 001 RW 001', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-11'),
(330218031803968, 'Wike Laelatunuji', 'Laki-Laki', 'Waingapu', '2005-05-11', 'RT 005 RW 001', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-12'),
(330218031803969, 'Nabila Winanda Meirani', 'Perempuan', 'Watampone', '1974-01-23', 'RT 004 RW 003', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-13'),
(330218031803970, 'Salman Thufail', 'Laki-Laki', 'Wates', '1985-07-09', 'RT 002 RW 004', 'Islam', 'Kawin', 'Kepala Keluarga', 'Bekerja', 'Wafat', '2023-10-14'),
(330218031803971, 'Surya Pramudya Ananta ', 'Perempuan', 'Wonosobo', '1956-03-28', 'RT 005 RW 002', 'Katolik', 'Kawin', 'Anggota Keluarga', 'Bekerja', 'Hidup', '2023-10-15'),
(330218031803972, 'Reyno Alfarez Marchelian', 'Laki-Laki', 'Maumere', '2007-09-03', 'RT 005 RW 005', 'Hindu', 'Belum Kawin', '', 'Pelajar/Mahasiswa', 'Hidup', '2023-10-16'),
(330218031803973, 'Muhammad Lucky Rahman', 'Perempuan', 'Nganjuk', '1963-04-16', 'RT 001 RW 003', 'Konghuchu', 'Kawin', 'Anggota Keluarga', 'Belum/Tidak Bekerja', 'Wafat', '2023-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `pengaduanID` int NOT NULL,
  `nik` bigint NOT NULL,
  `pesan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`pengaduanID`, `nik`, `pesan`) VALUES
(22, 330218031803824, '<p>test</p>'),
(23, 330218031803824, '<p>test kedua</p>'),
(24, 330218031803836, '<p>test ketiga</p>'),
(25, 330218031803824, '<p>dsasd</p>'),
(26, 330218031803944, '<p>Dalam rangka agustusan saya tidak diajak.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `penggunaID` int NOT NULL,
  `username` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pengguna` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`penggunaID`, `username`, `nama_pengguna`, `email`, `password`, `role`, `jabatan`, `avatar`) VALUES
(1, 'rosikin', 'Rosikin Supardi', 'rosikin@gmail.com', 'rosikin123', 'Admin', 'Kepala Desa', '1701044644_rosi.jpg'),
(2, 'indriyati', 'Indriyati Suwidah R', 'indriyati@gmail.com', 'indri123', 'Admin', 'Sekretaris', '1700876767_indriyati.jpg'),
(3, 'mariadi', 'Mariadi Slamet', 'mar@gmail.com', 'mari', 'Petugas', 'Kepala Dusun', '1700886839_MARIADI.jpg'),
(5, 'andi', 'Andiono', 'andiono@gmail.com', 'andi123', 'Petugas', 'Kepala Dusun', '1701070830_d8a5fe22d03f141fc8b7e81822c67a18.jpg'),
(6, 'fendi', 'Fendi Salim', 'fendi@gmail.com', 'fendi123', 'Admin', 'Kasi Pemerintahan', '1701070841_87ag0N_WhatsApp+Image+2021-02-15+at+11.20.55.jpeg'),
(7, 'agus', 'Agus Burdiyanto', 'agus@gmail.com', 'agus123', 'Petugas', 'Kasi Kesejahteraan', '1701070853_pejabat-pajak-rafael-alun-trisambodo-1_169.jpeg'),
(8, 'gunawan', 'Gunawan Wibisono', 'gunawan@gmail.com', 'gunawan123', 'Admin', 'Kasi Pelayanan', '1701070939_EH4d4-LUEAEmZDs.jpg'),
(9, 'puji', 'Pujiyanto', 'pujiyanto@gmail.com', 'puji123', 'Petugas', 'Kepala Dusun', '1701070947_1438497-1000xauto-potret-lawas-abdul-rozak-pns.jpg'),
(10, 'rizal', 'Rizal Ardianto', 'rizal@gmail.com', 'rizal123', 'Admin', 'Kaur Keuangan', '1701071090_IMG-20221004-WA0015.jpg'),
(11, 'sulaeman', 'Sulaeman', 'sulaeman@gmail.com', 'sula123', 'Petugas', 'Kaur Perencanaan', '1701071100_20131104094554@34.jfif'),
(12, 'akhmad', 'Akhmad Rifai', 'akhmad@gmail.com', 'akhmad123', 'Admin', 'Kepala Dusun', '1701071116_images.jfif'),
(13, 'levi', 'Levi Ackerman', 'levi@gmail.com', 'levi123', 'Petugas', 'Kepala Dusun', '1701071215_13236283_1317018051645674_378171881_n.png(FILEminimizer).jpg'),
(14, 'annisa', 'Annisa Azkiya', 'annisa@gmail.com', 'annisa123', 'Admin', 'Kepala Dusun', '1701071224_ARDI-SUSANTI-S.PD_.-IMG_0241-300x400.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`beritaID`),
  ADD KEY `penggunaID` (`penggunaID`);

--
-- Indexes for table `daftar_pelayanan`
--
ALTER TABLE `daftar_pelayanan`
  ADD PRIMARY KEY (`pelayananID`,`nik`),
  ADD KEY `pelayananID` (`pelayananID`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`dokumentasiID`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`informasiID`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`pelayananID`),
  ADD KEY `penggunaID` (`penggunaID`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`pengaduanID`),
  ADD KEY `pengaduan_ibfk_1` (`nik`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`penggunaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `beritaID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `dokumentasiID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `informasiID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `pelayananID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `pengaduanID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `penggunaID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`penggunaID`) REFERENCES `pengguna` (`penggunaID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD CONSTRAINT `pelayanan_ibfk_1` FOREIGN KEY (`penggunaID`) REFERENCES `pengguna` (`penggunaID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `penduduk` (`nik`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
