-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2025 at 05:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gmca_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `phone_number`) VALUES
(9, 'kiran tarbundiya', 'kiran2231@gmail.com', '$2y$10$KsscU0XosMvvpZCqymq/rOQuoKGNIYc7QoW56X1FAUYKH66ztfOgi', '0814107076'),
(10, 'tulsi', 'tulsiparmar22@gmail.com', '$2y$10$TDVbHRBit68a7i5kCotH7.rlO9UBesBfbZf6aTWFZJ4mdEkEYA.tS', '9723283238'),
(11, 'Ekta', 'ekta12@gmail.com', '$2y$10$UDeUV2CCRvMveSH5m/TS1Oiyoxd9dRfJU0NNKxqW4GKOHAWSQDp16', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `students_education`
--

CREATE TABLE `students_education` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `college_name` varchar(150) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `start_year` year(4) NOT NULL,
  `end_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students_education`
--

INSERT INTO `students_education` (`id`, `fullname`, `email`, `phone`, `college_name`, `degree`, `start_year`, `end_year`) VALUES
(15, 'Tulsi Parmar', 'parmartulsi222@gmail.com', '9723283239', 'gmca', 'BCA', '2022', '2025'),
(16, 'kiran tarbundiya', 'kirantar22@gmail.com', '1234567891', 'gmca', 'BCA', '2025', '2027');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `phone number` (`phone_number`) USING BTREE;

--
-- Indexes for table `students_education`
--
ALTER TABLE `students_education`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students_education`
--
ALTER TABLE `students_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--MERGED QUERY (Add Column + Add Foreign Key)

ALTER TABLE students_education
ADD COLUMN student_id INT AFTER id,
ADD CONSTRAINT fk_student_edu
    FOREIGN KEY (student_id) 
    REFERENCES students(id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;
