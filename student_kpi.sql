-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2015 at 10:51 AM
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
  `skill_type` varchar(30) NOT NULL,
  `skill_name` varchar(30) NOT NULL,
  `outof` double NOT NULL,
  `obtained` double NOT NULL,
  `actual` double NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `student_assessment`
--

INSERT INTO `student_assessment` (`id`, `s_id`, `name`, `b_id`, `g_id`, `exam_type`, `skill_type`, `skill_name`, `outof`, `obtained`, `actual`, `entry_date`) VALUES
(1, 1, 'Rajesh', 1, 1, 'ST', '', '', 50, 47, 9.4, '2015-09-04'),
(2, 2, 'Shakil', 2, 2, 'FT', '', '', 100, 89.69, 31.39, '2015-09-04'),
(3, 1, 'Rajesh', 1, 1, 'ST', '', '', 100, 87, 8.7, '2015-09-04'),
(4, 2, 'Shakil', 2, 2, 'ST', '', '', 100, 95, 9.5, '2015-09-04'),
(5, 1, 'Rajesh', 1, 1, 'ASS', '', '', 20, 18, 18, '2015-09-04'),
(6, 1, 'Rajesh', 1, 1, 'ASS', '', '', 50, 35, 14, '2015-09-04'),
(7, 1, 'Rajesh', 1, 1, 'PR', '', '', 30, 22, 14.67, '2015-09-04'),
(8, 1, 'Rajesh', 1, 1, 'PR', '', '', 25, 21, 16.8, '2015-09-04'),
(9, 1, 'Rajesh', 1, 3, 'ST', '', '', 50, 48, 9.6, '2015-09-04'),
(10, 1, 'Rajesh', 1, 2, 'ST', '', '', 50, 48, 9.6, '2015-09-04'),
(11, 12, 'Pavel', 1, 2, 'ST', '', '', 50, 38, 7.6, '2015-09-04'),
(12, 8, 'Muktu', 1, 2, 'FT', '', '', 100, 87, 30.45, '2015-09-04'),
(13, 15, 'Cayo', 1, 1, 'ASS', '', '', 80, 15, 3.75, '2015-09-04'),
(14, 1, 'Rajesh', 1, 1, 'FT', '', '', 100, 100, 35, '2015-09-04'),
(15, 2, 'Shakil', 2, 2, 'PR', '', '', 50, 50, 20, '2015-09-04'),
(16, 15, 'Cayo', 1, 1, 'FT', '', '', 100, 80, 28, '2015-09-04'),
(17, 15, 'Cayo', 1, 1, 'ST', '', '', 50, 42, 8.4, '2015-09-04'),
(18, 15, 'Cayo', 1, 1, 'PR', '', '', 35, 22, 12.57, '2015-09-04'),
(19, 75, 'Leo', 1, 1, 'ST', '', '', 50, 45, 9, '2015-09-04'),
(20, 75, 'Leo', 1, 1, 'ASS', '', '', 20, 3, 3, '2015-09-04'),
(21, 75, 'Leo', 3, 3, 'PR', '', '', 50, 45, 18, '2015-09-08'),
(22, 6, 'aaaaa', 1, 1, 'ST', '', '', 20, 12, 6, '2015-09-09'),
(25, 5, 'Linkon', 1, 3, 'FT', 'Front End', 'Javascript and jQuery', 100, 80, 28, '2015-09-09'),
(26, 12, 'Pavel', 1, 2, 'ASS', 'Front End', 'Bootstrap', 45, 42, 18.67, '2015-09-09'),
(27, 1, 'Rajesh', 1, 1, 'PR', 'Front End', 'Javascript and jQuery', 50, 50, 20, '2015-09-09'),
(28, 121, 'Tonmoy', 1, 2, 'ST', 'Front End', 'HTML and CSS', 20, 18, 9, '2015-09-09'),
(29, 121, 'Tonmoy', 1, 2, 'ASS', 'Front End', 'HTML and CSS', 30, 24, 16, '2015-09-09'),
(30, 121, 'Tonmoy', 1, 2, 'PR', 'Front End', 'HTML and CSS', 50, 50, 20, '2015-09-09'),
(31, 2548, 'Motaher', 2, 7, 'ST', 'Front End', 'Javascript and jQuery', 40, 32, 8, '2015-09-10'),
(32, 1302, 'md.shakhaoathossain', 3, 18, 'ST', 'Front End', 'Javascript and jQuery', 25, 12, 4.8, '2015-09-10'),
(33, 2550, 'Mohammad', 2, 7, 'ST', 'Front End', 'Bootstrap', 25, 22, 8.8, '2015-09-10'),
(34, 2548, 'Motaher  Emon', 2, 7, 'ST', 'Front End', 'Javascript and jQuery', 50, 48, 9.6, '2015-09-13'),
(35, 2551, 'Saiful  Islam', 2, 7, 'ST', 'Front End', 'HTML and CSS', 20, 18, 9, '2015-09-13'),
(36, 2980, 'Shahnaz  Jahan', 2, 7, 'ST', 'Front End', 'HTML and CSS', 25, 18, 7.2, '2015-09-13'),
(37, 2980, 'Shahnaz  Jahan', 2, 7, 'ASS', 'Front End', 'Bootstrap', 20, 15, 15, '2015-09-13'),
(38, 2980, 'Shahnaz  Jahan', 2, 7, 'PR', 'Front End', 'Bootstrap', 20, 15, 15, '2015-09-13'),
(39, 2980, 'Shahnaz  Jahan', 2, 7, 'FT', 'Front End', 'Bootstrap', 100, 85, 29.75, '2015-09-13'),
(40, 53, 'Borhan Uddin Ahmed Shumit', 1, 2, 'ST', 'Front End', 'HTML and CSS', 45, 25, 5.56, '2015-09-14'),
(41, 1615, 'Sazid Rayhan raju', 1, 2, 'ST', 'Front End', 'Javascript and jQuery', 40, 36, 9, '2015-09-14'),
(42, 377, 'Hirok  Sarker', 1, 2, 'ST', 'Front End', 'HTML and CSS', 40, 36, 9, '2015-09-15'),
(43, 94, 'Tariqul  Islam', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 40, 8, '2015-09-16'),
(44, 160, 'jahidul  islam', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 41, 8.2, '2015-09-16'),
(45, 180, 'Mohammad Fazlul  Kabir', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 35, 7, '2015-09-16'),
(46, 223, 'Paresh Chandra Debnath', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 36, 7.2, '2015-09-16'),
(47, 285, 'Md.Abdullah Al   Bake', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 34, 6.8, '2015-09-16'),
(48, 357, 'Jahra  Jarin', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 39, 7.8, '2015-09-16'),
(49, 365, 'Mostafizur  Rahman', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 37, 7.4, '2015-09-16'),
(50, 534, 'Hossain  Turag', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 28, 5.6, '2015-09-16'),
(51, 837, 'Md. Minhaz Ul Karim', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 50, 10, '2015-09-16'),
(52, 1172, 'abdul  kader', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 31, 6.2, '2015-09-16'),
(53, 1228, 'Md Khairul Islam', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 39, 7.8, '2015-09-16'),
(54, 1279, 'Nurul  Azim', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 35, 7, '2015-09-16'),
(55, 1662, 'Mosharof Hossain  Rony', 1, 4, 'ST', 'Front End', 'Javascript and jQuery', 50, 38, 7.6, '2015-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE IF NOT EXISTS `student_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `b_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`id`, `s_id`, `name`, `b_id`, `g_id`, `attendance`, `entry_date`) VALUES
(16, 2548, 'Motaher  Emon', 2, 7, 1, '2015-09-10'),
(17, 2550, 'Mohammad Jakir Hossain', 2, 7, 0, '2015-09-10'),
(18, 2551, 'Saiful  Islam', 2, 7, 1, '2015-09-10'),
(19, 2590, 'Abdul Kader Kader Milton', 2, 7, 1, '2015-09-10'),
(20, 2980, 'Shahnaz  Jahan', 2, 7, 0, '2015-09-10'),
(21, 80, 'Bappy  Rayhan', 1, 5, 1, '2015-09-10'),
(22, 201, 'Al-Amin  Al-Amin', 1, 5, 0, '2015-09-10'),
(23, 290, 'MD MOZAMMEL  HAQUE', 1, 5, 1, '2015-09-10'),
(24, 339, 'Shahadat Hossain Biplob', 1, 5, 1, '2015-09-10'),
(25, 409, 'Habibur Rahman Juwel', 1, 5, 0, '2015-09-10'),
(26, 437, 'Md Zahidul  Islam', 1, 5, 0, '2015-09-10'),
(27, 646, 'Maksudul  Hasan', 1, 5, 1, '2015-09-10'),
(28, 1060, 'Ishaq  Ali', 1, 5, 1, '2015-09-10'),
(29, 1405, 'Md Abdullah  Al Mamun', 1, 5, 0, '2015-09-10'),
(30, 1478, 'Saiful  Islam', 1, 5, 1, '2015-09-10'),
(31, 1511, 'Shafiqul Sumon Islam', 1, 5, 0, '2015-09-10'),
(32, 1704, 'Shahrin  Islam', 1, 5, 1, '2015-09-10'),
(33, 1795, 'Mohammad   Atiqul Islam ', 1, 5, 0, '2015-09-10'),
(34, 1840, 'Mohammad Abdul Mohaiman', 1, 5, 1, '2015-09-10'),
(35, 1845, 'Mehrab Hosain Robin', 1, 5, 0, '2015-09-10'),
(36, 2017, 'Mohammad Arif  Hossain', 1, 5, 1, '2015-09-10'),
(37, 148, 'Mohammad Tareq Abdullah', 3, 18, 1, '2015-09-10'),
(38, 314, 'A. K. M. Forhad  Siraj', 3, 18, 0, '2015-09-10'),
(39, 341, 'SEIKH  TANZIR  HOSSAIN', 3, 18, 1, '2015-09-10'),
(40, 1091, 'Nur Esteak  Ahmad', 3, 18, 1, '2015-09-10'),
(41, 1302, 'md.shakhaoathossain Al sakib', 3, 18, 0, '2015-09-10'),
(42, 1731, 'ALIUL  AZIM', 3, 18, 1, '2015-09-10'),
(43, 2309, 'Mohammad Mazharul  Hoque ', 3, 18, 1, '2015-09-10'),
(44, 2714, 'Nur Md. Ahasan Al Rabbi', 3, 18, 1, '2015-09-10'),
(45, 2727, 'zubayer  bin ayub', 3, 18, 0, '2015-09-10'),
(46, 2789, 'Shah Ahmed Hossain', 3, 18, 1, '2015-09-10'),
(47, 2823, 'Parvez  Zamil', 3, 18, 1, '2015-09-10'),
(48, 2864, 'MD. Johir  Uddin', 3, 18, 1, '2015-09-10'),
(49, 2877, 'Md. Faruk Hossain', 3, 18, 1, '2015-09-10'),
(50, 3014, 'Sarowar Hossain Bipu', 3, 18, 0, '2015-09-10'),
(51, 3087, 'Shahariar islam Shuvo', 3, 18, 1, '2015-09-10'),
(52, 3143, 'Soaib  Mashrafi ', 3, 18, 1, '2015-09-10'),
(53, 3280, 'Helal Al Mamun', 3, 18, 1, '2015-09-10'),
(54, 3314, 'Arif Hasan Bappa', 3, 18, 1, '2015-09-10'),
(55, 3338, 'Shahnewaz  Setu', 3, 18, 1, '2015-09-10'),
(56, 3357, 'Arafat Hossain Shaon', 3, 18, 0, '2015-09-10'),
(57, 3426, 'Meer Rabiul Islam', 3, 18, 1, '2015-09-10'),
(58, 3603, 'gazi raihan maqsood', 3, 18, 1, '2015-09-10'),
(59, 3606, 'Jamila  Siddiqua ', 3, 18, 1, '2015-09-10'),
(60, 3747, 'Niropam N Das', 3, 18, 1, '2015-09-10'),
(61, 3754, 'Tanvir  Alam', 3, 18, 1, '2015-09-10'),
(62, 3788, 'Ferdous  Alam', 3, 18, 1, '2015-09-10'),
(63, 61, 'MD. SADDAM HOSSAIN', 1, 6, 1, '2015-09-13'),
(64, 67, 'Mohammad Rubel sarker', 1, 6, 0, '2015-09-13'),
(65, 95, 'D M Monwar  Hossain  Anik', 1, 6, 1, '2015-09-13'),
(66, 404, 'Md  Shafiqul Islam', 1, 6, 1, '2015-09-13'),
(67, 425, 'Mirajul  Islam', 1, 6, 0, '2015-09-13'),
(68, 431, 'shafayatul  Islam', 1, 6, 1, '2015-09-13'),
(69, 570, 'Umme Rubaiyat Chowdhury', 1, 6, 1, '2015-09-13'),
(70, 572, 'Manoj  Roy', 1, 6, 1, '2015-09-13'),
(71, 589, 'Sarowar Sarowar Ahmed', 1, 6, 1, '2015-09-13'),
(72, 603, 'Mohammad  Obaidullah', 1, 6, 1, '2015-09-13'),
(73, 1132, 'Aslam  Islam', 1, 6, 0, '2015-09-13'),
(74, 1402, 'Mahathir  Mohammad Jeshan', 1, 6, 1, '2015-09-13'),
(75, 1466, 'Jasim  Uddin ', 1, 6, 1, '2015-09-13'),
(76, 1657, 'Md. Shariar Islam', 1, 6, 1, '2015-09-13'),
(77, 2019, 'Abdullah Al Numan', 1, 6, 0, '2015-09-13'),
(78, 2052, 'MASBHA  UDDIN', 1, 6, 1, '2015-09-13'),
(79, 53, 'Borhan Uddin Ahmed Shumit', 1, 2, 1, '2015-09-14'),
(80, 114, 'Rakib  Hasan', 1, 2, 1, '2015-09-14'),
(81, 138, 'Mollah  Tareq', 1, 2, 1, '2015-09-14'),
(82, 236, 'Md. Mashiur  Rahman', 1, 2, 1, '2015-09-14'),
(83, 377, 'Hirok  Sarker', 1, 2, 1, '2015-09-14'),
(84, 420, 'Ibrahim  Khalil', 1, 2, 1, '2015-09-14'),
(85, 435, 'Mihir kanti Biswas', 1, 2, 1, '2015-09-14'),
(86, 680, 'Ashif  Mahmud', 1, 2, 0, '2015-09-14'),
(87, 713, 'Imtiaz  Hasan', 1, 2, 0, '2015-09-14'),
(88, 904, 'Md.Rifat  Alam', 1, 2, 1, '2015-09-14'),
(89, 1288, 'Mazharul Mazharul Haq', 1, 2, 1, '2015-09-14'),
(90, 1615, 'Sazid Rayhan raju', 1, 2, 1, '2015-09-14'),
(91, 1702, 'Rokebul  Hassan', 1, 2, 1, '2015-09-14'),
(92, 1882, 'Syeda Aysha  Nimmi', 1, 2, 1, '2015-09-14'),
(93, 2062, 'mahmudul  islam', 1, 2, 1, '2015-09-14'),
(94, 94, 'Tariqul  Islam', 1, 4, 1, '2015-09-16'),
(95, 160, 'jahidul  islam', 1, 4, 1, '2015-09-16'),
(96, 180, 'Mohammad Fazlul  Kabir', 1, 4, 0, '2015-09-16'),
(97, 223, 'Paresh Chandra Debnath', 1, 4, 1, '2015-09-16'),
(98, 285, 'Md.Abdullah Al   Bake', 1, 4, 1, '2015-09-16'),
(99, 357, 'Jahra  Jarin', 1, 4, 1, '2015-09-16'),
(100, 365, 'Mostafizur  Rahman', 1, 4, 0, '2015-09-16'),
(101, 400, 'Mosharop  Hossian', 1, 4, 1, '2015-09-16'),
(102, 534, 'Hossain  Turag', 1, 4, 1, '2015-09-16'),
(103, 837, 'Md. Minhaz Ul Karim', 1, 4, 0, '2015-09-16'),
(104, 1172, 'abdul  kader', 1, 4, 1, '2015-09-16'),
(105, 1228, 'Md Khairul Islam', 1, 4, 1, '2015-09-16'),
(106, 1279, 'Nurul  Azim', 1, 4, 1, '2015-09-16'),
(107, 1662, 'Mosharof Hossain  Rony', 1, 4, 0, '2015-09-16');

-- --------------------------------------------------------

--
-- Table structure for table `worksnap`
--

CREATE TABLE IF NOT EXISTS `worksnap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `b_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `hours` float NOT NULL,
  `entry_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `worksnap`
--

INSERT INTO `worksnap` (`id`, `s_id`, `name`, `b_id`, `g_id`, `hours`, `entry_date`) VALUES
(55, 53, 'Borhan Uddin Ahmed Shumit', 1, 2, 1, '2015-09-14'),
(56, 114, 'Rakib  Hasan', 1, 2, 0, '2015-09-14'),
(57, 138, 'Mollah  Tareq', 1, 2, 0.68, '2015-09-14'),
(58, 236, 'Md. Mashiur  Rahman', 1, 2, 5, '2015-09-14'),
(59, 377, 'Hirok  Sarker', 1, 2, 0, '2015-09-14'),
(60, 420, 'Ibrahim  Khalil', 1, 2, 0, '2015-09-14'),
(61, 435, 'Mihir kanti Biswas', 1, 2, 0, '2015-09-14'),
(62, 680, 'Ashif  Mahmud', 1, 2, 1.67, '2015-09-14'),
(63, 713, 'Imtiaz  Hasan', 1, 2, 6, '2015-09-14'),
(64, 904, 'Md.Rifat  Alam', 1, 2, 0, '2015-09-14'),
(65, 1288, 'Mazharul Mazharul Haq', 1, 2, 0, '2015-09-14'),
(66, 1615, 'Sazid Rayhan raju', 1, 2, 5.67, '2015-09-14'),
(67, 1702, 'Rokebul  Hassan', 1, 2, 0, '2015-09-14'),
(68, 1882, 'Syeda Aysha  Nimmi', 1, 2, 3.83, '2015-09-14'),
(69, 2062, 'mahmudul  islam', 1, 2, 0, '2015-09-14'),
(70, 53, 'Borhan Uddin Ahmed Shumit', 1, 2, 0, '2015-09-15'),
(71, 114, 'Rakib  Hasan', 1, 2, 0, '2015-09-15'),
(72, 138, 'Mollah  Tareq', 1, 2, 0, '2015-09-15'),
(73, 236, 'Md. Mashiur  Rahman', 1, 2, 0, '2015-09-15'),
(74, 377, 'Hirok  Sarker', 1, 2, 0, '2015-09-15'),
(75, 420, 'Ibrahim  Khalil', 1, 2, 0, '2015-09-15'),
(76, 435, 'Mihir kanti Biswas', 1, 2, 0, '2015-09-15'),
(77, 680, 'Ashif  Mahmud', 1, 2, 1, '2015-09-15'),
(78, 713, 'Imtiaz  Hasan', 1, 2, 0.67, '2015-09-15'),
(79, 904, 'Md.Rifat  Alam', 1, 2, 0, '2015-09-15'),
(80, 1288, 'Mazharul Mazharul Haq', 1, 2, 0, '2015-09-15'),
(81, 1615, 'Sazid Rayhan raju', 1, 2, 2.33, '2015-09-15'),
(82, 1702, 'Rokebul  Hassan', 1, 2, 0, '2015-09-15'),
(83, 1882, 'Syeda Aysha  Nimmi', 1, 2, 0, '2015-09-15'),
(84, 2062, 'mahmudul  islam', 1, 2, 0, '2015-09-15'),
(85, 94, 'Tariqul  Islam', 1, 4, 0, '2015-09-16'),
(86, 160, 'jahidul  islam', 1, 4, 0.33, '2015-09-16'),
(87, 180, 'Mohammad Fazlul  Kabir', 1, 4, 4.17, '2015-09-16'),
(88, 223, 'Paresh Chandra Debnath', 1, 4, 0, '2015-09-16'),
(89, 285, 'Md.Abdullah Al   Bake', 1, 4, 0, '2015-09-16'),
(90, 357, 'Jahra  Jarin', 1, 4, 1.33, '2015-09-16'),
(91, 365, 'Mostafizur  Rahman', 1, 4, 0, '2015-09-16'),
(92, 400, 'Mosharop  Hossian', 1, 4, 3.17, '2015-09-16'),
(93, 534, 'Hossain  Turag', 1, 4, 0, '2015-09-16'),
(94, 837, 'Md. Minhaz Ul Karim', 1, 4, 0, '2015-09-16'),
(95, 1172, 'abdul  kader', 1, 4, 2.17, '2015-09-16'),
(96, 1228, 'Md Khairul Islam', 1, 4, 4.17, '2015-09-16'),
(97, 1279, 'Nurul  Azim', 1, 4, 0, '2015-09-16'),
(98, 1662, 'Mosharof Hossain  Rony', 1, 4, 0, '2015-09-16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
