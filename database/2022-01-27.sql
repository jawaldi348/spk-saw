-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 05:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `id_mahasiswa` char(5) DEFAULT NULL,
  `id_kriteria` char(5) DEFAULT NULL,
  `id_subkriteria` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `id_mahasiswa`, `id_kriteria`, `id_subkriteria`) VALUES
(1, '1', 'K1', 'KS3'),
(2, '1', 'K2', 'KS4'),
(3, '2', 'K1', 'KS1'),
(4, '2', 'K2', 'KS4'),
(5, '1', 'K3', 'KS11'),
(6, '1', 'K4', 'KS15'),
(7, '1', 'K5', 'KS19'),
(8, '2', 'K3', 'KS11'),
(9, '2', 'K4', 'KS15'),
(10, '2', 'K5', 'KS19'),
(11, '3', 'K1', 'KS3'),
(12, '3', 'K2', 'KS4'),
(13, '3', 'K3', 'KS10'),
(14, '3', 'K4', 'KS12'),
(15, '3', 'K5', 'KS16'),
(16, '4', 'K1', 'KS1'),
(17, '4', 'K2', 'KS4'),
(18, '4', 'K3', 'KS11'),
(19, '4', 'K4', 'KS12'),
(20, '4', 'K5', 'KS19'),
(21, '5', 'K1', 'KS2'),
(22, '5', 'K2', 'KS4'),
(23, '5', 'K3', 'KS11'),
(24, '5', 'K4', 'KS15'),
(25, '5', 'K5', 'KS19'),
(26, '6', 'K1', 'KS3'),
(27, '6', 'K2', 'KS4'),
(28, '6', 'K3', 'KS8'),
(29, '6', 'K4', 'KS14'),
(30, '6', 'K5', 'KS16'),
(31, '7', 'K1', 'KS3'),
(32, '7', 'K2', 'KS4'),
(33, '7', 'K3', 'KS11'),
(34, '7', 'K4', 'KS13'),
(35, '7', 'K5', 'KS16'),
(36, '8', 'K1', 'KS3'),
(37, '8', 'K2', 'KS5'),
(38, '8', 'K3', 'KS11'),
(39, '8', 'K4', 'KS15'),
(40, '8', 'K5', 'KS18'),
(41, '9', 'K1', 'KS3'),
(42, '9', 'K2', 'KS6'),
(43, '9', 'K3', 'KS11'),
(44, '9', 'K4', 'KS13'),
(45, '9', 'K5', 'KS19'),
(46, '10', 'K1', 'KS3'),
(47, '10', 'K2', 'KS4'),
(48, '10', 'K3', 'KS7'),
(49, '10', 'K4', 'KS13'),
(50, '10', 'K5', 'KS18'),
(51, '11', 'K1', 'KS3'),
(52, '11', 'K2', 'KS5'),
(53, '11', 'K3', 'KS9'),
(54, '11', 'K4', 'KS15'),
(55, '11', 'K5', 'KS18'),
(56, '12', 'K1', 'KS3'),
(57, '12', 'K2', 'KS4'),
(58, '12', 'K3', 'KS11'),
(59, '12', 'K4', 'KS14'),
(60, '12', 'K5', 'KS17');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` char(5) NOT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL,
  `bobot_kriteria` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot_kriteria`) VALUES
('K1', 'Kartu', 0.4),
('K2', 'Tanggungan', 0.2),
('K3', 'Penghasilan', 0.2),
('K4', 'Prestasi', 0.15),
('K5', 'Jarak Pusat Kota', 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `kode_mhs` int(11) NOT NULL,
  `nodaftar_mhs` varchar(50) DEFAULT NULL,
  `nama_mhs` varchar(50) DEFAULT NULL,
  `username_mhs` varchar(50) DEFAULT NULL,
  `password_mhs` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`kode_mhs`, `nodaftar_mhs`, `nama_mhs`, `username_mhs`, `password_mhs`) VALUES
(1, '1101', 'Inriani Sitohang', 'mhs1', '202cb962ac59075b964b07152d234b70'),
(2, '1102', 'Erlisna Telaumbanua', 'mhs2', '202cb962ac59075b964b07152d234b70'),
(3, '1103', 'Bewanolo Telaumbanua', 'mhs3', '202cb962ac59075b964b07152d234b70'),
(4, '1104', 'Emmanuel Zega', 'mhs4', '202cb962ac59075b964b07152d234b70'),
(5, '1105', 'Pricilla Br.Hutabarat', 'mhs5', '202cb962ac59075b964b07152d234b70'),
(6, '1106', 'Muhammad Asril', 'mhs6', '202cb962ac59075b964b07152d234b70'),
(7, '1107', 'Revina Nelti Juniati Br Gultom', 'mhs7', '202cb962ac59075b964b07152d234b70'),
(8, '1108', 'Mushab Furqon Hidayah', 'mhs8', '202cb962ac59075b964b07152d234b70'),
(9, '1109', 'Dea Paramita', 'mhs9', '202cb962ac59075b964b07152d234b70'),
(10, '1110', 'Fatimah', 'mhs10', '202cb962ac59075b964b07152d234b70'),
(11, '1111', 'CHRISTIAN LEO CHANRA SITOHANG', 'mhs11', '202cb962ac59075b964b07152d234b70'),
(12, '1112', 'Perdyan Syah', 'mhs12', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `kode_subkriteria` char(5) NOT NULL,
  `kriteria_subkriteria` char(5) DEFAULT NULL,
  `nama_subkriteria` varchar(50) DEFAULT NULL,
  `bobot_subkriteria` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`kode_subkriteria`, `kriteria_subkriteria`, `nama_subkriteria`, `bobot_subkriteria`) VALUES
('KS1', 'K1', 'KIP', 1),
('KS10', 'K3', '<= Rp. 800.000', 0.25),
('KS11', 'K3', 'Tidak berpenghasilan', 0.25),
('KS12', 'K4', 'Ada Nasional', 1),
('KS13', 'K4', 'Ada Provinsi', 0.75),
('KS14', 'K4', 'Ada Kota', 0.5),
('KS15', 'K4', 'Tidak Ada', 0.25),
('KS16', 'K5', '>15 Km', 1),
('KS17', 'K5', '11-14 Km', 0.75),
('KS18', 'K5', '6-10 Km', 0.5),
('KS19', 'K5', '0-5 Km', 0.25),
('KS2', 'K1', 'KKS', 0.75),
('KS3', 'K1', 'SKTM', 0.5),
('KS4', 'K2', '>3 Anak', 1),
('KS5', 'K2', '2 Anak', 0.75),
('KS6', 'K2', '1 Anak', 0.25),
('KS7', 'K3', '>Rp. 3.000.000', 1),
('KS8', 'K3', 'Rp. 1.500.001 – Rp. 3.000.000', 0.75),
('KS9', 'K3', 'Rp. 800.000 – Rp. 1.500.000', 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`kode_mhs`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`kode_subkriteria`),
  ADD KEY `kriteria_subkriteria` (`kriteria_subkriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `kode_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`kriteria_subkriteria`) REFERENCES `kriteria` (`kode_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
