-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 02:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inap_insan`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(10) NOT NULL,
  `bintang` int(1) NOT NULL,
  `kasur` int(2) NOT NULL,
  `bathroom` int(2) NOT NULL,
  `wifi` int(1) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama`, `harga`, `bintang`, `kasur`, `bathroom`, `wifi`, `deskripsi`, `gambar`) VALUES
(1, 'Ruang Mawar', 800000, 1, 2, 1, 0, 'Ruang Mawar terdapat 14 kamar yang menyediakan fasilitas 2 kasur, 1 kamar mandi, Wifi gratis, TV dan meja kerja', 'room-1.jpg'),
(2, 'Ruang Kenanga', 1000000, 3, 1, 1, 1, 'Ruang Kenanga terdapat 10 kamar, memiliki fasilitas 1 kasur, 1 kamar mandi, Wifi gratis, TV, ruang tamu, dan meja kerja', 'room-2.jpg'),
(3, 'Ruang Tulip', 1500000, 5, 1, 2, 1, 'Ruang Tulip terdapat 6 kamar, memiliki fasilitas 1 kasur, 2 kamar mandi, Wifi gratis, TV, ruang tamu, dan meja kerja', 'room-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `date_birth` date NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_admin`, `email`, `password`, `nama_pegawai`, `jabatan`, `date_birth`, `alamat`, `telepon`) VALUES
(1, 'rizkyfirdaus@inapinsan.com', 'admin@123', 'rizky firdaus rahmatullah', 'manager', '1980-07-01', 'Jl. Ir. Sutami No.36, Kentingan, Kec. Jebres, Kota Surakarta, Jawa tengah', '+6285735109474');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `checkin` date DEFAULT NULL,
  `checkout` date DEFAULT NULL,
  `jml_dewasa` varchar(2) DEFAULT NULL,
  `jml_anak` varchar(2) DEFAULT NULL,
  `kamar` varchar(30) DEFAULT NULL,
  `message` varchar(200) DEFAULT NULL,
  `jemput` varchar(5) NOT NULL DEFAULT 'no',
  `uploadfile` varchar(200) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `name`, `gender`, `checkin`, `checkout`, `jml_dewasa`, `jml_anak`, `kamar`, `message`, `jemput`, `uploadfile`, `id_user`) VALUES
(10, 'Mulyanti Sri Ayu', 'wanita', '2022-07-08', '2022-07-09', '2', '4', '3', 'Abcdefghij', '', 'ktp1.jpg', 6),
(11, 'Joko mustofo', 'pria', '2022-07-15', '2022-07-23', '2', '4', '2', 'qwertyuiop', '', 'ktp-3.jpg', 6),
(12, 'Dani Salaman', 'pria', '2022-07-08', '2022-07-09', '3', '2', '3', '', 'yes', 'ktp-2.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`) VALUES
(5, 'contohpengguna1@gmail.com', 'tes123'),
(6, 'contohpengguna2@gmail.com', 'password'),
(7, 'emailcontoh@xyz.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
