-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 21, 2023 lúc 07:18 AM
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
-- Cơ sở dữ liệu: `agile`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan_laptop`
--

CREATE TABLE `binh_luan_laptop` (
  `id` int(11) NOT NULL,
  `id_nguoi_dung` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL,
  `rating` int(5) NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_binh_luan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `laptops`
--

CREATE TABLE `laptops` (
  `id` int(11) NOT NULL,
  `laptop_name` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `processor` varchar(50) NOT NULL,
  `screen_size` varchar(20) NOT NULL,
  `graphics_card` varchar(100) NOT NULL,
  `ram` varchar(10) NOT NULL,
  `storage_capacity` varchar(50) NOT NULL,
  `operating_system` varchar(50) NOT NULL,
  `weight` decimal(5,1) NOT NULL,
  `status` enum('Còn hàng','Liên hệ') NOT NULL,
  `price_range` decimal(10,0) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `time_click_laptop` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `laptops`
--

INSERT INTO `laptops` (`id`, `laptop_name`, `brand`, `processor`, `screen_size`, `graphics_card`, `ram`, `storage_capacity`, `operating_system`, `weight`, `status`, `price_range`, `image_url`, `time_click_laptop`) VALUES
(65, 'Laptop Asus TUF Dash F15 FX517ZC-HN077W (I5-12450H/ 8GB/ 512GB SSD/ 15.6FHD-144Hz/ RTX3050 4GB/ Win1', 'Asus', 'Core i5', '15.6 inch', 'RTX 3050', '8GB', '512GB SSD', 'Windows 11', 2.0, 'Còn hàng', 19990000, 'img/250-21939-asus-tuf-dash-f15.png', '0000-00-00 00:00:00'),
(66, 'Laptop Asus TUF Dash F15 FX517ZC-HN079W (i5-12450H/ 8GB RAM/ 512GB SSD/ RTX 3050 4GB/ 15.6-inch FHD/', 'Asus', 'Core i5', '15.6 inch', 'Intel HD Graphics', '8GB', '512GB SSD', 'Windows 11', 2.0, 'Còn hàng', 19990000, 'img/250-22016-asus-tuf-dash-f15-fx517zc-hn079w.png', '0000-00-00 00:00:00'),
(67, 'Laptop ASUS TUF Gaming A15 FA507NU-LP034W (Ryzen 7-7735HS/ 8GB RAM/ 512GB SSD/ RTX 4050 6GB / 15.6\" ', 'Asus', 'Ryzen 7', '15.6 inch', 'RTX 3050', '8GB', '512GB SSD', 'Windows 11', 2.2, 'Còn hàng', 29790000, 'img/250-24882-laptop-asus-tuf-gaming-a15-fa507nu-lp034w-13.jpg', '0000-00-00 00:00:00'),
(69, 'Laptop ASUS ROG Flow Z13 GZ301VU-MU301W (Core i9-13900H / 16GB RAM/ 1TB SSD/ RTX 4050 6GB / 13.4\" WU', 'Asus', 'Core i9', '13.4 inch', 'RTX 4050 6GB', '16GB', '1 TB', 'Windows 11', 1.2, 'Còn hàng', 53990000, 'img/250-24952-laptop-asus-rog-flow-z13-gz301vu-mu301w-11.jpg', '0000-00-00 00:00:00'),
(70, 'Laptop Asus ROG Zephyrus G14 GA402NJ-L4056W (AMD Ryzen 7 7735HS/ 16GB Ram/ 512GB/ RTX 3050/ 14 \"FHD/', 'Asus', 'Ryzen 7', '14.0 inch', 'Intel HD Graphics', '16GB', '512GB SSD', 'Windows 11', 1.7, 'Còn hàng', 40990000, 'img/250-24986-laptop-asus-rog-zephyrus-g14-ga402nj-l4056w-8.jpg', '0000-00-00 00:00:00'),
(71, 'Laptop HP Pavilion 14 X360 (EK0013DX) 2in1 (Intel i3-1215U/ Ram 8GB/ SSD 256GB/ 14\"FHD IPS Touch/ Wi', 'HP', 'Core i3', '14.0 inch', 'Intel UHD Graphics', '8GB', '256GB SSD', 'Windows 11', 1.5, 'Còn hàng', 11900000, 'img/250-25459-hp-x360.png', '0000-00-00 00:00:00'),
(72, 'HP ENVY x360 2-in-1 15-FH0013DX (RYZEN 5 7530U/ 8GB/ 256GB/ AMD Radeon/ 15.6″ Full HD Touch) NK BH t', 'HP', 'Ryzen 5', '15.6 inch', 'AMD Radeon', '8GB', '256GB SSD', 'Windows 11', 2.0, 'Còn hàng', 14990000, 'img/250-25319-hp-envy-x360-2-in-1-15-fh0013dx.png', '0000-00-00 00:00:00'),
(73, '[Tặng Ram Laptop 8GB] Laptop HP Gaming Victus 15 FA0031DX 68U87UA (i5-12450H/ 8GB/ 512GB / GTX 1650/', 'HP', 'Core i5', '15.6 inch', 'GTX 1650', '8GB', '512GB SSD', 'Windows 11', 2.2, 'Còn hàng', 15990000, 'img/250-24731-gaming-victus.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ma_khuyen_mai`
--

CREATE TABLE `ma_khuyen_mai` (
  `id_ma_khuyen_mai` int(11) NOT NULL,
  `ten_khuyen_mai` varchar(255) NOT NULL,
  `so_tien_toi_thieu` decimal(10,0) NOT NULL,
  `ngay_bat_dau` date NOT NULL,
  `ngay_het_han` date NOT NULL,
  `so_tien_khuyen_mai` decimal(10,0) NOT NULL
) ;

