-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 02:14 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuci_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(1, 'Islam'),
(2, 'Hindu'),
(3, 'Budha'),
(4, 'Kristen'),
(5, 'Katolik'),
(6, 'Kong Hu Cu');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kecamatan_id` int(11) NOT NULL,
  `kecamatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kecamatan_id`, `kecamatan`) VALUES
(1, 'Purwokerto Utara'),
(2, 'Purwokerto Selatan'),
(3, 'Purwokerto Barat'),
(4, 'Purwokerto Timur');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `kelurahan_id` int(11) NOT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`kelurahan_id`, `kelurahan`, `kecamatan_id`) VALUES
(1, 'Bobosan', 1),
(2, 'Purwanegara', 1),
(3, 'Bancarkembar', 1),
(4, 'Sumampir', 1),
(5, 'Pabuaran', 1),
(6, 'Grendeng', 1),
(7, 'Karangwangkal', 1),
(8, 'Berkoh', 2),
(9, 'Purwokerto Kidul', 2),
(10, 'Purwokerto Kulon', 2),
(11, 'Karangpucung', 2),
(12, 'Tanjung', 2),
(13, 'Karangklesem', 2),
(14, 'Teluk', 2),
(15, 'Karanglewas Lor', 3),
(16, 'Pasir Kidul', 3),
(17, 'Rejasari', 3),
(18, 'Bantarsoka', 3),
(19, 'Kober', 3),
(20, 'Kedungwuluh', 3),
(21, 'Pasirmuncang', 3),
(22, 'Sokanegara', 4),
(23, 'Kranji', 4),
(24, 'Purwokerto Lor', 4),
(25, 'Purwokerto Wetan', 4),
(26, 'Mersi', 4),
(27, 'Arcawinangun', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tm_hargacuci`
--

