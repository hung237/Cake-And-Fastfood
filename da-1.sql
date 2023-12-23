-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Dec 23, 2023 at 10:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(11) DEFAULT 1,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `date`, `total`, `email`, `phone`, `address`, `name`, `status`, `user_id`) VALUES
(7, '2023-04-15', 317, 'thanhtra16012003@gmail.com', '0123456789', '270 Nguyễn Văn Quá, Q.12, TP.HCM', 'Trà Dâu', 2, 10),
(8, '2023-04-15', 452, 'thanhtra16012003@gmail.com', '0123456789', 'Công viên phần mềm Quang Trung, Q.12, TP.HCM', 'Trà Dâu', 5, 10),
(9, '2023-04-17', 227, 'hungdt2307@gmail.com', '0123456789', 'Công viên phần mềm Quang Trung, Q.12, TP.HCM', 'Bùi Phi Hùng', 1, 2),
(10, '2023-04-17', 152, 'hungdt2307@gmail.com', '0123456789', '270 Tô Ký, Q.12, TP.HCM', 'Bùi Phi Hùng', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bill`
--

CREATE TABLE `detail_bill` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_bill`
--

INSERT INTO `detail_bill` (`id`, `product_id`, `quantity`, `bill_id`, `price`) VALUES
(1, 3, 2, 7, 130),
(2, 4, 3, 7, 150),
(3, 9, 1, 7, 35),
(4, 3, 2, 8, 130),
(5, 4, 3, 8, 150),
(6, 9, 2, 8, 70),
(7, 7, 1, 8, 50),
(8, 5, 1, 8, 50),
(9, 4, 1, 9, 50),
(10, 3, 1, 9, 65),
(11, 10, 1, 9, 60),
(12, 8, 1, 9, 50),
(13, 5, 2, 10, 100),
(14, 4, 1, 10, 50);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(4) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `des` varchar(255) NOT NULL,
  `kind` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `des`, `kind`, `image`) VALUES
(2, 'Cupcake Coffee', 65, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '2.png'),
(3, 'Cupcake Chocolate', 65, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '3.png'),
(4, 'Stawberry Cupcake', 50, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '4.png'),
(5, 'Tiramisu', 50, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '5.png'),
(7, 'Fruit Cake', 50, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '7.png'),
(8, 'Tarts Eggs', 50, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '8.png'),
(9, 'Strawberry Donut', 35, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '9.png'),
(10, 'Blurberry Donut', 60, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '10.png'),
(22, 'Rainbow Cupcake', 61, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '1.png'),
(24, 'Bingsu Cake', 39, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '6.png'),
(25, 'Strawberry Donut ', 59, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '11.png'),
(26, 'Pink Donut', 45, 'A small round cake baked in a paper mold, which may have a variety of icing on top and a filling inside.', 'Cake', '12.png'),
(27, 'Strawberry Cream', 15, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '1.png'),
(28, 'Mango Cream', 10, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '2.png'),
(29, 'Lemon Cream', 12, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '3.png'),
(30, 'Chocolate Cream', 13, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '4.png'),
(31, 'Melon Cream', 14, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '5.png'),
(32, 'Cookie Cream', 13, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '6.png'),
(33, 'Coconut Cream', 17, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '7.png'),
(34, 'Vanilla Cream', 18, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '8.png'),
(35, 'Peanut Cream', 17, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '9.png'),
(36, 'Orange Cream', 19, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '10.png'),
(37, 'Coffee Cream', 21, 'Ice cream is a type of frozen ice cream made with milk, sugar and other ingredients such as eggs, whipped cream, vanilla, fruit or chocolate.', 'Cream', '11.png'),
(38, 'Traditional Hamburger', 35, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '1.png'),
(39, 'Vegetable Hamburger', 30, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '2.png'),
(40, 'Meats Hamburger', 40, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '3.png'),
(41, 'Hot Dog ', 29, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '4.png'),
(42, 'Hot Dog Vegetable', 29, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '5.png'),
(43, 'Sandwich', 35, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '6.png'),
(44, 'Croissants', 25, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '7.png'),
(45, 'Sesame Cake', 15, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '8.png'),
(46, 'Black Bread', 45, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '9.png'),
(47, 'Garlic Bread', 19, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '10.png'),
(48, 'Cheesecake', 30, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '11.png'),
(49, 'Potato Chips', 15, 'Savory cakes are a type of baked good that are typically not sweet, unlike traditional cakes. ', 'Cracker', '12.png'),
(50, 'Milk Coffee', 12, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '1.png'),
(51, 'Capuchino', 21, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '2.png'),
(52, 'Coffee', 10, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '3.png'),
(53, 'Latte', 25, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '4.png'),
(54, 'Tea', 10, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '5.png'),
(55, 'Cocacola', 15, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '6.png'),
(56, 'Iced Coffee Grinder', 30, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '7.png'),
(57, 'Iced Strawberry Grinder', 40, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '8.png'),
(58, 'Iced Lemon', 35, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '9.png'),
(59, 'Fresh Milk', 40, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '10.png'),
(60, 'Iced Orange', 35, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '11.png'),
(61, 'Iced Milk Grinder', 42, 'A beverage is any type of drink that is consumed for refreshment or hydration. Beverages can come in a wide variety of types and flavors, ', 'Drink', '12.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `pass`, `phone_number`, `name`, `role`, `avatar`) VALUES
(1, 'admin@gmail.com', 'admin', '0123456789', 'admin', 0, NULL),
(2, 'user1@gmail.com', '1234', '0123456789', 'Hùng', 1, '643cc554ec627.jpg'),
(10, 'user11@gmail.com', '123456', '0123456789', 'hung', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `detail_bill`
--
ALTER TABLE `detail_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_bill`
--
ALTER TABLE `detail_bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
