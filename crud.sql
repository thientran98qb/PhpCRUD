-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2020 at 07:54 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `product_img` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_date_created` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_img`, `product_description`, `product_date_created`, `user_id`) VALUES
(1, 'Iphone 12 Pro Max', 'ae7c1fb43cad740bb4d0f2374baa9f32.jpeg', 'Sản phẩm vừa ra mắt và nhận được rất nhiều sự quan tâm', '2020-11-09', 21),
(2, 'Macbook Pro 2020', '774d67560d37c8522eaf467d4de3a9ec.jpeg', 'Sản phẩm đẳng cấp và thời thượng.Dành cho đại gia', '2020-11-01', 21),
(3, 'Samsung Galaxy Utral 20', 'f2dd914bd4a16d6a2aa589b8dd775317.jpeg', 'Nổi bật và hiện đại nhất của Samsung trong năm 2020', '2020-11-08', 21),
(4, 'Laptop MSI Gaming', 'd05627af518557028b92e49f6ada54ba.jpg', 'Dòng sản phẩm được giới game thủ ưu chuộng', '2020-11-09', 21),
(5, 'AirPods-Pro', '37287452c382ec51b200ed52da263583.jpg', 'Tai nghe không dây hàng đầu ở Việt Nam', '2020-11-07', 21),
(6, 'Tay Cầm PS4', '095aa89edb644702f3e5c731a0ce0bcd.png', 'Tay cầm chơi game tích hợp wifi tiện lợi', '2020-11-09', 22),
(9, 'Samsung Galaxy Utral 20', 'fa322469a3b62d3cca0a258bffff62c0.jpeg', 'Samsung đỉnh cao', '2020-11-10', 21),
(13, 'IP 10 Plus', 'c88ad15b0bb75b61f323cbdb1e77cf69.jpg', 'Airpods cho giới thượng lưu', '2020-11-11', 21),
(18, 'MSI Gaming', '3186cfe03b7c15c36bcd2a80c23ad523.jpg', 'Máy chơi game đẳng cấp', '2020-12-02', 21),
(20, 'Iphone 5s', 'a05b749dc8fdf6b4e7c2c25aca1ea4c9.png', 'Cục gạch mọi thời đại', '2020-11-09', 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_fullname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_img` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_fullname`, `user_pass`, `user_img`, `user_phone`) VALUES
(19, 'thientran98qb', 'Thiện Đình', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(20, 'nguyenvanbaga', 'Phong Trần', '983f73fdd0719143c434e141e0cd224e', NULL, NULL),
(21, 'thientran98qbs', 'Thiện Đình', 'f4c53ec82871c04c7ca22ddccaef18d8', NULL, NULL),
(22, 'Ngoc123', 'Ngọc Như', '515f59ba0903d5a881d487de3b7b6ba8', NULL, NULL),
(23, 'trandinhthien', 'Admin', 'e7a7bead4574b86df9d672b63db51b6d', NULL, NULL),
(24, 'thienvippro', 'Thiện Vip', 'e7a7bead4574b86df9d672b63db51b6d', NULL, NULL),
(25, 'thienproqb', 'Thiện Vip', 'e7a7bead4574b86df9d672b63db51b6d', NULL, NULL),
(26, 'thiendangcap', 'Thiện NNNN', 'e7a7bead4574b86df9d672b63db51b6d', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
