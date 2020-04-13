/*
Navicat MySQL Data Transfer

Source Server         : mysql@lokal
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : jasa_tiki

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-11-23 21:59:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for agama
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
-- Table structure for jenis_pelayanan
-- ----------------------------
DROP TABLE IF EXISTS `jenis_pelayanan`;
CREATE TABLE `jenis_pelayanan` (
  `id_jenis_pelayanan` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_pelayanan` varchar(255) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `ongkir_perkg` float DEFAULT NULL,
  `estimasi_hari` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_pelayanan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jenis_pelayanan
-- ----------------------------
INSERT INTO `jenis_pelayanan` VALUES ('1', 'ONS', '1', '20000', '1-2 hari');
INSERT INTO `jenis_pelayanan` VALUES ('2', 'REGULER', '1', '15000', '2-3 hari');
INSERT INTO `jenis_pelayanan` VALUES ('3', 'EKONOMI', '1', '12000', '3-4 hari');
INSERT INTO `jenis_pelayanan` VALUES ('4', 'ONS', '2', '40000', '1-2 hari');
INSERT INTO `jenis_pelayanan` VALUES ('5', 'REGULER', '2', '25000', '2-3 hari');
INSERT INTO `jenis_pelayanan` VALUES ('6', 'EKONOMI', '2', '17000', '3-4 hari');

-- ----------------------------
-- Table structure for jenis_user
-- ----------------------------
DROP TABLE IF EXISTS `jenis_user`;
CREATE TABLE `jenis_user` (
  `id_jenis_user` int(11) NOT NULL,
  `jenis_user` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jenis_user
-- ----------------------------
INSERT INTO `jenis_user` VALUES ('1', 'tiki');
INSERT INTO `jenis_user` VALUES ('2', 'kurir');
INSERT INTO `jenis_user` VALUES ('3', 'pelanggan');

-- ----------------------------
-- Table structure for kecamatan
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
-- Table structure for kelurahan
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
-- Table structure for lokasi
-- ----------------------------
DROP TABLE IF EXISTS `lokasi`;
CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lokasi
-- ----------------------------
INSERT INTO `lokasi` VALUES ('1', 'Jawa dan Jabodetabek');
INSERT INTO `lokasi` VALUES ('2', 'Luar Jawa');

-- ----------------------------
-- Table structure for provinsi
-- ----------------------------
DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `provinsi` varchar(255) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of provinsi
-- ----------------------------
INSERT INTO `provinsi` VALUES ('1', 'Nangroe Aceh Darussalam', '2');
INSERT INTO `provinsi` VALUES ('2', 'Sumatera Utara', '2');
INSERT INTO `provinsi` VALUES ('3', 'Sumatera Barat', '2');
INSERT INTO `provinsi` VALUES ('4', 'Riau', '2');
INSERT INTO `provinsi` VALUES ('5', 'Jambi', '2');
INSERT INTO `provinsi` VALUES ('6', 'Sumatera Selatan', '2');
INSERT INTO `provinsi` VALUES ('7', 'Bengkulu', '2');
INSERT INTO `provinsi` VALUES ('8', 'Lampung', '2');
INSERT INTO `provinsi` VALUES ('9', 'Kepulauan Bangka Belitung', '2');
INSERT INTO `provinsi` VALUES ('10', 'Kepulauan Riau', '2');
INSERT INTO `provinsi` VALUES ('11', 'Daerah Khusus Ibukota Jakarta', '1');
INSERT INTO `provinsi` VALUES ('12', 'Jawa Barat', '1');
INSERT INTO `provinsi` VALUES ('13', 'Jawa Tengah', '1');
INSERT INTO `provinsi` VALUES ('14', 'Daerah Istimewa Yogyakarta', '1');
INSERT INTO `provinsi` VALUES ('15', 'Jawa Timur', '1');
INSERT INTO `provinsi` VALUES ('16', 'Banten', '2');
INSERT INTO `provinsi` VALUES ('17', 'Bali', '2');
INSERT INTO `provinsi` VALUES ('18', 'Nusa Tenggara Barat', '2');
INSERT INTO `provinsi` VALUES ('19', 'Nusa Tenggara Timur', '2');
INSERT INTO `provinsi` VALUES ('20', 'Kalimantan Barat', '2');
INSERT INTO `provinsi` VALUES ('21', 'Kalimantan Tengah', '2');
INSERT INTO `provinsi` VALUES ('22', 'Kalimantan Selatan', '2');
INSERT INTO `provinsi` VALUES ('23', 'Kalimantan Timur', '2');
INSERT INTO `provinsi` VALUES ('24', 'Kalimantan Utara', '2');
INSERT INTO `provinsi` VALUES ('25', 'Sulawesi Utara', '2');
INSERT INTO `provinsi` VALUES ('26', 'Sulawesi Tengah', '2');
INSERT INTO `provinsi` VALUES ('27', 'Sulawesi Selatan', '2');
INSERT INTO `provinsi` VALUES ('28', 'Sulawesi Tenggara', '2');
INSERT INTO `provinsi` VALUES ('29', 'Gorontalo', '2');
INSERT INTO `provinsi` VALUES ('30', 'Sulawesi Barat', '2');
INSERT INTO `provinsi` VALUES ('31', 'Maluku', '2');
INSERT INTO `provinsi` VALUES ('32', 'Maluku Utara', '2');
INSERT INTO `provinsi` VALUES ('33', 'Papua Barat', '2');
INSERT INTO `provinsi` VALUES ('34', 'Papua', '2');

-- ----------------------------
-- Table structure for tm_user
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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tm_user
-- ----------------------------
INSERT INTO `tm_user` VALUES ('1', '3304011511950003', 'alip', 'jl gang dipa no 2', '4', '26', '66666', 'Laki-laki', '1', 'banjarnegara', '1995-11-15', '0867264', 'jasa', '3', '2019-11-03 16:02:03', '');
INSERT INTO `tm_user` VALUES ('4', '234', 'ahmad sujono', 'jl gang dipa no 2', '4', '27', '54645', 'Laki-laki', '1', 'cilacap', '2019-11-05', '087378374', 'jasa', '1', '2019-11-03 16:02:12', null);
INSERT INTO `tm_user` VALUES ('5', '1234', 'SUPRIYANTO', 'jl angka', '4', '26', '54645', 'L', '1', 'banyumas', '2019-11-04', '085647', 'jasa', '1', '2019-11-03 14:14:23', null);
INSERT INTO `tm_user` VALUES ('6', '5555', 'kurir', 'jl gang dipa no 2', '4', '26', '66666555', 'Laki-laki', '1', 'banjarnegara', '2019-11-04', '085647', 'jasa', '2', '2019-11-04 15:28:35', null);
INSERT INTO `tm_user` VALUES ('7', '3333', 'john', 'bbb', '4', '26', '3333', 'Laki-laki', '1', 'bna', null, '086236', 'jasa', '3', '2019-11-22 22:22:40', null);
INSERT INTO `tm_user` VALUES ('8', '2222', 'alfaridzi', 'jl gang dipa no 2', '2', '13', '66666', 'L', '1', 'cilacap', '1997-11-12', '098', 'jasa', '3', '2019-11-23 21:57:42', null);

-- ----------------------------
-- Table structure for tr_pesanan
-- ----------------------------
DROP TABLE IF EXISTS `tr_pesanan`;
CREATE TABLE `tr_pesanan` (
  `pesanan_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pesanan` varchar(255) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `nama_penerima` varchar(255) DEFAULT NULL,
  `no_telp_penerima` varchar(255) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL,
  `alamat_penerima` varchar(255) DEFAULT NULL,
  `rt` varchar(255) DEFAULT NULL,
  `rw` varchar(255) DEFAULT NULL,
  `kelurahan` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `id_provinsi` int(11) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `id_jenis_pelayanan` int(11) DEFAULT NULL,
  `tgl_input` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ongkir` float DEFAULT NULL,
  `total_berat_barang_kg` float DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `no_bukti_pembayaran` varchar(255) DEFAULT NULL,
  `no_resi` varchar(255) DEFAULT NULL,
  `kurir_verif_by` varchar(255) DEFAULT NULL,
  `kurir_verif_at` datetime DEFAULT NULL,
  `upload_bukti` varchar(255) DEFAULT NULL,
  `update_foto_barang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pesanan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_pesanan
-- ----------------------------
INSERT INTO `tr_pesanan` VALUES ('12', 'TR/1/alip/2019-11-06', '1', 'alip', '085647', '1', 'susukan', '4', '6', 'gumelem wetan', 'susukan', 'banjarnegara', '13', '54645', '3', '2019-11-20 11:07:19', '312000', '26', '7', '3', '', '5555', '2019-11-08 07:06:29', 'Koala.jpg', null);
INSERT INTO `tr_pesanan` VALUES ('13', 'TR/1/ikbal/2019-11-22', '1', 'ikbal', '0865678', '1', 'salem', '8', '4', 'mbuh', 'salem', 'brebes', '13', '54645', '1', '2019-11-22 22:15:47', '160000', '8', '6', '123457', '5567', '5555', '2019-11-22 10:18:38', 'Hydrangeas.jpg', null);
INSERT INTO `tr_pesanan` VALUES ('14', 'TR/7/acd/2019-11-22', '7', 'acd', '098', '1', 'susukan', '4', '5', 'gumelem wetan', 'susukan', 'banjarnegara', '13', '3', '2', '2019-11-22 22:23:54', '180000', '12', '4', '1234', '6675', '5555', '2019-11-22 10:27:50', 'Tulips.jpg', null);
INSERT INTO `tr_pesanan` VALUES ('15', 'TR/1/acd/2019-11-23', '1', 'acd', '087378374', '1', 'susukan', '4', '5', 'gumelem wetan', 'susukan', 'banjarnegara', '13', '66666', '1', '2019-11-23 12:33:06', null, null, '2', null, null, null, null, null, 'Jellyfish.jpg');
INSERT INTO `tr_pesanan` VALUES ('16', 'TR/8/alip/2019-11-23', '8', 'alip', '08652352', '1', 'susukan', '4', '3', 'asdsad', 'aaa', 'sdad', '14', '66666', '1', '2019-11-23 21:58:40', null, null, '1', null, null, null, null, null, 'Chrysanthemum.jpg');

-- ----------------------------
-- Table structure for tr_pesanan_detail
-- ----------------------------
DROP TABLE IF EXISTS `tr_pesanan_detail`;
CREATE TABLE `tr_pesanan_detail` (
  `pesanan_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_pesanan` varchar(100) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `berat_barang_kg` float DEFAULT NULL,
  PRIMARY KEY (`pesanan_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_pesanan_detail
-- ----------------------------
INSERT INTO `tr_pesanan_detail` VALUES ('31', 'TR/1/alip/2019-11-06', 'sepatu', '5');
INSERT INTO `tr_pesanan_detail` VALUES ('32', 'TR/1/alip/2019-11-06', 'tas', '1');
INSERT INTO `tr_pesanan_detail` VALUES ('33', 'TR/1/alip/2019-11-06', 'kulkas', '20');
INSERT INTO `tr_pesanan_detail` VALUES ('34', 'TR/1/ikbal/2019-11-22', 'sepatu', '6');
INSERT INTO `tr_pesanan_detail` VALUES ('35', 'TR/1/ikbal/2019-11-22', 'panci', '2');
INSERT INTO `tr_pesanan_detail` VALUES ('36', 'TR/7/acd/2019-11-22', 'kulkas', '10');
INSERT INTO `tr_pesanan_detail` VALUES ('37', 'TR/7/acd/2019-11-22', 'box', '1');
INSERT INTO `tr_pesanan_detail` VALUES ('38', 'TR/7/acd/2019-11-22', 'kresek', '1');
INSERT INTO `tr_pesanan_detail` VALUES ('39', 'TR/1/acd/2019-11-23', 'sepatu', null);
INSERT INTO `tr_pesanan_detail` VALUES ('40', 'TR/8/alip/2019-11-23', 'kulkas', null);
INSERT INTO `tr_pesanan_detail` VALUES ('41', 'TR/8/alip/2019-11-23', 'sepatu', null);
