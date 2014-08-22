-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2014 at 07:43 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`tid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` varchar(20) NOT NULL,
  `due` date NOT NULL,
  `type` varchar(1) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`tid`, `uid`, `content`, `due`, `type`, `description`) VALUES
(3, 27, 'job fair', '2014-08-26', '2', 'san jose today'),
(5, 27, 'test', '2014-08-27', '2', NULL),
(6, 27, 'meeting', '2014-08-29', '2', '2pm'),
(7, 27, 'check', '2014-08-31', '2', NULL),
(9, 27, 'working', '2014-09-02', '2', NULL),
(10, 27, 'library', '2014-09-04', '2', NULL),
(11, 27, '23', '2014-08-30', '2', NULL),
(12, 27, 'love', '2014-09-06', '2', NULL),
(13, 27, 'pencil', '2014-08-22', '2', NULL),
(14, 27, 'job 6', '2014-09-03', '2', NULL),
(15, 27, 'uyhgh', '2014-08-21', '2', NULL),
(16, 27, 'quiz', '2014-09-06', '0', NULL),
(17, 27, 'phone', '2014-08-21', '1', NULL),
(18, 27, 'music', '2014-08-27', '0', 'listening'),
(19, 27, 'trust me', '2014-09-05', '1', 'test update again'),
(20, 27, 'laundry', '2014-09-18', '0', 'test update');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`uid` int(11) NOT NULL,
  `uname` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `birth` date DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `pwd` varchar(100) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `email`, `birth`, `is_admin`, `img`, `pwd`, `join_date`) VALUES
(21, 'wljiasjtu', 'a@bb.c', '0000-00-00', 1, NULL, '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '2014-08-17'),
(22, 'testacct', 'k@k.c', '0000-00-00', 0, NULL, 'bf5fc3deae42dc9821b1dfc6907c12f985c8008b', '2014-08-17'),
(23, 'laura1', 'laura@test.com', '0000-00-00', 0, NULL, '48058e0c99bf7d689ce71c360699a14ce2f99774', '2014-08-17'),
(24, 'arthur', 'w@w.c', '0000-00-00', 0, NULL, '77bce9fb18f977ea576bbcd143b2b521073f0cd6', '2014-08-17'),
(25, 'root34', 'rfdjk@j.c', '0000-00-00', 0, NULL, '5545d9e7b6c914922ad862858f65175656b6f341', '2014-08-17'),
(26, 'lijiawu', 'l@l.c', '0000-00-00', 0, NULL, '7a2b9b812a7b748721dc53f5851847b766137a84', '2014-08-17'),
(27, 'facebook', 'facebook@test.com', '2014-08-13', 0, NULL, 'cbe648909034c0624c205fe219d3fbd10052c715', '2014-08-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
