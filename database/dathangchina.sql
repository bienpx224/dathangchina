/*
Navicat MySQL Data Transfer

Source Server         : MyDatabaseLocalhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dathangchina

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-02 09:37:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(154) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2018_02_01_102831_create_users_table', '1');
INSERT INTO `migrations` VALUES ('5', '2018_02_01_102846_create_orders_table', '2');
INSERT INTO `migrations` VALUES ('6', '2018_02_01_102908_create_products_table', '3');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `total_cost` int(11) NOT NULL,
  `status` enum('pending','reject','error','approved','success') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `title` varchar(154) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(154) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_order_id_foreign` (`order_id`),
  CONSTRAINT `products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(154) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(154) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(154) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(154) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(154) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(154) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_number` varchar(154) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(154) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_user_name` varchar(154) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `users` VALUES ('1', 'Phạm Xuân Biển', '01647168730', 'bienpx224@gmail.com', 'hà nội', '$2y$10$9lomGcFeq/NRoK/VAv8Pxu8NPGBMrET1VQE/RVNUnL2WwXoU8ABFK', '654321', null, null, null, '4', '1', null, '2018-02-02 02:28:11', '2018-02-02 02:28:11');