--
-- Đang đổ dữ liệu cho bảng `ma_khuyen_mai`
--

INSERT INTO `ma_khuyen_mai` (`id_ma_khuyen_mai`, `ten_khuyen_mai`, `so_tien_toi_thieu`, `ngay_bat_dau`, `ngay_het_han`, `so_tien_khuyen_mai`) VALUES
(11, 'Mã khuyến mãi tựu trường', 500000, '2023-08-23', '2023-08-31', 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `promotion_code_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `message` text DEFAULT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `total_amount`, `promotion_code_id`, `user_name`, `user_address`, `payment_method`, `message`, `order_status`) VALUES
(1, 2, '2023-07-31 22:14:53', 0, 0, 'admin123', '456 Admin Avenue', 'credit_card', '', 'Shipped'),
(3, 2, '2023-07-31 17:48:10', 1, 8, 'admin123', '456 Admin Avenue', 'credit_card', '12', 'Confirmed'),
(4, 11, '2023-08-01 05:59:58', 2, 0, 'user123', 'ghenhot12@gmail.com', 'credit_card', '4', 'pending'),
(5, 11, '2023-08-01 06:03:29', 4, 0, 'user123', 'ghenhot12@gmail.com', 'credit_card', '', 'pending'),
(7, 2, '2023-08-14 09:55:27', 4, 0, 'admin123', '456 Admin Avenue', 'credit_card', '', 'pending'),
(8, 2, '2023-08-14 09:56:24', 1, 8, 'admin123', '456 Admin Avenue', 'paypal', '', 'pending'),
(9, 2, '2023-08-21 07:18:15', 19970000, 11, 'admin123', '456 Admin Avenue', 'cash_on_delivery', '', 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id_promotions` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`id_promotions`, `title`, `content`, `image_path`, `start_date`, `end_date`) VALUES
(6, 'Khuyến mãi tựu trường ', 'Chào mừng bạn đến với chương trình khuyến mãi \"Tựu Trường - Mua Laptop\"! Dưới đây là những ưu đãi hấp dẫn mà chúng tôi mang đến cho bạn khi mua laptop tại cửa hàng của chúng tôi:\r\n\r\n1. Giảm giá đặc biệt cho sinh viên và học sinh:\r\nChúng tôi hiểu rằng học tập là quan trọng, vì vậy chúng tôi cung cấp mức giảm giá đặc biệt cho sinh viên và học sinh khi mua bất kỳ laptop nào trong cửa hàng. Chỉ cần đưa thẻ học hoặc giấy tờ xác nhận tình trạng học tập để nhận ưu đãi này.\r\n\r\n2. Tặng phần quà hấp dẫn:\r\nKhi mua laptop tại cửa hàng, bạn sẽ được nhận một bộ quà tặng hấp dẫn kèm theo, bao gồm túi đựng laptop, chuột không dây, bàn di chuột và bộ vệ sinh laptop. Đây là những phụ kiện cần thiết để bạn có thể sử dụng laptop một cách tiện lợi và bảo vệ thiết bị của mình.\r\n\r\n3. Hỗ trợ trả góp linh hoạt:\r\nĐể giúp bạn tiếp cận dễ dàng với công nghệ mới, chúng tôi cung cấp chương trình trả góp linh hoạt với lãi suất ưu đãi. Bạn có thể chọn phương thức trả góp phù hợp với tình hình tài chính của mình và sở hữu ngay chiếc laptop mà bạn mong muốn.\r\n\r\n4. Bảo hành và dịch vụ sau bán hàng:\r\nChúng tôi cam kết cung cấp dịch vụ bảo hành chất lượng cao cùng với chế độ hỗ trợ sau bán hàng tận tâm. Đội ngũ kỹ thuật của chúng tôi luôn sẵn sàng giúp đỡ bạn trong quá trình sử dụng laptop, từ cài đặt phần mềm đến xử lý sự cố kỹ thuật.\r\n\r\n5. Quà tặng đặc biệt cho đơn hàng đầu tiên:\r\nĐối với những khách hàng đầu tiên tham gia chương trình, chúng tôi dành tặng một phiếu mua hàng trị giá 500.000 VND, áp dụng cho lần mua laptop tiếp theo. Đây là cơ hội để bạn tiết kiệm hơn nữa khi nâng cấp hoặc mua sắm thêm.', 'img/z4622420130170_8adc5adc1c1a04a8ee3a8b6a5590b38a.jpg', '2023-08-01', '2023-09-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `sex` enum('Male','Female') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `type` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `full_name`, `sex`, `email`, `address`, `type`) VALUES
(2, 'admin123', 'adminpassword', 'Admin Smith12', 'Male', 'admin@example.com', '456 Admin Avenue', 'admin'),
(11, 'ghenho12@gmail.com', 'userpassword', 'ggggggggggggggg', 'Male', 'ghenho1222@gmail.com2', 'ghenhot12@gmail.com', 'user'),
(14, 'ghenhot122', '123456', 'John Doe1', 'Male', 'ghenho122@gmail.com2', '295 Phạm Thế Hiển Phường 3 Quận 8', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan_laptop`
--
ALTER TABLE `binh_luan_laptop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ma_khuyen_mai`
--
ALTER TABLE `ma_khuyen_mai`
  ADD PRIMARY KEY (`id_ma_khuyen_mai`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id_promotions`);

--
-- Chỉ mục cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_laptop_id` (`laptop_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan_laptop`
--
ALTER TABLE `binh_luan_laptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `ma_khuyen_mai`
--
ALTER TABLE `ma_khuyen_mai`
  MODIFY `id_ma_khuyen_mai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id_promotions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `fk_laptop_id` FOREIGN KEY (`laptop_id`) REFERENCES `laptops` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
