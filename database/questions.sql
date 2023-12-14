-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 12:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question`, `created_at`, `updated_at`) VALUES
(1, 1, 'Câu 1. Ai là người đầu tiên phát minh ra PHP?', '2023-12-14 18:35:25', '2023-12-14 18:35:25'),
(2, 1, 'Câu 2. PHP dựa theo syntax của ngôn ngữ nào?', '2023-12-14 18:35:25', '2023-12-14 18:35:25'),
(3, 2, 'Câu 1. Câu lệnh nào output ra “$x” trên màn hình?', '2023-12-14 18:35:25', '2023-12-14 18:35:25'),
(4, 3, 'Câu 1. Ai là người đầu tiên phát minh ra Java?', '2023-12-14 18:35:25', '2023-12-14 18:35:25'),
(5, 4, 'Câu 1. Phương thức next() của lớp Scanner dùng để làm gì?', '2023-12-14 18:35:25', '2023-12-14 18:35:25'),
(6, 5, 'Câu 1. Ai là người đầu tiên phát minh ra Javascript?', '2023-12-14 18:35:25', '2023-12-14 18:35:25'),
(7, 6, 'Câu 1. Trong Javascript sự kiện Onclick xảy ra khi nào?', '2023-12-14 18:35:25', '2023-12-14 18:35:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
