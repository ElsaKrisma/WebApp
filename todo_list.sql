-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2025 at 08:28 AM
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
-- Database: `todo_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `timer_duration` int(11) DEFAULT 1500
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `description`, `created_at`, `updated_at`, `timer_duration`) VALUES
(14, 1002, 'Task 1', '\"Lorem ipsum\" is placeholder text often used in design and typesetting. It comes from a scrambled version of Latin text from Cicero\'s writings, and its purpose is to fill space and give an impression of how text will look in a layout. Here\'s an example:\r\n\r\n**Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et metus ac ipsum lacinia mollis. Sed feugiat nulla ut ligula convallis, a suscipit odio egestas. Curabitur lacinia nunc vitae quam volutpat, at lobortis mi pellentesque. Integer non dui eros. Duis nec erat at felis elementum tincidunt. Vivamus ac libero ut dui accumsan facilisis. Proin euismod velit a lectus auctor, ac interdum augue fermentum.**\r\n\r\nIf you need more or a different version, let me know!', '2025-01-14 03:44:01', '2025-01-14 03:44:01', 1500),
(15, 1002, 'Task 2', 'Ini Coba', '2025-01-14 03:44:42', '2025-01-14 03:44:42', 1500),
(16, 1002, 'Tugas Web App', 'Tugas UAS', '2025-01-14 03:45:09', '2025-01-14 03:45:09', 1500),
(17, 1002, 'Tugas GIT', 'Tugas baru', '2025-01-14 03:45:33', '2025-01-14 03:45:33', 1500),
(19, 1006, 'task 2', 'coba', '2025-01-14 03:52:18', '2025-01-14 03:52:18', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1002, 'hahaha', 'hahaha@gmail.com', '$2y$10$hi10BTQiTRmBVb2IpJda3u4WXHVu1tTPb1aVjbzLO1FRk16KSVv5O', '2025-01-09 07:24:24', '2025-01-09 07:24:24'),
(1003, 'bibubu', 'bibubu11@gmail.com', '$2y$10$CAGn/SYd1s78pUOewGCN6O2RmFPf9EQ9URrzXJp/hoC1ZrufLO3U.', '2025-01-09 07:26:36', '2025-01-09 07:26:36'),
(1004, 'hihihi', 'hihihi@gmail.com', '$2y$10$e.4TJpW6DK1a8RjJK7KWE.UnKCYicznrUhewfGhfJYW3gvjV1.mm6', '2025-01-09 12:18:34', '2025-01-09 12:18:34'),
(1005, 'Elsa', 'elsa22@gmail.com', '$2y$10$j8/IoBcrt9NHTc6HC80ZhOiIbai6amXSOUqVjPfNtPdWuq8Onz3Tu', '2025-01-14 03:49:26', '2025-01-14 03:49:26'),
(1006, 'Thomas', 'Thomas30@gmail.com', '$2y$10$NkI8dqOv3ik.x2IG/.tdLuy55nD7EJw6n564DLm96qjYYvQajyMOi', '2025-01-14 03:51:38', '2025-01-14 03:51:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
