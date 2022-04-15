-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Apr 2022 pada 03.24
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tempe_crackers`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `negara_id` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `profil` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nama_lengkap`, `alamat`, `desa_id`, `kecamatan_id`, `kabupaten_id`, `provinsi_id`, `negara_id`, `tanggal_lahir`, `jenis_kelamin_id`, `email`, `no_telepon`, `username`, `password`, `profil`) VALUES
('Abdi Wahab', 'dsn kerajan 2', 1, 1, 1, 1, 1, '1985-05-21', 1, 'abdiwahab@gmail.com', '0812337737716', 'abdiwahab', 'abdiwahab345_', 'Abdiwahab@gmail.com.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_mitra`
--

CREATE TABLE `akun_mitra` (
  `email` varchar(250) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `username` varchar(250) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `desa_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `negara_id` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin_id` int(11) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status_akun_id` int(11) NOT NULL,
  `profil` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun_mitra`
--

INSERT INTO `akun_mitra` (`email`, `no_telepon`, `username`, `nama_lengkap`, `alamat`, `desa_id`, `kecamatan_id`, `kabupaten_id`, `provinsi_id`, `negara_id`, `tanggal_lahir`, `jenis_kelamin_id`, `password`, `status_akun_id`, `profil`) VALUES
('ferdifmwn65@gmail.com', '085124356490', 'ferdifmwn', 'Ferdi Frimawan', 'Jl. Pahlawan No. 31', 6, 11, 18, 1, 1, '1980-11-03', 1, 'ferfmawan90', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `tanggal_terbit`, `admin_email`, `judul`, `isi`, `gambar`) VALUES
(7, '2022-04-12', 'abdiwahab@gmail.com', 'History of Tempe Crackers \"Matahari\" UD. Restu Jaya', '\"Matahari\" tempe cracker entrepreneur UD. Restu Jaya has been running for about 49 years. The business, which was established in Puger Kulon Village, Puger District, Jember Regency, East Java, Indonesia since 1973, is a family business that has been passed down from generation to generation.\r\nThe business that is currently being developed by Mr. Abdi Wahab started from an owner who has the expertise to make crackers, so from his expertise and with a strong determination to be an entrepreneur he tried to establish a cracker factory named \"Matahari\" tempe crackers.\r\nAs time goes by, the product of \"Matahari\" tempe crackers is getting more and more known. This increases the amount of demand which also affects the amount of production. So the owner\'s business needs to be expanded by adding production sites, adding production equipment, and adding employees.\r\n', '1.jpeg'),
(8, '2022-04-12', 'abdiwahab@gmail.com', 'High Quality \"Sun\" Tempe Crackers', 'The quality of \"Matahari\" Tempe Crackers is unquestionable. Tempe Sun crackers are traditional foods like other crackers which are made from tempeh. Unlike the types of crackers in general, which are mostly made from wheat flour. \"Matahari\" tempe crackers are made from soybean tempeh, so they have a very distinctive taste. Although it is made from tempeh, there are quite a lot of fans of Matahari crackers in the community. it\'s savory, delicious, addictive. There is no doubt why these \"Matahari\" tempe crackers are known in the community.', '8.jpeg'),
(9, '2022-04-12', 'abdiwahab@gmail.com', 'Development of Tempe Crackers Matahari', 'Until now, Matahari Tempe Crackers have been able to develop into quite a large business. One of the supporters of this opinion is a customer of the \"Matahari\" tempe cracker business from UD. Restu Jaya has spread throughout Indonesia.\r\n\r\nIn addition, UD. Restu Jaya always prioritizes the quality of the tempeh crackers it produces, so many customers don\'t hesitate to order in large quantities. And not only that, now \"Matahari\" Tempe Crackers already have several production factories so that they can produce tempe crackers in large quantities.\r\n\r\nNow, UD. Restu Jaya has a target to achieve, namely Matahari Tempe Crackers products can enter the international arena. So that not only Indonesian people can taste these tempe crackers, foreign countries can also feel how delicious domestically made tempe crackers are.\r\n', '9.jpg'),
(10, '2022-04-15', 'abdiwahab@gmail.com', 'Get To Know What Is Tempe Crackers', 'Tempe in its history is a native plant of Indonesia, several ancient manuscripts from the land of Java mention the existence of this type of food. It is very proud that this food is indeed a genuine heritage from our own ancestors and from generation to generation until now it is still a culinary tradition of the nation itself and even started to be known by other nations.\r\n\r\nIn the development of soybean processing into tempeh, so far the development is very rapid in the country, judging from the very large demand for Indonesian soybeans, it may be ironic to support regions and lands that have the potential to be able to produce soybeans themselves, but in fact we are very dependent on the supply of soybeans from America.\r\n\r\nTempe crackers are a type of processed food made from thinly fried soy tempeh and mixed with spices and other ingredients, this food is mostly produced on the island of Java.\r\n', '10.jpeg'),
(11, '2022-04-15', 'abdiwahab@gmail.com', 'How to Process Tempeh Crackers', 'Processing tempeh Crackers is very easy. This is because when we receive the Crackers in raw condition we only need to fry them on a hot fire and a lot of oil. For the time it takes to fry it is also quite short, only about 1 minute. In addition, tempeh Crackers are very durable if stored properly at room temperature, which is around 25°C and can last up to 1 year.', '11.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_desa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id`, `id_kecamatan`, `nama_desa`) VALUES
(1, 1, 'Puger Kulon'),
(2, 2, 'Tegal Harum'),
(3, 3, 'Sumber Agung'),
(4, 11, 'Winong'),
(5, 10, 'Warureja'),
(6, 11, 'Babadan'),
(7, 1, 'Puger Wetan'),
(8, 6, 'Majapura'),
(9, 2, 'Dauh Puri'),
(10, 12, 'Temboro'),
(11, 12, 'Temboro'),
(12, 14, 'Balokang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kabupaten`
--

INSERT INTO `kabupaten` (`id`, `id_provinsi`, `nama_kabupaten`) VALUES
(1, 1, 'Jember'),
(2, 2, 'Denpasar'),
(3, 3, 'Berau'),
(4, 4, 'Kuala Lumpur'),
(5, 5, 'Bulukumba'),
(6, 6, 'Demak'),
(7, 13, 'Lombok Barat'),
(8, 9, 'Yalimo'),
(9, 2, 'Bangli'),
(10, 2, 'Karangasem'),
(11, 12, 'Lampung Tengah'),
(12, 12, 'Lampung Barat'),
(13, 12, 'Lampung Utara'),
(14, 6, 'Pekalongan'),
(15, 1, 'Surabaya'),
(16, 1, 'Magetan'),
(17, 1, 'Banyuwangi'),
(18, 1, 'Tulungagung'),
(19, 5, 'Bone'),
(20, 13, 'Mataram'),
(21, 6, 'Kebumen'),
(22, 6, 'Banyumas'),
(23, 2, 'Buleleng'),
(24, 6, 'Purbalingga'),
(25, 5, 'Barru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `id_kabupaten`, `nama_kecamatan`) VALUES
(1, 1, 'Puger'),
(2, 2, 'Denpasar Barat'),
(3, 3, 'Batu Putih'),
(4, 4, 'Bukit Bintang'),
(5, 3, 'Biatan'),
(6, 6, 'Kertanegara'),
(7, 12, 'Balik Bukit'),
(8, 8, 'Abenaho'),
(9, 20, 'Ampenan'),
(10, 14, 'Bojong'),
(11, 18, 'Karangrejo'),
(12, 16, 'Karas'),
(13, 3, 'Maratau'),
(14, 23, 'Banjar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `negara`
--

CREATE TABLE `negara` (
  `id` int(11) NOT NULL,
  `nama_negara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `negara`
--

INSERT INTO `negara` (`id`, `nama_negara`) VALUES
(1, 'Indonesia'),
(2, 'Malaysia'),
(3, 'Singapura'),
(4, 'Brunei Darussalam'),
(5, 'Jepang'),
(6, 'Australia'),
(7, 'Selandia Baru'),
(8, 'Thailand'),
(9, 'Kanada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `id_negara` int(11) NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id`, `id_negara`, `nama_provinsi`) VALUES
(1, 1, 'Jawa Timur'),
(2, 1, 'Bali'),
(3, 1, 'Kalimantan Timur'),
(4, 2, 'Wilayah Persekutuan Kuala Lumpur'),
(5, 1, 'Sulawesi Selatan'),
(6, 1, 'Jawa Tengah'),
(7, 1, 'Sumatra'),
(8, 1, 'Maluku Utara'),
(9, 1, 'Papua'),
(10, 1, 'Sulawesi Tenggara'),
(11, 1, 'Jawa Barat'),
(12, 1, 'Lampung'),
(13, 1, 'Nusa Tenggara Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_akun`
--

CREATE TABLE `status_akun` (
  `id` int(11) NOT NULL,
  `status_akun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_akun`
--

INSERT INTO `status_akun` (`id`, `status_akun`) VALUES
(1, 'aktif'),
(2, 'tidak aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_mitra`
--
ALTER TABLE `akun_mitra`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_akun`
--
ALTER TABLE `status_akun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `negara`
--
ALTER TABLE `negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `status_akun`
--
ALTER TABLE `status_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
