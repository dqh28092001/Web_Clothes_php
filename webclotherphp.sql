-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 04, 2023 lúc 04:37 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webclotherphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(108, 1, 16, 6, '2023-07-24 04:08:41'),
(149, 77, 12, 6, '2023-08-29 03:03:32'),
(150, 77, 26, 4, '2023-08-29 03:04:52'),
(152, 77, 15, 1, '2023-08-29 03:15:59'),
(169, 78, 16, 1, '2023-08-30 01:36:51'),
(170, 78, 25, 1, '2023-08-30 01:44:08'),
(171, 77, 17, 1, '2023-08-30 03:27:51'),
(172, 77, 24, 1, '2023-08-30 03:41:39'),
(173, 77, 11, 1, '2023-08-30 03:44:25'),
(174, 77, 21, 14, '2023-08-30 03:46:12'),
(175, 80, 12, 1, '2023-08-30 03:58:23'),
(183, 81, 16, 1, '2023-08-30 04:24:24'),
(184, 81, 25, 1, '2023-08-30 04:24:32'),
(185, 81, 12, 1, '2023-08-30 04:24:35'),
(186, 81, 18, 1, '2023-08-30 04:24:47'),
(187, 81, 15, 1, '2023-08-30 04:31:29'),
(188, 81, 21, 4, '2023-08-30 06:46:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(11, 'Nike', 'Nike', 'Nike', 0, 1, '1689565411.png', 'Nike', 'Nike', 'Nike', '2022-12-14 07:11:21'),
(12, 'Chanel', 'Chanel', 'Chanel', 0, 1, '1689565489.png', 'Chanel', 'Chanel', 'Chanel', '2022-12-14 07:11:37'),
(13, 'Louis', 'Louis', 'Louis', 0, 1, '1689565518.jpg', 'Louis', 'Louis', 'Louis', '2022-12-27 17:09:37'),
(14, 'CalVin', 'CalVin', 'CalVin', 0, 1, '1689565548.png', 'CalVin', 'CalVin', 'CalVin', '2022-12-27 17:20:15'),
(15, 'Nem', 'Nem', 'Nem', 0, 1, '1689565583.png', 'Nem', 'Nem', 'Nem', '2022-12-27 17:23:23'),
(16, 'Valentino', 'Valentino', 'Valentino', 0, 1, '1689565622.jpg', 'Valentino', 'Valentino', 'Valentino', '2022-12-27 17:25:04'),
(17, 'D&G', 'D&G', 'D&G', 0, 1, '1689565661.png', 'D&G', 'D&G', 'D&G', '2023-07-16 05:17:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `prod_id`, `user_id`, `content`, `created_at`) VALUES
(128, 16, 77, 'sdfsd', '2023-08-29 08:00:07'),
(129, 16, 77, 'ádasd', '2023-08-29 08:09:46'),
(130, 16, 77, 'huyhuy', '2023-08-29 08:10:06'),
(131, 17, 40, 'treoif ơi lại kh cmt dc r\r\n', '2023-08-29 10:06:14'),
(132, 16, 0, 'ádasd', '2023-08-30 01:36:56'),
(133, 16, 0, 'tời ơi\r\n', '2023-08-30 01:38:04'),
(134, 16, 0, '12`3', '2023-08-30 01:55:01'),
(135, 16, 77, '123', '2023-08-30 01:55:39'),
(136, 16, 77, 'mé cay cú', '2023-08-30 01:57:10'),
(137, 17, 77, 'kh biết cmt lại được chwua ta\r\n', '2023-08-30 03:27:58'),
(138, 17, 81, 'thế bh cmt dc chưua\r\n', '2023-08-30 04:15:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` varchar(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(31, 'DQH4982sda', 1, 'Huy', 'huyhuydai059@gmail.com', 'dasda', 'sdasd', 123122, '2693', 'COD', '', 0, NULL, '2023-07-21 05:10:58'),
(32, 'DQH5070das', 1, 'Đặng QUốc Huy', 'huyhuydai059@gmail.com', 'asdas', 'dasdd', 0, '1400', 'COD', '', 0, NULL, '2023-07-21 05:24:33'),
(33, 'DQH8380', 1, 'Đặng QUốc Huy', 'huyhuydai059@gmail.com', 'á', 'sá', 123122, '598', 'COD', '', 0, NULL, '2023-07-24 04:03:23'),
(34, 'DQH2763dfas', 45, 'sada', 'ngap2504@gmail.com', 'ádfas', 'sdasd', 123122, '700', 'COD', '', 0, NULL, '2023-07-24 09:10:22'),
(35, 'DQH7170dfas', 47, 'd', 'huyhuydai059@gmail.com', 'ádfas', 'sd', 0, '1848', 'COD', '', 0, NULL, '2023-07-27 03:21:01'),
(36, 'DQH2380454102', 47, 'Đặng QUốc Huy', 'dqh28092001@gmail.com', '03454102', 'đâs', 123122, '5695', 'Paid by PayPal', '0PL09972ED622782M', 0, NULL, '2023-07-27 07:24:33'),
(37, 'DQH6933454102', 0, 'Đặng QUốc Huy', 'huyhuydai059@gmail.com', '03454102', 'ghfgyfdk', 123122, '2800', 'COD', '', 0, NULL, '2023-08-25 02:11:02'),
(38, 'DQH6277454102', 0, 'Đặng QUốc Huy', 'huyhuydai059@gmail.com', '03454102', 'dsasds', 123122, '2100', 'Paid by PayPal', '7LF08907PY171345J', 0, NULL, '2023-08-25 02:43:21'),
(39, 'DQH5251sdsada', 0, 'Đặng QUốc Huy', 'ngap2504@gmail.com', 'dasdsada', 'sdasdas', 0, '2399', 'COD', '', 0, NULL, '2023-08-25 02:46:14'),
(40, 'DQH4421á', 0, 'Đặng QUốc Huy', 'ngap2504@gmail.com', 'đá', 'sadasd', 0, '2799', 'COD', '', 0, NULL, '2023-08-25 03:21:55'),
(41, 'DQH6689dasd', 76, 'sadasd', 'huyhuydai059@gmail.com', 'sadasd', 'asdasd', 0, '1495', 'COD', '', 0, NULL, '2023-08-26 07:11:19'),
(42, 'DQH3675das', 76, 'sdasd', 'ngap2504@gmail.com', 'asdas', 'dasdas', 0, '1400', 'COD', '', 0, NULL, '2023-08-26 07:11:58'),
(43, 'DQH8154das', 76, 'asa', 'huyhuydai059@gmail.com', 'asdas', 'asdasd', 0, '700', 'Paid by PayPal', '8MA21711BH5337113', 0, NULL, '2023-08-26 07:13:08'),
(44, 'DQH4274dad', 77, 'Đặng QUốc Huy', 'huyhuydai059@gmail.com', 'ádad', 'đâsd', 0, '700', 'Paid by PayPal', '544835637H604242F', 0, NULL, '2023-08-29 02:33:47'),
(45, 'DQH8868dfa', 77, 'sadf', 'huyhuydai059@gmail.com', 'ádfa', 'ádfasdf', 0, '5593', 'COD', '', 0, NULL, '2023-08-29 02:40:19'),
(46, 'DQH6434dasdádasd', 0, 'ádasd', 'dqh28092001@gmail.com', 'ádasdádasd', 'ádas', 0, '1899', 'COD', '', 0, NULL, '2023-08-29 06:55:52'),
(47, 'DQH1410dfgs', 0, 'sada', 'dqh28092001@gmail.com', 'gsdfgs', 'gsdfgs', 0, '1299', 'COD', '', 0, NULL, '2023-08-29 08:16:12'),
(48, 'DQH5223dasd', 40, 'ádas', 'huyhuydai059@gmail.com', 'ádasd', 'sadsd', 0, '598', 'COD', '', 0, NULL, '2023-08-29 10:05:42'),
(49, 'DQH9110454102', 78, 'dsad', 'huyhuydai059@gmail.com', '03454102', 'ádsda', 0, '999', 'COD', '', 0, NULL, '2023-08-30 01:36:21'),
(50, 'DQH6730dasd', 81, 'áds', 'huyhuydai059@gmail.com', 'ádasd', 'sadasd', 0, '2296', 'COD', '', 0, NULL, '2023-08-30 04:15:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `creaed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `prod_id`, `qty`, `price`, `creaed_at`) VALUES
(18, 15, 17, 1, 299, '2023-07-18 09:19:30'),
(19, 18, 16, 1, 700, '2023-07-18 09:23:17'),
(20, 21, 16, 3, 700, '2023-07-19 02:37:56'),
(21, 21, 15, 1, 599, '2023-07-19 02:37:56'),
(22, 22, 15, 3, 599, '2023-07-19 03:24:30'),
(23, 22, 17, 1, 299, '2023-07-19 03:24:30'),
(24, 22, 18, 3, 999, '2023-07-19 03:24:30'),
(25, 23, 13, 1, 1499, '2023-07-19 07:42:25'),
(26, 23, 14, 4, 499, '2023-07-19 07:42:25'),
(27, 23, 16, 7, 700, '2023-07-19 07:42:25'),
(28, 24, 17, 3, 299, '2023-07-19 07:44:15'),
(29, 24, 14, 1, 499, '2023-07-19 07:44:15'),
(30, 25, 12, 1, 999, '2023-07-19 09:05:12'),
(31, 25, 18, 1, 999, '2023-07-19 09:05:12'),
(32, 25, 14, 1, 499, '2023-07-19 09:05:12'),
(33, 25, 16, 1, 700, '2023-07-19 09:05:12'),
(34, 27, 18, 2, 999, '2023-07-20 02:24:46'),
(35, 27, 17, 1, 299, '2023-07-20 02:24:46'),
(36, 28, 16, 9, 700, '2023-07-20 04:00:52'),
(37, 29, 16, 1, 700, '2023-07-20 06:47:49'),
(38, 29, 14, 4, 499, '2023-07-20 06:47:49'),
(39, 30, 17, 5, 299, '2023-07-21 02:32:16'),
(40, 31, 14, 3, 499, '2023-07-21 05:10:58'),
(41, 31, 17, 4, 299, '2023-07-21 05:10:58'),
(42, 32, 16, 2, 700, '2023-07-21 05:24:33'),
(43, 33, 17, 2, 299, '2023-07-24 04:03:23'),
(44, 34, 16, 1, 700, '2023-07-24 09:10:22'),
(45, 35, 11, 1, 199, '2023-07-27 03:21:01'),
(46, 35, 14, 1, 499, '2023-07-27 03:21:01'),
(47, 35, 16, 1, 700, '2023-07-27 03:21:01'),
(48, 35, 21, 3, 150, '2023-07-27 03:21:01'),
(49, 36, 12, 5, 999, '2023-07-27 07:24:33'),
(50, 36, 16, 1, 700, '2023-07-27 07:24:33'),
(51, 37, 16, 4, 700, '2023-08-25 02:11:02'),
(52, 38, 16, 3, 700, '2023-08-25 02:43:21'),
(53, 39, 17, 1, 299, '2023-08-25 02:46:14'),
(54, 39, 16, 3, 700, '2023-08-25 02:46:14'),
(55, 40, 25, 1, 400, '2023-08-25 03:21:55'),
(56, 40, 16, 3, 700, '2023-08-25 03:21:55'),
(57, 40, 17, 1, 299, '2023-08-25 03:21:55'),
(58, 41, 17, 5, 299, '2023-08-26 07:11:19'),
(59, 42, 16, 2, 700, '2023-08-26 07:11:58'),
(60, 43, 16, 1, 700, '2023-08-26 07:13:08'),
(61, 44, 16, 1, 700, '2023-08-29 02:33:47'),
(62, 45, 17, 3, 299, '2023-08-29 02:40:19'),
(63, 45, 12, 4, 999, '2023-08-29 02:40:19'),
(64, 45, 16, 1, 700, '2023-08-29 02:40:19'),
(65, 46, 26, 1, 200, '2023-08-29 06:55:52'),
(66, 46, 17, 1, 299, '2023-08-29 06:55:52'),
(67, 46, 16, 2, 700, '2023-08-29 06:55:52'),
(68, 47, 16, 1, 700, '2023-08-29 08:16:12'),
(69, 47, 15, 1, 599, '2023-08-29 08:16:12'),
(70, 48, 17, 2, 299, '2023-08-29 10:05:42'),
(71, 49, 12, 1, 999, '2023-08-30 01:36:21'),
(72, 50, 17, 3, 299, '2023-08-30 04:15:28'),
(73, 50, 18, 1, 999, '2023-08-30 04:15:28'),
(74, 50, 25, 1, 400, '2023-08-30 04:15:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `locgiasp` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive',
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `locgiasp`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(11, 11, 'Áo Caro ', 'Áo Caro ', 'Áo Caro ', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 2000, 199, '1689565358.jpg', 49, 0, 1, 1, 'Áo Caro ', 'Áo Caro ', 'Áo Caro ', '2022-12-19 09:03:14'),
(12, 11, 'Phong cách nam', 'iPhone-13-Pro-Max-128GB', 'Phong cách nam', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 1000, 999, '1689565807.jpg', 31, 0, 1, 1, 'Phong cách nam', 'Phong cách nam', 'Phong cách nam', '2022-12-19 09:03:56'),
(13, 11, 'Váy ĐI Hội', 'Váy ĐI Hội', 'Váy ĐI Hội', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 1500, 499, '1689565870.jpg', 49, 1, 1, 1, 'Váy ĐI Hội', 'Váy ĐI Hội', 'Váy ĐI Hội', '2022-12-27 17:27:30'),
(14, 13, 'Sơ mi tay dài', 'Sơ mi tay dài', 'Sơ mi tay dài', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 500, 499, '1689565963.jpg', 32, 0, 1, 1, 'Sơ mi tay dài', 'Sơ mi tay dài', 'Sơ mi tay dài', '2022-12-27 17:28:31'),
(15, 16, 'Sọc Caro', 'Sọc Caro', 'Sọc Caro', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 600, 599, '1689565988.jpg', 44, 0, 1, 1, 'Sọc Caro', 'Sọc Caro', 'Sọc Caro', '2022-12-27 17:30:29'),
(16, 12, 'Hoa tay dài', 'Hoa tay dài', 'Hoa tay dài', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 800, 700, '1689566023.jpg', -19, 0, 1, 1, 'Hoa tay dài', 'Hoa tay dài', 'Hoa tay dài', '2022-12-27 17:31:24'),
(17, 13, 'Áo Ba Lỗ', 'Áo Ba Lỗ', 'Áo Ba Lỗ', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 300, 299, '1689566055.jpg', 8, 0, 1, 1, 'Áo Ba Lỗ', 'Áo Ba Lỗ', 'Áo Ba Lỗ', '2022-12-27 17:33:26'),
(18, 15, 'Áo Kiểu', 'Áo Kiểu', 'Áo Kiểu', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 1000, 999, '1689566083.jpg', 42, 0, 1, 1, 'Áo Kiểu', 'Áo Kiểu', 'Áo Kiểu', '2022-12-27 17:35:02'),
(21, 11, 'Áo Thời Trang', 'pham-thi-nga', 'Áo Thời Trang', 'Áo Thời Trang', 1000, 150, '1690362600.jpg', 29, 0, 1, 1, 'Áo Thời Trang', 'Áo Thời Trang', 'Áo Thời Trang', '2023-07-25 07:30:32'),
(24, 17, 'Áo Khoác', 'mobile', 'Áo Vip', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 1799, 150, '1693297661.jpg', 34, 0, 1, 1, 'Áo Vip', 'Áo Vip', 'Áo Vip', '2023-07-25 07:41:24'),
(25, 14, 'Đầm Xòe', 'Đầm Xòe', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 700, 400, '1690362512.jpg', 30, 0, 1, 1, 'Đầm Xòe', 'Đầm Xòe', 'Đầm Xòe', '2023-07-26 09:08:32'),
(26, 13, 'Váy Max', 'Váy Max', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 'Váy Max', 700, 200, '1690362550.jpg', 30, 0, 1, 1, 'Váy Max', 'Váy Max', 'Váy Max', '2023-07-26 09:09:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` text NOT NULL,
  `verificationcodes` varchar(50) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `vertified` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `phone`, `code`, `verificationcodes`, `role_as`, `verify_status`, `vertified`, `created_at`) VALUES
(40, 'Đặng QUốc Huy', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'z3961960420136_5d5df1ef1f9b6696af3288bdb11ca530.jpg', '03454102', '061df49d20c90c2047803ab2a119d4ae', '', 1, 1, 0, '2023-07-24 08:13:07'),
(106, 'huydai059', 'dqh28092001@gmail.com', '$2y$10$r9GXtpIjTPQFl0Gnmsv4fuxPntS1R5KhIPwXuIVM1GR4YtFNVz.o.', '', '1231231323', 'cb8b2dc08838bf1d3f5b74921200717e', '248904', 0, 0, 0, '2023-09-03 14:35:12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
