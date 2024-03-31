-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2024 at 03:01 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1=Active,2=Deactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `photo`, `description`, `status`, `created_at`) VALUES
(1, 'List Of Bd News agency', '64b9eac4b2902.jpeg', 'List Of Bd News agency, National', 1, '2023-07-19 15:08:16'),
(2, 'bangladesh', '64b8967ad9413.jpg', 'Bangladesh is a land of rivers', 1, '2023-07-20 02:05:46'),
(4, 'Country', '64b8bcd5253cd.jpg', 'sulgwgf', 2, '2023-07-20 04:49:25'),
(5, 'The upward movement', '64b8ceae240f8.jpg', 'An upward movement along the same', 1, '2023-07-20 06:05:34'),
(6, 'erwt', '64bbf062ac97f.png', 'jhgmn', 2, '2023-07-22 15:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(181) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1=active,2=deactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `password`, `status`, `created_at`, `photo`) VALUES
(1, 'Charlotte Church', 'calodyhac@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 1, '2023-07-12 06:03:22', '64af60e227a97.jpg'),
(4, 'Octavius Nash', 'hohy@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 2, '2023-07-12 06:05:08', '64ae429438993.png'),
(8, 'Eric Kirbye2', 'nomotat@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 1, '2023-07-14 14:55:15', '64b161d330f6f.jpg'),
(9, 'Dacey Mccall', 'jikezonal@mailinator.com', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 1, '2023-07-14 14:55:27', '64b161df3390d.jpg'),
(10, 'marufa', 'marufajaman78@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '2023-07-15 03:04:25', '64b36843cf42f.jpg'),
(11, 'farnaz', 'farnaz@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '2023-07-16 03:03:34', '64b35e06a1b82.png'),
(12, 'Ray', 'ray@ray.com', '26b619b458c748d992b301d1e124f744', 1, '2023-07-17 04:06:07', '64b4be2f7057f.jpg'),
(13, 'abc', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2023-07-19 16:17:07', '64b80c8316a2a.jpg'),
(14, 'sokal', 'sokal@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2023-07-22 14:20:12', '64bbe59c855b9.png'),
(15, 'sokal', 'sokal@gmail.com', '202cb962ac59075b964b07152d234b70', 1, '2023-07-22 14:22:12', '64bbe61406e5a.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
