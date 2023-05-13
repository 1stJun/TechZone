-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2023 lúc 11:38 AM
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
-- Cơ sở dữ liệu: `techzone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `adminID` int(11) NOT NULL,
  `adminUsername` varchar(30) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `adminFullName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`adminID`, `adminUsername`, `adminPass`, `adminFullName`) VALUES
(1, 'admin01', '123456', 'Hong Son'),
(2, 'admin02', '123456', 'Le Thanh'),
(3, 'admin03', '123456', 'Dinh Thinh'),
(4, 'admin04', '123456', 'Van Hiep');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `catID` int(11) NOT NULL,
  `catName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`catID`, `catName`) VALUES
(4, 'Laptop Acer'),
(5, 'Laptop ASUS'),
(3, 'Laptop Dell'),
(9, 'Laptop Gaming'),
(8, 'Laptop GIGABYTE'),
(2, 'Laptop HP'),
(1, 'Laptop Lenovo'),
(7, 'Laptop LG'),
(6, 'Laptop MSI');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customerID` int(11) NOT NULL,
  `customerPhone` varchar(20) NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `customerPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customerID`, `customerPhone`, `customerEmail`, `customerName`, `customerPass`) VALUES
(1, '0128397262', 'thanh@gmail.com', 'hunggiii', '$2y$10$QDFca45vGzVbKfNkXtApsusLuHHwSCefQWF91F80k0w1zUM3953e6');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `order_date`, `total_amount`) VALUES
(1, 1, '2023-05-10 06:20:18', 30490000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `orderDetailID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`orderDetailID`, `orderID`, `productID`, `quantity`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `productImage` varchar(255) DEFAULT NULL,
  `productPrice` int(11) NOT NULL,
  `productListPrice` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productDescription` varchar(500) DEFAULT NULL,
  `catID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productID`, `productName`, `productImage`, `productPrice`, `productListPrice`, `productQuantity`, `productDescription`, `catID`) VALUES
