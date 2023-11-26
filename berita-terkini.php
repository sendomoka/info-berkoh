<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Terkini</title>
    <style>
        body,
        html {
            background-color: #3E5670;
            margin: 0;
            padding: 0;
        }

        body{
          overflow-x: hidden;
        }

        .Berita {
            width: 100%;
            height: 100%;
            position: relative;
            background: #3E5670;
        }

        /* Add your other styles here */

        @media only screen and (max-width: 1366px) {
            .Berita {
                font-size: 18px;
            }

            /* Add your responsive styles here */

            .section-heading {
                font-size: 30px;
            }

            .info-berkoh,
            .integrasi,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            .follow,
            .address,
            .hubungi-kami,
            .website,
            .telepon,
            .email,
            .copyright,
            .read-more,
            .news-date,
            .event-title,
            .news-body,
            .event-description,
            .read-more-news,
            .read-more-event,
            .contact-info,
            .news-meta,
            .event-meta {
                font-size: 16px;
                line-height: 24px;
            }

            .footer {
                padding: 15px;
            }
        }

    </style>
</head>

<body>
<?php include 'components/header.php'; ?>
<div class="Berita" style="width: 100%; height: 100%; position: relative; background: #3E5670">
    <div class="Logo" style="width: 272px; left: 53px; top: 46px; position: absolute; justify-content: flex-start; align-items: center; gap: 24px; display: inline-flex">
        <img class="Logo" style="width: 46.10px; height: 60px" src="https://s3-alpha-sig.figma.com/img/61d1/2d5f/8f8a38b5fb576bbd8441a5f750b3657e?Expires=1701648000&Signature=n05Ryli3HA0nozm9WCgRAjl8XL640BRwPENnH7-OeIHJl9TWZaGCinsxXYK2f~T89plRg~Ak2UXrum38Lni860Sz8OlUNDOuRgALBRjx06zI5TcFo1FWLzrRq989RZu-jAd39SCK9TXsCWuu3zVqHSRbU3dSpa3KY2pzqnd3n~yzP6jkHI0RepSVVYJX8dbgrLhPAiOzLiHxHn-7CDyJFS969x-3FinDSA1TXhRyXGxmNwq6dJHwAB60ICaqz4qGl0TvT~yd-AHlv9pZxs6u7vT-wAwxlfaSpPMEahTRDgOIsc4zQs78nJuzL4p-14m1loniNSqWRcL7X2rQJ2Gn1Q__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" />
        <div class="Frame4" style="flex-direction: column; justify-content: flex-start; align-items: center; gap: 8px; display: inline-flex">
            <div class="InfoBerkoh" style="color: #F5F5F5; font-size: 28px; font-family: Plus Jakarta Sans; font-weight: 600; line-height: 40px; word-wrap: break-word">INFO BERKOH</div>
            <div class="IntegrasiNavigasiDanFaktaOnlineDesaBerkoh" style="color: #F5F5F5; font-size: 8.20px; font-family: Plus Jakarta Sans; font-weight: 700; line-height: 20px; word-wrap: break-word">Integrasi Navigasi dan Fakta Online Desa Berkoh</div>
        </div>
    </div>
    <div class="Beranda" style="left: 389px; top: 69px; position: absolute; color: #F5F5F5; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 48px; word-wrap: break-word">Beranda</div>
    <div class="DataPenduduk" style="left: 516px; top: 69px; position: absolute; color: #F5F5F5; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 48px; word-wrap: break-word">Data Penduduk</div>
    <div class="Berita" style="left: 705px; top: 69px; position: absolute; color: #F5F5F5; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 700; line-height: 48px; word-wrap: break-word">Berita</div>
    <div class="Pengaduan" style="left: 806px; top: 69px; position: absolute; color: #F5F5F5; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 48px; word-wrap: break-word">Pengaduan</div>
    <div class="PelayananPublik" style="left: 959px; top: 69px; position: absolute; color: #F5F5F5; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 48px; word-wrap: break-word">Pelayanan Publik</div>
    <div class="BeritaTerakhir" style="width: 174px; height: 20px; left: 45px; top: 702px; position: absolute; color: #F5F5F5; font-size: 25px; font-family: Plus Jakarta Sans; font-weight: 700; line-height: 48px; word-wrap: break-word">Berita Terakhir</div>
    <div class="LihatSemua" style="left: 1000px; top: 702px; position: absolute; color: #F5F5F5; font-size: 25px; font-family: Plus Jakarta Sans; font-weight: 700; line-height: 48px; word-wrap: break-word">Lihat Semua </div>
    <div class="BeritaKegiatanDesaBerkoh" style="width: 637px; height: 12px; left: 350px; top: 165px; position: absolute; text-align: center; color: #F5F5F5; font-size: 40px; font-family: Plus Jakarta Sans; font-weight: 700; line-height: 48px; word-wrap: break-word">Berita Kegiatan Desa Berkoh</div>
    <div class="Vector" style="width: 25.88px; height: 22.50px; left: 1150px; top: 715px; position: absolute; background: #F5F5F5"></div>
    <div class="Rectangle18" style="width: 290px; height: 348px; left: 640px; top: 781px; position: absolute; background: #F5F5F5; border-radius: 30px; border: 1px #468662 solid"></div>
    <div class="Rectangle18" style="width: 290px; height: 348px; left: 950px; top: 781px; position: absolute; background: #F5F5F5; border-radius: 30px; border: 1px #468662 solid"></div>
    
    <img class="Rectangle55" style="width: 191px; height: 119px; left: 660px; top: 798px; position: absolute; border-radius: 10px" src="https://s3-alpha-sig.figma.com/img/48b2/94f1/24754a86bd1ac6d6bcb32cbc4c90f984?Expires=1701648000&Signature=chKczUlAPd9ko55ToNj9UPIlQIWDS07Qt2W38n~T9XAWroEvEkkCuKdO--0H54398-bBaFFH1MeJ9YNZ72YeuP-d9EWhonA48~a4V6hActXnYb8CoU7GQJ~UUGmZu5vly0QORhQqA0BkDJT8Woo20fRFd1gblqGxk8DCsAFOCV6G5g5xihfy9wjrFprZ24S-4xjX5e1VU2LDhnXazsrgOcr68DvSQVUiY1aZameaWLnLz6jjcf~l6LEg-nupgXMuwTTwRZIWqPY5NxAUkznEoHfJkbr9kANOo1zjLu8H~d-D2Nsp335sySvCPeOsVZzMD2PTYQ~5etSumF4eG6e1EQ__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" />
    <div class="Juni2023" style="left: 660px; top: 929px; position: absolute; color: #3E5670; font-size: 15px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 30px; word-wrap: break-word">5 Juni 2023</div>
    <div class="BantuanSosialMembantuKeluargaKurangMampu" style="width: 300px; left: 660px; top: 949px; position: absolute; color: #3E5670; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 700; word-wrap: break-word">Bantuan Sosial Membantu Keluarga Kurang Mampu</div>
    <div class="ProgramBansosDiDesaBerkohTerusMemberikanBantuanKepadaKeluargaKeluargaYangMembutuhkanBantuanIniTermasukPaketSembakoDanDukunganFinansialKepadaKeluarga" style="width: 250px; left: 660px; top: 996px; position: absolute; text-align: justify; color: #3E5670; font-size: 15px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 15px; word-wrap: break-word">Program Bansos di Desa Berkoh terus memberikan bantuan kepada keluarga-keluarga yang membutuhkan. Bantuan ini termasuk paket sembako dan dukungan finansial kepada keluarga...</div>
    <div class="Selengkapnya" style="left: 660px; top: 1079px; position: absolute; text-align: justify; color: #3E5670; font-size: 17px; font-family: Plus Jakarta Sans; font-weight: 700; word-wrap: break-word">Selengkapnya</div>
    <div class="Rectangle18" style="width: 290px; height: 348px; left: 20px; top: 781px; position: absolute; background: #F5F5F5; border-radius: 30px; border: 1px #468662 solid"></div>
    
    <img class="Rectangle49" style="width: 191px; height: 119px; left: 45px; top: 818px; position: absolute; border-radius: 10px" src="https://s3-alpha-sig.figma.com/img/9ea4/9546/5dd34d7a64848050f38d5ca0abe2dc9e?Expires=1701648000&Signature=qFXq5Lnj5qhS616jIPBqCTtav1TqDpmer5dne3aH5HG2vJ~ZymH~mrp~EX-66~C6tpjhY~tuyAK79i0urfUL9WjA4gWpn-o4r7k0FUy~I4fu16g-YJGjBus-i8C29KYzEMo4nUwfTKV4I~5rE7MsbNPC-7A6ieAV~WVv7LDIbPmTNeZTH2Qjmokei~H8ahWs3ygUByYbrAsLibv8UVQfVLtHl1bhrilHRZv2cNBVwZQ3EonEvnV6Ju3iXA1VlM~rt9B~GIuXTfFiF71iOTDZP2ZwJcZKyfcJuUyx-yS~2Hp5qd5x9nNwl66fLSud7kSqrgb6L2C17LmIEa5q2NLJSA__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" />
    <div class="Agustus2023" style="left: 45px; top: 949px; position: absolute; color: #3E5670; font-size: 13px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 30px; word-wrap: break-word">19 Agustus 2023</div>
    <div class="OpenRecuitmentPanitiaPemilu" style="left: 45px; top: 971px; position: absolute; color: #3E5670; font-size: 18px; font-family: Plus Jakarta Sans; font-weight: 700; word-wrap: break-word">Open Recuitment Panitia Pemilu</div>
    <div class="DalamRangkaMensukseskanAcaraHistorisIniDenganIniMengumumkanPembukaanRekrutmenUntukIndividuYangBerkomitmenUntukTurutSertaDalamPenyelenggaraan" style="width: 250px; left: 45px; top: 996px; position: absolute; text-align: justify; color: #3E5670; font-size: 15px; font-family: Plus Jakarta Sans; font-weight: 200; line-height: 15px; word-wrap: break-word">Dalam rangka mensukseskan acara historis ini, dengan ini mengumumkan pembukaan rekrutmen untuk individu yang berkomitmen untuk turut serta dalam penyelenggaraan...</div>
    <div class="Selengkapnya" style="left: 45px; top: 1079px; position: absolute; text-align: justify; color: #3E5670; font-size: 17px; font-family: Plus Jakarta Sans; font-weight: 700; word-wrap: break-word">Selengkapnya</div>
    <div class="Selengkapnya" style="left: 970px; top: 1079px; position: absolute; text-align: justify; color: #3E5670; font-size: 17px; font-family: Plus Jakarta Sans; font-weight: 700; word-wrap: break-word">Selengkapnya</div>
    <img class="Rectangle50" style="width: 191px; height: 119px; left: 970px; top: 792px; position: absolute; border-radius: 10px" src="https://s3-alpha-sig.figma.com/img/d59a/0733/4969bd361243e0726986c12802bb4d79?Expires=1701648000&Signature=PoVhq8J7HPf3LjA77hgjboCLdmhifvpvPmWuCnJNgt2fVB2v9GemPoxsjqYnNpZ8istwdA6OGe5NCizWuMEsHC2x6Ix0NEI8HREFriy9BfWQzP~zxFSNeys8VvE1mGKZxsEEvor~-AEeMwVBsfxLhX-ZXjcgTskrzQ3vOEN6gOGxoeytzKhO8x5n1yXm2S7sn8660nroEZmoFL1M3YrQJ5fKAqeqR1vbnLYgouETrB9v0D6WNe5CqywlVLGeYGcpVTqZYU9l0F4rm~v3Nd-ROWD0rSoKNPjNPF6thhA3AO9nOZe5cxl9TL~o7CJVZqX0L3~THMa2dE8klTnW03NzFg__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" />
    <div class="Agustus2023" style="left: 970px; top: 923px; position: absolute; color: #3E5670; font-size: 15px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 30px; word-wrap: break-word">1 Agustus 2023</div>
    <div class="PosyanduSehatBersamaMelayaniAnakAnakDesaBerkoh" style="width: 290px; left: 970px; top: 943px; position: absolute; color: #3E5670; font-size: 18px; font-family: Plus Jakarta Sans; font-weight: 700; word-wrap: break-word">Posyandu "Sehat Bersama" Melayani Anak-anak Desa Berkoh</div>
    <div class="DalamKunjunganTerbaruPosyanduMenyelenggarakanProgramPemeriksaanKesehatanRutinDanPenimbanganUntukMemastikanTumbuhKembangAnakAnakBerlangsung" style="width: 250px; left: 970px; top: 996px; position: absolute; text-align: justify; color: #3E5670; font-size: 15px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 15px; word-wrap: break-word">Dalam kunjungan terbaru, posyandu menyelenggarakan program pemeriksaan kesehatan rutin dan penimbangan untuk memastikan tumbuh kembang anak-anak berlangsung....</div>
    <div class="Rectangle18" style="width: 290px; height: 348px; left: 330px; top: 781px; position: absolute; background: #F5F5F5; border-radius: 30px; border: 1px #468662 solid"></div>
    
    <div class="Selengkapnya" style="left: 350px; top: 1079px; position: absolute; text-align: justify; color: #3E5670; font-size: 17px; font-family: Plus Jakarta Sans; font-weight: 700; word-wrap: break-word">Selengkapnya</div>
    <img class="Rectangle51" style="width: 191px; height: 119px; left: 350px; top: 798px; position: absolute; border-radius: 10px" src="https://s3-alpha-sig.figma.com/img/e2c4/2ec3/d6d70b7731497e2980b6150d68fb6fa6?Expires=1701648000&Signature=PmHIZbZcArhdPW-P26OFuZkvKEopRVKaQ6WatPXt0EgBhv5mIIFaCAP5V~QGy8fVmoz1mjvFdW8jMGrByoaSbNTbg3oryoAW4jkxXlmp5sRocT5RiPOGWbPBNh3lKh8ZLBuje4c3NRg-eBxX-X20~GJSFdxt4O8TEy8c~bS0tLcvuIBS8sm33G9kv3mN8zerE4dYQtemZWF8xNvY2S~pSEnYImHQgWyV2gu6r2A49~4BYp2KGsNbpcQ-G6DW6HYH-Y9psev8EnCW9zfK1fn9xISJX7dGiI38sRHnffdYwvjWvFUDQpR2-Pr45sbcxkgvfPknjJ8D2dIhVizwa1X~sg__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" />
    <div class="Juli2023" style="left: 350px; top: 929px; position: absolute; color: #3E5670; font-size: 15px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 30px; word-wrap: break-word">15 Juli 2023</div>
    <div class="IbuPkkBerkohMengadakanPelatihanKewirausahaan" style="width: 350px; left: 350px; top: 949px; position: absolute; color: #3E5670; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 700; word-wrap: break-word">Ibu PKK Berkoh Mengadakan Pelatihan Kewirausahaan</div>
    <div class="KelompokIbuPkkDesaBerkohTidakHanyaAktifDalamKegiatanSosialTetapiJugaDalamPemberdayaanEkonomiMerekaBaruBaruIniMengadakanPelatihanKewirausahaanUntuk" style="width: 260px; left: 350px; top: 996px; position: absolute; text-align: justify; color: #3E5670; font-size: 15px; font-family: Plus Jakarta Sans; font-weight: 400; line-height: 15px; word-wrap: break-word">Kelompok Ibu PKK Desa Berkoh tidak hanya aktif dalam kegiatan sosial tetapi juga dalam pemberdayaan ekonomi. Mereka baru-baru ini mengadakan pelatihan kewirausahaan untuk...</div>
    <div class="Rectangle59" style="width: 1100px; height: 421px; left: 80px; top: 238px; position: absolute; background: #F5F5F5; border-radius: 20px; border: 1px #468662 solid"></div>
    <img class="Rectangle54" style="width: 530px; height: 350px; left: 120px; top: 274px; position: absolute; border-radius: 10px" src="https://s3-alpha-sig.figma.com/img/e761/b9f3/a3b032c81432923ef5feb854bc79ca0b?Expires=1701648000&Signature=PuDg1pSgqDUjNM0ZiVPNcgDqn4b-NXMbIM8VvGw5gDvDauIrUf98ZIdzM70u5SRyVX8z0aKwse9AXB4a5MC9f-AmP358OVdDYU-6A4Ym~WWHrJayh7xEn-wIW6WTO54c1Wf6QopU3yjcUPAMBoDGXMODSbwupUc~k099xDfVpZemSNnpHfvXBqeMzbKjaB58SxTm9Olf4rCRxjlPdlfDsTiuLA2xRnVaNPBzk35FKyVDVujTvrteReEWGaK1FAz7xz~OWeelcfdN8VOL8lsn97Qyz4vGAS3sNxJrOknTBTpLD9DewRLBVYR-gG-GWgjje2jeKWsuuIqbMA~9WXlziQ__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" />
    <div class="SuksesProgramImunisasiMasyarakatDesaBerkoh" style="width: 650px; left: 700px; top: 285px; position: absolute; color: #3E5670; font-size: 40px; font-family: Plus Jakarta Sans; font-weight: 700; line-height: 48px; word-wrap: break-word">Sukses! Program Imunisasi Masyarakat Desa Berkoh</div>
    <div class="DesaBerkoh20Juli2023ProgramImunisasiDiDesaBerkohMencapaiKesuksesanBesarDenganMelibatkanBanyakWargaImunisasiAdalahLangkahPentingDalamMenjagaKesehatanDanMencegahPenyakitMenularDalamProgramIniBanyakAnakDanOrangDewasaMenerimaVaksinasiYangPentingUntukMelindungiDiriDanKomunitasIniAdalahContohPartisipasiAktifMasyarakatDalamUpayaKesehatanBersama" style="width: 450px; left: 700px; top: 386px; position: absolute; text-align: justify; color: #3E5670; font-size: 22px; font-family: Plus Jakarta Sans; font-weight: 400; word-wrap: break-word">Desa Berkoh, 20 Juli 2023 - Program imunisasi di Desa Berkoh mencapai kesuksesan besar dengan melibatkan banyak warga. Imunisasi adalah langkah penting dalam menjaga kesehatan dan mencegah penyakit menular. Dalam program ini, banyak anak dan orang dewasa menerima vaksinasi yang penting untuk melindungi diri dan komunitas. Ini adalah contoh partisipasi aktif masyarakat dalam upaya kesehatan bersama.</div>
    <div class="Group35" style="width: 1920px; height: 499px; left: 0px; top: 1227px; position: absolute">
        <div class="Rectangle11" style="width: 1920px; height: 499px; left: 0px; top: 0px; position: absolute; background: #468662"></div>
        <div class="Follow" style="left: 1000px; top: 54px; position: absolute; color: #F5F5F5; font-size: 28px; font-family: Plus Jakarta Sans; font-weight: 700; line-height: 48px; word-wrap: break-word">Follow</div>
        <div class="JlGerilyaTimurNo26SokabaruBerkohKecPurwokertoSelKabupatenBanyumasJawaTengah53146" style="width: 332px; left: 600px; top: 120px; position: absolute; color: #F5F5F5; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 400; word-wrap: break-word">Jl. Gerilya Timur No.26, Sokabaru, Berkoh, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53146</div>
        <div class="HubungiKami" style="left: 600px; top: 54px; position: absolute; color: #F5F5F5; font-size: 28px; font-family: Plus Jakarta Sans; font-weight: 700; line-height: 48px; word-wrap: break-word">Hubungi Kami</div>
        <div class="Logo" style="width: 272px; height: 60px; left: 76px; top: 58px; position: absolute; justify-content: flex-start; align-items: center; gap: 24px; display: inline-flex">
            <img class="Logo" style="width: 46.10px; height: 60px" src="https://s3-alpha-sig.figma.com/img/61d1/2d5f/8f8a38b5fb576bbd8441a5f750b3657e?Expires=1701648000&Signature=n05Ryli3HA0nozm9WCgRAjl8XL640BRwPENnH7-OeIHJl9TWZaGCinsxXYK2f~T89plRg~Ak2UXrum38Lni860Sz8OlUNDOuRgALBRjx06zI5TcFo1FWLzrRq989RZu-jAd39SCK9TXsCWuu3zVqHSRbU3dSpa3KY2pzqnd3n~yzP6jkHI0RepSVVYJX8dbgrLhPAiOzLiHxHn-7CDyJFS969x-3FinDSA1TXhRyXGxmNwq6dJHwAB60ICaqz4qGl0TvT~yd-AHlv9pZxs6u7vT-wAwxlfaSpPMEahTRDgOIsc4zQs78nJuzL4p-14m1loniNSqWRcL7X2rQJ2Gn1Q__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" />
            <div class="Frame4" style="flex-direction: column; justify-content: flex-start; align-items: center; gap: 8px; display: inline-flex">
                <div class="InfoBerkoh" style="color: #F5F5F5; font-size: 28px; font-family: Plus Jakarta Sans; font-weight: 600; line-height: 20px; word-wrap: break-word">INFO BERKOH</div>
                <div class="IntegrasiNavigasiDanFaktaOnlineDesaBerkoh" style="color: #F5F5F5; font-size: 8.20px; font-family: Plus Jakarta Sans; font-weight: 700; line-height: 20px; word-wrap: break-word">Integrasi Navigasi dan Fakta Online Desa Berkoh</div>
            </div>
        </div>
        <div class="WebsiteResmiPemerintahDesaBerkohKecamatanPurwokertoSelatanKabupatenBanyumas" style="width: 476px; left: 76px; top: 142px; position: absolute; color: #F5F5F5; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 500; word-wrap: break-word">Website Resmi Pemerintah Desa Berkoh, Kecamatan Purwokerto Selatan, Kabupaten Banyumas</div>
        <div class="Group23" style="width: 292px; height: 37px; left: 852px; top: 242px; position: absolute">
            <div class="TeleponFax0281633014" style="left: -200px; top: 10px; position: absolute; color: #F5F5F5; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 400; word-wrap: break-word">Telepon/Fax: 0281633014</div>
            <div class="PhPhoneBold" style="width: 37px; height: 37px; left: 0px; top: 0px; position: absolute">
                <div class="Vector" style="width: 30.06px; height: 30.06px; left: -250px; top: 2.89px; position: absolute; background: #F5F5F5"></div>
            </div>
        </div>
        <div class="Group24" style="width: 400px; height: 37px; left: 852px; top: 296px; position: absolute">
            <div class="EmailBerkohBanyumasGmailCom" style="left: -200px; top: 11px; position: absolute; color: #F5F5F5; font-size: 20px; font-family: Plus Jakarta Sans; font-weight: 400; word-wrap: break-word">Email: berkoh.banyumas@gmail.com</div>
            <div class="IcOutlineEmail" style="width: 37px; height: 37px; left: 0px; top: 0px; position: absolute">
                <div class="Vector" style="width: 30.83px; height: 24.67px; left: -250px; top: 6.17px; position: absolute; background: #F5F5F5"></div>
            </div>
        </div>
        <div class="Rectangle17" style="width: 1920px; height: 98px; left: 0px; top: 401px; position: absolute; background: #F5F5F5"></div>
        <div class="2023InfoBerkoh" style="left: 85px; top: 440px; position: absolute; color: #080C11; font-size: 25px; font-family: Plus Jakarta Sans; font-weight: 500; line-height: 40px; word-wrap: break-word">© 2023, INFO BERKOH</div>
        <div class="MdiInstagram" style="width: 30px; height: 30px; left: 1000px; top: 99px; position: absolute">
            <div class="Vector" style="width: 25px; height: 25px; left: 2.50px; top: 2.50px; position: absolute; background: #F5F5F5">
        <img src='../../assets/images/mdi_instagram.svg'>
        </div>
        </div>
        <div class="IcBaselineFacebook" style="width: 30px; height: 30px; left: 1050px; top: 99px; position: absolute">
            <div class="Vector" style="width: 25px; height: 24.94px; left: 2.50px; top: 2.50px; position: absolute; background: #F5F5F5"></div>
        </div>
        <div class="MdiTwitter" style="width: 30px; height: 30px; left: 1100px; top: 99px; position: absolute">
            <div class="Vector" style="width: 26.15px; height: 21.25px; left: 1.92px; top: 5px; position: absolute; background: #F5F5F5"></div>
        </div>
        <div class="MdiLinkedin" style="width: 30px; height: 30px; left: 1150px; top: 102px; position: absolute">
            <div class="Vector" style="width: 22.50px; height: 22.50px; left: 3.75px; top: 3.75px; position: absolute; background: #F5F5F5"></div>
        </div>
    </div>
</div>
<?php include 'components/footer.php'; ?>
</body>

</html>