-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 10:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakerysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `bakery_admin`
--

CREATE TABLE `bakery_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bakery_admin`
--

INSERT INTO `bakery_admin` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'fb94871a1c3c7c38330a3a434a0ee28f0deea30b');

-- --------------------------------------------------------

--
-- Table structure for table `bakery_category`
--

CREATE TABLE `bakery_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bakery_category`
--

INSERT INTO `bakery_category` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'Cakes', '240504070812.jpg'),
(2, 'Pastries', '240506091316.png'),
(3, 'Cookies', '240506091356.jpg'),
(4, 'Classic', '240506091414.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bakery_customer`
--

CREATE TABLE `bakery_customer` (
  `users_id` int(11) NOT NULL,
  `users_username` varchar(100) NOT NULL,
  `users_email` varchar(150) NOT NULL,
  `users_password` varchar(100) NOT NULL,
  `users_mobile` varchar(50) NOT NULL,
  `users_address` varchar(200) NOT NULL,
  `users_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bakery_customer`
--

INSERT INTO `bakery_customer` (`users_id`, `users_username`, `users_email`, `users_password`, `users_mobile`, `users_address`, `users_status`) VALUES
(1, 'stha', 'stha@gmail.com', 'd2e6792f5bcfa2025f7ef9796d1763ac52172535', '9812345678', 'Nayabazar, Kathmandu', 1),
(2, 'ss', 'ss@gmail.com', '66aa9324f126bbed0e7792e47c07a2576d406fa5', '9840404040', 'Balaju, Kathmandu', 0),
(3, 'suman', 'suman@gmail.com', '9ff305035fd232545a24a73f479d6030285d34ef', '9898123456', 'Nayabazar, Kathmandu', 0),
(4, 'ram', 'ram@gmail.com', '9da817d0dc5f0e8a50ca59d988a06e15df4d70f8', '9812312312', 'Thamel. Ktm', 0),
(7, 'sam', 'sam@gmail.com', 'f16bed56189e249fe4ca8ed10a1ecae60e8ceac0', '6532323232', 'Nayabazar, Ktm', 0),
(9, 'Sadikshya', 'sadikshya@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '9874568798', 'Balaju, KTM', 0),
(11, 'Gopal', 'gopal@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '1234568798', 'Nayabazar, Ktm', 0),
(12, 'Gyanu', 'gyanu@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '9865454212', 'Nayabazar, Ktm', 0),
(13, 'Sabrina', 'sabrina@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '7895343232', 'Nayabazar, Ktm', 1),
(14, 'Salina', 'salina@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '9876565431', 'Nayabazar, Ktm', 1),
(15, 'Sudin', 'sudin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '9865432132', 'Ravibhawan, KTM', 1),
(16, 'Sulav', 'sulav@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '9834564987', 'Ravibhawan, KTM', 1),
(17, 'user1', 'U1@gmail.com', '3b47201fedd74bd7cb390c9a784dcc9be2fd162f', '9884654213', 'Chamati, KTM', 0),
(18, 'user2', 'u2@gmail.com', '907457572ac390534997fd170a2d78e27770095f', '9875456513', 'Banasthali, KTM', 1),
(19, 'user3', 'u3@gmail.com', 'e58f2ec5fedd02879bf8119fe9ec2614d81a9425', '9878461321', 'Balaju, KTM', 1),
(20, 'user4', 'u4@gmail.com', '4b9df4e80d364591524745f516b66dfacbb41f33', '9875132246', 'Chamati, KTM', 1),
(21, 'user5', 'u5@gmail.com', '0d4bc56172067ce58d22f8c5a22646edf2d104b0', '9832165465', 'Shanti Tole, KTM', 0),
(22, 'user6', 'u6@gmail.com', '96a1b537e618544de202eb1c949a585179d42f9d', '9865421321', 'Nayabazar, Kathmandu', 1),
(24, 'user7', 'u7@gmail.com', 'f61ad6edcb49101daf2f84c44843b5ad7c220705', '9765656565', 'Khusibun, KTM', 1),
(26, 'test1', 'test@gmail.com', '3c68ac635ab35b75eb7bfbf71ba90860d34061ea', '9876543211', 'Nayabazar, KTM', 0),
(27, 'test2', 't2@gmail.com', 'bb938461cde9b314f347ef286604713a8dc2baf0', '9845456431', 'Bansthali-26, KTM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bakery_notification`
--

CREATE TABLE `bakery_notification` (
  `msg_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bakery_notification`
--

INSERT INTO `bakery_notification` (`msg_id`, `users_id`, `message`, `is_read`, `created_at`) VALUES
(1, 17, ' Customer with user id \'17\' requested to be registered', 1, '2024-06-02 20:47:06'),
(2, 18, ' Customer with user id \'18\' requested to be registered', 1, '2024-06-03 06:31:26'),
(3, 19, ' Customer with user id \'19\' requested to be registered', 1, '2024-06-03 06:34:03'),
(4, 20, ' Customer with user id \'20\' requested to be registered', 1, '2024-06-03 06:35:41'),
(5, 21, ' A new customer \'user5\' requested to be registered.', 0, '2024-06-03 08:12:32'),
(6, 20, ' Customer with user id \'20\' requested to be registered', 1, '2024-06-03 06:35:41'),
(7, 22, ' A new customer \'user6\' requested to be registered.', 0, '2024-06-03 10:44:16'),
(8, 23, ' A new customer \'manoj\' requested to be registered.', 1, '2024-06-03 10:59:03'),
(9, 24, ' A new customer \'user7\' requested to be registered.', 0, '2024-06-07 09:45:39'),
(10, 25, ' A new customer \'testuser\' requested to be registered.', 1, '2024-06-12 14:16:26'),
(11, 26, ' A new customer \'test1\' requested to be registered.', 0, '2024-06-12 14:31:48'),
(12, 27, ' A new customer \'test2\' requested to be registered.', 0, '2024-06-16 20:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `bakery_orders`
--

CREATE TABLE `bakery_orders` (
  `orders_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `delivery_date` varchar(100) NOT NULL,
  `delivery_address` varchar(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `total_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bakery_orders`
--

INSERT INTO `bakery_orders` (`orders_id`, `users_id`, `delivery_date`, `delivery_address`, `payment_method`, `delivery_status`, `total_amount`) VALUES
(1, 2, '2020-08-09', '', 'Cash', 0, '1000'),
(2, 1, '2024-04-28', '', 'Cash', 0, '1000'),
(3, 1, '2024-04-29', '', 'Cash', 0, '50'),
(4, 1, '2024-04-30', '', 'Card', 0, '100'),
(5, 1, '2024-05-02', '', 'Cash', 0, '50'),
(6, 1, '2024-05-07', '', 'Cash', 0, '200'),
(7, 1, '2024-05-07', '', 'Cash', 0, '50'),
(8, 1, '2024-05-08', '', 'Cash', 0, '25'),
(9, 1, '2024-05-15', '', 'Cash On Delivery', 0, '650'),
(10, 1, '2024-05-22', '', 'Cash On Delivery', 0, '140'),
(11, 1, '2024-05-21', '', 'Cash On Delivery', 0, '30'),
(12, 1, '2024-05-13', '', 'Cash On Delivery', 0, '50'),
(13, 1, '2024-05-08', '', 'Cash On Delivery', 0, '30'),
(14, 1, '2024-05-14', '', 'Cash On Delivery', 0, '20'),
(15, 1, '2024-05-15', '', 'Cash On Delivery', 0, '100'),
(16, 1, '2024-05-15', '', 'Cash On Delivery', 0, '100'),
(17, 1, '2024-05-15', '', 'Cash On Delivery', 0, '10'),
(18, 1, '2024-05-08', '', 'Cash On Delivery', 0, '10'),
(19, 1, '2024-05-15', '', 'Cash On Delivery', 0, '700'),
(20, 1, '2024-05-09', '', '', 0, '50'),
(21, 1, '2024-05-09', '', '', 0, '650'),
(22, 1, '2024-05-08', '', '', 0, '10'),
(23, 1, '2024-05-15', '', 'Cash On Delivery', 0, '10'),
(24, 1, '2024-05-09', '', 'Esewa', 0, '100'),
(25, 1, '2024-05-09', '', 'Cash On Delivery', 0, '155'),
(26, 1, '2024-05-13', '', 'Online Payment', 0, '50'),
(27, 1, '2024-05-13', '', 'Online Payment', 0, '50'),
(28, 0, '', '', '', 0, ''),
(29, 1, '2024-05-16', '', '', 0, '20'),
(30, 1, '2024-05-12', '', 'OnlinePayment', 0, '30'),
(31, 1, '2024-05-11', '', 'OnlinePayment', 0, '760'),
(32, 1, '2024-05-14', '', 'OnlinePayment', 0, '75'),
(33, 1, '2024-05-11', '', 'OnlinePayment', 0, '120'),
(34, 1, '2024-05-11', '', 'OnlinePayment', 0, '20'),
(35, 1, '2024-05-13', '', 'Cash On Delivery', 0, '750'),
(36, 1, '2024-05-13', '', 'COD', 0, '750'),
(37, 1, '2024-05-12', '', 'OnlinePayment', 0, '50'),
(38, 1, '2024-05-11', '', 'online', 0, '10'),
(39, 1, '2024-05-11', '', 'cod', 0, '80'),
(40, 1, '2024-05-13', '', 'online', 0, '20'),
(41, 1, '2024-05-20', '', 'cod', 0, '750'),
(42, 1, '2024-05-13', '', 'cod', 0, '20'),
(43, 1, '2024-05-12', '', 'online', 0, '20'),
(44, 1, '2024-05-13', '', 'cod', 0, '10'),
(45, 1, '2024-05-11', '', 'online', 0, '40'),
(46, 1, '2024-05-13', '', 'cod', 0, '725'),
(47, 1, '2024-05-13', '', 'online', 0, '280'),
(48, 1, '2024-05-12', '', 'online', 0, '20'),
(49, 1, '2024-05-13', '', 'online', 0, '110'),
(50, 1, '2024-05-12', '', 'online', 0, '50'),
(51, 1, '2024-05-13', '', 'online', 0, '20'),
(52, 1, '2024-05-13', '', 'online', 0, '50'),
(53, 1, '2024-05-13', '', 'online', 0, '100'),
(54, 1, '2024-05-16', '', 'online', 0, '20'),
(55, 1, '2024-05-12', '', 'cod', 0, '750'),
(56, 1, '2024-05-22', '', 'online', 0, '40'),
(57, 1, '2024-05-16', '', 'cod', 0, '100'),
(58, 1, '2024-05-23', '', 'Cash On Delivery', 0, '200'),
(60, 1, '2024-06-04', 'Nayabazar, Ktm', 'cod', 0, '775'),
(61, 1, '2024-06-05', 'Nayabazar, Kathmandu', 'cod', 0, '1180'),
(62, 1, '2024-06-10', '', 'Cash On Delivery', 1, '750'),
(63, 23, '2024-06-07', '', 'Cash On Delivery', 1, '10'),
(64, 24, '2024-06-09', '', 'Cash On Delivery', 0, '200'),
(65, 24, '2024-06-09', '', 'Cash On Delivery', 1, '60'),
(66, 1, '2024-06-14', 'Chamati-15, KTM', 'Cash on Delivery', 1, '2650'),
(67, 1, '2024-06-15', '', 'Online Card', 1, '360'),
(68, 1, '2024-06-14', 'Samakhusi-27, KTM', 'Khalti', 0, '780'),
(69, 1, '2024-06-16', 'Thamel-23, KTM', 'Khalti', 1, '70'),
(70, 18, '2024-06-16', 'Nayabazar-16, KTM', 'Cash on Delivery', 1, '160'),
(71, 18, '2024-06-16', 'Banasthali-23, KTM', 'Khalti', 0, '240'),
(73, 18, '2024-06-17', 'Sitapaila-27, KTM', 'Cash On Delivery', 0, '20'),
(74, 18, '2024-06-17', 'Tarkeshwor-9, KTM', 'Online Card', 0, '100'),
(75, 18, '2024-06-16', 'Nayabazar-16, KTM', 'Online Card', 0, '10'),
(76, 18, '2024-06-16', 'Budhanilkantha-11, KTM', 'Khalti', 1, '80'),
(77, 18, '2024-06-17', 'Kathmandu-16, Ktm', 'Khalti', 1, '30'),
(78, 18, '2024-06-17', 'Nayabazar-16, KTM', 'Online Card', 0, '50'),
(79, 18, '2024-06-16', 'Nayabazar-16, KTM', 'Online Card', 1, '750'),
(80, 18, '2024-06-17', 'Chamati-15, KTM', 'Online Card', 1, '50'),
(81, 18, '2024-06-17', 'Chamati-15, KTM', 'Online Card', 0, '20'),
(82, 18, '2024-06-17', 'Nayabazar-16, KTM', 'Cash on Delivery', 0, '20'),
(83, 18, '2024-06-17', 'Balaju-20, KTM', 'Online Card', 1, '40'),
(84, 18, '2024-06-18', 'Nayabazar-16, KTM', 'Online Card', 0, '100'),
(85, 18, '2024-06-17', 'Nayabazar-16, KTM', 'Cash on Delivery', 1, '800'),
(86, 18, '2024-06-17', 'Nayabazar-16, KTM', 'Cash on Delivery', 0, '20'),
(87, 18, '2024-06-17', 'Nayabazar-16, KTM', 'Cash on Delivery', 0, '10'),
(88, 18, '2024-06-16', 'Banasthali-26, KTM', 'Online Card', 1, '40'),
(89, 18, '2024-06-17', 'Nayabazar-16, KTM', 'Cash on Delivery', 0, '750'),
(90, 18, '2024-06-16', 'Tarkeshwor-9, KTM', 'Cash on Delivery', 1, '50'),
(91, 18, '2024-06-18', 'Tarkeshwor-9, KTM', 'Khalti', 1, '700'),
(92, 18, '2024-06-21', 'Banasthali-23, KTM', 'Khalti', 0, '700'),
(93, 18, '2024-06-19', 'Nayabazar-16, KTM', 'Online Card', 0, '50'),
(94, 18, '2024-06-18', 'Nayabazar-16, KTM', 'Khalti', 1, '500');

-- --------------------------------------------------------

--
-- Table structure for table `bakery_orders_detail`
--

CREATE TABLE `bakery_orders_detail` (
  `orders_detail_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `ordered_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bakery_orders_detail`
--

INSERT INTO `bakery_orders_detail` (`orders_detail_id`, `orders_id`, `product_name`, `ordered_quantity`) VALUES
(1, 1, 'Red velvet', 1),
(2, 1, 'Oreo', 1),
(3, 2, 'Black choco', 2),
(4, 3, 'Choco chips', 1),
(5, 4, 'Strawberry', 1),
(6, 5, 'Chocolate', 1),
(7, 5, 'Vanilla', 1),
(8, 6, 'Strawberry', 1),
(9, 6, 'Butterscotch', 1),
(10, 7, 'Choco chips', 1),
(11, 8, 'Chocolate', 1),
(12, 9, 'Strawberry', 1),
(13, 10, 'Peanut Cookies', 1),
(14, 10, 'Choco Chip Cookies', 1),
(15, 10, 'Brownies', 1),
(16, 11, 'Danish Cookies', 1),
(17, 11, 'Peanut Cookies', 1),
(18, 12, 'Croissant', 1),
(19, 13, 'Cupcake', 1),
(20, 14, 'Peanut Cookies', 1),
(21, 15, 'Strawberry', 1),
(22, 16, 'Strawberry', 1),
(23, 17, 'Danish Cookies', 1),
(24, 18, 'Danish Cookies', 1),
(25, 19, 'Chocolate', 1),
(26, 20, 'Danish Cookies', 1),
(27, 20, 'Peanut Cookies', 1),
(28, 20, 'Choco Chip Cookies', 1),
(29, 21, 'Strawberry', 1),
(30, 22, 'Danish Cookies', 1),
(31, 23, 'Danish Cookies', 1),
(32, 24, 'Strawberry', 1),
(33, 25, 'Donuts', 1),
(34, 25, 'Puff', 1),
(35, 25, 'Pauroti', 1),
(36, 26, 'Danish Cookies', 1),
(37, 26, 'Peanut Cookies', 1),
(38, 26, 'Choco Chip Cookies', 1),
(39, 27, 'Donuts', 1),
(40, 29, 'Peanut Cookies', 1),
(41, 30, 'Cupcake(choco)', 1),
(42, 31, 'Danish Cookies', 1),
(43, 31, 'Butterscotch', 1),
(44, 32, 'Croissant', 1),
(45, 32, 'Puff', 1),
(46, 33, 'Choco Chip Cookies', 1),
(47, 33, 'Strawberry', 1),
(48, 34, 'Choco Chip Cookies', 1),
(49, 35, 'Black Forest', 1),
(50, 36, 'Brownies', 1),
(51, 36, 'Strawberry', 1),
(52, 37, 'Donuts', 1),
(53, 38, 'Danish Cookies', 1),
(54, 39, 'Pauroti', 1),
(55, 40, 'Peanut Cookies', 1),
(56, 41, 'Butterscotch', 1),
(57, 42, 'Choco Chip Cookies', 1),
(58, 43, 'Peanut Cookies', 1),
(59, 44, 'Danish Cookies', 1),
(60, 45, 'Buns', 1),
(61, 46, 'Chocolate', 1),
(62, 46, 'Puff', 1),
(63, 47, 'Buns', 1),
(64, 47, 'Pauroti', 3),
(65, 48, 'Peanut Cookies', 1),
(66, 49, 'Butterscotch', 1),
(67, 49, 'Danish Cookies', 1),
(68, 50, 'Donuts', 1),
(69, 51, 'Peanut Cookies', 1),
(70, 52, 'Donuts', 1),
(71, 53, 'Strawberry', 1),
(72, 54, 'Peanut Cookies', 1),
(73, 55, 'Butterscotch', 1),
(74, 56, 'Peanut Cookies', 1),
(75, 56, 'Choco Chip Cookies', 1),
(76, 57, 'Strawberry', 1),
(77, 58, 'Brownies', 2),
(78, 59, 'Strawberry', 1),
(79, 60, 'Pauroti', 5),
(80, 60, 'Puff', 5),
(81, 60, 'Donuts', 5),
(82, 61, 'Black Forest', 1),
(83, 61, 'Cupcake(choco)', 1),
(84, 61, 'Pauroti', 5),
(85, 62, 'Cupcake', 1),
(86, 62, 'Chocolate', 1),
(87, 62, 'Peanut Cookies', 1),
(88, 63, 'Donuts', 1),
(89, 64, 'Brownies', 2),
(90, 65, 'Buns', 1),
(91, 65, 'Donuts', 2),
(92, 66, 'Chocolate', 1),
(93, 66, 'Strawberry', 3),
(94, 67, 'Pauroti', 2),
(95, 67, 'Cake Pop', 4),
(96, 68, 'Butterscotch', 2),
(97, 68, 'Cupcake', 1),
(98, 69, 'Danish Cookies', 1),
(99, 69, 'Croissant', 1),
(100, 70, 'Fruit Cake', 2),
(101, 71, 'Fruit Cake', 3),
(102, 72, 'Choco Chip Cookies', 1),
(103, 72, 'Fruit Cake', 1),
(104, 73, 'Choco Chip Cookies', 1),
(105, 74, 'Strawberry', 1),
(106, 75, 'Donuts', 1),
(107, 76, 'Fruit Cake', 1),
(108, 77, 'Cupcake', 1),
(109, 78, 'Croissant', 1),
(110, 79, 'Black Forest', 1),
(111, 80, 'Croissant', 1),
(112, 81, 'Peanut Cookies', 1),
(113, 82, 'Danish Cookies', 1),
(114, 83, 'Peanut Cookies', 2),
(115, 84, 'Choco Chip Cookies', 1),
(116, 84, 'Fruit Cake', 1),
(117, 85, 'Chocolate', 1),
(118, 85, 'Brownies', 1),
(119, 86, 'Danish Cookies', 1),
(120, 87, 'Donuts', 1),
(121, 88, 'Buns', 1),
(122, 89, 'Black Forest', 1),
(123, 90, 'Cake Pop', 1),
(124, 91, 'Chocolate', 1),
(125, 92, 'Black Choco', 1),
(126, 93, 'Cake Pop', 1),
(127, 94, 'Brownies', 4),
(128, 94, 'Denise Chocolate Roll', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bakery_product`
--

CREATE TABLE `bakery_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `product_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bakery_product`
--

INSERT INTO `bakery_product` (`product_id`, `product_name`, `product_category`, `product_price`, `product_quantity`, `product_description`, `product_image`) VALUES
(1, 'Butterscotch', 1, '750', 30, 'Butterscotch cake is a delectable dessert that combines the rich, buttery flavor of butterscotch with soft, moist cake layers.', '2405060930030.jpg'),
(2, 'Strawberry', 1, '650', 28, 'Strawberry cake is a delightful dessert featuring a soft, moist sponge infused with the sweet and fruity flavor of strawberries.', '2405060928200.jpg'),
(3, 'Black Forest', 1, '750', 25, 'Black Forest cake is a classic German dessert known for its rich, indulgent layers of chocolate sponge cake, cherries, and whipped cream.', '2405060928540.jpg'),
(4, 'Black Choco', 1, '700', 28, 'Black chocolate cake is a rich and decadent dessert featuring layers of moist, dark chocolate sponge cake.', '2405060931060.jpg'),
(5, 'Chocolate', 1, '700', 26, 'Chocolate cake is a beloved dessert made with moist, tender layers of chocolate-flavored sponge.', '2405060932070.jpg'),
(6, 'Cupcake', 1, '30', 18, 'Cupcakes are small, individual cakes baked in paper liners, offering a delightful and customizable treat.', '2405060935230.png'),
(7, 'Brownies', 2, '100', 19, 'Brownies are a rich, chewy dessert known for their deep chocolate flavor and dense, fudgy texture.', '2405061035110.png'),
(8, 'Strawberry', 2, '100', 18, 'Strawberry pastry is a delightful treat that features layers of flaky, buttery puff pastry paired with a sweet and tangy strawberry filling.', '2405060946290.png'),
(9, 'Butterscotch', 2, '100', 16, 'Butterscotch pastry is a delectable treat featuring layers of flaky, buttery pastry filled with rich butterscotch-flavored cream or custard.', '2405061007570.png'),
(10, 'Croissant', 2, '50', 17, 'A croissant is a buttery, flaky pastry known for its distinctive crescent shape and golden, crispy layers.', '2405061009580.jpg'),
(11, 'Denise Chocolate Roll', 2, '50', 21, 'Denise chocolate roll is a sumptuous pastry featuring a soft, chocolate-flavored sponge cake rolled around a rich and creamy chocolate filling.', '2405061012050.png'),
(12, 'Cake Pop', 2, '50', 24, 'Cake pops are bite-sized treats made from crumbled cake mixed with frosting, shaped into balls, and coated in a colorful candy or chocolate shell.', '2405061042050.jpg'),
(13, 'Danish Cookies', 3, '20', 18, 'per piece, Danish cookies are buttery, crumbly treats that come in various shapes and flavors, offering a delightful, melt-in-your-mouth experience with every bite.', '2405061016210.jpg'),
(14, 'Peanut Cookies', 3, '20', 21, 'per piece, Peanut cookies are rich, nutty treats with a crisp exterior and a soft, chewy center, delivering the perfect combination of peanut flavor and sweetness.', '2405061019210.jpg'),
(15, 'Choco Chip Cookies', 3, '20', 21, 'Choco chip cookies are a classic favorite, featuring soft, buttery dough generously studded with chocolate chips, providing a delightful blend of chewy texture and rich, melty chocolate.', '2405061050560.jpg'),
(16, 'Cupcake(choco)', 1, '30', 13, 'Chocolate icing cupcake features a moist, fluffy cake topped with a creamy, decadent chocolate frosting, offering a rich and indulgent treat for any occasion.', '2405060114340.png'),
(17, 'Buns', 4, '40', 18, 'Buns are soft, fluffy rolls with a tender texture and a hint of sweetness, perfect for sandwiches or enjoyed warm on their own.', '2405060133300.jpg'),
(18, 'Donuts', 4, '10', 22, 'Donuts are delicious, deep-fried bread that come in a variety of flavors and styles, often topped with glazes, indulgent treat.', '2405060121270.jpg'),
(19, 'Puff', 4, '25', 14, 'Puff is a light, flaky dough that rises into golden, airy layers when baked, creating a delicate and buttery texture perfect for sweet and savory fillings.', '2405060247420.jpg'),
(20, 'Fruit Cake', 1, '80', 32, 'A rich, dense cake brimming with dried fruits, nuts, and spices, often enhanced with a touch of brandy or rum. Perfect for festive celebrations, its sweet, complex flavors get better with time. Enjoy in thin slices for a delightful treat.', '2405060246210.png'),
(22, 'Muffin', 4, '30', 0, 'Delicious Muffin', '2406160838460.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bakery_admin`
--
ALTER TABLE `bakery_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bakery_category`
--
ALTER TABLE `bakery_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `bakery_customer`
--
ALTER TABLE `bakery_customer`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `bakery_notification`
--
ALTER TABLE `bakery_notification`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `bakery_orders`
--
ALTER TABLE `bakery_orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `bakery_orders_detail`
--
ALTER TABLE `bakery_orders_detail`
  ADD PRIMARY KEY (`orders_detail_id`);

--
-- Indexes for table `bakery_product`
--
ALTER TABLE `bakery_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bakery_admin`
--
ALTER TABLE `bakery_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bakery_category`
--
ALTER TABLE `bakery_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bakery_customer`
--
ALTER TABLE `bakery_customer`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `bakery_notification`
--
ALTER TABLE `bakery_notification`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bakery_orders`
--
ALTER TABLE `bakery_orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `bakery_orders_detail`
--
ALTER TABLE `bakery_orders_detail`
  MODIFY `orders_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `bakery_product`
--
ALTER TABLE `bakery_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
