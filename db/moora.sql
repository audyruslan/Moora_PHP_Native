-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 11:00 AM
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
-- Database: `moora`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot`
--

CREATE TABLE `tb_bobot` (
  `no` int(11) NOT NULL,
  `pendapatan_ortu` float NOT NULL,
  `tanggungan_ortu` float NOT NULL,
  `pengeluaran_ortu` float NOT NULL,
  `ipk` float NOT NULL,
  `semester` float NOT NULL,
  `tingkah_laku` float NOT NULL,
  `keaktifan_organisasi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bobot`
--

INSERT INTO `tb_bobot` (`no`, `pendapatan_ortu`, `tanggungan_ortu`, `pengeluaran_ortu`, `ipk`, `semester`, `tingkah_laku`, `keaktifan_organisasi`) VALUES
(2, 0.15, 0.15, 0.15, 0.15, 0.15, 0.15, 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `stambuk` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`stambuk`, `nama`, `jenis_kelamin`, `jurusan`) VALUES
('F55117002', 'Yusran Halik Larisi', 'Laki-laki', 'Elektro'),
('F55117007', 'Ummul Fajri Rahmat', 'Laki-laki', 'Sipil'),
('F55117010', 'Audy Ruslan', 'Laki-laki', 'Teknologi Informasi');

--
-- Triggers `tb_mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `update` AFTER UPDATE ON `tb_mahasiswa` FOR EACH ROW UPDATE wp_penilaian SET stambuk=new.stambuk,nama=new.nama WHERE stambuk=old.stambuk
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian`
--

CREATE TABLE `tb_penilaian` (
  `stambuk` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `pendapatan_ortu` float NOT NULL,
  `tanggungan_ortu` float NOT NULL,
  `pengeluaran_ortu` float NOT NULL,
  `ipk` float NOT NULL,
  `semester` float NOT NULL,
  `tingkahlaku` float NOT NULL,
  `keaktifan_organisasi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilaian`
--

INSERT INTO `tb_penilaian` (`stambuk`, `nama`, `pendapatan_ortu`, `tanggungan_ortu`, `pengeluaran_ortu`, `ipk`, `semester`, `tingkahlaku`, `keaktifan_organisasi`) VALUES
('F55117002', 'Yusran Halik Larisi', 1, 1, 1, 3.14, 3, 3, 3),
('F55117007', 'Ummul Fajri Rahmat', 3, 2, 2, 3.21, 6, 4, 4),
('F55117010', 'Audy Ruslan', 2, 3, 2, 3.51, 5, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perangkingan`
--

CREATE TABLE `tb_perangkingan` (
  `id` int(11) NOT NULL,
  `stambuk` varchar(256) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nilai` float NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_perangkingan`
--

INSERT INTO `tb_perangkingan` (`id`, `stambuk`, `nama`, `nilai`, `status`) VALUES
(1, 'F55117007', '', 0.6487, 'Rekomendasi'),
(2, 'F55117010', '', 0.6386, 'Tidak Rekomendasi'),
(3, 'F55117002', '', 0.3837, 'Tidak Rekomendasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`stambuk`);

--
-- Indexes for table `tb_penilaian`
--
ALTER TABLE `tb_penilaian`
  ADD PRIMARY KEY (`stambuk`);

--
-- Indexes for table `tb_perangkingan`
--
ALTER TABLE `tb_perangkingan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_perangkingan`
--
ALTER TABLE `tb_perangkingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
