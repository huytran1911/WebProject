-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2024 lúc 07:45 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

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
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `IDorders` int(100) NOT NULL,
  `id` int(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `total_products` varchar(100) NOT NULL,
  `total_price` int(100) NOT NULL,
  `status` int(11) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`IDorders`, `id`, `receiver`, `phonenumber`, `street`, `ward`, `district`, `city`, `email`, `method`, `total_products`, `total_price`, `status`, `order_date`) VALUES
(1, 20, 'dff', 'dfsf', 'sdfsd', 'sdf', 'sdfsd', 'dsfsdf', 'haha123@gmail.com', '1', '', 3000000, 1, '2024-05-12 11:44:30'),
(2, 20, 'dff', 'dfsf', 'sdfsd', 'sdf', 'sdfsd', 'dsfsdf', 'haha123@gmail.com', '1', '', 0, 1, '2024-05-12 11:56:57'),
(3, 20, 'fdsfsdf', 'sdfsdf', 'sdfsd', 'sdfsdf', 'sdffsf', 'sdfsdf', 'haha123@gmail.com', '1', '', 1850000, 1, '2024-05-12 11:58:53'),
(4, 20, 'fd', 'dsfsdf', 'sdfsdf', 'dsdfsdfs', 'sdfs', 'dfsdf', 'haha123@gmail.com', '2', '', 1600000, 1, '2024-05-12 12:02:00'),
(5, 20, 'fwrf', 'ưèwẻ', 'ưẻwr', 'ưẻwẻ', 'ưẻw', 'ưẻwẻ', 'haha123@gmail.com', '1', '', 75000, 1, '2024-05-12 12:03:08'),
(6, 20, 'dfdf', 'dfewf', 'èwẻ', 'ewrưẻ', 'ưẻwe', 'ưẻwẻ', 'haha123@gmail.com', '1', '', 75000, 1, '2024-05-12 12:05:58'),
(7, 20, 'jkọkljklmkl', 'klkl;kl;k;', 'kilpklpklp', 'lklpk', 'kjkọkọ', 'huihuihui', 'haha123@gmail.com', '1', '', 1500000, 1, '2024-05-12 12:26:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `idDetail` int(100) NOT NULL,
  `IDorders` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `subtotal` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`idDetail`, `IDorders`, `pid`, `quantity`, `subtotal`) VALUES
(1, 3, 10, 1, 1500000),
(2, 3, 13, 1, 350000),
(3, 4, 10, 1, 1500000),
(4, 4, 16, 1, 100000),
(5, 5, 31, 1, 75000),
(6, 6, 31, 1, 75000),
(7, 7, 10, 1, 1500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cateid` int(10) NOT NULL,
  `categoryName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`cateid`, `categoryName`) VALUES
(15, 'Chiến lược'),
(20, 'Cờ'),
(21, 'Nhập vai'),
(22, 'Nhóm bạn'),
(23, 'Gia đình'),
(24, 'May mắn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `pid` int(10) NOT NULL,
  `img` varchar(50) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `price` varchar(20) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`pid`, `img`, `productName`, `price`, `detail`, `quantity`, `cid`) VALUES
