-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 08:58 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'VB.net'),
(2, 'Java'),
(3, 'C#'),
(4, 'Android'),
(5, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cm_id` int(11) NOT NULL,
  `up_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cm_content` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `up_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `up_date` date DEFAULT NULL,
  `up_title` varchar(100) NOT NULL,
  `up_content` varchar(1500) NOT NULL,
  `up_img` varchar(100) DEFAULT NULL COMMENT 'upload image',
  `up_upload` varchar(200) DEFAULT NULL COMMENT 'upload source code .zip file',
  `up_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`up_id`, `u_id`, `cat_id`, `up_date`, `up_title`, `up_content`, `up_img`, `up_upload`, `up_status`) VALUES
(1, 3, 4, '2017-04-19', 'PHP- Android conection', ' sample', 'uploads/upload-files/Screenshot_1.png', 'uploads/downloadable/js.zip', 1),
(2, 3, 5, '2017-04-19', 'sample arcticle ', ' this is desctription', 'uploads/upload-files/Screenshot_4.png', 'uploads/downloadable/Hackathon.zip', 1),
(3, 2, 2, '2017-05-05', ' JSP and MySQL', ' This is a simple program to demonstrate the JSP working.\r\nThis code will show how to make login using JSP and MySQL.', 'uploads/upload-files/1.png', 'uploads/downloadable/jsp -program+screenshot.zip', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `u_email` varchar(50) NOT NULL,
  `u_pwd` varchar(200) NOT NULL,
  `u_pic` varchar(100) NOT NULL,
  `u_level` tinyint(1) NOT NULL COMMENT ' level of user 1 admin, 0 user',
  `u_status` tinyint(1) NOT NULL COMMENT 'status of user 1- verified 0 non verified'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_email`, `u_pwd`, `u_pic`, `u_level`, `u_status`) VALUES
(2, 'user1', 'user1@learning.com', '54fbf0c5491c3b5fa0378e3b108df298', '', 0, 1),
(3, 'admin', 'admin@mylearning.com', '2b2544c675b4c64248aafae713add8f2', '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`up_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
