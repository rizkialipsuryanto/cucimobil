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

 Date: 03/06/2020 21:10:04
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_chat
-- ----------------------------
INSERT INTO `t_chat` VALUES (1, '', 9, NULL);
INSERT INTO `t_chat` VALUES (2, 'aaaa', 9, NULL);
INSERT INTO `t_chat` VALUES (3, 'vvvvv', 9, NULL);
INSERT INTO `t_chat` VALUES (4, 'nunggu sabun', 9, NULL);
INSERT INTO `t_chat` VALUES (5, '', 9, NULL);

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
INSERT INTO `tm_hargacuci` VALUES (1, 'Cuci Biasa', 35000);
INSERT INTO `tm_hargacuci` VALUES (2, 'Cuci+Poles', 45000);

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
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_user
-- ----------------------------
INSERT INTO `tm_user` VALUES (9, '3304011511950003', 'Rizki Alip', 'gang a no 55', '4', '27', '55555', 'L', '1', 'Banjarnegara', '1995-11-15', '085640769886', 'cuci', '3', '2019-11-30 22:12:58', NULL, NULL);
INSERT INTO `tm_user` VALUES (10, '123', 'Bayu', 'purwokerto', '2', '12', '5555', 'Laki-laki', '1', 'Purwokerto', '1997-12-18', '08624562', 'cuci', '2', '2020-03-13 00:06:02', NULL, NULL);
INSERT INTO `tm_user` VALUES (11, '234', 'Gibul', '-', '4', '27', '55555', 'L', '1', NULL, NULL, NULL, 'cuci', '1', '2019-12-18 08:59:59', NULL, NULL);
INSERT INTO `tm_user` VALUES (12, '321', 'Adam', 'aaaaaa', '4', '26', '55555', 'Laki-laki', '1', 'Purbalingga', '1987-11-20', '085640769886', 'cuci', '3', '2019-12-18 09:13:56', NULL, 'Lighthouse.jpg');
INSERT INTO `tm_user` VALUES (13, '3333', 'boom', 'purwokerto', '1', '4', '55555', 'Laki-laki', '1', 'Purbalingga', '1996-11-21', '085640769886', 'cuci', '2', '2020-03-13 00:06:56', NULL, NULL);
INSERT INTO `tm_user` VALUES (15, '112', 'Samidun', 'Desa Jangkrik Rt 02 Rw 03', '2', '11', '2121', 'Laki-laki', '1', 'Banyumas', '2000-01-10', '00000', 'cuci', '3', '2019-12-18 22:33:48', NULL, 'Desert.jpg');

