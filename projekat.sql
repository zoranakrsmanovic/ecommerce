/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100408
 Source Host           : localhost:3306
 Source Schema         : projekat

 Target Server Type    : MySQL
 Target Server Version : 100408
 File Encoding         : 65001

 Date: 20/05/2020 14:06:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `amin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pass` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`amin_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'zorana@gmail.com', '123');

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand`  (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brant_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`brand_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES (2, 'HP');
INSERT INTO `brand` VALUES (3, 'Apple');
INSERT INTO `brand` VALUES (4, 'LogiTech');
INSERT INTO `brand` VALUES (5, 'SONY');
INSERT INTO `brand` VALUES (6, 'DELL');
INSERT INTO `brand` VALUES (7, 'Hama');
INSERT INTO `brand` VALUES (8, 'Samsung');
INSERT INTO `brand` VALUES (9, 'Marvo');
INSERT INTO `brand` VALUES (10, 'Epson');

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_id` int(11) NULL DEFAULT NULL,
  `ip_add` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cart_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES (6, 3, '::1', 0);
INSERT INTO `cart` VALUES (19, 8, '::1', 0);
INSERT INTO `cart` VALUES (20, 12, '::1', NULL);
INSERT INTO `cart` VALUES (21, 17, '::1', NULL);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'Keyboards');
INSERT INTO `category` VALUES (2, 'Mouses');
INSERT INTO `category` VALUES (3, 'Headphones');
INSERT INTO `category` VALUES (4, 'Printers');
INSERT INTO `category` VALUES (5, 'Speakers');
INSERT INTO `category` VALUES (6, 'Laptops');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_pass` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_country` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `customer_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`customer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (2, '::1', 'Zorana Krsmanovic', 'zzzzoranakrsmanovic@gmail.com', '234', 'Afghanistan', 'Zrenjanin 23000', '94', '600977297', 'customer.jpg');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product`  (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category` int(11) NULL DEFAULT NULL,
  `product_brand` int(11) NULL DEFAULT NULL,
  `product_price` decimal(10, 0) NOT NULL,
  `product_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `product_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `product_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`product_id`) USING BTREE,
  INDEX `FK_product_category`(`product_category`) USING BTREE,
  INDEX `FK_product_brand`(`product_brand`) USING BTREE,
  CONSTRAINT `FK_product_brand` FOREIGN KEY (`product_brand`) REFERENCES `brand` (`brand_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_product_category` FOREIGN KEY (`product_category`) REFERENCES `category` (`category_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES (8, 4, 10, 600, ' jfhjfjflekjflksjflkdsjflkjflkjds', 'Epson-L7160-3-600x560.jpg', ' new', 'EPSON L7160');
INSERT INTO `product` VALUES (10, 4, 2, 599, ' Aenean et tortor at risus. Nisl suscipit adipiscing bibendum est. Turpis massa sed elementum tempus. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. Amet porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget. Libero enim sed faucibus turpis in eu mi bibendum neque.', 'download.jpg', ' HP printer new', 'HP Printer');
INSERT INTO `product` VALUES (11, 4, 6, 400, ' Aenean et tortor at risus. Nisl suscipit adipiscing bibendum est. Turpis massa sed elementum tempus. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. Amet porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget. Libero enim sed faucibus turpis in eu mi bibendum neque.', '819sp1yc7dL._AC_SL1500_.jpg', ' DELL dell printer wireless', 'DELL Wireless Printer');
INSERT INTO `product` VALUES (12, 4, 10, 300, ' Aenean et tortor at risus. Nisl suscipit adipiscing bibendum est. Turpis massa sed elementum tempus. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. Amet porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget. Libero enim sed faucibus turpis in eu mi bibendum neque.', '960x0.jpg', ' Epson epson printer Printer', 'EPSON Printer');
INSERT INTO `product` VALUES (13, 6, 3, 900, ' Aenean et tortor at risus. Nisl suscipit adipiscing bibendum est. Turpis massa sed elementum tempus. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. Amet porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget. Libero enim sed faucibus turpis in eu mi bibendum neque.', '5d49b020100a240883638b46.webp', ' apple macbook air laptop', 'MacBook Air');
INSERT INTO `product` VALUES (14, 6, 3, 400, ' Aenean et tortor at risus. Nisl suscipit adipiscing bibendum est. Turpis massa sed elementum tempus. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. Amet porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget. Libero enim sed faucibus turpis in eu mi bibendum neque.', 'macbook-select-silver-201706.jpg', ' apple macbook 12 ', 'Apple MacBook 12');
INSERT INTO `product` VALUES (15, 2, 7, 3, 'Aenean et tortor at risus. Nisl suscipit adipiscing bibendum est. Turpis massa sed elementum tempus. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. Amet porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget. Libero enim sed faucibus turpis in eu mi bibendum neque.', '474924.jpg', ' hama mouse ', 'Hama Mouse');
INSERT INTO `product` VALUES (16, 5, 5, 30, ' Aenean et tortor at risus. Nisl suscipit adipiscing bibendum est. Turpis massa sed elementum tempus. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. Amet porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget. Libero enim sed faucibus turpis in eu mi bibendum neque.', '13018321_001.jpg', ' sony speaker ', 'SONY Speaker');
INSERT INTO `product` VALUES (17, 5, 5, 700, ' Aenean et tortor at risus. Nisl suscipit adipiscing bibendum est. Turpis massa sed elementum tempus. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. Amet porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget. Libero enim sed faucibus turpis in eu mi bibendum neque.', 'Sony-MHC-V72D-Specialty-Speakers-491431405-i-2-1200Wx1200H.jpg', ' speakers sony mhc', 'Sony MHC-V72D');
INSERT INTO `product` VALUES (18, 1, 4, 20, ' Aenean et tortor at risus. Nisl suscipit adipiscing bibendum est. Turpis massa sed elementum tempus. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. Amet porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget. Libero enim sed faucibus turpis in eu mi bibendum neque.', 'LogitechKeysToGoTA.webp', ' logitech keys to go', 'LogiTech Keyboard Keys-to-go');
INSERT INTO `product` VALUES (19, 3, 5, 300, ' Aenean et tortor at risus. Nisl suscipit adipiscing bibendum est. Turpis massa sed elementum tempus. Euismod quis viverra nibh cras pulvinar mattis nunc sed blandit. Facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris. Amet porttitor eget dolor morbi non arcu. Id porta nibh venenatis cras sed felis eget. Libero enim sed faucibus turpis in eu mi bibendum neque.', 'ebeac54a3c35dc69d47c5e95f2ac8ac7.webp', ' sony wireless headphones', 'Sony Wireless Headphones');
INSERT INTO `product` VALUES (20, 3, 5, 50, 'This is the description.', 'resize.webp', ' sony smart headphones', 'Sony Smart Headphones ');

SET FOREIGN_KEY_CHECKS = 1;
