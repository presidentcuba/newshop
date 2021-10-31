-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2021 at 07:54 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buoi_all`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `thumb`, `active`, `created_at`) VALUES
(4, 'Giảm Giá', '/upload/banner/2021/04/02/ban1.jpg', 1, 1617336557);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `number` int(255) NOT NULL,
  `product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `thumb`, `name`, `price`, `number`, `product_id`) VALUES
(12, 9, '/upload/product/2021/03/29/p17.jpg', 'Áo Khoác Nam', 45000, 1, 13),
(13, 10, '/upload/product/2021/03/29/p10.jpg', 'Áo Thun Nam', 83000, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `time_create` int(255) NOT NULL,
  `is_view` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `address`, `email`, `content`, `time_create`, `is_view`) VALUES
(1, 'Dương văn tỉnh', '0333883724', '219 Hoàng Diệu, P linh trung, Q thủ đức', 'presidentcubacuba@gmail.com', '', 1617243023, 0),
(3, 'Dương văn tỉnh', '0333883724', '219 Hoàng Diệu, P linh trung, Q thủ đức', 'presidentcubacuba@gmail.com', '', 1617244326, 0),
(4, 'Dương văn tỉnh', '0333883724', '219 Hoàng Diệu, P linh trung, Q thủ đức', 'presidentcubacuba@gmail.com', '', 1617244330, 0),
(5, 'Dương văn tỉnh', '0333883724', '219 Hoàng Diệu, P linh trung, Q thủ đức', 'presidentcubacuba@gmail.com', '', 1617245021, 0),
(6, 'Dương văn tỉnh', '0333883724', '219 Hoàng Diệu, P linh trung, Q thủ đức', 'presidentcubacuba@gmail.com', '', 1617245309, 0),
(7, 'Dương văn tỉnh', '0333883724', '219 Hoàng Diệu, P linh trung, Q thủ đức', 'presidentcubacuba@gmail.com', '', 1617245641, 1),
(8, 'Dương văn tỉnh', '0333883724', '219 Hoàng Diệu, P linh trung, Q thủ đức', 'presidentcubacuba@gmail.com', '', 1617245684, 1),
(9, 'duong van tinh', '0333883724', '219 Hoàng Diệu, P linh trung, Q thủ đức', 'presidentcubacuba@gmail.com', '', 1617248032, 1),
(10, 'Dương văn tỉnh', '0333883724', '155b nguyễn đình chính', 'presidentcubacuba@gmail.com', '', 1617348063, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` int(1) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `description`, `active`, `created_at`) VALUES
(5, 'Quần Áo Bán Chạy', 'Quần Áo Bán Chạy', 1, '2021-03-02 02:33:03'),
(6, 'Quần Áo Hiện Đại', 'Quần Áo Hiện Đại', 1, '2021-03-03 19:01:46'),
(9, 'Quần Áo Giảm Giá 2', 'Quần Áo Giảm Giá 2', 1, '2021-03-03 19:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `menu_id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `sale_price` int(255) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `active` int(1) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `created_at` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `menu_id`, `price`, `sale_price`, `description`, `content`, `active`, `thumb`, `created_at`) VALUES
(5, 'Đồ Công Sở', 5, 70000, 55000, 'Đồ Công Sở', '', 1, '/upload/product/2021/03/29/p5.jpg', 1616987222),
(6, 'Áo Thun Dài Tay', 5, 80000, 62000, 'Áo Thun Dài Tay', '', 1, '/upload/product/2021/03/29/p9.jpg', 1616987247),
(7, 'Áo Nam Ngắn Tay', 5, 75000, 26000, 'Phong cách:\r\nGiải trí\r\nMàu sắc:\r\nNhiều màu\r\nKiểu mẫu:\r\nSọc\r\nViền :\r\náo hai dây\r\nChiều dài:\r\nNgắn\r\nKiểu:\r\nHai Dây\r\nChi tiết:\r\nViên lá sen\r\nChiều dài tay:\r\nKhông tay\r\nMùa:\r\nMùa Hè\r\nVòng eo:\r\nThắt lưng thấp\r\nLoại Phù hợp:\r\nPhù hợp thường\r\nMỏng:\r\nKhông\r\nHình hem:\r\nLá sen\r\nVật liệu:\r\nBông\r\nThành phần:\r\n80% Bông, 20% Polyester\r\nSợi vải:\r\nKhông căng', '', 1, '/upload/product/2021/03/29/p12.jpg', 1616987277),
(8, 'Đồ Bộ 2', 6, 57000, 36000, 'Đồ Bộ 2', '', 1, '/upload/product/2021/03/29/p20.jpg', 1616987302),
(9, 'Đồ Bộ', 6, 74000, 65000, 'Đồ Bộ', '', 1, '/upload/product/2021/03/29/p21.jpg', 1616987332),
(13, 'Áo Khoác Nam', 5, 50000, 45000, '', '', 1, '/upload/product/2021/03/29/p17.jpg', 1616988328),
(14, 'Ái Dài Truyền Thống', 5, 75000, 65000, 'Nước Hoa Thời Thượng', '', 1, '/upload/product/2021/03/29/p14.jpg', 1616988355),
(15, 'Áo Thun Nam', 6, 85000, 83000, '&lt;p&gt;Nước Hoa Giảm Gi&amp;aacute;&lt;/p&gt;', '&lt;p&gt;t&amp;igrave;nh y&amp;ecirc;u đến&lt;/p&gt;', 1, '/upload/product/2021/03/29/p10.jpg', 1616988511),
(16, 'Nước Hoa Giảm Giá', 9, 100000, 95000, '&lt;div class=&quot;wDYxhc&quot; lang=&quot;vi-VN&quot; style=&quot;clear:none&quot;&gt;\r\n&lt;div class=&quot;LGOjhe&quot;&gt;&lt;strong&gt;&amp;Aacute;o d&amp;agrave;i truyền thống&lt;/strong&gt; Việt Nam, d&amp;aacute;ng &lt;strong&gt;&amp;aacute;o&lt;/strong&gt; &amp;ocirc;m s&amp;aacute;t cơ thể, c&amp;oacute; cổ cao v&amp;agrave; &lt;strong&gt;d&amp;agrave;i&lt;/strong&gt; khoảng ngang gối. N&amp;oacute; được xẻ ra ở h&amp;ocirc;ng. &lt;strong&gt;&amp;Aacute;o D&amp;agrave;i&lt;/strong&gt; vừa quyến rũ lại vừa gợi cảm, vừa k&amp;iacute;n đ&amp;aacute;o nhưng vẫn biểu lộ đường n&amp;eacute;t của một người thiếu nữ&lt;/div&gt;\r\n&lt;/div&gt;', '&lt;p&gt;Được gh&amp;eacute;p bởi 5 mảnh vải (ngũ th&amp;acirc;n): 2 th&amp;acirc;n trước, 2 th&amp;acirc;n sau, v&amp;agrave; th&amp;acirc;n con thứ 5 nằm ở ph&amp;iacute;a trước, b&amp;ecirc;n phải người mặc.1 dạng s&amp;aacute;i Vạt &amp;aacute;o x&amp;ograve;e v&amp;agrave; cong, kh&amp;ocirc;ng may thẳng.V&amp;igrave; vậy khi mặc l&amp;ecirc;n,2 b&amp;ecirc;n t&amp;agrave; c&amp;uacute;p lại, kh&amp;ocirc;ng lộ eo như &amp;aacute;o d&amp;agrave;i t&amp;acirc;n thời *Lưu &amp;yacute;:vạt kh&amp;ocirc;ng x&amp;ograve;e rộng l&amp;agrave; kh&amp;ocirc;ng đ&amp;uacute;ng quy c&amp;aacute;ch truyền thống&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Nữu(n&amp;uacute;t &amp;aacute;o)&lt;/strong&gt; &amp;Aacute;o ngũ th&amp;acirc;n c&amp;oacute; 5 n&amp;uacute;t, vị tr&amp;iacute; cụ thể như tr&amp;ecirc;n ảnh.N&amp;uacute;t thứ 2 v&amp;agrave; n&amp;uacute;t 1 ở giữa cổ phải tạo th&amp;agrave;nh đường thẳng vu&amp;ocirc;ng g&amp;oacute;c với trung ph&amp;ugrave;ng đạo(đường r&amp;aacute;p vải giữa &amp;aacute;o) Chất liệu:l&amp;agrave;m từ kim loại,gỗ,ngọc...&lt;/p&gt;', 1, '/upload/product/2021/03/29/p6.jpg', 1617002080),
(17, 'Quần Áo Thời Thượng', 9, 75000, 65000, '', '', 1, '/upload/product/2021/03/31/p23.jpg', 1617155421),
(18, 'Quần Áo Trẻ Em', 5, 150000, 125000, '', '', 1, '/upload/product/2021/03/31/p25.jpg', 1617155467),
(19, 'Quần Áo Trẻ Em', 9, 150000, 105000, '', '', 1, '/upload/product/2021/03/31/p26.jpg', 1617155506);

