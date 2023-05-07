-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 04:50 PM
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
-- Database: `myworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `users_id` int(255) NOT NULL,
  `date_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `users_id`, `date_at`) VALUES
(50, 26, 77, '2023-02-26 19:51:40'),
(51, 23, 77, '2023-02-26 19:51:43'),
(52, 22, 77, '2023-02-26 19:51:46'),
(53, 18, 77, '2023-02-26 19:51:49'),
(54, 14, 77, '2023-02-26 19:51:52'),
(55, 13, 77, '2023-02-26 19:51:55'),
(56, 12, 77, '2023-02-26 19:51:58'),
(79, 26, 78, '2023-03-27 21:35:54'),
(81, 23, 78, '2023-03-27 21:36:06'),
(82, 22, 78, '2023-03-27 21:36:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `password`, `date_at`) VALUES
(69, 'roshan', 'roshan@mail.com', 'female', '123456', '2023-02-18 18:17:27.782564'),
(76, 'sanju', 'sanju@mail.com', 'male', '4321', '2023-02-18 19:51:20.172501'),
(77, 'rakesh', 'rakesh@mail.com', 'male', '12345', '2023-02-19 09:05:56.150184'),
(78, 'rajan', 'rajan@mail.com', 'male', '12345', '2023-02-21 22:22:28.607605'),
(79, 'sunil', 'sunil@mail.com', 'male', '12345', '2023-02-22 13:55:58.850598'),
(80, 'ramesh', 'ramesh@mail.com', 'female', '12345', '2023-02-22 14:12:50.649169'),
(81, 'rajiv', 'rajiv@mail.com', 'female', '12345', '2023-02-22 14:24:44.173631'),
(82, 'rakeshk', 'rakesh@mail.com', 'male', '54321', '2023-02-23 20:41:38.590469');

-- --------------------------------------------------------

--
-- Table structure for table `users_comment`
--

CREATE TABLE `users_comment` (
  `id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  `date_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_comment`
--

INSERT INTO `users_comment` (`id`, `post_id`, `user_id`, `comment`, `date_at`) VALUES
(3, 12, 76, 'woow good raptile', '2023-02-20 22:34:52'),
(14, 13, 77, 'what is this', '2023-02-21 12:18:42'),
(17, 18, 69, 'what a cute cat', '2023-02-21 21:39:25'),
(18, 22, 77, 'is this raptile ?', '2023-02-23 13:05:25'),
(19, 13, 77, 'woow good rabbit', '2023-02-23 16:24:46'),
(24, 13, 69, 'rabbit', '2023-02-23 23:19:23'),
(25, 13, 69, 'rabbits', '2023-02-23 23:22:08'),
(26, 12, 77, 'is this raptile ?', '2023-02-24 10:08:30'),
(27, 12, 77, 'is this raptile ?', '2023-02-24 10:10:21'),
(28, 22, 77, 'what is this', '2023-02-24 10:54:30'),
(29, 22, 77, 'woow good raptile', '2023-02-24 10:56:55'),
(30, 23, 77, 'what is this', '2023-02-24 22:03:51'),
(31, 23, 78, 'this', '2023-02-25 14:33:29'),
(32, 23, 78, 'is this raptile ?', '2023-02-25 21:40:48'),
(33, 27, 78, 'what a cut', '2023-02-26 17:04:44'),
(34, 29, 77, 'hjjkgjkfjhf', '2023-02-26 17:41:35'),
(35, 29, 77, 'lkhkhjkjgj', '2023-02-26 17:44:44'),
(36, 12, 78, 'what is this', '2023-04-16 15:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_pic` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `date_at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`id`, `user_id`, `user_pic`, `discription`, `date_at`) VALUES
(12, 69, 'reptile-gbe764ba03_1920.jpg', 'reptile', '2023-02-20 13:58:40.003120'),
(13, 77, 'rabbit-g0c250c232_1920.jpg', 'cute rabbit', '2023-02-20 14:08:04.461852'),
(14, 76, 'fox-g428f5af0b_1920.jpg', 'wild fox', '2023-02-20 15:34:21.183308'),
(18, 76, 'cat-g8b490da6c_1920.jpg', 'cat', '2023-02-21 16:53:45.111617'),
(22, 77, 'iguana-gc69bfcfd2_1920.jpg', 'iguana', '2023-02-23 09:40:43.223611'),
(23, 77, 'frog-g8ceede116_1920.jpg', 'frog', '2023-02-24 21:53:04.353559'),
(26, 77, 'lion-gd137c0313_1920.jpg', 'lion', '2023-02-25 22:48:16.385739');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_comment`
--
ALTER TABLE `users_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users_comment`
--
ALTER TABLE `users_comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
