-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 03:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `audit_id` int(20) NOT NULL,
  `u_id` int(20) NOT NULL,
  `process_name` varchar(20) NOT NULL,
  `process_on` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`audit_id`, `u_id`, `process_name`, `process_on`) VALUES
(1, 1, 'GAME_STARTED', '2022-01-16 19:30:47'),
(12, 1, 'GAME_STARTED', '2022-02-03 09:35:06'),
(13, 19, 'GAME_STARTED', '2022-02-03 09:42:31'),
(14, 2, 'GAME_STARTED', '2022-03-17 12:08:49'),
(15, 2, 'GAME_STARTED', '2022-03-17 17:25:37'),
(16, 2, 'GAME_STARTED', '2022-03-17 17:50:56'),
(17, 20, 'GAME_STARTED', '2022-03-23 11:12:15'),
(18, 21, 'GAME_STARTED', '2022-03-25 18:56:12');

-- --------------------------------------------------------

--
-- Stand-in structure for view `details`
-- (See below for the actual view)
--
CREATE TABLE `details` (
`u_id` int(20)
,`u_name` varchar(20)
,`email` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `player_id` int(20) NOT NULL,
  `weapon` varchar(20) NOT NULL,
  `my_character` varchar(20) NOT NULL,
  `map` varchar(20) NOT NULL,
  `costume` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`player_id`, `weapon`, `my_character`, `map`, `costume`) VALUES
(1, 'M416', 'LARA', 'ERANGEL', 'HALLOWEN_SET'),
(1, 'AKM', 'NARUTO', 'SANHOK', 'HALLOWEN_SET'),
(19, 'M416', 'LARA', 'SANHOK', 'DRAGON_SET'),
(2, 'AKM', 'NARUTO', 'VIKINDI', 'HALLOWEN_SET'),
(2, 'M416', 'NARUTO', 'MIRAMAR', 'HALLOWEN_SET'),
(2, 'DP-28', 'LUFFY', 'SANHOK', 'HALLOWEN_SET'),
(20, 'DP-28', 'LUFFY', 'SANHOK', 'INVADER_SET'),
(21, 'M416', 'NARUTO', 'SANHOK', 'HALLOWEN_SET');

--
-- Triggers `inventory`
--
DELIMITER $$
CREATE TRIGGER `insert2` AFTER INSERT ON `inventory` FOR EACH ROW INSERT INTO admin VALUES(null,NEW.player_id,"GAME_STARTED",NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `u_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `age` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`u_id`, `name`, `age`, `email`, `password`, `country`) VALUES
(1, 'aanish', 21, 'aanish@gmail.com', 'aaa', 'INDIA'),
(2, 'aani', 23, 'aani@gmail.com', 'aaa', 'USA'),
(3, 'raghav', 22, 'raghav@gmail.com', 'aaa', 'USA'),
(18, 'adhi', 23, 'adhi@gmail.com', 'aaa', 'KOREA'),
(19, 'dhanush', 21, 'dhanush@gmail.com', 'aaa', 'USA'),
(20, 'old', 21, 'old@gmail.com', 'aaa', 'USA'),
(21, 'aaaaani', 34, 'aaaani@gmail.com', 'aaa', 'KOREA');

--
-- Triggers `register`
--
DELIMITER $$
CREATE TRIGGER `insert` AFTER INSERT ON `register` FOR EACH ROW INSERT INTO user VALUES(NEW.u_id,NEW.name,NEW.email,NEW.password,"VICTOR","AKM","VIKINDI")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `p_id` int(20) NOT NULL,
  `play_type` varchar(20) NOT NULL,
  `game_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`p_id`, `play_type`, `game_type`) VALUES
(1, 'DUO', 'CLASSIC'),
(1, 'DUO', 'CLASSIC'),
(19, 'SOLO', 'CLASSIC'),
(2, 'DUO', 'CLASSIC'),
(20, 'DUO', 'TDM'),
(21, 'DUO', 'TDM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(20) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `my_character` varchar(20) NOT NULL,
  `weapon` varchar(20) NOT NULL,
  `map` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `email`, `pass`, `my_character`, `weapon`, `map`) VALUES
(1, 'aanish', 'aanish@gmail.com', 'aaa', 'NARUTO', 'AKM', 'SANHOK'),
(2, 'aani', 'aani@gmail.com', 'aaa', 'LUFFY', 'DP-28', 'SANHOK'),
(3, 'raghav', 'raghav@gmail.com', 'aaa', 'VICTOR', 'AKM', 'VIKINDI'),
(18, 'adhi', 'adhi@gmail.com', 'aaa', 'VICTOR', 'AKM', 'VIKINDI'),
(19, 'dhanush', 'dhanush@gmail.com', 'aaa', 'LARA', 'M416', 'SANHOK'),
(20, 'old', 'old@gmail.com', 'aaa', 'LUFFY', 'DP-28', 'SANHOK'),
(21, 'aaaaani', 'aaaani@gmail.com', 'aaa', 'NARUTO', 'M416', 'SANHOK');

-- --------------------------------------------------------

--
-- Structure for view `details`
--
DROP TABLE IF EXISTS `details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `details`  AS   (select `u`.`u_id` AS `u_id`,`u`.`u_name` AS `u_name`,`u`.`email` AS `email` from (`register` `r` join `user` `u`) group by `u`.`u_id`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`audit_id`),
  ADD KEY `admin_ibfk_1` (`u_id`) USING BTREE;

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD KEY `player_id` (`player_id`) USING BTREE;

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `audit_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `register` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `register` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `type`
--
ALTER TABLE `type`
  ADD CONSTRAINT `type_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `register` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `register` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