-- --------------------------------------------------------

--
-- Table structure for table `product_slider`
--

CREATE TABLE `product_slider` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `product_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_slider`
--

INSERT INTO `product_slider` (`id`, `title`, `url`, `product_id`) VALUES
(1, 'Ái Dài Truyền Thống', '/upload/product/2021/03/29/p14.jpg', 14),
(2, 'Áo Thun Nam', '/upload/product/2021/03/29/p10.jpg', 15),
(3, 'Ái Dài Truyền Thống', '/upload/product/2021/03/29/p14.jpg', 14),
(4, 'Áo Khoác Nam', '/upload/product/2021/03/29/p17.jpg', 13),
(5, 'Ái Dài Truyền Thống', '/upload/product/2021/03/29/p14.jpg', 14),
(6, 'Nước Hoa Giảm Giá', '/upload/product/2021/03/29/p6.jpg', 16),
(7, 'Nước Hoa Giảm Giá', '/upload/product/2021/03/29/p6.jpg', 16),
(8, 'Nước Hoa Giảm Giá', '/upload/product/2021/03/29/p6.jpg', 16),
(9, 'Ái Dài Truyền Thống', '/upload/product/2021/03/29/p14.jpg', 14),
(10, 'Quần Áo Trẻ Em', '/upload/product/2021/03/31/p26.jpg', 19),
(11, 'Quần Áo Trẻ Em', '/upload/product/2021/03/31/p26.jpg', 19),
(12, 'Quần Áo Trẻ Em', '/upload/product/2021/03/31/p26.jpg', 19),
(13, 'Quần Áo Trẻ Em', '/upload/product/2021/03/31/p25.jpg', 18),
(14, 'Quần Áo Trẻ Em', '/upload/product/2021/03/31/p25.jpg', 18),
(15, 'Quần Áo Trẻ Em', '/upload/product/2021/03/31/p25.jpg', 18),
(16, 'Quần Áo Thời Thượng', '/upload/product/2021/03/31/p23.jpg', 17),
(17, 'Quần Áo Thời Thượng', '/upload/product/2021/03/31/p23.jpg', 17),
(18, 'Quần Áo Thời Thượng', '/upload/product/2021/03/31/p23.jpg', 17),
(19, 'Quần Áo Thời Thượng', '/upload/product/2021/03/31/p23.jpg', 17),
(20, 'Nước Hoa Giảm Giá', '/upload/product/2021/03/29/p6.jpg', 16),
(21, 'Áo Thun Nam', '/upload/product/2021/03/29/p10.jpg', 15),
(22, 'Nước Hoa Giảm Giá', '/upload/product/2021/03/29/p6.jpg', 16),
(23, 'Ái Dài Truyền Thống', '/upload/product/2021/03/29/p14.jpg', 14),
(24, 'Quần Áo Trẻ Em', '/upload/product/2021/03/31/p26.jpg', 19),
(25, 'Quần Áo Trẻ Em', '/upload/product/2021/03/31/p26.jpg', 19),
(26, 'Quần Áo Trẻ Em', '/upload/product/2021/03/31/p25.jpg', 18),
(27, 'Quần Áo Trẻ Em', '/upload/product/2021/03/31/p25.jpg', 18),
(28, 'Quần Áo Thời Thượng', '/upload/product/2021/03/31/p23.jpg', 17),
(29, 'Quần Áo Thời Thượng', '/upload/product/2021/03/31/p23.jpg', 17),
(30, 'Quần Áo Thời Thượng', '/upload/product/2021/03/31/p23.jpg', 17),
(31, 'Quần Áo Thời Thượng', '/upload/product/2021/03/31/p23.jpg', 17),
(32, 'Nước Hoa Giảm Giá', '/upload/product/2021/03/29/p6.jpg', 16),
(33, 'Nước Hoa Giảm Giá', '/upload/product/2021/03/29/p6.jpg', 16),
(34, 'Nước Hoa Giảm Giá', '/upload/product/2021/03/29/p6.jpg', 16),
(35, 'Nước Hoa Giảm Giá', '/upload/product/2021/03/29/p6.jpg', 16),
(36, 'Áo Thun Nam', '/upload/product/2021/03/29/p10.jpg', 15),
(37, 'Áo Thun Nam', '/upload/product/2021/03/29/p10.jpg', 15),
(38, 'Ái Dài Truyền Thống', '/upload/product/2021/03/29/p14.jpg', 14),
(39, 'Ái Dài Truyền Thống', '/upload/product/2021/03/29/p14.jpg', 14);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `sort_by` int(255) NOT NULL,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `url`, `active`, `sort_by`, `thumb`) VALUES
(13, 'Nước Hoa ngày 8/3', 'https://google.com', 1, 0, '/upload/slider/2021/03/29//b1.jpg'),
(14, 'Nước Hoa Thời Thượng', 'https://www.google.com/', 1, 0, '/upload/slider/2021/03/29//b2.jpg'),
(15, 'Nước Hoa Bán Chạy', '', 1, 0, '/upload/slider/2021/03/29//b3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `level`) VALUES
(1, 'admin@gmail.com', '$2y$10$3f82Ze0iXWwjvzg3tUGbb.oAZNN1SpF2l6E1QJI3OZr4l0ovtBTQq', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_slider`
--
ALTER TABLE `product_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_slider`
--
ALTER TABLE `product_slider`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