(9, 'alma mater 1tr750.webp', 'Alma Mater', '1750000', 'asd', 12, 15),
(10, 'doomtown 1tr500.webp', 'Doom Town', '1500000', 'ád', 14, 15),
(11, 'fertility 1tr200.jpg', 'Fertility', '1200000', 'ád', 17, 15),
(12, 'marrakech 450k.webp', 'Marrakech', '450000', 'ád', 19, 15),
(13, 'ModernArt 350k.jpg', 'Modern Art', '350000', 'ád', 14, 15),
(14, 'chess 100k.jpg', 'Cờ vua', '100000', 'ád', 12, 20),
(16, 'co tuong 50k.jpg', 'Cờ tướng', '100000', 'ád', 15, 20),
(17, 'co ty phu 350k.webp', 'Cờ tỷ phú', '3500000', 'ád', 13, 20),
(18, 'co vay-caro 190k.webp', 'Cờ vây', '190000', 'ád', 20, 20),
(22, 'bai con thỏ 175k.png', 'Bài con thỏ', '175000', 'ádasd', 21, 23),
(23, 'boardgame Xếp Toán - Cộng Trừ 150k.jpg', 'Xếp toán', '150000', 'ád', 24, 23),
(24, 'co co tich 350k.webp', 'Cờ cổ tích', '350000', 'qá', 24, 20),
(25, 'hội phố 230k.jpg', 'Hội phố', '230000', 'ád', 24, 20),
(28, 'cuoc chien hoa qua 135k.jpg', 'Cuộc chiến hoa quả', '135000', 'ád', 13, 15),
(29, 'cuoc chien hoa qua 135k.jpg', 'Cuộc chiến hoa quả', '135000', 'ád', 13, 24),
(30, 'kham rang ca sau 65k.jpg', 'Khám răng cá sấu', '65000', 'ád', 26, 24),
(31, 'pha bang chim canh cut 75k.jpg', 'Phá băng chim cánh cụt', '75000', 'ád', 27, 24),
(32, 'rùa pacman 70k.jpg', 'Rùa pacman', '70000', 'ád', 21, 24),
(33, 'thung hai tac 65k.jpg', 'Thùng hải tặc', '60000', 'ád', 19, 24),
(34, 'avalon 160k.jpg', 'Avalon', '200000', 'ád', 19, 21),
(35, 'cluedo 350k.jpg', 'Cluedo', '350000', 'ád', 21, 21),
(36, 'coup 120k.jpg', 'Coup', '120000', 'ád', 23, 21),
(37, 'masoi 240k.jpeg', 'Ma sói ', '240000', 'ád', 25, 21),
(38, 'rick and morty 120k.jpg', 'rick and morty', '120000', 'ád', 29, 21),
(39, 'joking hazard 200k.jpg', 'Joking hazard', '200000', 'ád', 24, 22),
(40, 'lầy 90k.webp', 'Lầy', '90000', 'ád', 16, 22),
(41, 'lên 90k.webp', 'Lên', '90000', 'ád', 12, 22),
(42, 'mõm 89k.jpg', 'Mõm ', '80000', 'ád', 12, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `street` varchar(100) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phonenumber` int(20) NOT NULL,
  `role` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `email`, `street`, `ward`, `district`, `city`, `phonenumber`, `role`) VALUES
(7, 'huyhuyhuy', '123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(8, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(9, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(10, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(11, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(12, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(13, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(14, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(15, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(16, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(17, 'huy', 'huytran123', 'tranhuy19112004@gmail.com', '', '', '', '', 905046373, 0),
(18, '', '', '', '', '', '', '', 0, 0),
(19, '', '$2y$10$kccnLGrNQWHKc80VsQRCUem1la5yrwan/52NO/xemPCSJOiU9x4xy', '', '', '', '', '', 0, 0),
(20, 'anhtriet', '$2y$10$3Yl45G.oRqo.RiF1bU3dWu7UIP2ras.x3eM40Wy2xtu9UeOlACSuy', 'haha123@gmail.com', '', '', '', '', 899517129, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`IDorders`),
  ADD KEY `fk_oders_users` (`id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`idDetail`),
  ADD KEY `fk_oders_detail` (`IDorders`),
  ADD KEY `fk_products_detail` (`pid`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cateid`);

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
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `IDorders` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `idDetail` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cateid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_oders_users` FOREIGN KEY (`id`) REFERENCES `tbl_users` (`id`);

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `fk_oders_detail` FOREIGN KEY (`IDorders`) REFERENCES `orders` (`IDorders`),
  ADD CONSTRAINT `fk_products_detail` FOREIGN KEY (`pid`) REFERENCES `tbl_products` (`pid`);

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `fk_products_category` FOREIGN KEY (`cid`) REFERENCES `tbl_category` (`cateid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
