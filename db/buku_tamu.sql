/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : db_sekolahku

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 20/10/2024 08:15:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for buku_tamu
-- ----------------------------
DROP TABLE IF EXISTS `buku_tamu`;
CREATE TABLE `buku_tamu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `bidang` varchar(255) DEFAULT NULL,
  `keperluan` text,
  `updated_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ;

-- ----------------------------
-- Records of buku_tamu
-- ----------------------------
INSERT INTO `buku_tamu` VALUES (1, 'shea', '081217173406', 'UWP', 'Prodi Teknik Informatika', 'penyuluhan', '2024-10-20 01:01:58', '2024-10-20 01:01:58');
INSERT INTO `buku_tamu` VALUES (2, 'shea', '081217173406', 'UWP', 'Prodi Teknik Informatika', 'penyuluhan', '2024-10-20 01:02:37', '2024-10-20 01:02:37');

SET FOREIGN_KEY_CHECKS = 1;