CREATE TABLE `tm_hargacuci` (
  `id` bigint(20) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `harga` float(50,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_hargacuci`
--

INSERT INTO `tm_hargacuci` (`id`, `jenis`, `harga`) VALUES
(1, 'Cuci', 6000),
(2, 'Cuci+Poles', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `tm_setwaktu`
--

CREATE TABLE `tm_setwaktu` (
  `id` bigint(20) NOT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `kuota` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_setwaktu`
--

INSERT INTO `tm_setwaktu` (`id`, `waktu`, `kuota`) VALUES
(1, '08.00 - 10.00', 5),
(2, '10.00 - 12.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tm_user`
--

CREATE TABLE `tm_user` (
  `user_id` int(11) NOT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kecamatan_id` varchar(255) DEFAULT NULL,
  `kelurahan_id` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `jenis_kelamin_id` varchar(255) DEFAULT NULL,
  `agama_id` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jenis_user` varchar(255) DEFAULT NULL,
  `tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `verif_flag` varchar(255) DEFAULT NULL,
  `fotosatu` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_user`
--

INSERT INTO `tm_user` (`user_id`, `no_ktp`, `nama`, `alamat`, `kecamatan_id`, `kelurahan_id`, `kode_pos`, `jenis_kelamin_id`, `agama_id`, `tempat_lahir`, `tanggal_lahir`, `no_telp`, `password`, `jenis_user`, `tgl_input`, `verif_flag`, `fotosatu`) VALUES
(9, '3304011511950003', 'Rizki Alip', 'gang a no 55', '4', '27', '55555', 'L', '1', 'Banjarnegara', '1995-11-15', '085640769886', 'cuci', '3', '2019-11-30 15:12:58', NULL, NULL),
(10, '12345', 'Doeng', '-', '4', '27', '5555', 'L', '1', 'Purwokerto', NULL, '08624562', 'cuci', '2', '2019-11-30 23:33:56', NULL, NULL),
(11, '54321', 'Fuad', '-', '4', '27', '55555', 'L', '1', NULL, NULL, NULL, 'cuci', '1', '2019-11-30 23:34:24', NULL, NULL),
(12, '9999', 'abmul', 'aaaaaa', '4', '26', '55555', 'Laki-laki', '1', 'Purbalingga', '1987-11-20', '085640769886', 'cuci', '3', '2019-11-30 23:47:43', NULL, NULL),
(13, '3333', 'boom', 'aaaaaa', '4', '27', '55555', 'Laki-laki', '1', 'Purbalingga', '1996-11-21', '085640769886', 'cuci', '2', '2019-12-01 00:02:28', NULL, NULL),
(15, '112', 'Samidun', 'Desa Jangkrik Rt 02 Rw 03', '1', '1', '21', 'L', '1', 'Banyumas', '2000-01-10', '00000', '12345', '3', '2019-12-15 05:34:25', NULL, 'tobot.png');

-- --------------------------------------------------------

--
-- Table structure for table `tm_userdetailmobil`
--

CREATE TABLE `tm_userdetailmobil` (
  `id` bigint(20) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `mobil` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_userdetailmobil`
--

INSERT INTO `tm_userdetailmobil` (`id`, `nik`, `mobil`) VALUES
(1, '3304011511950003', 'Agya'),
(2, '3304011511950003', 'Apv '),
(3, '112', 'Avanza');

-- --------------------------------------------------------

--
-- Table structure for table `tr_cuci`
--

CREATE TABLE `tr_cuci` (
  `cuci_id` int(11) NOT NULL,
  `no_cuci` varchar(255) DEFAULT NULL,
  `pelanggan_id` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `total_bayar` varchar(10) DEFAULT NULL,
  `alamat_lengkap` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `id_user_pencuci` varchar(11) DEFAULT NULL,
  `pencuci_verif_at` varchar(6) DEFAULT NULL,
  `tgl_pesan` varchar(20) DEFAULT NULL,
  `id_jam` int(100) DEFAULT NULL,
  `id_harga` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_cuci`
--

INSERT INTO `tr_cuci` (`cuci_id`, `no_cuci`, `pelanggan_id`, `jumlah`, `total_bayar`, `alamat_lengkap`, `no_hp`, `status`, `id_user_pencuci`, `pencuci_verif_at`, `tgl_pesan`, `id_jam`, `id_harga`) VALUES
(1, 'TRS0001', '3304011511950003', 1, '11000', NULL, NULL, '3', '10', '15/12/', '2019-12-15', 1, 2),
(2, 'TRS0002', '3304011511950003', 2, '12000', NULL, NULL, '3', '10', '16/12/', '2019-12-17', 2, 1),
(3, 'TRS0003', '112', 1, '11000', NULL, NULL, '3', '10', '16/12/', '2019-12-17', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tr_cuci_detail`
--

CREATE TABLE `tr_cuci_detail` (
  `cuci_detail_id` int(11) NOT NULL,
  `no_cuci` varchar(50) DEFAULT NULL,
  `pelanggan_id` varchar(255) DEFAULT NULL,
  `mobil_id` int(11) DEFAULT NULL,
  `tgl_pesan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_cuci_detail`
--

INSERT INTO `tr_cuci_detail` (`cuci_detail_id`, `no_cuci`, `pelanggan_id`, `mobil_id`, `tgl_pesan`) VALUES
(1, 'TRS0001', '3304011511950003', 1, '2019-12-15'),
(2, 'TRS0002', '3304011511950003', 1, '2019-12-17'),
(3, 'TRS0002', '3304011511950003', 2, '2019-12-17'),
(4, 'TRS0003', '112', 3, '2019-12-16');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
-- (See below for the actual view)
--
CREATE TABLE `view_user` (
`no_ktp` varchar(255)
,`nama` varchar(255)
,`alamat` varchar(255)
,`kecamatan` varchar(255)
,`kelurahan` varchar(255)
,`tempat_lahir` varchar(255)
,`tanggal_lahir` date
,`no_telp` varchar(255)
,`jenis_user` varchar(255)
,`fotosatu` varchar(225)
);

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user`  AS  select `a`.`no_ktp` AS `no_ktp`,`a`.`nama` AS `nama`,`a`.`alamat` AS `alamat`,`b`.`kecamatan` AS `kecamatan`,`c`.`kelurahan` AS `kelurahan`,`a`.`tempat_lahir` AS `tempat_lahir`,`a`.`tanggal_lahir` AS `tanggal_lahir`,`a`.`no_telp` AS `no_telp`,`a`.`jenis_user` AS `jenis_user`,`a`.`fotosatu` AS `fotosatu` from ((`tm_user` `a` join `kecamatan` `b` on((`a`.`kecamatan_id` = `b`.`kecamatan_id`))) join `kelurahan` `c` on((`a`.`kelurahan_id` = `c`.`kelurahan_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`kelurahan_id`);

--
-- Indexes for table `tm_hargacuci`
--
ALTER TABLE `tm_hargacuci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_setwaktu`
--
ALTER TABLE `tm_setwaktu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tm_user`
--
ALTER TABLE `tm_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tm_userdetailmobil`
--
ALTER TABLE `tm_userdetailmobil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_cuci`
--
ALTER TABLE `tr_cuci`
  ADD PRIMARY KEY (`cuci_id`);

--
-- Indexes for table `tr_cuci_detail`
--
ALTER TABLE `tr_cuci_detail`
  ADD PRIMARY KEY (`cuci_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `kelurahan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tm_hargacuci`
--
ALTER TABLE `tm_hargacuci`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tm_setwaktu`
--
ALTER TABLE `tm_setwaktu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tm_user`
--
ALTER TABLE `tm_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tm_userdetailmobil`
--
ALTER TABLE `tm_userdetailmobil`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_cuci`
--
ALTER TABLE `tr_cuci`
  MODIFY `cuci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_cuci_detail`
--
ALTER TABLE `tr_cuci_detail`
  MODIFY `cuci_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
