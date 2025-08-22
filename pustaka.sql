-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2025 at 01:59 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int NOT NULL AUTO_INCREMENT,
  `kode_anggota` varchar(20) NOT NULL,
  `nis` int NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','','','') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` int NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `kode_anggota`, `nis`, `nama_anggota`, `email`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
(9, 'AG001', 89479993, 'Lailatul Ilma Al-Ma\'rifah', 'lailatulilma717@gmail.com', 'perempuan', 'Adonara Timur', 2147483647),
(10, 'AG002', 89469993, 'Omar Wistara Latief Al-Arsy', 'ochi@gmail.com', 'laki-laki', 'Demak', 2147483647),
(11, 'AG003', 89675432, 'Ade Jainab', 'jainab@gmail.com', 'perempuan', 'Lembata', 2147483647),
(12, 'AG004', 89675432, 'Astitin Januarti', 'astitin@gmail.com', 'perempuan', 'Ndetuzea', 2147483647),
(13, 'AG005', 6474859, 'Fitriah Khairunnisa Pua Dange', 'fitripd@gmail.com', 'perempuan', 'Nangaroro', 2147483647),
(14, 'AG006', 98645372, 'Fitriani Juleha Abas', 'fitabas9@gmail.com', 'perempuan', 'Keo Tengah', 2147483647),
(15, 'AG007', 98002237, 'Azkharudin Muzakkir', 'Azkha@gmail.com', 'laki-laki', 'Terong', 2147483647),
(16, 'AG008', 6543987, 'Fachrudin Nehdin', 'Nehdin@gmail.com', 'laki-laki', 'Bock Halus', 2147483647),
(17, 'AG009', 765432, 'Ummi Dzakiah', 'ummidz@gmail.com', 'perempuan', 'Terong', 2147483647),
(18, 'AG010', 98008773, 'Ken Ayu Melifera Avicena', 'kenken@gmail.com', 'perempuan', 'Jogjakarta', 2147483647),
(19, 'AG011', 43445657, 'Safaluna Acquila Ufaira', 'faira@gmail.com', 'perempuan', 'Demak', 623458990),
(20, 'AG012', 977865544, 'Nimaz Ayu Sheyanina Senja', 'sheya@gmail.com', 'perempuan', 'Bandung', 62345789),
(21, 'AG013', 894799388, 'Aileen Avicena Arendaratu', 'ileen@gmail.com', 'perempuan', 'Bandung', 629974630),
(22, 'AG014', 65576789, 'Bumi Grafik Nula', 'bgnula@gmail.com', 'laki-laki', 'Yogyakarta', 2147483647),
(23, 'AG015', 356567679, 'Nameira Tsabit Anggrainy ', 'nTsabit@gmail.com', 'perempuan', 'Bogor', 2147483647),
(24, 'AG016', 2147483647, 'Wiluna Ajeng Prameswari', 'wilunn@gmail.com', 'perempuan', 'Yogyakarta', 623157737),
(25, 'AG017', 65456768, 'Kaatiya Meshazara Aysele', 'ktiya@gmail.com', 'perempuan', 'Bali', 2147483647),
(26, 'AG018', 9876432, 'Latisha Vidya Ishavara', 'ltisha@gmail.com', 'perempuan', 'Bali', 546567678),
(27, 'AG019', 88765443, 'Nadeleine Seavanja Kaluna', 'nskal@gmail.com', 'perempuan', 'Bandung', 2147483647),
(28, 'AG020', 245476456, 'Tatjana Deianeira Nazeea', 'tjana@gmail.com', 'perempuan', 'Bogor', 2147483647),
(29, 'AG021', 89845342, 'Hanindya Shevaya Maheswari', 'nind@gmail.com', 'perempuan', 'Bali', 2147483647),
(30, 'AG022', 2147483647, 'Mahathir Mohamad', 'mahathir@gmail.com', 'laki-laki', 'Lamahala Jaya', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int NOT NULL,
  `kode_buku` varchar(20) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `tahun_terbit` int NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah` int NOT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `id_kategori` (`id_kategori`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `kode_buku`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah`) VALUES
