/*
Navicat MySQL Data Transfer

Source Server         : MyDatabaseLocalhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dathangchina

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-13 12:04:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for config
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `config_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', 'yen', '3600', 'money', '2018-02-13 05:01:37', '2018-02-13 05:01:37');
INSERT INTO `config` VALUES ('2', 'dollar', '23000', 'money', '2018-02-13 05:01:43', '2018-02-13 05:01:43');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2018_02_01_102831_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2018_02_01_102846_create_orders_table', '1');
INSERT INTO `migrations` VALUES ('3', '2018_02_01_102908_create_products_table', '1');
INSERT INTO `migrations` VALUES ('4', '2018_02_03_022519_create_config_table', '1');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `total_cost` int(11) NOT NULL DEFAULT '0',
  `note` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  `status` enum('chưa gửi','đang xử lý','đã báo giá','đang đặt hàng','thành công','đã hủy') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '1', '0', '', '1', 'chưa gửi', '2018-02-13 05:00:59', '2018-02-13 05:00:59');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `title` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '1', 'Choi Choi Choi số 20 đã được cấp phép cho da đầu tốt 220ml làm dịu sự kiểm soát dầu chống ngứa chống lại gàu', 'https://world.taobao.com/item/11268247.htm?spm=a312a.7700714.0.0.4c7df7dcoqO06x#detail', '//gd1.alicdn.com/imgextra/i2/10173516/TB2ymc2uHBmpuFjSZFuXXaG_XXa_!!10173516.jpg_400x400.jpg', '88.00', '1', '316800', null, null, null, '1', '1', '2018-02-13 05:01:56', '2018-02-13 05:01:56');
INSERT INTO `products` VALUES ('2', '1', 'Choi Choi Choi số 20 đã được cấp phép cho da đầu tốt 220ml làm dịu sự kiểm soát dầu chống ngứa chống lại gàu', 'https://world.taobao.com/item/11268247.htm?spm=a312a.7700714.0.0.4c7df7dcoqO06x#detail', '//gd1.alicdn.com/imgextra/i2/10173516/TB2ymc2uHBmpuFjSZFuXXaG_XXa_!!10173516.jpg_400x400.jpg', '88.00', '3', '950400', 'xanh', 'chuyển nhanh', 'loại to', '1', '1', '2018-02-13 05:02:35', '2018-02-13 05:02:35');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_number` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_user_name` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authority` tinyint(4) NOT NULL DEFAULT '1',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phonenumber_unique` (`phonenumber`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Phạm Xuân Biển', '01647168730', 'bienpx224@gmail.com', 'hà nội', '$2y$10$py6jVX9ZQvpj0VkZE.JH0eciaLOx1TXZc6tF12QciCR4mLg2aoI5.', '654321', null, null, null, '4', '1', null, '2018-02-13 05:00:58', '2018-02-13 05:00:58');