-- ----------------------------
-- Table structure for tm_userdetailmobil
-- ----------------------------
DROP TABLE IF EXISTS `tm_userdetailmobil`;
CREATE TABLE `tm_userdetailmobil`  (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mobil` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tm_userdetailmobil
-- ----------------------------
INSERT INTO `tm_userdetailmobil` VALUES (1, '3304011511950003', 'Agya');
INSERT INTO `tm_userdetailmobil` VALUES (2, '3304011511950003', 'Apv ');
INSERT INTO `tm_userdetailmobil` VALUES (3, '112', 'Avanza');
INSERT INTO `tm_userdetailmobil` VALUES (4, '9999', 'Avanza');
INSERT INTO `tm_userdetailmobil` VALUES (5, '321', 'Xenia');
INSERT INTO `tm_userdetailmobil` VALUES (6, '321', 'Avanza');
INSERT INTO `tm_userdetailmobil` VALUES (7, '123', 'sdsd');

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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tr_cuci
-- ----------------------------
INSERT INTO `tr_cuci` VALUES (1, 'TRS0001', '3304011511950003', 1, '11000', NULL, NULL, '3', '10', '15/12/', '2019-12-15', 1, 2);
INSERT INTO `tr_cuci` VALUES (2, 'TRS0002', '3304011511950003', 2, '12000', NULL, NULL, '2', '10', '16/12/', '2019-12-17', 2, 1);
INSERT INTO `tr_cuci` VALUES (3, 'TRS0003', '112', 1, '11000', NULL, NULL, '2', '13', '16/12/', '2019-12-17', 2, 2);
INSERT INTO `tr_cuci` VALUES (4, 'TRS0004', '9999', 1, '6000', NULL, NULL, '1', '10', '18/12/', '2019-12-19', 1, 1);
INSERT INTO `tr_cuci` VALUES (5, 'TRS0005', '321', 1, '11000', NULL, NULL, '3', '10', '18/12/', '2019-12-19', 2, 2);
INSERT INTO `tr_cuci` VALUES (6, 'TRS0006', '3304011511950003', NULL, NULL, NULL, NULL, '3', '10', NULL, '2019-12-18', 1, 1);
INSERT INTO `tr_cuci` VALUES (7, 'TRS0007', '321', NULL, NULL, NULL, NULL, '3', '10', NULL, '2019-12-23', 5, 2);
INSERT INTO `tr_cuci` VALUES (8, 'TRS0008', '321', NULL, NULL, NULL, NULL, '2', '13', NULL, '2019-12-23', 5, 1);
INSERT INTO `tr_cuci` VALUES (9, 'TRS0009', '321', NULL, NULL, NULL, NULL, '1', NULL, NULL, '2019-12-23', 5, 2);
INSERT INTO `tr_cuci` VALUES (10, 'TRS0010', '321', NULL, NULL, NULL, NULL, '2', '10', NULL, '2020-01-10', 3, 1);
INSERT INTO `tr_cuci` VALUES (11, 'TRS0011', '321', NULL, NULL, NULL, NULL, '1', NULL, NULL, '2020-03-22', 1, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tr_cuci_detail
-- ----------------------------
INSERT INTO `tr_cuci_detail` VALUES (1, 'TRS0001', '3304011511950003', 1, '2019-12-15');
INSERT INTO `tr_cuci_detail` VALUES (2, 'TRS0002', '3304011511950003', 1, '2019-12-17');
INSERT INTO `tr_cuci_detail` VALUES (3, 'TRS0002', '3304011511950003', 2, '2019-12-17');
INSERT INTO `tr_cuci_detail` VALUES (4, 'TRS0003', '112', 3, '2019-12-16');
INSERT INTO `tr_cuci_detail` VALUES (5, 'TRS0004', '9999', 4, '2019-12-18');
INSERT INTO `tr_cuci_detail` VALUES (6, 'TRS0005', '321', 5, '2019-12-19');
INSERT INTO `tr_cuci_detail` VALUES (7, 'TRS0006', '3304011511950003', 1, '2019-12-18');
INSERT INTO `tr_cuci_detail` VALUES (8, 'TRS0007', '321', 5, '2019-12-23');
INSERT INTO `tr_cuci_detail` VALUES (9, 'TRS0008', '321', 6, '2019-12-23');
INSERT INTO `tr_cuci_detail` VALUES (10, 'TRS0009', '321', 5, '2019-12-23');
INSERT INTO `tr_cuci_detail` VALUES (11, 'TRS0010', '321', 5, '2020-01-10');
INSERT INTO `tr_cuci_detail` VALUES (12, 'TRS0011', '321', 5, '2020-03-22');

-- ----------------------------
-- View structure for view_user
-- ----------------------------
DROP VIEW IF EXISTS `view_user`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_user` AS select `a`.`no_ktp` AS `no_ktp`,`a`.`nama` AS `nama`,`a`.`alamat` AS `alamat`,`b`.`kecamatan` AS `kecamatan`,`c`.`kelurahan` AS `kelurahan`,`a`.`tempat_lahir` AS `tempat_lahir`,`a`.`tanggal_lahir` AS `tanggal_lahir`,`a`.`no_telp` AS `no_telp`,`a`.`jenis_user` AS `jenis_user`,`a`.`fotosatu` AS `fotosatu` from ((`tm_user` `a` join `kecamatan` `b` on((`a`.`kecamatan_id` = `b`.`kecamatan_id`))) join `kelurahan` `c` on((`a`.`kelurahan_id` = `c`.`kelurahan_id`))); ;

SET FOREIGN_KEY_CHECKS = 1;
