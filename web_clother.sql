-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 16, 2023 lúc 04:26 PM
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
-- Cơ sở dữ liệu: `web_clother`
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
(4, 24, 11, 1, '2023-01-04 08:30:55'),
(5, 0, 16, 6, '2023-07-16 04:54:07'),
(6, 0, 17, 3, '2023-07-16 05:09:18'),
(7, 2, 17, 1, '2023-07-16 05:19:29'),
(8, 2, 14, 1, '2023-07-16 05:19:54'),
(9, 1, 16, 8, '2023-07-16 05:23:34'),
(10, 1, 12, 6, '2023-07-16 06:33:45'),
(12, 1, 17, 3, '2023-07-16 12:33:47');

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
(11, 'Apple', 'Apple', 'Apple', 0, 1, '1671001881.png', 'Apple', 'Apple', 'Apple', '2022-12-14 07:11:21'),
(12, 'Samsung', 'Samsung', 'Samsung', 0, 1, '1671001896.png', 'Samsung', 'Samsung', 'Samsung', '2022-12-14 07:11:37'),
(13, 'Redmi', 'redmi', 'Redmi', 0, 1, '1672161515.png', 'Redmi', 'Redmi', 'Redmi', '2022-12-27 17:09:37'),
(14, 'Oppo', 'oppo', 'Oppo', 0, 1, '1672161615.png', 'Oppo', 'Oppo', 'Oppo', '2022-12-27 17:20:15'),
(15, 'Huawei', 'huawei', 'Huawei', 0, 1, '1672161803.png', 'Huawei', 'Huawei', 'Huawei', '2022-12-27 17:23:23'),
(16, 'Realme', 'realme', 'Realme', 0, 1, '1672161904.png', 'Realme', 'Realme', 'Realme', '2022-12-27 17:25:04'),
(17, '', '', '', 0, 0, '1689484623.', '', '', '', '2023-07-16 05:17:03');

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
(11, 20, 24, 'asdsad', '2023-01-04 15:10:07');

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
(1, 'DVT425005869960', 24, 'Đặng Văn Thịnh', 'vanthinhhk1999@gmail.com', '0905869960', 'Tổ 3, Thôn La Châu\r\nLa Châu, Hòa Khương, Hòa Vang, Tp Đà Nẵng', 123456, '1999', 'COD', '', 1, NULL, '2023-01-04 06:10:28'),
(2, 'DVT920005869960', 24, 'Đặng Văn Thịnh', 'vanthinhhk1999@gmail.com', '0905869960', 'Tổ 3, Thôn La Châu\r\nLa Châu, Hòa Khương, Hòa Vang, Tp Đà Nẵng', 123456, '1497', 'COD', '', 0, NULL, '2023-01-04 06:17:32');

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
(1, 1, 20, 1, 1999, '2023-01-04 06:10:28'),
(2, 2, 14, 3, 499, '2023-01-04 06:17:32');

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
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(11, 11, 'iPhone 14 Pro Max 128GB', 'iPhone-14-Pro-Max-128GB', 'iPhone 14 Pro Max 128GB', 'Cuối cùng thì chiếc iPhone 14 Pro Max cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Apple, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm iPhone 14 series với đầy đủ phiên bản', 2000, 1999, '1671440594.png', 50, 0, 1, 'iPhone 14 Pro Max 128GB', 'iPhone 14 Pro Max 128GB', 'iPhone 14 Pro Max 128GB', '2022-12-19 09:03:14'),
(12, 11, 'iPhone 13 Pro Max 128GB', 'iPhone-13-Pro-Max-128GB', 'iPhone 13 Pro Max 128GB', 'Cuối cùng thì chiếc iPhone 14 Pro Max cũng đã chính thức lộ diện tại sự kiện ra mắt thường niên vào ngày 08/09 đến từ nhà Apple, kết thúc bao lời đồn đoán bằng một bộ thông số cực kỳ ấn tượng cùng vẻ ngoài đẹp mắt sang trọng. Từ ngày 14/10/2022 người dùng đã có thể mua sắm các sản phẩm iPhone 13 series với đầy đủ phiên bản', 1000, 999, '1671440636.png', 50, 0, 1, 'iPhone 13 Pro Max 128GB', 'iPhone 13 Pro Max 128GB', 'iPhone 13 Pro Max 128GB', '2022-12-19 09:03:56'),
(13, 11, 'iPhone 13 Pro Max 128GB', 'iPhone-13-Pro-Max-128GB', 'iPhone 13 Pro Max 128GB', 'iPhone 13 Pro Max 128GB', 1500, 1499, '1672162050.jpg', 50, 0, 1, 'iPhone 13 Pro Max 128GB', 'iPhone 13 Pro Max 128GB', 'iPhone 13 Pro Max 128GB', '2022-12-27 17:27:30'),
(14, 13, 'Redmi Note 7 Pro', 'redmi-note-7-pro', 'Redmi Note 7 Pro', 'Redmi Note 7 Pro', 500, 499, '1672162111.jpg', 47, 0, 1, 'Redmi Note 7 Pro', 'Redmi Note 7 Pro', 'Redmi Note 7 Pro', '2022-12-27 17:28:31'),
(15, 16, 'Realmi Pro 512GB', 'realmi-pro-512gb', 'Realmi Pro 512GB', 'Realmi Pro 512GB', 600, 599, '1672162229.png', 50, 0, 1, 'Realmi Pro 512GB', 'Realmi Pro 512GB', 'Realmi Pro 512GB', '2022-12-27 17:30:29'),
(16, 12, 'Samsung Galaxy Pro 128GB', 'samsung-galaxy-pro-128gb', 'Samsung Galaxy Pro 128GB', 'Samsung Galaxy Pro 128GB', 800, 700, '1672162284.jpg', 46, 0, 1, 'Samsung Galaxy Pro 128GB', 'Samsung Galaxy Pro 128GB', 'Samsung Galaxy Pro 128GB', '2022-12-27 17:31:24'),
(17, 13, 'Renno Xanh Lam 512GB', 'renno-xanh-lam-512gb', 'Renno Xanh Lam 512GB', 'Renno Xanh Lam 512GB', 300, 299, '1672162406.png', 47, 0, 1, 'Renno Xanh Lam 512GB', 'Renno Xanh Lam 512GB', 'Renno Xanh Lam 512GB', '2022-12-27 17:33:26'),
(18, 15, 'HUAWEI P40 Pro+', 'huawei-p40-pro+', 'HUAWEI P40 Pro+', 'HUAWEI P40 Pro+', 1000, 999, '1672162502.jpg', 50, 0, 1, 'HUAWEI P40 Pro+', 'HUAWEI P40 Pro+', 'HUAWEI P40 Pro+', '2022-12-27 17:35:02'),
(19, 14, 'Reno 10x Zoom Edition', 'reno-10x-zoom-edition', 'Reno 10x Zoom Edition', 'Reno 10x Zoom Edition', 1000, 1000, '1672162586.jpg', 46, 0, 1, 'Reno 10x Zoom Edition', 'Reno 10x Zoom Edition', 'Reno 10x Zoom Edition', '2022-12-27 17:36:26'),
(20, 11, 'iPhone 14 128GB', 'iphone-14-128GB', 'iPhone 14 128GB', 'iPhone 14 128GB', 2000, 1999, '1672162687.png', 48, 0, 1, 'iPhone 14 128GB', 'iPhone 14 128GB', 'iPhone 14 128GB', '2022-12-27 17:38:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(15) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(1, 'Đặng Minh Tuệ', 'huyhuydai059@gmail.com', 1231231323, '123', 0, '2023-07-16 03:57:24'),
(2, 'Đặng Quốc Huy', 'admin@gmail.com', 334630884, '123', 1, '2023-07-16 03:57:59');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
