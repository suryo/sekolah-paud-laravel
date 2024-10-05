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

 Date: 05/10/2024 16:49:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of photos
-- ----------------------------
INSERT INTO `photos` VALUES (1, '1', '1', '1.jpg', '2024-10-02 14:28:31', '2024-10-02 14:28:31');
INSERT INTO `photos` VALUES (2, '2', '2', '2.jpg', '2024-10-02 14:32:02', '2024-10-02 14:32:02');
INSERT INTO `photos` VALUES (3, '3', '3', '3.jpg', NULL, NULL);
INSERT INTO `photos` VALUES (4, '4', '4', '4.jpg', NULL, NULL);
INSERT INTO `photos` VALUES (5, '5', '5', '5.jpg', NULL, NULL);
INSERT INTO `photos` VALUES (6, '6', '6', '6.jpg', NULL, NULL);
INSERT INTO `photos` VALUES (7, '7', '7', '7.jpg', NULL, NULL);
INSERT INTO `photos` VALUES (8, '8', '8', '8.jpg', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
