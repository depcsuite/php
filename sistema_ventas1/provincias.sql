/*
 Navicat Premium Data Transfer

 Source Server         : MySQL-TEST
 Source Server Type    : MariaDB
 Source Server Version : 100148
 Source Host           : 192.168.0.211:3310
 Source Schema         : abmventas

 Target Server Type    : MariaDB
 Target Server Version : 100148
 File Encoding         : 65001

 Date: 16/02/2022 18:59:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for provincias
-- ----------------------------
DROP TABLE IF EXISTS `provincias`;
CREATE TABLE `provincias`  (
  `idprovincia` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idprovincia`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of provincias
-- ----------------------------
INSERT INTO `provincias` VALUES (1, 'Buenos Aires');
INSERT INTO `provincias` VALUES (2, 'Capital Federal');
INSERT INTO `provincias` VALUES (3, 'Catamarca');
INSERT INTO `provincias` VALUES (4, 'Chaco');
INSERT INTO `provincias` VALUES (5, 'Chubut');
INSERT INTO `provincias` VALUES (6, 'Córdoba');
INSERT INTO `provincias` VALUES (7, 'Corrientes');
INSERT INTO `provincias` VALUES (8, 'Entre Ríos');
INSERT INTO `provincias` VALUES (9, 'Formosa');
INSERT INTO `provincias` VALUES (10, 'Jujuy');
INSERT INTO `provincias` VALUES (11, 'La Pampa');
INSERT INTO `provincias` VALUES (12, 'La Rioja');
INSERT INTO `provincias` VALUES (13, 'Mendoza');
INSERT INTO `provincias` VALUES (14, 'Misiones');
INSERT INTO `provincias` VALUES (15, 'Neuquén');
INSERT INTO `provincias` VALUES (16, 'Río Negro');
INSERT INTO `provincias` VALUES (17, 'Salta');
INSERT INTO `provincias` VALUES (18, 'San Juan');
INSERT INTO `provincias` VALUES (19, 'San Luis');
INSERT INTO `provincias` VALUES (20, 'Santa Cruz');
INSERT INTO `provincias` VALUES (21, 'Santa Fé');
INSERT INTO `provincias` VALUES (22, 'Santiago del Estero');
INSERT INTO `provincias` VALUES (23, 'Tierra del Fuego');
INSERT INTO `provincias` VALUES (24, 'Tucumán');

SET FOREIGN_KEY_CHECKS = 1;
