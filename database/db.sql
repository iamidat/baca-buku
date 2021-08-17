-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 06:56 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(3) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `id_penulis` int(3) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `jumlah_hlm` int(4) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `sinopsis` text NOT NULL,
  `nama_file` text NOT NULL,
  `cover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `id_penulis`, `id_kategori`, `jumlah_hlm`, `tahun_terbit`, `tgl_masuk`, `sinopsis`, `nama_file`, `cover`) VALUES
(1, 'Mengejar Design Sprint', 1, 1, 32, '2020', '2021-06-26 18:44:43', 'Design Sprint itu metodologi yang udah terbukti buat nyelesain masalah lewat desain, bikin prototipe, & nge-test ide ke pengguna kita. Desain Sprint itu juga bisa nyelarasin visi tim kita supaya tujuan & hasilnya jelas & cepat.', 'file_1.pdf', 'cover_1.png'),
(2, 'The Wonderful Wizard of Oz', 2, 2, 130, '2008', '2021-06-26 18:52:02', 'Folklore, legends, myths and fairy tales have followed childhood through the ages, for every healthy youngster has a wholesome and instinctive love for stories fantastic, marvelous and manifestly unreal. The winged fairies of Grimm and Andersen have brought more happiness to childish hearts than all other human creations.', 'file_2.pdf', 'cover_2.png'),
(3, 'Reinkarnasi', 3, 2, 167, '2013', '2021-06-26 18:54:08', 'Zaila, gadis 12 tahun yang sedang bermain ditepi sungai mencari ikan bersama teman-temannya tiba-tiba terpelaset dan terjatuh hingga tak sadarkan diri. Dari sinilah semuanya bermula. Ketika ia tersadar, ia tidak dalam raga dirinya melainkan berada di raga yang lain dan di zaman yang lain. Namanya Sekar. Seorang puteri keraton pada masa penjajahan belanda. Ternyata ia telah mundur ke 180 tahun silam, tepatnya pada tahun 1831.', 'file_3.pdf', 'cover_3.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Desain'),
(2, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(3) NOT NULL,
  `penulis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `penulis`) VALUES
(1, 'Rizki Mardita'),
(2, 'L. Frank Baum'),
(3, 'Ditta Hakha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_penulis` (`id_penulis`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id_penulis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