(1, 'Dell XPS 13 9310', 'dellxps01.png', 30490000, 33900000, 10, '13.4 inch FHD+ InfinityEdge Non-Touch Display, 11th Gen Intel Core i7-1165G7, 16GB RAM, 512GB SSD', 3),
(2, 'MSI GF65 Thin 10UE-014US', 'msithin01.png', 26890000, 31640000, 15, '15.6\" FHD 144Hz 7ms IPS-Level, 10th Gen Intel Core i7-10750H, NVIDIA GeForce RTX 3060 Laptop GPU, 16GB RAM, 512GB NVMe SSD', 6),
(3, 'ASUS ROG Strix G15 G513', 'asusrog01.png', 38490000, 41990000, 8, '15.6\" 165Hz FHD Display, AMD Ryzen 9 5900HX, NVIDIA GeForce RTX 3070 Laptop GPU, 32GB RAM, 1TB NVMe SSD', 5),
(4, 'Acer Predator Helios 300', 'acer01.png', 28990000, 34990000, 17, '15.6\" FHD 144Hz 3ms IPS Display, 10th Gen Intel Core i7-10750H, NVIDIA GeForce RTX 3060 Laptop GPU, 16GB RAM, 512GB NVMe SSD', 4),
(5, 'Lenovo IdeaPad 3', 'lenovoideapad01.png', 13990000, 17990000, 25, '15.6\" FHD Display, 10th Gen Intel Core i5-1035G1, 8GB RAM, 256GB SSD', 1),
(6, 'HP Pavilion x360', 'hppavilion01.png', 17990000, 22490000, 20, '14\" FHD IPS Touch Display, 11th Gen Intel Core i5-1135G7, 8GB RAM, 512GB SSD', 2),
(7, 'Dell G7 7500', 'dellg7.png', 29990000, 31990000, 10, '15.6\" FHD 144Hz IPS Display, 10th Gen Intel Core i7-10750H, NVIDIA GeForce RTX 2070 Max-Q, 16GB RAM, 512GB SSD', 3),
(8, 'MSI Creator 17 A10SF-278', 'msicreator.png', 51990000, 54990000, 6, '17.3\" 4K UHD Display, 10th Gen Intel Core i7-10875H, NVIDIA GeForce RTX 2070 Max-Q, 32GB RAM, 1TB NVMe SSD', 6),
(9, 'Lenovo Legion 5', 'lenovolegion01.png', 23990000, 27990000, 12, '15.6\" FHD IPS Display, AMD Ryzen 5 5600H, NVIDIA GeForce GTX 1650, 8GB RAM, 512GB SSD', 9),
(10, 'HP Envy x360', 'hpenvy01.png', 20990000, 24990000, 8, '15.6\" FHD IPS Touch Display, 11th Gen Intel Core i5-1135G7, 8GB RAM, 256GB SSD', 2),
(11, 'Dell Inspiron 15 3505', 'dellinspiron01.png', 11990000, 14990000, 20, '15.6\" HD Display, AMD Ryzen 3 3250U, 8GB RAM, 256GB SSD', 3),
(12, 'ASUS VivoBook S14', 'asusvivobook01.png', 15990000, 19990000, 15, '14\" FHD IPS Display, 11th Gen Intel Core i5-1135G7, 8GB RAM, 512GB SSD', 5),
(13, 'MSI Prestige 14 Evo', 'msiprestige01.png', 28990000, 31990000, 6, '14\" FHD IPS Display, 11th Gen Intel Core i7-1185G7, Intel Iris Xe Graphics, 16GB RAM, 512GB NVMe SSD', 6),
(14, 'Acer Aspire 5', 'aceraspire01.png', 14990000, 17990000, 18, '15.6\" FHD IPS Display, AMD Ryzen 5 4500U, 8GB RAM, 512GB SSD', 4),
(15, 'Lenovo Yoga Slim 7i', 'lenovoyoga01.png', 30990000, 33990000, 10, '14\" QHD IPS Display, 11th Gen Intel Core i7-1165G7, Intel Iris Xe Graphics, 16GB RAM, 1TB SSD', 1),
(16, 'HP Spectre x360', 'hpspectre01.png', 41990000, 46990000, 5, '14\" FHD IPS Touch Display, 11th Gen Intel Core i7-1165G7, Intel Iris Xe Graphics, 16GB RAM, 1TB SSD', 2),
(17, 'Dell G15 5510', 'dellg15.png', 32990000, 36990000, 9, '15.6\" FHD 120Hz IPS Display, 11th Gen Intel Core i7-11800H, NVIDIA GeForce RTX 3060 Laptop GPU, 16GB RAM, 512GB SSD', 3),
(18, 'ASUS TUF Gaming A15', 'asustuf01.png', 28990000, 32990000, 7, '15.6\" FHD 144Hz IPS Display, AMD Ryzen 5 5600H, NVIDIA GeForce GTX 1650, 8GB RAM, 512GB NVMe SSD', 9),
(19, 'ASUS TUF Dash F15', 'asustuf.png', 24990000, 28990000, 12, '15.6\" FHD 144Hz IPS Display, 11th Gen Intel Core i7-11370H, NVIDIA GeForce RTX 3060 Laptop GPU, 8GB RAM, 512GB NVMe SSD', 5),
(20, 'Dell Inspiron 15 5518', 'dellinspiron.png', 16990000, 19990000, 20, '15.6\" FHD Display, 11th Gen Intel Core i5-11300H, 8GB RAM, 256GB SSD', 3),
(21, 'Acer Aspire 5 A515-56', 'aceraspire.png', 13990000, 16990000, 30, '15.6\" FHD IPS Display, 11th Gen Intel Core i5-1135G7, 8GB RAM, 512GB NVMe SSD', 4),
(22, 'Lenovo Legion 5 Pro', 'lenovolegion.png', 42990000, 47990000, 5, '16\" QHD 165Hz IPS Display, AMD Ryzen 7 5800H, NVIDIA GeForce RTX 3070 Laptop GPU, 16GB RAM, 1TB NVMe SSD', 9),
(23, 'ASUS ZenBook Duo', 'asuszenbookduo.png', 32990000, 36990000, 10, '14\" FHD IPS Touch Display, 11th Gen Intel Core i7-1165G7, NVIDIA GeForce MX450, 16GB RAM, 1TB NVMe SSD', 5),
(24, 'Dell Latitude 5420', 'delllatitude.png', 23990000, 27990000, 8, '14\" FHD Display, 11th Gen Intel Core i5-1135G7, 8GB RAM, 512GB NVMe SSD', 3),
(25, 'MSI Stealth 15M', 'msistealth.png', 32990000, 36990000, 6, '15.6\" FHD 144Hz IPS Display, 11th Gen Intel Core i7-1185G7, NVIDIA GeForce RTX 3060 Laptop GPU, 16GB RAM, 512GB NVMe SSD', 6),
(28, 'Lenovo ThinkPad X1 Carbon Gen 9', 'lenovothinkpad.png', 50990000, 54990000, 4, '14\" FHD IPS Display, 11th Gen Intel Core i7-1165G7, 16GB RAM, 1TB NVMe SSD', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catID`),
  ADD UNIQUE KEY `catName` (`catName`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `fk_customerID` (`customerID`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderDetailID`),
  ADD KEY `fk_orderID` (`orderID`),
  ADD KEY `fk_productID` (`productID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `fk_catID` (`catID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_customerID` FOREIGN KEY (`customerID`) REFERENCES `customers` (`customerID`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `fk_productID` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_catID` FOREIGN KEY (`catID`) REFERENCES `categories` (`catID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