(2, 6, 'MAKN002', 'Hujan', 'Tere Liye', 'Gramedia', 2022, '234567', 15),
(1, 6, 'MAKN001', 'IPAS', 'FIO', 'Gramedia', 1850, '435655768', 5),
(29, 8, 'MAKN003', 'Pulang', 'Tere Liye', 'Sabak Grip', 2021, '45678675', 6),
(30, 3, 'MAKN004', 'Pergi', 'Tere Liye', 'Sabak Grip', 2018, '8654356', 11);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Inspirational'),
(1, 'romance'),
(3, 'Mystery'),
(4, 'horror'),
(5, 'comedy'),
(6, 'sci-fi'),
(7, 'Adventure'),
(8, 'Fantasy'),
(9, 'Historical'),
(10, 'Angst');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi_denda`
--

DROP TABLE IF EXISTS `konfigurasi_denda`;
CREATE TABLE IF NOT EXISTS `konfigurasi_denda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(20) NOT NULL,
  `denda_per_hari` int DEFAULT NULL,
  `denda_per_bulan` int DEFAULT NULL,
  `denda_per_tahun` int DEFAULT NULL,
  `denda_flat` int DEFAULT NULL,
  `denda_ringan` int DEFAULT NULL,
  `denda_sedang` int DEFAULT NULL,
  `denda_berat` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `konfigurasi_denda`
--

INSERT INTO `konfigurasi_denda` (`id`, `jenis`, `denda_per_hari`, `denda_per_bulan`, `denda_per_tahun`, `denda_flat`, `denda_ringan`, `denda_sedang`, `denda_berat`, `updated_at`) VALUES
(1, 'terlambat', 1000, 25000, 200000, NULL, NULL, NULL, NULL, '2025-08-11 09:22:08'),
(2, 'hilang', NULL, NULL, NULL, 500000, NULL, NULL, NULL, '2025-08-11 09:22:08'),
(3, 'rusak', NULL, NULL, NULL, NULL, 100000, 300000, 500000, '2025-08-11 09:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin1', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'admin'),
(3, 'petugas', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas'),
(4, 'Jainab', 'jainab', 'a8c175abfc871061664bd8a2a7c56273', 'petugas'),
(5, 'Astitin', 'Astitin', 'a0a60265fac463ee91fef20d42ae7da4', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int NOT NULL AUTO_INCREMENT,
  `kode_peminjaman` varchar(20) NOT NULL,
  `id_anggota` int NOT NULL,
  `id_buku` int NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `telat` varchar(20) NOT NULL,
  `denda` varchar(20) NOT NULL,
  PRIMARY KEY (`id_peminjaman`),
  KEY `id_anggota` (`id_anggota`),
  KEY `id_buku` (`id_buku`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_peminjaman`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `telat`, `denda`) VALUES
(1, 'TR001', 12, 29, '2025-08-09', '2025-08-12', '', ''),
(2, 'TR002', 11, 30, '2025-08-01', '2025-08-03', '', ''),
(28, 'TR003', 27, 2, '2025-08-11', '2025-08-14', '', '');

--
-- Triggers `peminjaman`
--
DROP TRIGGER IF EXISTS `jml_after_pinjam`;
DELIMITER $$
CREATE TRIGGER `jml_after_pinjam` AFTER INSERT ON `peminjaman` FOR EACH ROW update buku set buku.jumlah = buku.jumlah -1 where buku.id_buku = new.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

DROP TABLE IF EXISTS `pengembalian`;
CREATE TABLE IF NOT EXISTS `pengembalian` (
  `id_pengembalian` int NOT NULL AUTO_INCREMENT,
  `id_anggota` int NOT NULL,
  `id_buku` int NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_kembalikan` date NOT NULL,
  `status_denda` varchar(50) DEFAULT NULL,
  `tipe_rusak` varchar(50) DEFAULT NULL,
  `telat` varchar(20) NOT NULL,
  `denda` int DEFAULT NULL,
  PRIMARY KEY (`id_pengembalian`),
  KEY `id_anggota` (`id_anggota`,`id_buku`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_kembalikan`, `status_denda`, `tipe_rusak`, `telat`, `denda`) VALUES
(19, 9, 2, '2025-07-23', '2025-07-25', '2025-08-09', NULL, NULL, '15', 15000),
(16, 26, 29, '2025-08-07', '2025-08-10', '2025-08-07', NULL, NULL, '0', 0),
(17, 28, 30, '2025-08-05', '2025-08-07', '2025-08-09', NULL, NULL, '2', 2000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
