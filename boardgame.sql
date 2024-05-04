-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2024 lúc 04:10 PM
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
-- Cơ sở dữ liệu: `boardgame`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cid` int(10) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`cid`, `categoryName`) VALUES
(14, 'Gia đình'),
(15, 'Chiến lược'),
(16, 'Gia đình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `pid` int(10) NOT NULL,
  `img` varchar(50) NOT NULL,
  `productName` int(50) NOT NULL,
  `price` int(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `cid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `phonenumber`, `address`, `role`) VALUES
(7, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(8, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(9, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(10, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(11, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(12, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(13, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(14, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(15, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(16, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(17, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', 905046373, '850thd', 0),
(18, '', '', '', 0, '', 0),
(19, '', '$2y$10$kccnLGrNQWHKc80VsQRCUem1la5yrwan/52NO/xemPCSJOiU9x4xy', '', 0, '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cid`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `fk_products_category` (`cid`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`cid`) REFERENCES `tbl_category` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
