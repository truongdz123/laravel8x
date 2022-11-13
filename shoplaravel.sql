-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2022 lúc 12:29 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoplaravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `sort_orders` int(10) DEFAULT NULL,
  `metakey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metades` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `logo_img`, `slug`, `parent_id`, `sort_orders`, `metakey`, `metades`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Iphone', 'logo-apple-hien-tai.jpg', 'iphone', 0, 0, 'iphone', 'iphone', 1, '2022-11-08 15:43:33', '2022-11-12 08:04:31'),
(29, 'Sam Sung', 'ss.jpg', 'sam-sung', 0, NULL, 'Sam Sung', 'Sam Sung', 1, '2022-11-08 15:43:33', '2022-11-12 08:35:35'),
(36, 'Iphone 14', 'iphone-14.jfif', 'iphone-14', 2, NULL, 'iphone 14', 'iphone 14-256gd-xanh', 1, '2022-11-12 07:27:00', '2022-11-12 07:27:01'),
(37, 'Iphone', 'logo-apple-hien-tai.jpg', 'iphone', 0, 0, 'iphone', 'iphone', 2, '2022-11-08 15:43:33', '2022-11-12 08:35:40'),
(38, 'Sam Sung', 'ss.jpg', 'sam-sung', 0, NULL, 'Sam Sung', 'Sam Sung', 1, '2022-11-08 15:43:33', '2022-11-12 07:24:36'),
(39, 'Iphone 14', 'iphone-14.jfif', 'iphone-14', 2, NULL, 'iphone 14', 'iphone 14-256gd-xanh', 2, '2022-11-12 07:27:00', '2022-11-12 08:35:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_11_08_024414_create_category_table', 1),
(4, '2022_11_08_072354_create_contact_table', 1),
(5, '2022_11_08_072458_create_config_table', 1),
(6, '2022_11_08_072538_create_link_table', 1),
(7, '2022_11_08_072559_create_menus_table', 1),
(8, '2022_11_08_072626_create_products_table', 1),
(9, '2022_11_08_072703_create_orders_table', 1),
(10, '2022_11_08_072735_create_orders_details_table', 1),
(11, '2022_11_08_072809_create_post_table', 1),
(12, '2022_11_08_072835_create_topic_table', 1),
(13, '2022_11_08_072907_create_slider_table', 1),
(14, '2022_11_08_073054_create_supplier_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `price_slae` float DEFAULT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `Gb` int(11) DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metades` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(10) UNSIGNED NOT NULL,
  `update_by` int(10) UNSIGNED DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `supplier_id`, `name`, `slug`, `img`, `price`, `price_slae`, `number`, `Gb`, `color`, `details`, `metakey`, `metades`, `create_by`, `update_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'iphone 14', 'iphone-14', 'ip14.jfif', 32000000, 31000000, 5, 256, 'Xanh', 'abc xyz', 'iphone14', 'iphone14', 1, 1, 1, NULL, NULL),
(2, 2, 1, 'iphone 13 Prm', 'iphone-13', 'ip14.jfif', 26000000, 25500000, 5, 128, 'Tím', 'abc xyz', 'iphone13', 'iphone13', 1, 1, 1, NULL, NULL),
(3, 2, 1, 'iphone 12 Prm', 'iphone-12', 'ip14.jfif', 18000000, 17500000, 5, 128, 'Tím', 'abc xyz', 'iphone12', 'iphone12', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(3) UNSIGNED NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_by` int(10) UNSIGNED NOT NULL,
  `update_by` int(10) UNSIGNED DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `fullname`, `phone`, `address`, `gender`, `roles`, `remember_token`, `create_by`, `update_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'vantruong', 'vantruong123@gmail.com', '123456', 'Le Van Truong', '0326666317', 'Hung Yen', 1, 'admin', 'remember_token', 1, 1, 1, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
