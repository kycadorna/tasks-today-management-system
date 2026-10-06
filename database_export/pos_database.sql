-- -- phpMyAdmin SQL Dump
-- -- version 5.2.1
-- -- https://www.phpmyadmin.net/
-- --
-- -- Host: 127.0.0.1
-- -- Generation Time: Sep 14, 2026 at 09:44 AM
-- -- Server version: 10.4.32-MariaDB
-- -- PHP Version: 8.2.12

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


-- /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
-- /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
-- /*!40101 SET NAMES utf8mb4 */;

-- --
-- -- Database: `pos_database`
-- --

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `customers`
-- --

-- CREATE TABLE `customers` (
--   `customer_id` int(11) NOT NULL,
--   `first_name` varchar(50) NOT NULL,
--   `last_name` varchar(50) NOT NULL,
--   `email` varchar(100) NOT NULL,
--   `phone` varchar(20) DEFAULT NULL,
--   `address` varchar(255) DEFAULT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table `customers`
-- --

-- INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone`, `address`) VALUES
-- (1, 'Juan', 'Dela Cruz', 'juan@gmail.com', '09171234567', 'Manila'),
-- (2, 'Maria', 'Santos', 'maria@gmail.com', '09181234567', 'Quezon City'),
-- (3, 'Carlo', 'Reyes', 'carlo@gmail.com', '09191234567', 'Pasig'),
-- (4, 'Ana', 'Garcia', 'ana@gmail.com', '09201234567', 'Makati'),
-- (5, 'Mark', 'Lopez', 'mark@gmail.com', '09211234567', 'Taguig');

-- -- --------------------------------------------------------

-- --
-- -- Table structure for table `users`
-- --

-- CREATE TABLE `users` (
--   `user_id` int(11) NOT NULL,
--   `username` varchar(50) NOT NULL,
--   `password` varchar(255) NOT NULL,
--   `first_name` varchar(50) NOT NULL,
--   `last_name` varchar(50) NOT NULL,
--   `email` varchar(100) NOT NULL,
--   `role` varchar(20) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --
-- -- Dumping data for table `users`
-- --

-- INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `role`) VALUES
-- (1, 'admin01', 'admin123', 'John', 'Cruz', 'john@gmail.com', 'Admin'),
-- (2, 'staff01', 'staff123', 'Sarah', 'Santos', 'sarah@gmail.com', 'Staff'),
-- (3, 'staff02', 'staff123', 'Miguel', 'Reyes', 'miguel@gmail.com', 'Staff'),
-- (4, 'staff03', 'staff123', 'Kevin', 'Garcia', 'kevin@gmail.com', 'Staff'),
-- (5, 'staff04', 'staff123', 'Angela', 'Lopez', 'angela@gmail.com', 'Staff');

-- --
-- -- Indexes for dumped tables
-- --

-- --
-- -- Indexes for table `customers`
-- --
-- ALTER TABLE `customers`
--   ADD PRIMARY KEY (`customer_id`),
--   ADD UNIQUE KEY `email` (`email`);

-- --
-- -- Indexes for table `users`
-- --
-- ALTER TABLE `users`
--   ADD PRIMARY KEY (`user_id`),
--   ADD UNIQUE KEY `username` (`username`),
--   ADD UNIQUE KEY `email` (`email`);

-- --
-- -- AUTO_INCREMENT for dumped tables
-- --

-- --
-- -- AUTO_INCREMENT for table `customers`
-- --
-- ALTER TABLE `customers`
--   MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

-- --
-- -- AUTO_INCREMENT for table `users`
-- --
-- ALTER TABLE `users`
--   MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
-- COMMIT;

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
