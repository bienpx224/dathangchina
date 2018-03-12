-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 01:03 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dathangchina`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `name`, `rate`, `type`, `created_at`, `updated_at`) VALUES
(1, 'yen', '3600', 'money', '2018-02-12 22:01:37', '2018-02-12 22:01:37'),
(2, 'dollar', '23000', 'money', '2018-02-12 22:01:43', '2018-02-12 22:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_02_01_102831_create_users_table', 1),
(2, '2018_02_01_102846_create_orders_table', 1),
(3, '2018_02_01_102908_create_products_table', 1),
(4, '2018_02_03_022519_create_config_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total_cost` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `note` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  `status` int(10) NOT NULL COMMENT '0: Đã hủy - 1: Đang chờ - 2: Khách chốt - 3: Nhân viên chốt - 4: Đang chuyển hàng - 5: Thành công',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_cost`, `note`, `state`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2494800', '', 0, 2, '2018-02-12 22:00:59', '2018-02-12 22:00:59'),
(2, 1, 'chưa xác định', '', 0, 0, '2018-03-12 04:25:23', '2018-03-12 04:25:23'),
(4, 1, 'chưa xác định', '', 0, 0, '2018-03-12 04:41:07', '2018-03-12 04:41:07'),
(5, 1, 'chưa xác định', '', 0, 0, '2018-03-12 04:41:16', '2018-03-12 04:41:16'),
(6, 1, 'chưa xác định', '', 1, 1, '2018-03-12 04:41:18', '2018-03-12 04:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'giá tính bằng đồng yên',
  `rate` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'tỷ giá tiền tệ ',
  `vnd` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'giá đã được quy ra vnd mỗi sản phẩm',
  `quantity` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'chi phí mua sản phẩm này, tính bằng giá vnd nhân số lượng',
  `color` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '1' COMMENT 'trạng thái sản phẩm có đang tồn tại hay ko. 1 or 0',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0: Đã hủy - 1: Đang chờ - 2: Đã chốt - 3: Không mua được SP',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `order_id`, `title`, `link`, `image`, `price`, `rate`, `vnd`, `quantity`, `cost`, `color`, `note`, `size`, `state`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 'Đặc biệt AUTOart Alto 1:43 Lamborghini bat LP640 bộ sưu tập mô phỏng hợp kim xe mô hình', 'https://world.taobao.com/item/3970182624.htm?spm=a312a.7700714.0.0.3da5523cc1ttmw#detail', '//gd3.alicdn.com/imgextra/i1/40016048/TB2mbwJbfAkyKJjy0FfXXaxhpXa_!!40016048.jpg_400x400.jpg', '68.00', '3600', '244800', '10', '2448000', NULL, NULL, NULL, 1, 1, '2018-02-24 04:44:24', '2018-02-24 04:44:24'),
(7, 1, 'Đặc biệt AUTOart Alto 1:43 Lamborghini bat LP640 bộ sưu tập mô phỏng hợp kim xe mô hình', 'https://world.taobao.com/item/3970182624.htm?spm=a312a.7700714.0.0.3da5523cc1ttmw#detail', '//gd3.alicdn.com/imgextra/i1/40016048/TB2mbwJbfAkyKJjy0FfXXaxhpXa_!!40016048.jpg_400x400.jpg', '68.00', '3600', '244800', '3', '734400', NULL, NULL, NULL, 1, 3, '2018-02-24 04:49:02', '2018-02-24 04:49:02'),
(8, 1, 'Haagen-Dazs bộ tách giấy nhỏ (6 Pack) cổ điển chụp mã QR', 'https://world.tmall.com/item/5931019536.htm?spm=a312a.7700714.0.0.3da5523cZ47NpR', '//img.alicdn.com/bao/uploaded/i3/TB1cDPBKFXXXXbCXpXXXXXXXXXX_!!0-item_pic.jpg_430x430q90.jpg', '10', '3600', '36000', '1', '36000', NULL, NULL, NULL, 1, 1, '2018-02-24 04:53:57', '2018-02-24 04:53:57'),
(9, 1, 'Choi Choi Choi số 20 đã được cấp phép cho da đầu tốt 220ml làm dịu sự kiểm soát dầu chống ngứa chống lại gàu', 'https://world.taobao.com/item/11268247.htm?spm=a312a.7700714.0.0.4c7df7dcoqO06x#detail', '//gd1.alicdn.com/imgextra/i2/10173516/TB2ymc2uHBmpuFjSZFuXXaG_XXa_!!10173516.jpg_400x400.jpg', '88.00', '3600', '316800', '3', '950400', NULL, NULL, NULL, 1, 2, '2018-02-24 04:54:20', '2018-02-24 04:54:20'),
(10, 1, 'Haagen-Dazs bộ tách giấy nhỏ (6 Pack) cổ điển chụp mã QR', 'https://world.tmall.com/item/5931019536.htm?spm=a312a.7700714.0.0.3da5523cZ47NpR', '//img.alicdn.com/bao/uploaded/i3/TB1cDPBKFXXXXbCXpXXXXXXXXXX_!!0-item_pic.jpg_430x430q90.jpg', '1', '3600', '3600', '3', '10800', NULL, NULL, NULL, 1, 1, '2018-02-24 04:54:37', '2018-02-24 04:54:37'),
(11, 6, 'Nếu bạn tức giận, bạn sẽ mất. (Nâng cấp sách bìa cứng) Kiểm soát cảm xúc Cải thiện khả năng tự kiểm soát Không bị mất bình tĩnh Kiểm soát sự cáu kỉnh Nói chuyện Câu chuyện tâm lý Sách thành công Truyền cảm hứng giao tiếp giữa cá nhân Mood Office', 'https://world.tmall.com/item/558072138654.htm?spm=a312a.7700714.0.0.1d1e531dhFimG6', '//img.alicdn.com/bao/uploaded/i2/2695390063/TB1UwL7cUcKL1JjSZFzXXcfJXXa_!!2-item_pic.png_430x430q90.jpg', NULL, '3600', 'NaN', '1', 'NaN', NULL, NULL, NULL, 1, 1, '2018-03-12 04:59:34', '2018-03-12 04:59:34'),
(12, 6, 'Genuine Spot Calm woman Đến gần gũi hơn với hạnh phúc nữ tính Elegant Reach Người phụ nữ mạnh mẽ Nói chuyện với cuộc sống xã hội Thành công bán chạy nhất Inspirational Hoàn thành tác phẩm Books', 'https://world.tmall.com/item/523277578157.htm?spm=a312a.7700714.0.0.1d1e531dhFimG6', '//img.alicdn.com/bao/uploaded/i2/2453284078/TB1jBIKauLM8KJjSZFqXXa7.FXa_!!0-item_pic.jpg_430x430q90.jpg', NULL, '3600', 'NaN', '4', 'NaN', NULL, NULL, NULL, 1, 1, '2018-03-12 05:02:10', '2018-03-12 05:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phonenumber`, `email`, `address`, `password`, `secret`, `bank_number`, `bank_name`, `bank_user_name`, `authority`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Xuân Biển', '01647168730', 'bienpx224@gmail.com', 'hà nội', '$2y$10$py6jVX9ZQvpj0VkZE.JH0eciaLOx1TXZc6tF12QciCR4mLg2aoI5.', '654321', NULL, NULL, NULL, 4, 1, 'Ue0gTSWaHLWk01C9neNoPiQorxLJrEkf1QnDtTUE6MPUovB8enaaWx9B239E', '2018-02-12 22:00:58', '2018-02-12 22:00:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `config_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phonenumber_unique` (`phonenumber`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
