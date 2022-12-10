-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2022 lúc 07:14 PM
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
-- Cơ sở dữ liệu: `db_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` tinyint(4) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_passwd` varchar(32) NOT NULL,
  `admin_level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_user`, `admin_email`, `admin_passwd`, `admin_level`) VALUES
(1, 'Nguyen Quang', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_table`
--

CREATE TABLE `cart_table` (
  `cart_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_table`
--

INSERT INTO `cart_table` (`cart_id`, `session_id`, `product_id`, `product_name`, `price`, `quantity`, `image`) VALUES
(3, 'gl3mggcrlm0tfcmka54f6j2aip', 1, 'Test2', 9992, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_name`) VALUES
(11, 'Laptop'),
(12, 'PC'),
(13, 'Smart Phone'),
(14, 'Keyboard'),
(15, 'Monitor'),
(16, 'Case');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_table`
--

CREATE TABLE `products_table` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `price` varchar(30) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products_table`
--

INSERT INTO `products_table` (`product_id`, `product_name`, `cate_id`, `body`, `price`, `image`, `type`) VALUES
(1, 'Test2', 3, 'ssssssssss', '9992', 'upload/ed77c304dd.png', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zip_code` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_table`
--

INSERT INTO `user_table` (`user_id`, `name`, `address`, `city`, `country`, `zip_code`, `phone_number`, `email`, `password`) VALUES
(1, 'Nguyen Minh Quang', 'Ha noi', 'Hanoi', 'Vietnam', '100000', '0976843879', 'test@gmail.com', '2b10351253eed030812674e8aa18a5ab');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `cart_table`
--
ALTER TABLE `cart_table`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart_table`
--
ALTER TABLE `cart_table`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products_table`
--
ALTER TABLE `products_table`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
