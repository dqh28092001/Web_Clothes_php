-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 23, 2023 lúc 06:24 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

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
(108, 1, 16, 8, '2023-07-24 04:08:41');

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
(1, 20, 24, 'alo alo alo alo alo alo ', '2023-01-04 07:31:37'),
(2, 20, 16, 'hihihii', '2023-01-04 13:03:21'),
(11, 20, 24, 'asdsad', '2023-01-04 15:10:07'),
(13, 17, 2, 'sdfsdafs', '2023-07-18 03:33:49'),
(14, 17, 2, 'ádasd', '2023-07-18 03:34:05'),
(15, 17, 2, 'ádasd', '2023-07-18 03:38:48'),
(16, 17, 2, 'mâmma', '2023-07-18 03:38:56'),
(17, 17, 2, 'mâmmafgdfh', '2023-07-18 03:39:15'),
(18, 17, 2, 'mâmmafgdfh', '2023-07-18 03:59:02'),
(19, 17, 2, 'mâmmafgdfh', '2023-07-18 03:59:05'),
(20, 17, 2, 'mâmmafgdfh', '2023-07-18 04:00:03'),
(21, 17, 2, '', '2023-07-18 04:00:07'),
(22, 17, 2, '', '2023-07-18 04:00:43'),
(23, 17, 2, '', '2023-07-18 04:01:00'),
(24, 17, 2, '', '2023-07-18 04:01:17'),
(25, 16, 2, 'fdsadfsa', '2023-07-18 04:01:34'),
(26, 17, 2, 'gfhfgh', '2023-07-18 04:02:28'),
(27, 17, 2, 'sadasd', '2023-07-18 04:03:06'),
(28, 17, 2, 'tểtrh', '2023-07-18 04:03:58'),
(29, 17, 2, 'sdfasdfs', '2023-07-18 04:04:57'),
(30, 17, 2, 'sdasdas', '2023-07-18 04:05:55'),
(31, 17, 2, 'sgwewe', '2023-07-18 04:06:24'),
(32, 17, 2, '2323', '2023-07-18 04:06:51'),
(33, 17, 2, '2323', '2023-07-18 04:07:15'),
(34, 16, 2, 'gdfgdsg', '2023-07-18 04:43:52'),
(35, 16, 3, 'avzxvz', '2023-07-18 07:14:12'),
(36, 16, 3, 'mat hang nayu deop', '2023-07-19 02:38:12'),
(37, 15, 3, 'hjkhjkhjk', '2023-07-19 03:23:29'),
(38, 17, 3, 'sadasd', '2023-07-19 04:23:06'),
(39, 18, 3, 'fgdfg', '2023-07-19 04:23:47'),
(40, 18, 3, 'ádasd', '2023-07-19 07:43:56'),
(41, 16, 1, 'asdasdsa', '2023-07-20 04:10:34'),
(42, 17, 1, 'adasd', '2023-07-20 04:11:42'),
(43, 17, 1, 'asdasd', '2023-07-20 04:12:57'),
(44, 17, 1, 'asdasd', '2023-07-20 04:13:05'),
(45, 17, 1, 'as22', '2023-07-20 04:13:56'),
(46, 16, 1, '222', '2023-07-20 04:14:12'),
(47, 17, 1, 'asdasd', '2023-07-20 09:47:27'),
(48, 17, 1, 'sdasd', '2023-07-21 02:24:51'),
(49, 11, 47, 'asda', '2023-07-27 03:21:24');

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
(36, 'DQH2380454102', 47, 'Đặng QUốc Huy', 'dqh28092001@gmail.com', '03454102', 'đâs', 123122, '5695', 'Paid by PayPal', '0PL09972ED622782M', 0, NULL, '2023-07-27 07:24:33');

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
(50, 36, 16, 1, 700, '2023-07-27 07:24:33');

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
(12, 11, 'Phong cách nam', 'iPhone-13-Pro-Max-128GB', 'Phong cách nam', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 1000, 999, '1689565807.jpg', 36, 0, 1, 1, 'Phong cách nam', 'Phong cách nam', 'Phong cách nam', '2022-12-19 09:03:56'),
(13, 11, 'Váy ĐI Hội', 'Váy ĐI Hội', 'Váy ĐI Hội', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 1500, 499, '1689565870.jpg', 49, 1, 1, 1, 'Váy ĐI Hội', 'Váy ĐI Hội', 'Váy ĐI Hội', '2022-12-27 17:27:30'),
(14, 13, 'Sơ mi tay dài', 'Sơ mi tay dài', 'Sơ mi tay dài', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 500, 499, '1689565963.jpg', 32, 0, 1, 1, 'Sơ mi tay dài', 'Sơ mi tay dài', 'Sơ mi tay dài', '2022-12-27 17:28:31'),
(15, 16, 'Sọc Caro', 'Sọc Caro', 'Sọc Caro', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 600, 599, '1689565988.jpg', 45, 0, 1, 1, 'Sọc Caro', 'Sọc Caro', 'Sọc Caro', '2022-12-27 17:30:29'),
(16, 12, 'Hoa tay dài', 'Hoa tay dài', 'Hoa tay dài', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 800, 700, '1689566023.jpg', 2, 0, 1, 1, 'Hoa tay dài', 'Hoa tay dài', 'Hoa tay dài', '2022-12-27 17:31:24'),
(17, 13, 'Áo Ba Lỗ', 'Áo Ba Lỗ', 'Áo Ba Lỗ', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 300, 299, '1689566055.jpg', 24, 0, 1, 1, 'Áo Ba Lỗ', 'Áo Ba Lỗ', 'Áo Ba Lỗ', '2022-12-27 17:33:26'),
(18, 15, 'Áo Kiểu', 'Áo Kiểu', 'Áo Kiểu', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 1000, 999, '1689566083.jpg', 43, 0, 1, 1, 'Áo Kiểu', 'Áo Kiểu', 'Áo Kiểu', '2022-12-27 17:35:02'),
(21, 11, 'Áo Thời Trang', 'pham-thi-nga', 'Áo Thời Trang', 'Áo Thời Trang', 1000, 150, '1690362600.jpg', 29, 0, 1, 1, 'Áo Thời Trang', 'Áo Thời Trang', 'Áo Thời Trang', '2023-07-25 07:30:32'),
(24, 17, 'Áo Khoác', 'mobile', 'Áo Vip', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 1799, 150, '1690362629.jpg', 34, 0, 1, 1, 'Áo Vip', 'Áo Vip', 'Áo Vip', '2023-07-25 07:41:24'),
(25, 14, 'Đầm Xòe', 'Đầm Xòe', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 700, 400, '1690362512.jpg', 32, 0, 1, 1, 'Đầm Xòe', 'Đầm Xòe', 'Đầm Xòe', '2023-07-26 09:08:32'),
(26, 13, 'Váy Max', 'Váy Max', 'Cuối cùng thì chiếc Áo cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Áo, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm với đầy đủ phiên bản', 'Váy Max', 700, 200, '1690362550.jpg', 31, 0, 1, 1, 'Váy Max', 'Váy Max', 'Váy Max', '2023-07-26 09:09:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `code` text NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `code`, `role_as`, `verify_status`, `created_at`) VALUES
(40, 'Đặng QUốc Huy', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '03454102', NULL, '061df49d20c90c2047803ab2a119d4ae', 1, 1, '2023-07-24 08:13:07'),
(47, 'Đặng QUốc Huy', 'dqh28092001@gmail.com', '202cb962ac59075b964b07152d234b70', '03454102', NULL, 'f2bbf31945fea6a483019c7567115a26', 0, 1, '2023-07-25 01:46:55'),
(48, 'Đặng QUốc Huy', 'huyhuydai059@gmail.com', '202cb962ac59075b964b07152d234b70', '03454102', NULL, '212814e210781f054ca7af267713a1fd', 0, 0, '2023-07-25 03:22:09');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
