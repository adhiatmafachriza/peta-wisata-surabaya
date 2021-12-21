-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2021 pada 05.55
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas-sig`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `objek_wisata`
--

CREATE TABLE `objek_wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `lokasi` point NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `objek_wisata`
--

INSERT INTO `objek_wisata` (`id`, `nama`, `alamat`, `kategori`, `lokasi`) VALUES
(1, 'Taman Bungkul', 'Jl. Taman Bungkul, Darmo, Kec. Wonokromo, Kota SBY, Jawa Timur 60241', 'taman', 0x000000000101000000940f8dc7562f5c40ef6532b0682a1dc0),
(2, 'Monumen Kapal Selam', 'Jl. Pemuda No.39, Embong Kaliasin, Kec. Genteng, Kota SBY, Jawa Timur 60271', 'museum', 0x0000000001010000008d4acf4305305c40d59cf6f78f0d1dc0),
(3, 'Kenjeran Park', 'PQXW+3MP, Sukolilo Baru, Bulak, Surabaya City, East Java 60122', 'taman', 0x0000000001010000002a016f9cfa325c4001e772b1da001dc0),
(4, 'Taman Flora', 'Jl. Bratang Binangun, Baratajaya, Kec. Gubeng, Kota SBY, Jawa Timur 60284', 'taman', 0x0000000001010000009428e615bd305c403f98b060592b1dc0),
(5, 'Sunan Ampel', 'Jl. Nyamplungan, Ampel, Kec. Semampir, Kota SBY, Jawa Timur 60151', 'religi', 0x000000000101000000fd762461a42f5c40d8095ee1a1eb1cc0),
(6, 'Makam Sunan Bungkul', 'Taman Bungkul St, Darmo, Wonokromo, Surabaya City, East Java 60291', 'religi', 0x0000000001010000009c68912f532f5c402092ac4725281dc0),
(7, 'Ciputra World', 'Jl. Mayjen Sungkono No.89, Gn. Sari, Kec. Dukuhpakis, Kota SBY, Jawa Timur 60224', 'mall', 0x0000000001010000000c044a44092e5c40319aace4b82b1dc0),
(8, 'Lenmarc Mall', 'Jl. Mayjen Yono Suwoyo No.9, Pradahkalikendal, Kec. Dukuhpakis, Kota SBY, Jawa Timur 60226', 'mall', 0x0000000001010000006db0ca30942b5c4059bf01bfe2231dc0),
(9, 'Pakuwon Mall', 'Jl. Mayjen Yono Suwoyo No.2, Babatan, Kec. Wiyung, Kota SBY, Jawa Timur 60227', 'mall', 0x000000000101000000f2680baa3e2b5c40058fa3a996271dc0),
(10, 'Masjid Agung Al-Akbar', 'Jl. Mesjid Agung Tim. No.1, Pagesangan, Kec. Jambangan, Kota SBY, Jawa Timur 60274', 'religi', 0x0000000001010000008ddaaadace2d5c4074eaca38cf521dc0),
(11, 'Graha Fairground', 'Jl. Bukit Darmo Boulevard No.40, Babatan, Kec. Wiyung, Kota SBY, Jawa Timur 60213', 'kuliner', 0x000000000101000000f5e6afdb432b5c4022a2ffe6912f1dc0),
(12, 'The Loop Graha Famili', 'Jl. Mayjen Yono Suwoyo, Pradahkalikendal, Kec. Dukuhpakis, Kota SBY, Jawa Timur 60227', 'kuliner', 0x00000000010100000011e9af94472b5c40bbc4eff9e32b1dc0),
(13, 'G-Walk', 'G Walk Citraland, Ruko Taman Gapura, Jl. Niaga Gapura No.14, Lidah Kulon, Lakarsantri, Surabaya City, East Java 60217', 'kuliner', 0x0000000001010000004ceadf7aea295c400f96e662422a1dc0),
(14, 'Food Festival', 'Jl. Kejawan Putih Mutiara No.17, Kejawaan Putih Tamba, Kec. Mulyorejo, Kota SBY, Jawa Timur 60112', 'kuliner', 0x00000000010100000080c2538862335c4005e49c015c1a1dc0),
(15, 'Bambu Runcing', 'Jl. Panglima Sudirman, Embong Kaliasin, Kec. Genteng, Kota SBY, Jawa Timur 60271', 'museum', 0x000000000101000000f9f5b926a22f5c40ea87b2b60e111dc0),
(16, 'Museum Surabaya Siola', 'Tunjungan St No.1, Genteng, Surabaya City, East Java 60275', 'museum', 0x000000000101000000e07e176d3a2f5c4053d0b0b9dc041dc0),
(17, 'Museum WR Soepratman', 'Jl. Mangga No.21, Tambaksari, Kec. Tambaksari, Kota SBY, Jawa Timur 60136', 'museum', 0x000000000101000000fe659cfa39305c40612920b930ff1cc0),
(18, 'Tugu Pahlawan', 'Pahlawan St, Alun-alun Contong, Bubutan, Surabaya City, East Java 60174', 'museum', 0x00000000010100000065d83154382f5c4063ed05e37bfb1cc0),
(19, 'De Javasche Bank', 'Jl. Garuda No.1, Krembangan Sel., Kec. Krembangan, Kota SBY, Jawa Timur 60175', 'museum', 0x000000000101000000e4eb26d4242f5c409c264fdd90f01cc0),
(20, 'Taman Pelangi', 'Jl. Ahmad Yani No.138, Gayungan, Kec. Gayungan, Kota SBY, Jawa Timur 60235', 'taman', 0x000000000101000000d5c35f8cce2e5c407d5dc50e654e1dc0),
(21, 'DBL Surabaya', 'DBL Academy, Jl. Ahmad Yani No.88, Ketintang, Kec. Gayungan, Kota SBY, Jawa Timur 60231', 'olahraga', 0x00000000010100000090ce2566d82e5c40d2b0e385ad471dc0),
(22, 'Gelora Bung Tomo', 'Benowo, Pakal, Surabaya City, East Java 60196', 'olahraga', 0x000000000101000000ca416d6ed9275c400a63dd2441e41cc0),
(23, 'Sirkuit Gelora Bung Tomo', 'QJCC+XPW, Pakal, Surabaya City, East Java 60196', 'olahraga', 0x00000000010100000050d0777fca275c40b772777437e81cc0),
(24, 'Galaxy Mall', 'Jl. Dr. Ir. H. Soekarno No.178, Mulyorejo, Kec. Mulyorejo, Kota SBY, Jawa Timur 60115', 'mall', 0x00000000010100000045404c07f4315c4028290ce6881a1dc0),
(25, 'Pasar Malam Kodam Brawijaya', 'Jl. Brawijaya, Sawunggaling, Kec. Wonokromo, Kota SBY, Jawa Timur 60242', 'kuliner', 0x000000000101000000076291b5542e5c40f55991e1ce321dc0),
(26, 'Food Junction Grand Pakuwon', 'Jl. Grand Pakuwon, Banjar Sugihan, Kec. Tandes, Kota SBY, Jawa Timur 60184', 'kuliner', 0x000000000101000000323427b4612a5c40a5ecea50ceff1cc0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `objek_wisata`
--
ALTER TABLE `objek_wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `objek_wisata`
--
ALTER TABLE `objek_wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
