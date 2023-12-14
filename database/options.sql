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
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option` text NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option`, `is_correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'A. Phí Văn Đức', 0, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(2, 1, 'B. Rasmus Lerdorf', 1, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(3, 2, 'A. C', 1, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(4, 2, 'B. Pascal', 0, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(5, 3, 'A. echo “$x”;', 1, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(6, 3, 'B. echo “$$x”;', 0, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(7, 4, 'A. James Gosling', 1, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(8, 4, 'B. Đặng Hiệp', 0, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(9, 5, 'A. Không có phương thức này', 0, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(10, 5, 'B. Nhập một chuỗi', 1, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(11, 6, 'A. Brendan Eich', 1, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(12, 6, 'B. Đức bủ', 0, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(13, 7, 'A. Khi click chuột vào 1 đối tượng', 1, '2023-12-14 18:46:45', '2023-12-14 18:46:45'),
(14, 7, 'B. Khi di chuột vào 1 đối tượng', 0, '2023-12-14 18:46:45', '2023-12-14 18:46:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
