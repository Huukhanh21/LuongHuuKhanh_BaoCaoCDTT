-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2023 lúc 02:19 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `luonghuukhanh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` bigint(10) UNSIGNED NOT NULL,
  `name` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `metadesc` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `name`, `link`, `metadesc`, `created_at`, `updated_at`, `status`, `image`, `position`) VALUES
(1, 'Khuyến mãi', '#', 'ds', '2023-10-14 08:54:34', '2023-10-14 08:59:07', 0, '1697298874_53.jpg', '1'),
(2, 'sd', '#', 'sad', '2023-10-14 08:55:16', '2023-10-14 08:59:03', 0, '1697298916_79.jpg', '2'),
(3, 'ád', 'ád', 'dsa', '2023-10-14 08:56:54', '2023-10-14 08:59:02', 0, '1697299014_31.jpg', '1'),
(4, 'ad', 'ád', 'sd', '2023-10-14 08:58:19', '2023-10-14 08:59:00', 0, '1697299099_47.jpg', '1'),
(5, 'sdgg', 'gádasd', 'fdg\"', '2023-10-14 12:31:48', '2023-10-14 12:35:38', 0, '1697311908_52.png', '1'),
(6, 'ad', 'ád', 'ád', '2023-10-14 12:42:58', '2023-11-13 12:31:29', 0, '1697312578_89.jpg', '1'),
(7, 'sad', 'sd', 'ád', '2023-10-14 09:33:42', '2023-10-14 12:42:41', 0, '1697301222_20.jpg', '1'),
(8, 'sdgghg', 'sfsf', 'sdfsfs', '2023-10-14 12:33:09', '2023-11-13 12:31:28', 0, '1697311989_90.jpg', '1'),
(9, 'ádad', 'ádsad', 'ádad', '2023-10-14 12:40:19', '2023-11-13 12:31:27', 0, '1697312419_64.jpg', '1'),
(10, 'sad', 'ad', 'ad', '2023-10-14 23:41:55', '2023-10-14 23:48:41', 0, '1697352115_16.png', '1'),
(11, 'banner1', '#', '1', '2023-11-13 12:31:53', '2023-11-13 12:31:53', 1, '1699903913_28.png', '1'),
(12, 'banner2', '#', '2', '2023-11-13 12:32:05', '2023-11-14 09:08:06', 1, '1699903925_75.png', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'AUTO_INCREMENT',
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `metadesc` varchar(255) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`, `metadesc`, `status`) VALUES
(4, 'Yamaha', 'yamaha', '1700061305_7.png', '2023-11-15 08:15:05', '2023-11-15 08:15:05', 'Yamaha', 1),
(5, 'Honda', 'honda', '1700061317_28.png', '2023-11-15 08:15:17', '2023-11-15 08:15:17', 'honda', 1),
(6, 'Kawasaki', 'kawasaki', '1700061339_77.png', '2023-11-15 08:15:39', '2023-11-15 08:15:39', 'Kawasaki', 1),
(7, 'Shinko', 'shinko', '1700061354_9.png', '2023-11-15 08:15:54', '2023-11-15 08:15:54', 'shinko', 1),
(8, 'BMW', 'bmw', '1700070110_94.jpg', '2023-11-15 10:41:50', '2023-11-15 10:41:50', 'BMW', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'AUTO_INCREMENT',
  `name` varchar(255) NOT NULL,
  `meta_desc` varchar(1000) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `slug` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `meta_desc`, `parent_id`, `status`, `updated_at`, `created_at`, `slug`) VALUES
(2, 'Trang chủ', 'xuất ở trang chủ', 1, 1, '2023-11-15 08:01:36', '2023-11-15 08:01:36', 'trang-chu'),
(3, 'Danh sách danh mục', 'danh sách', 1, 1, '2023-11-15 11:58:41', '2023-11-15 11:58:41', 'danh-sach-danh-muc'),
(22, 'Sản phẩm khuyến mãi', 'sadsd', 2, 0, '2023-11-15 08:38:28', '2023-11-15 00:49:23', 'san-pham-khuyen-mai'),
(49, 'Bánh-Vỏ-Lốp', 'Bánh trước, bánh sau', 2, 1, '2023-11-15 08:05:37', '2023-11-15 08:03:33', 'banh-vo-lop'),
(50, 'Gương chiếu hậu', 'kính chiếu hậu', 2, 1, '2023-11-15 08:44:14', '2023-11-15 08:04:03', 'guong-chieu-hau'),
(51, 'Mâm xe chính hãng', 'mâm', 2, 1, '2023-11-15 08:44:25', '2023-11-15 08:05:20', 'mam-xe-chinh-hang'),
(52, 'Pô', 'dawd', 3, 1, '2023-11-15 11:57:21', '2023-11-15 11:57:21', 'po');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `zalo` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `metadesc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`id`, `author`, `email`, `phone`, `zalo`, `facebook`, `address`, `youtube`, `metadesc`, `created_at`, `updated_at`, `status`) VALUES
(1, 'da', 'sada', 'áda', 'ád', 'áda', 'ád', 'ád', 'ádas', '2023-11-16 00:31:16', '2023-11-15 17:31:16', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL COMMENT 'AUTO_INCREMENT',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `address`, `content`, `created_at`, `updated_at`, `status`) VALUES
(3, 'sa', 'sda', 'sad', 'sad', 'sad', '2023-10-15 00:02:11', '2023-10-15 00:02:11', 1),
(4, 'asdsdaf', 'ad', 'ad', 'ád', 'dsad', '2023-10-26 10:41:30', '2023-10-26 03:41:30', 0),
(5, 'Hữu Khánh', 'luonghuukhanh21@gmail.com', '0362603308', 'đỗ xuân hợpsad', NULL, '2023-11-16 00:06:51', '2023-11-16 00:06:51', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `gender`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Hữu Khánh', '', '', 'luonghuukhanh21@gmail.com', '0362603308', 'đỗ xuân hợp', '0', '2023-11-14 08:08:14', '2023-11-14 08:56:00', 0),
(2, 'Hữu Khánh', 'khanhhuuluong', 'k01662603308', 'luonghuukhanh21@gmail.com', '0362603308', 'đỗ xuân hợp', 'Nam', '2023-11-14 08:45:22', '2023-11-14 08:56:38', 1),
(3, 'Hữu Khánh', 'khanhhuuluong', 'k01662603308', 'luonghuukhanh21@gmail.com', '0362603308', 'đỗ xuân hợp', 'Nam', '2023-11-14 08:50:27', '2023-11-14 08:56:39', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `link`
--

CREATE TABLE `link` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'AUTO_INCREMENT',
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `link`
--

INSERT INTO `link` (`id`, `slug`, `type`, `table_id`) VALUES
(4, 'trang-chu', 'category', 48),
(5, 'banh-vo-lop', 'category', 49),
(6, 'kinh-chieu-hau', 'category', 50),
(7, 'mam-xe', 'category', 51),
(8, 'po', 'category', 52),
(9, 'danh-sach-danh-muc', 'category', 53),
(10, 'shinko', 'brand', 7),
(11, 'yamaha', 'brand', 4),
(12, 'honda', 'brand', 5),
(13, 'kawasaki', 'brand', 6),
(14, 'bmw', 'brand', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL COMMENT 'AUTO_INCREMENT',
  `name` varchar(1000) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `level` int(10) UNSIGNED NOT NULL,
  `table_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `type`, `level`, `table_id`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Giới thiệu', '#', 'menu', 1, NULL, '2023-11-13 14:56:26', '2023-11-13 14:56:26', 1),
(3, 'Dịch vụ', '#', 'menu', 1, NULL, '2023-11-13 14:57:25', '2023-11-13 14:57:25', 1),
(4, 'Liên hệ', '#', 'menu', 1, NULL, '2023-11-13 14:57:36', '2023-11-13 14:57:36', 1),
(5, 'Bài viết', '#', 'menu', 1, NULL, '2023-11-13 14:57:49', '2023-11-13 14:57:49', 1),
(6, 'Chính sách', '#', 'menu', 1, NULL, '2023-11-13 14:58:29', '2023-11-13 14:58:29', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'AUTO_INCREMENT',
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `note` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `customer_id`, `name`, `phone`, `email`, `address`, `note`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 'Khánh', '0123', 'khanh@gmail.com', 'sad', 'đ', '2023-11-16 08:27:07', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` double DEFAULT NULL,
  `amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page`
--

CREATE TABLE `page` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `detail` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('luonghuukhanh21@gmail.com', '$2y$10$hkCc.tIQPe5CESBB0gMdbejjfmrqSP5USXGJiUER4qybOM4i633EG', '2023-09-15 02:59:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'AUTO_INCREMENT',
  `title` varchar(1000) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `detail` mediumtext NOT NULL,
  `type` varchar(1000) NOT NULL,
  `metadesc` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `title`, `slug`, `image`, `topic_id`, `detail`, `type`, `metadesc`, `created_at`, `updated_at`, `status`) VALUES
(1, 'ádaas', 'ádad', '1697730829_92.jpg', 1, 'ád', 'ád', 'ádd', '2023-10-19 08:53:49', '2023-10-19 08:53:49', 1),
(2, 'add ưdqd', 'add-udqd', '1699966178_62.jpg', 2, 'qưdq', 'post', 'ưqd', '2023-11-14 05:49:38', '2023-11-14 05:49:38', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'AUTO_INCREMENT',
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `price_buy` int(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `detail` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `category_id`, `brand_id`, `name`, `slug`, `price`, `price_buy`, `image`, `detail`, `created_at`, `updated_at`, `status`, `qty`) VALUES
(42, 49, 4, 'Lốp (vỏ) Michelin Anakee Adventure 90', 'lop-vo-michelin-anakee-adventure-90', 3260000, 3000000, '1700061052_13.jpg', 'Lốp (vỏ) Michelin Anakee Adventure 90', '2023-11-15 08:10:52', '2023-11-15 08:10:52', 1, 10),
(43, 49, 7, 'Lốp (Vỏ) Shinko SR77R', 'lop-vo-shinko-sr77r', 4350000, 4000000, '1700061474_13.jpg', 'Lốp (Vỏ) Shinko SR77R', '2023-11-15 08:17:54', '2023-11-15 08:17:54', 1, 5),
(44, 49, 5, 'Lốp (Vỏ) Bridgestone Battlax Hypersport', 'lop-vo-bridgestone-battlax-hypersport', 3421000, 3000000, '1700061547_0.jpg', 'Lốp (Vỏ) Bridgestone Battlax Hypersport', '2023-11-15 08:19:07', '2023-11-15 08:19:07', 1, 5),
(45, 49, 7, 'Lốp (Vỏ) Shinko R016', 'lop-vo-shinko-r016', 6050000, 5000000, '1700061589_82.png', 'Lốp (Vỏ) Shinko R016', '2023-11-15 08:19:49', '2023-11-15 08:19:49', 1, 3),
(46, 49, 6, 'Lốp (Vỏ) Pirelli Diablo Rosso', 'lop-vo-pirelli-diablo-rosso', 2044000, 1500000, '1700061663_90.jpg', 'Lốp (Vỏ) Pirelli Diablo Rosso', '2023-11-15 08:21:03', '2023-11-15 08:21:03', 1, 10),
(47, 49, 7, 'Lốp (Vỏ) Shinko SR7778', 'lop-vo-shinko-sr7778', 4000000, 4000000, '1700086373_73.png', '– Tên sản phẩm: Kính chiếu hậu cánh gió tích hợp xi nhan cho dòng Motor Sport\r\n– Chất liệu: Hợp kim nhôm và thủy tinh\r\n– Trọng lượng: 700g\r\n– Trang bị: Phù hợp với hầu hết các dòng xe moto thể thao sport bike (dành cho Kawasaki, cho Yamaha, cho Honda, cho BMW, cho Ducati)\r\n– Sản phẩm bao gồm: Một cặp cánh lướt gió cố định', '2023-11-15 08:22:01', '2023-11-15 15:12:53', 1, 14),
(48, 50, 5, 'Gương zin Ninja 300', 'guong-zin-ninja-300', 700000, 500000, '1700061825_9.jpg', 'Gương zin Ninja 300', '2023-11-15 08:23:45', '2023-11-15 08:23:45', 1, 20),
(49, 50, 5, 'Cặp gương Force G6', 'cap-guong-force-g6', 300000, 200000, '1700061872_76.jpg', 'Cặp gương Force G6', '2023-11-15 08:24:32', '2023-11-15 08:24:32', 1, 12),
(50, 51, 4, 'Roland Sands Design', 'roland-sands-design', 83000000, 76000000, '1700062009_80.jpg', 'mâm Roland Sands Design', '2023-11-15 08:26:49', '2023-11-15 08:26:49', 1, 3),
(51, 51, 6, 'GaleSpeed', 'galespeed', 45000000, 40000000, '1700062062_5.jpg', 'mâm GaleSpeed', '2023-11-15 08:27:42', '2023-11-15 08:27:42', 1, 6),
(52, 51, 6, 'CNC Kawasaki Z400/ Ninja 400', 'cnc-kawasaki-z400-ninja-400', 40000000, 30000000, '1700062115_62.jpg', 'mâm CNC Kawasaki Z400/ Ninja 400', '2023-11-15 08:28:35', '2023-11-15 08:28:35', 1, 10),
(53, 51, 4, 'OZ - Mâm nhôm cho Yamaha', 'oz-mam-nhom-cho-yamaha', 63000000, 60000000, '1700062168_71.jpg', 'OZ - Mâm nhôm cho BMW', '2023-11-15 08:29:28', '2023-11-15 08:29:28', 1, 5),
(54, 52, 6, 'Akrapovic - pô slip', 'akrapovic-po-slip', 4000000, 3000000, '1700125203_40.jpg', 'Akrapovic - pô slip', '2023-11-16 02:00:03', '2023-11-16 02:00:03', 1, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productsale`
--

CREATE TABLE `productsale` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `pricesale` double UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `date_begin` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `productsale`
--

INSERT INTO `productsale` (`id`, `product_id`, `pricesale`, `qty`, `date_begin`, `date_end`, `created_at`, `updated_at`, `status`) VALUES
(1, 43, 99999, 1, '2023-10-14 17:08:00', '2023-10-15 17:08:00', '2023-11-16 01:21:49', '2023-10-14 03:36:27', 1),
(6, 53, 62000000, 2, '2023-11-17 15:45:00', '2023-11-18 15:45:00', '2023-11-16 01:46:52', '2023-11-16 01:46:52', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productstore`
--

CREATE TABLE `productstore` (
  `id` bigint(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `productstore`
--

INSERT INTO `productstore` (`id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`, `status`) VALUES
(1, 43, 1, 0, '2023-11-16 01:21:22', '2023-10-19 20:35:38', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'AUTO_INCREMENT',
  `name` varchar(1000) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `metadesc` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`id`, `name`, `slug`, `metadesc`, `created_at`, `updated_at`, `status`) VALUES
(1, 'CHỦ ĐỀ 1', 'dasd', 'ádasd', '2023-10-19 08:10:37', '2023-10-26 04:20:09', 1),
(2, 'đề tài 4', 'de-tai-4', 'sads', '2023-10-26 04:26:58', '2023-11-15 10:43:51', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Hữu Khánh', 'luonghuukhanh21@gmail.com', NULL, '$2y$10$S462T8xbtKgaNS/DDNfJEu.ev3Jd0CDw1lCSmx4fnd9G.gPLIE9Mm', 'eg2UTv2xFj2BUL1TKI0gHt2wF763m2efm82tGixGLSiwv2nVTvlFg0Yw5SpZ', '2023-09-15 00:40:16', '2023-11-14 07:44:27', 1),
(2, 'Hữu Khánh', 'luonghuukhanh221@gmail.com', NULL, 'k01662603308', NULL, '2023-11-14 07:52:44', '2023-11-14 07:53:24', 2),
(4, 'Hữu Khánh', 'luonghuukhanh2221@gmail.com', NULL, '$2y$10$vYbnslKA50vT9KfZuRfid.DP4df2.bgtkPkH1Xk66Uk.jV//sof/y', NULL, '2023-11-14 08:13:00', '2023-11-14 08:13:00', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productsale`
--
ALTER TABLE `productsale`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productstore`
--
ALTER TABLE `productstore`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
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
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `config`
--
ALTER TABLE `config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `link`
--
ALTER TABLE `link`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `productsale`
--
ALTER TABLE `productsale`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `productstore`
--
ALTER TABLE `productstore`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'AUTO_INCREMENT', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
