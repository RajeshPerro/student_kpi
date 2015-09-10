-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2015 at 04:44 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_kpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_assessment`
--

CREATE TABLE IF NOT EXISTS `student_assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `b_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `exam_type` varchar(3) NOT NULL,
  `outof` double NOT NULL,
  `obtained` double NOT NULL,
  `actual` double NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student_assessment`
--

INSERT INTO `student_assessment` (`id`, `s_id`, `name`, `b_id`, `g_id`, `exam_type`, `outof`, `obtained`, `actual`, `entry_date`) VALUES
(1, 1, 'Rajesh', 1, 1, 'ST', 50, 47, 9.4, '2015-09-04'),
(2, 2, 'Shakil', 2, 2, 'FT', 100, 89.69, 31.39, '2015-09-04'),
(3, 1, 'Rajesh', 1, 1, 'ST', 100, 87, 8.7, '2015-09-04'),
(4, 2, 'Shakil', 2, 2, 'ST', 100, 95, 9.5, '2015-09-04'),
(5, 1, 'Rajesh', 1, 1, 'ASS', 20, 18, 18, '2015-09-04'),
(6, 1, 'Rajesh', 1, 1, 'ASS', 50, 35, 14, '2015-09-04'),
(7, 1, 'Rajesh', 1, 1, 'PR', 30, 22, 14.67, '2015-09-04'),
(8, 1, 'Rajesh', 1, 1, 'PR', 25, 21, 16.8, '2015-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE IF NOT EXISTS `student_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `b_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `s_id`, `name`, `b_id`, `g_id`, `attendance`, `entry_date`) VALUES
(1, 1, 'Rajesh', 1, 1, 1, '2015-09-03'),
(2, 2, 'Shakil', 3, 2, 0, '2015-09-03'),
(3, 1, 'Rajesh', 1, 1, 0, '2015-09-04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
