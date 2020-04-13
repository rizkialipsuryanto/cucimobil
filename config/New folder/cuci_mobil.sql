/*
Navicat MySQL Data Transfer

Source Server         : Gibul
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : cuci_mobil

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2019-12-18 22:21:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `agama`
-- ----------------------------
DROP TABLE IF EXISTS `agama`;
CREATE TABLE `agama` (
  `id_agama` int(11) NOT NULL,
  `agama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of agama
-- ----------------------------
INSERT INTO `agama` VALUES ('1', 'Islam');
INSERT INTO `agama` VALUES ('2', 'Hindu');
INSERT INTO `agama` VALUES ('3', 'Budha');
INSERT INTO `agama` VALUES ('4', 'Kristen');
INSERT INTO `agama` VALUES ('5', 'Katolik');
INSERT INTO `agama` VALUES ('6', 'Kong Hu Cu');

-- ----------------------------
-- Table structure for `kecamatan`
-- ----------------------------
DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE `kecamatan` (
  `kecamatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kecamatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kecamatan
-- ----------------------------
INSERT INTO `kecamatan` VALUES ('1', 'Purwokerto Utara');
INSERT INTO `kecamatan` VALUES ('2', 'Purwokerto Selatan');
INSERT INTO `kecamatan` VALUES ('3', 'Purwokerto Barat');
INSERT INTO `kecamatan` VALUES ('4', 'Purwokerto Timur');

-- ----------------------------
-- Table structure for `kelurahan`
-- ----------------------------
DROP TABLE IF EXISTS `kelurahan`;
CREATE TABLE `kelurahan` (
  `kelurahan_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`kelurahan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kelurahan
-- ----------------------------
INSERT INTO `kelurahan` VALUES ('1', 'Bobosan', '1');
INSERT INTO `kelurahan` VALUES ('2', 'Purwanegara', '1');
INSERT INTO `kelurahan` VALUES ('3', 'Bancarkembar', '1');
INSERT INTO `kelurahan` VALUES ('4', 'Sumampir', '1');
INSERT INTO `kelurahan` VALUES ('5', 'Pabuaran', '1');
INSERT INTO `kelurahan` VALUES ('6', 'Grendeng', '1');
INSERT INTO `kelurahan` VALUES ('7', 'Karangwangkal', '1');
INSERT INTO `kelurahan` VALUES ('8', 'Berkoh', '2');
INSERT INTO `kelurahan` VALUES ('9', 'Purwokerto Kidul', '2');
INSERT INTO `kelurahan` VALUES ('10', 'Purwokerto Kulon', '2');
INSERT INTO `kelurahan` VALUES ('11', 'Karangpucung', '2');
INSERT INTO `kelurahan` VALUES ('12', 'Tanjung', '2');
INSERT INTO `kelurahan` VALUES ('13', 'Karangklesem', '2');
INSERT INTO `kelurahan` VALUES ('14', 'Teluk', '2');
INSERT INTO `kelurahan` VALUES ('15', 'Karanglewas Lor', '3');
INSERT INTO `kelurahan` VALUES ('16', 'Pasir Kidul', '3');
INSERT INTO `kelurahan` VALUES ('17', 'Rejasari', '3');
INSERT INTO `kelurahan` VALUES ('18', 'Bantarsoka', '3');
INSERT INTO `kelurahan` VALUES ('19', 'Kober', '3');
INSERT INTO `kelurahan` VALUES ('20', 'Kedungwuluh', '3');
INSERT INTO `kelurahan` VALUES ('21', 'Pasirmuncang', '3');
INSERT INTO `kelurahan` VALUES ('22', 'Sokanegara', '4');
INSERT INTO `kelurahan` VALUES ('23', 'Kranji', '4');
INSERT INTO `kelurahan` VALUES ('24', 'Purwokerto Lor', '4');
INSERT INTO `kelurahan` VALUES ('25', 'Purwokerto Wetan', '4');
INSERT INTO `kelurahan` VALUES ('26', 'Mersi', '4');
INSERT INTO `kelurahan` VALUES ('27', 'Arcawinangun', '4');

-- ----------------------------
-- Table structure for `tm_hargacuci`
-- ----------------------------
DROP TABLE IF EXISTS `tm_hargacuci`;
CREATE TABLE `tm_hargacuci` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(50) DEFAULT NULL,
  `harga` float(50,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tm_hargacuci
-- ----------------------------
INSERT INTO `tm_hargacuci` VALUES ('1', 'Cuci', '10000');
INSERT INTO `tm_hargacuci` VALUES ('2', 'Cuci+Poles', '11000');

-- ----------------------------
-- Table structure for `tm_setwaktu`
-- ----------------------------
DROP TABLE IF EXISTS `tm_setwaktu`;
CREATE TABLE `tm_setwaktu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `waktu` varchar(50) DEFAULT NULL,
  `kuota` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tm_setwaktu
-- ----------------------------
INSERT INTO `tm_setwaktu` VALUES ('1', '08.00 - 10.00', '3');
INSERT INTO `tm_setwaktu` VALUES ('2', '10.00 - 12.00', '4');
INSERT INTO `tm_setwaktu` VALUES ('3', '12.00 - 14.00', '3');
INSERT INTO `tm_setwaktu` VALUES ('4', '14.00 - 16.00', '3');
INSERT INTO `tm_setwaktu` VALUES ('5', '16.00 - 18.00', '3');

-- ----------------------------
-- Table structure for `tm_user`
-- ----------------------------
DROP TABLE IF EXISTS `tm_user`;
CREATE TABLE `tm_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `fotosatu` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tm_user
-- ----------------------------
INSERT INTO `tm_user` VALUES ('9', '3304011511950003', 'Rizki Alip', 'gang a no 55', '4', '27', '55555', 'L', '1', 'Banjarnegara', '1995-11-15', '085640769886', 'cuci', '3', '2019-11-30 22:12:58', null, null);
INSERT INTO `tm_user` VALUES ('10', '123', 'Bayu', 'jasdjasdk', '1', '1', '5555', 'Laki-laki', '1', 'Purwokerto', '1997-12-18', '08624562', 'cuci', '2', '2019-12-18 22:36:49', null, null);
INSERT INTO `tm_user` VALUES ('11', '234', 'Gibul', '-', '4', '27', '55555', 'L', '1', null, null, null, 'cuci', '1', '2019-12-18 08:59:59', null, null);
INSERT INTO `tm_user` VALUES ('12', '321', 'Adam', 'aaaaaa', '4', '26', '55555', 'Laki-laki', '1', 'Purbalingga', '1987-11-20', '085640769886', 'cuci', '3', '2019-12-18 09:13:56', null, 'Lighthouse.jpg');
INSERT INTO `tm_user` VALUES ('13', '3333', 'boom', 'aaaaaa', '4', '27', '55555', 'Laki-laki', '1', 'Purbalingga', '1996-11-21', '085640769886', 'cuci', '2', '2019-12-01 07:02:28', null, null);
INSERT INTO `tm_user` VALUES ('15', '112', 'Samidun', 'Desa Jangkrik Rt 02 Rw 03', '2', '11', '2121', 'Laki-laki', '1', 'Banyumas', '2000-01-10', '00000', 'cuci', '3', '2019-12-18 22:33:48', null, 'Desert.jpg');

-- ----------------------------
-- Table structure for `tm_userdetailmobil`
-- ----------------------------
DROP TABLE IF EXISTS `tm_userdetailmobil`;
CREATE TABLE `tm_userdetailmobil` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nik` varchar(30) DEFAULT NULL,
  `mobil` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tm_userdetailmobil
-- ----------------------------
INSERT INTO `tm_userdetailmobil` VALUES ('1', '3304011511950003', 'Agya');
INSERT INTO `tm_userdetailmobil` VALUES ('2', '3304011511950003', 'Apv ');
INSERT INTO `tm_userdetailmobil` VALUES ('3', '112', 'Avanza');
INSERT INTO `tm_userdetailmobil` VALUES ('4', '9999', 'Avanza');
INSERT INTO `tm_userdetailmobil` VALUES ('5', '321', 'Xenia');
INSERT INTO `tm_userdetailmobil` VALUES ('6', '321', 'Avanza');

-- ----------------------------
-- Table structure for `tr_cuci`
-- ----------------------------
DROP TABLE IF EXISTS `tr_cuci`;
CREATE TABLE `tr_cuci` (
  `cuci_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_harga` int(100) DEFAULT NULL,
  PRIMARY KEY (`cuci_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_cuci
-- ----------------------------
INSERT INTO `tr_cuci` VALUES ('1', 'TRS0001', '3304011511950003', '1', '11000', null, null, '3', '10', '15/12/', '2019-12-15', '1', '2');
INSERT INTO `tr_cuci` VALUES ('2', 'TRS0002', '3304011511950003', '2', '12000', null, null, '2', '10', '16/12/', '2019-12-17', '2', '1');
INSERT INTO `tr_cuci` VALUES ('3', 'TRS0003', '112', '1', '11000', null, null, '2', '13', '16/12/', '2019-12-17', '2', '2');
INSERT INTO `tr_cuci` VALUES ('4', 'TRS0004', '9999', '1', '6000', null, null, '1', '10', '18/12/', '2019-12-19', '1', '1');
INSERT INTO `tr_cuci` VALUES ('5', 'TRS0005', '321', '1', '11000', null, null, '2', '10', '18/12/', '2019-12-19', '2', '2');
INSERT INTO `tr_cuci` VALUES ('6', 'TRS0006', '3304011511950003', null, null, null, null, '2', '10', null, '2019-12-18', '1', '1');
INSERT INTO `tr_cuci` VALUES ('7', 'TRS0007', '321', null, null, null, null, '2', '10', null, '2019-12-23', '5', '2');
INSERT INTO `tr_cuci` VALUES ('8', 'TRS0008', '321', null, null, null, null, '2', '13', null, '2019-12-23', '5', '1');
INSERT INTO `tr_cuci` VALUES ('9', 'TRS0009', '321', null, null, null, null, '1', null, null, '2019-12-23', '5', '2');

-- ----------------------------
-- Table structure for `tr_cuci_detail`
-- ----------------------------
DROP TABLE IF EXISTS `tr_cuci_detail`;
CREATE TABLE `tr_cuci_detail` (
  `cuci_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_cuci` varchar(50) DEFAULT NULL,
  `pelanggan_id` varchar(255) DEFAULT NULL,
  `mobil_id` int(11) DEFAULT NULL,
  `tgl_pesan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cuci_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_cuci_detail
-- ----------------------------
INSERT INTO `tr_cuci_detail` VALUES ('1', 'TRS0001', '3304011511950003', '1', '2019-12-15');
INSERT INTO `tr_cuci_detail` VALUES ('2', 'TRS0002', '3304011511950003', '1', '2019-12-17');
INSERT INTO `tr_cuci_detail` VALUES ('3', 'TRS0002', '3304011511950003', '2', '2019-12-17');
INSERT INTO `tr_cuci_detail` VALUES ('4', 'TRS0003', '112', '3', '2019-12-16');
INSERT INTO `tr_cuci_detail` VALUES ('5', 'TRS0004', '9999', '4', '2019-12-18');
INSERT INTO `tr_cuci_detail` VALUES ('6', 'TRS0005', '321', '5', '2019-12-19');
INSERT INTO `tr_cuci_detail` VALUES ('7', 'TRS0006', '3304011511950003', '1', '2019-12-18');
INSERT INTO `tr_cuci_detail` VALUES ('8', 'TRS0007', '321', '5', '2019-12-23');
INSERT INTO `tr_cuci_detail` VALUES ('9', 'TRS0008', '321', '6', '2019-12-23');
INSERT INTO `tr_cuci_detail` VALUES ('10', 'TRS0009', '321', '5', '2019-12-23');

-- ----------------------------
-- View structure for `view_user`
-- ----------------------------
DROP VIEW IF EXISTS `view_user`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user` AS select `a`.`no_ktp` AS `no_ktp`,`a`.`nama` AS `nama`,`a`.`alamat` AS `alamat`,`b`.`kecamatan` AS `kecamatan`,`c`.`kelurahan` AS `kelurahan`,`a`.`tempat_lahir` AS `tempat_lahir`,`a`.`tanggal_lahir` AS `tanggal_lahir`,`a`.`no_telp` AS `no_telp`,`a`.`jenis_user` AS `jenis_user`,`a`.`fotosatu` AS `fotosatu` from ((`tm_user` `a` join `kecamatan` `b` on((`a`.`kecamatan_id` = `b`.`kecamatan_id`))) join `kelurahan` `c` on((`a`.`kelurahan_id` = `c`.`kelurahan_id`))) ;
