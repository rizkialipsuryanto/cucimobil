/*
 Navicat Premium Data Transfer

 Source Server         : localhost5.6
 Source Server Type    : MySQL
 Source Server Version : 100132
 Source Host           : localhost:3306
 Source Schema         : cuci_mobil

 Target Server Type    : MySQL
 Target Server Version : 100132
 File Encoding         : 65001

 Date: 03/06/2020 21:50:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for agama
-- ----------------------------
DROP TABLE IF EXISTS `agama`;
CREATE TABLE `agama`  (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_agama`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of agama
-- ----------------------------
INSERT INTO `agama` VALUES (1, 'Islam');
INSERT INTO `agama` VALUES (2, 'Hindu');
INSERT INTO `agama` VALUES (3, 'Budha');
INSERT INTO `agama` VALUES (4, 'Kristen');
INSERT INTO `agama` VALUES (5, 'Katolik');
INSERT INTO `agama` VALUES (6, 'Kong Hu Cu');

-- ----------------------------
-- Table structure for kecamatan
-- ----------------------------
DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE `kecamatan`  (
  `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kecamatan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kecamatan
-- ----------------------------
INSERT INTO `kecamatan` VALUES (1, 'Purwokerto Utara');
INSERT INTO `kecamatan` VALUES (2, 'Purwokerto Selatan');
INSERT INTO `kecamatan` VALUES (3, 'Purwokerto Barat');
INSERT INTO `kecamatan` VALUES (4, 'Purwokerto Timur');

-- ----------------------------
-- Table structure for kelurahan
-- ----------------------------
DROP TABLE IF EXISTS `kelurahan`;
CREATE TABLE `kelurahan`  (
  `kelurahan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelurahan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatan_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`kelurahan_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of kelurahan
-- ----------------------------
INSERT INTO `kelurahan` VALUES (1, 'Bobosan', 1);
INSERT INTO `kelurahan` VALUES (2, 'Purwanegara', 1);
INSERT INTO `kelurahan` VALUES (3, 'Bancarkembar', 1);
INSERT INTO `kelurahan` VALUES (4, 'Sumampir', 1);
INSERT INTO `kelurahan` VALUES (5, 'Pabuaran', 1);
INSERT INTO `kelurahan` VALUES (6, 'Grendeng', 1);
INSERT INTO `kelurahan` VALUES (7, 'Karangwangkal', 1);
INSERT INTO `kelurahan` VALUES (8, 'Berkoh', 2);
INSERT INTO `kelurahan` VALUES (9, 'Purwokerto Kidul', 2);
INSERT INTO `kelurahan` VALUES (10, 'Purwokerto Kulon', 2);
INSERT INTO `kelurahan` VALUES (11, 'Karangpucung', 2);
INSERT INTO `kelurahan` VALUES (12, 'Tanjung', 2);
INSERT INTO `kelurahan` VALUES (13, 'Karangklesem', 2);
INSERT INTO `kelurahan` VALUES (14, 'Teluk', 2);
INSERT INTO `kelurahan` VALUES (15, 'Karanglewas Lor', 3);
INSERT INTO `kelurahan` VALUES (16, 'Pasir Kidul', 3);
INSERT INTO `kelurahan` VALUES (17, 'Rejasari', 3);
INSERT INTO `kelurahan` VALUES (18, 'Bantarsoka', 3);
INSERT INTO `kelurahan` VALUES (19, 'Kober', 3);
INSERT INTO `kelurahan` VALUES (20, 'Kedungwuluh', 3);
INSERT INTO `kelurahan` VALUES (21, 'Pasirmuncang', 3);
INSERT INTO `kelurahan` VALUES (22, 'Sokanegara', 4);
INSERT INTO `kelurahan` VALUES (23, 'Kranji', 4);
INSERT INTO `kelurahan` VALUES (24, 'Purwokerto Lor', 4);
INSERT INTO `kelurahan` VALUES (25, 'Purwokerto Wetan', 4);
INSERT INTO `kelurahan` VALUES (26, 'Mersi', 4);
INSERT INTO `kelurahan` VALUES (27, 'Arcawinangun', 4);

-- ----------------------------
-- Table structure for t_chat
-- ----------------------------
DROP TABLE IF EXISTS `t_chat`;
CREATE TABLE `t_chat`  (
  `chat_id` int(11) NOT NULL AUTO_INCREMENT,
  `chat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cuci_id` int(11) NULL DEFAULT NULL,
  `date` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`chat_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_chat
-- ----------------------------
INSERT INTO `t_chat` VALUES (1, 'Maaf dari pihak kami sedikit terlambat dikarenakan harus membeli semir ban.', 19, NULL);

-- ----------------------------
-- Table structure for tm_hargacuci
-- ----------------------------
DROP TABLE IF EXISTS `tm_hargacuci`;
CREATE TABLE `tm_hargacuci`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` float(50, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_hargacuci
-- ----------------------------
INSERT INTO `tm_hargacuci` VALUES (1, 'Cuci Biasa', 50000);
INSERT INTO `tm_hargacuci` VALUES (2, 'Cuci+Poles', 60000);

-- ----------------------------
-- Table structure for tm_setwaktu
-- ----------------------------
DROP TABLE IF EXISTS `tm_setwaktu`;
CREATE TABLE `tm_setwaktu`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `waktu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kuota` int(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_setwaktu
-- ----------------------------
INSERT INTO `tm_setwaktu` VALUES (1, '08.00 - 10.00', 3);
INSERT INTO `tm_setwaktu` VALUES (2, '10.00 - 12.00', 3);
INSERT INTO `tm_setwaktu` VALUES (3, '12.00 - 14.00', 3);
INSERT INTO `tm_setwaktu` VALUES (4, '14.00 - 16.00', 3);
INSERT INTO `tm_setwaktu` VALUES (5, '16.00 - 18.00', 3);

-- ----------------------------
-- Table structure for tm_user
-- ----------------------------
DROP TABLE IF EXISTS `tm_user`;
CREATE TABLE `tm_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_ktp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatan_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelurahan_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_pos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kelamin_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `agama_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_user` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_input` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `verif_flag` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fotosatu` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `fotodiri` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_user
-- ----------------------------
INSERT INTO `tm_user` VALUES (9, '3302265602970002', 'Utami Widyatama', 'Jl. Prof M Yamin No.35. Rt06/Rw03', '2', '13', '53144', 'Perempuan', '1', 'Banyumas', '1996-02-16', '081392065155', 'cuci', '3', '2020-06-03 21:15:11', NULL, 'rumah1.jpeg', NULL, '-7.434546', '109.244499');
INSERT INTO `tm_user` VALUES (10, '3301131207950002', 'bayu', 'Jl. Genteng kulon Rt.03/Rw.06', '1', '1', '53256', 'Laki-laki', '1', 'Cilacap', '1995-07-12', '085647907827', 'cuci', '2', '2020-06-03 21:15:12', NULL, NULL, '7f700044-58e3-401a-85ad-6ca74f7edf9a.jpg', '-7.434546', '109.244499');
INSERT INTO `tm_user` VALUES (11, '3329031201960001', 'M.Iqbal Husen', 'purwokerto', '4', '27', '55555', 'L', '1', 'Brebes', '0000-00-00', '081326399213', 'cuci', '1', '2020-06-03 21:15:13', NULL, NULL, NULL, '-7.434546', '109.244499');
INSERT INTO `tm_user` VALUES (12, '3302246807980001', 'Yuliana Dewi Utami', 'Teluk Jl. Lensapura Rt03/Rw03 ', '2', '14', '53145', 'Perempuan', '1', 'Banyumas', '1998-07-25', '081229916515', 'cuci', '3', '2020-06-03 21:15:14', NULL, 'rumah2.jpeg', NULL, '-7.434546', '109.244499');
INSERT INTO `tm_user` VALUES (13, '3302061002970004', 'Adit', 'Jl. Sidamulya Rt.01/Rw.03 Kemranjen', '1', '1', '53194', 'Laki-laki', '1', 'Banyumas', '1997-02-10', '085602218947', 'cuci', '2', '2020-06-03 21:15:15', NULL, NULL, '81114da5-80d3-4cea-9c99-eb4dff96b4b6.jpg', '-7.434546', '109.244499');
INSERT INTO `tm_user` VALUES (15, '3302246311960001', 'Ine Vionita', 'KarangKlesem Jl. Prof. Moch Yamin Rt03/Rw03', '2', '13', '53144', 'Perempuan', '1', 'Banyumas', '1996-11-23', '085879874774', 'cuci', '3', '2020-06-03 21:15:17', NULL, 'Rumah3.jpg', NULL, '-7.434546', '109.244499');
INSERT INTO `tm_user` VALUES (16, '3302255108910001', 'Agustiar Kristyandari', 'Pasirkidul Jl. Kertawibawa Rt.03/Rw.04', '3', '16', '53135', 'Perempuan', '1', 'Banyumas', '1991-08-11', '081225205432', 'cuci', '3', '2020-06-03 21:15:20', NULL, 'Rumah4.jpeg', NULL, '-7.434546', '109.244499');
INSERT INTO `tm_user` VALUES (17, '3302260105990001', 'Prayoga Hidayatullah', 'Jl. Kauman Lama 2 No.24 Rt.03/Rw.05', '4', '24', '53114', 'Laki-laki', '1', 'Banyumas', '1999-05-01', '081578432127', 'cuci', '3', '2020-06-03 21:15:20', NULL, 'rumah5.jpg', NULL, '-7.434546', '109.244499');
INSERT INTO `tm_user` VALUES (19, '3329030301960001', 'Salman', 'Jl. H.Marzuqi Rt.02/Rw.04 Sawangan', '1', '4', '52273', 'Laki-laki', '1', 'Brebes', '1996-01-03', '085648043696', 'cuci', '2', '2020-06-03 21:15:22', NULL, NULL, 'adde18bd-0810-4f6f-8cd2-ac70db1cad2c.jpg', '-7.434546', '109.244499');
INSERT INTO `tm_user` VALUES (20, '1', 'teslong', 'kembaran', '2', '8', '44444', 'L', NULL, 'Bna', '2003-06-17', '13123123123123', 'cuci', '3', '2020-06-03 21:44:11', NULL, 'logobmsajibarang1 copy.jpg', NULL, '-7.426743', '109.265968');

-- ----------------------------
-- Table structure for tm_userdetailmobil
-- ----------------------------
DROP TABLE IF EXISTS `tm_userdetailmobil`;
CREATE TABLE `tm_userdetailmobil`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mobil` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_userdetailmobil
-- ----------------------------
INSERT INTO `tm_userdetailmobil` VALUES (1, '3302265602970002', 'Agya');
INSERT INTO `tm_userdetailmobil` VALUES (2, '3304011511950003', 'Apv ');
INSERT INTO `tm_userdetailmobil` VALUES (3, '112', 'Avanza');
INSERT INTO `tm_userdetailmobil` VALUES (4, '9999', 'Avanza');
INSERT INTO `tm_userdetailmobil` VALUES (5, '3301221407010004', 'Xenia');
INSERT INTO `tm_userdetailmobil` VALUES (6, '3301221407010004', 'Avanza');
INSERT INTO `tm_userdetailmobil` VALUES (7, '123', 'sdsd');
INSERT INTO `tm_userdetailmobil` VALUES (8, '3304180201950001', 'Agiya');
INSERT INTO `tm_userdetailmobil` VALUES (9, '3301202204950001', 'Livina');
INSERT INTO `tm_userdetailmobil` VALUES (10, '3304010309880001', 'Luxio');
INSERT INTO `tm_userdetailmobil` VALUES (11, '3302260105990001', 'Inova');
INSERT INTO `tm_userdetailmobil` VALUES (12, '3302265602970002', 'Luxio');
INSERT INTO `tm_userdetailmobil` VALUES (13, '3302246807980001', 'Livina');
INSERT INTO `tm_userdetailmobil` VALUES (14, '3302246807980001', 'Avanza');
INSERT INTO `tm_userdetailmobil` VALUES (15, '3302246311960001', 'Panther');
INSERT INTO `tm_userdetailmobil` VALUES (16, '3302255108910001', 'Lgx');
INSERT INTO `tm_userdetailmobil` VALUES (17, '3302255108910001', 'Datsun Go');
INSERT INTO `tm_userdetailmobil` VALUES (18, '3302246311960001', 'Xenia');
INSERT INTO `tm_userdetailmobil` VALUES (19, '1', 'avanza');

-- ----------------------------
-- Table structure for tr_cuci
-- ----------------------------
DROP TABLE IF EXISTS `tr_cuci`;
CREATE TABLE `tr_cuci`  (
  `cuci_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_cuci` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pelanggan_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jumlah` int(11) NULL DEFAULT NULL,
  `total_bayar` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_lengkap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_hp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_user_pencuci` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pencuci_verif_at` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_pesan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_jam` int(100) NULL DEFAULT NULL,
  `id_harga` int(100) NULL DEFAULT NULL,
  PRIMARY KEY (`cuci_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tr_cuci
-- ----------------------------
INSERT INTO `tr_cuci` VALUES (1, 'TRS0001', '3302265602970002', 1, '50000', NULL, NULL, '3', '10', '04/05/', '2020-04-10', 1, 1);
INSERT INTO `tr_cuci` VALUES (2, 'TRS0002', '3302265602970002', 1, '50000', NULL, NULL, '3', '19', '04/05/', '2020-04-10', 4, 1);
INSERT INTO `tr_cuci` VALUES (3, 'TRS0003', '3302260105990001', 1, '60000', NULL, NULL, '3', '13', '04/05/', '2020-04-10', 2, 2);
INSERT INTO `tr_cuci` VALUES (4, 'TRS0004', '3302246807980001', 1, '50000', NULL, NULL, '3', '19', '04/05/', '2020-04-11', 2, 1);
INSERT INTO `tr_cuci` VALUES (5, 'TRS0005', '3302246807980001', 1, '60000', NULL, NULL, '3', '13', '04/05/', '2020-04-12', 4, 2);
INSERT INTO `tr_cuci` VALUES (6, 'TRS0006', '3302255108910001', 1, '50000', NULL, NULL, '2', '10', '04/05/', '2020-04-13', 1, 1);
INSERT INTO `tr_cuci` VALUES (7, 'TRS0007', '3302246311960001', 1, '50000', NULL, NULL, '3', '19', '04/05/', '2020-04-20', 1, 1);
INSERT INTO `tr_cuci` VALUES (8, 'TRS0008', '3302246311960001', 1, '50000', NULL, NULL, '3', '10', '04/05/', '2020-04-20', 2, 1);
INSERT INTO `tr_cuci` VALUES (9, 'TRS0009', '3302265602970002', 1, '50000', NULL, NULL, '3', '13', '04/05/', '2020-04-22', 3, 1);
INSERT INTO `tr_cuci` VALUES (10, 'TRS0010', '3302260105990001', 1, '50000', NULL, NULL, '3', '10', '04/05/', '2020-04-24', 4, 1);
INSERT INTO `tr_cuci` VALUES (11, 'TRS0011', '3302255108910001', 1, '50000', NULL, NULL, '3', '19', '04/05/', '2020-04-26', 1, 1);
INSERT INTO `tr_cuci` VALUES (12, 'TRS0012', '3302255108910001', 1, '50000', NULL, NULL, '3', '13', '04/05/', '2020-04-26', 4, 1);
INSERT INTO `tr_cuci` VALUES (13, 'TRS0013', '3302246311960001', 1, '50000', NULL, NULL, '3', '19', '06/05/', '2020-05-01', 1, 1);
INSERT INTO `tr_cuci` VALUES (14, 'TRS0014', '3302246311960001', 1, '60000', NULL, NULL, '3', '19', '06/05/', '2020-05-01', 3, 2);
INSERT INTO `tr_cuci` VALUES (15, 'TRS0015', '3302246807980001', 1, '60000', NULL, NULL, '3', '13', '06/05/', '2020-05-01', 2, 2);
INSERT INTO `tr_cuci` VALUES (16, 'TRS0016', '3302260105990001', 1, '50000', NULL, NULL, '3', '10', '06/05/', '2020-05-01', 5, 1);
INSERT INTO `tr_cuci` VALUES (17, 'TRS0017', '3302255108910001', 1, '60000', NULL, NULL, '3', '19', '06/05/', '2020-05-01', 2, 2);
INSERT INTO `tr_cuci` VALUES (18, 'TRS0018', '3302246311960001', 1, '50000', NULL, NULL, '3', '19', '06/05/', '2020-05-02', 1, 1);
INSERT INTO `tr_cuci` VALUES (19, 'TRS0019', '3302255108910001', 1, '50000', NULL, NULL, '3', '13', '06/05/', '2020-05-02', 1, 1);
INSERT INTO `tr_cuci` VALUES (20, 'TRS0020', '1', NULL, NULL, NULL, NULL, '2', '10', NULL, '2020-06-04', 2, 1);

-- ----------------------------
-- Table structure for tr_cuci_detail
-- ----------------------------
DROP TABLE IF EXISTS `tr_cuci_detail`;
CREATE TABLE `tr_cuci_detail`  (
  `cuci_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_cuci` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pelanggan_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mobil_id` int(11) NULL DEFAULT NULL,
  `tgl_pesan` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cuci_detail_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tr_cuci_detail
-- ----------------------------
INSERT INTO `tr_cuci_detail` VALUES (1, 'TRS0001', '3302265602970002', 1, '2020-04-10');
INSERT INTO `tr_cuci_detail` VALUES (2, 'TRS0002', '3302265602970002', 12, '2020-04-10');
INSERT INTO `tr_cuci_detail` VALUES (3, 'TRS0003', '3302260105990001', 11, '2020-04-10');
INSERT INTO `tr_cuci_detail` VALUES (4, 'TRS0004', '3302246807980001', 13, '2020-04-11');
INSERT INTO `tr_cuci_detail` VALUES (5, 'TRS0005', '3302246807980001', 13, '2020-04-12');
INSERT INTO `tr_cuci_detail` VALUES (6, 'TRS0006', '3302255108910001', 16, '2020-04-13');
INSERT INTO `tr_cuci_detail` VALUES (7, 'TRS0007', '3302246311960001', 18, '2020-04-20');
INSERT INTO `tr_cuci_detail` VALUES (8, 'TRS0008', '3302246311960001', 15, '2020-04-20');
INSERT INTO `tr_cuci_detail` VALUES (9, 'TRS0009', '3302265602970002', 1, '2020-04-22');
INSERT INTO `tr_cuci_detail` VALUES (10, 'TRS0010', '3302260105990001', 11, '2020-05-24');
INSERT INTO `tr_cuci_detail` VALUES (11, 'TRS0011', '3302255108910001', 16, '2020-04-26');
INSERT INTO `tr_cuci_detail` VALUES (12, 'TRS0012', '3302255108910001', 17, '2020-04-26');
INSERT INTO `tr_cuci_detail` VALUES (13, 'TRS0013', '3302246311960001', 15, '2020-05-01');
INSERT INTO `tr_cuci_detail` VALUES (14, 'TRS0014', '3302246311960001', 18, '2020-05-01');
INSERT INTO `tr_cuci_detail` VALUES (15, 'TRS0015', '3302246807980001', 13, '2020-05-01');
INSERT INTO `tr_cuci_detail` VALUES (16, 'TRS0016', '3302260105990001', 11, '2020-05-01');
INSERT INTO `tr_cuci_detail` VALUES (17, 'TRS0017', '3302255108910001', 16, '2020-05-01');
INSERT INTO `tr_cuci_detail` VALUES (18, 'TRS0018', '3302246311960001', 18, '2020-05-02');
INSERT INTO `tr_cuci_detail` VALUES (19, 'TRS0019', '3302255108910001', 17, '2020-05-02');
INSERT INTO `tr_cuci_detail` VALUES (20, 'TRS0020', '1', 19, '2020-06-04');

-- ----------------------------
-- View structure for view_user
-- ----------------------------
DROP VIEW IF EXISTS `view_user`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_user` AS select `a`.`no_ktp` AS `no_ktp`,`a`.`nama` AS `nama`,`a`.`alamat` AS `alamat`,`b`.`kecamatan` AS `kecamatan`,`c`.`kelurahan` AS `kelurahan`,`a`.`tempat_lahir` AS `tempat_lahir`,`a`.`tanggal_lahir` AS `tanggal_lahir`,`a`.`no_telp` AS `no_telp`,`a`.`jenis_user` AS `jenis_user`,`a`.`fotosatu` AS `fotosatu` from ((`tm_user` `a` join `kecamatan` `b` on((`a`.`kecamatan_id` = `b`.`kecamatan_id`))) join `kelurahan` `c` on((`a`.`kelurahan_id` = `c`.`kelurahan_id`))) ; ;

SET FOREIGN_KEY_CHECKS = 1;
