-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 09, 2022 at 07:32 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nama_lengkap`, `alamat`, `desa_id`, `kecamatan_id`, `kabupaten_id`, `provinsi_id`, `negara_id`, `tanggal_lahir`, `jenis_kelamin_id`, `email`, `no_telepon`, `username`, `password`, `profil`) VALUES
('Abdi Wahab', 'dsn kerajan 1', 0, 13, 3, 3, 1, '1985-05-21', 2, 'abdiwahab@gmail.com', '0812337737716', 'abdiwahab', 'abdiwahab345_', 'Abdiwahab@gmail.com.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `akun_mitra`
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
-- Dumping data for table `akun_mitra`
--

INSERT INTO `akun_mitra` (`email`, `no_telepon`, `username`, `nama_lengkap`, `alamat`, `desa_id`, `kecamatan_id`, `kabupaten_id`, `provinsi_id`, `negara_id`, `tanggal_lahir`, `jenis_kelamin_id`, `password`, `status_akun_id`, `profil`) VALUES
('ferdifmwn65@gmail.com', '085124356490', 'ferdifmwn', 'Ferdi Frimawan', 'Jl. Pahlawan No. 31', 3, 3, 3, 3, 1, '1980-11-03', 1, 'ferfmawan90', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_desa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desa`
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
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE `jenis_kelamin` (
  `id` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `jenis_kelamin`) VALUES
(1, 'Laki-laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
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
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
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
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id` int(11) NOT NULL,
  `nama_negara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negara`
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
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `id_negara` int(11) NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
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
-- Table structure for table `status_akun`
--

CREATE TABLE `status_akun` (
  `id` int(11) NOT NULL,
  `status_akun` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_akun`
--

INSERT INTO `status_akun` (`id`, `status_akun`) VALUES
(1, 'aktif'),
(2, 'tidak aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_mitra`
--
ALTER TABLE `akun_mitra`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_akun`
--
ALTER TABLE `status_akun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `status_akun`
--
ALTER TABLE `status_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
