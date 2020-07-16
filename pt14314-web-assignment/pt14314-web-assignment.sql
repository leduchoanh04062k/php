-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 08, 2020 lúc 02:41 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pt14314-web-assignment`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `logo` varchar(150) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `logo`, `country`) VALUES
(1, 'lehoanh', 'public/images/5e649f1f7ccaa-06.jpg', 'Việt Nam'),
(3, 'lehoanh4', 'public/images/5e6493529d486-01.jpg', 'Thái Lan'),
(4, 'htm33', 'public/images/5e64979baa123-06.jpg', 'Việt Nam'),
(5, 'OPO78', 'public/images/5e649c94ccade-banner_product.png', 'Trung quốc'),
(6, 'moto6', 'public/images/5e649f152bd63-08.jpg', 'Thái Lan'),
(7, 'lehoanh7', 'public/images/5e64f182375b9-05.jpg', 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cars`
--

CREATE TABLE `cars` (
  `id` int(20) UNSIGNED NOT NULL,
  `brand_id` int(10) NOT NULL,
  `model_name` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `price` int(50) NOT NULL,
  `sale_price` int(50) NOT NULL,
  `detail` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cars`
--

INSERT INTO `cars` (`id`, `brand_id`, `model_name`, `image`, `price`, `sale_price`, `detail`, `quantity`) VALUES
(1, 1, 'puka', 'public/images/5e64f19d22afa-04.jpg', 200, 200, 'gcjvj', 6),
(2, 1, 'puka5', 'public/images/5e64f19563664-04.jpg', 2008, 2008, '56tetreter', 4),
(3, 3, 'puka33', 'public/images/5e6493bb82854-04.jpg', 300, 200, 'fghghjgj', 6),
(4, 4, 'puka88', 'public/images/5e649bcfd9e4b-2.jpg', 2007, 2007, 'yuyyhuklljljku', 78),
(5, 5, 'puka0', 'public/images/5e649cb95cce5-deals.png', 300, 200, 'JBJI', 80),
(6, 3, 'matda67', 'public/images/5e649f2e7545e-09.jpg', 2003, 2003, 'đếad', 34);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
