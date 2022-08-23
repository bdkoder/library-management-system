-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 10:49 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_p_ciproject`
--

CREATE TABLE IF NOT EXISTS `db_p_ciproject` (
  `sid` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `dep` varchar(199) DEFAULT NULL,
  `roll` int(11) DEFAULT NULL,
  `reg` int(11) DEFAULT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_p_ciproject`
--

INSERT INTO `db_p_ciproject` (`sid`, `name`, `dep`, `roll`, `reg`, `phone`) VALUES
(20, 'Md. Shahidul Islam', '17', 700277, 669796, '01793330005'),
(21, 'Md. Rana Pervez', '17', 700297, 6697200, '01783147383'),
(22, 'Homaira Khatun', '17', 707190, 654475, '01783105240'),
(23, 'Ajufa Khatun', '17', 700278, 669797, '01761250011'),
(24, 'Ajmal Hossain', '18', 584688, 548523, '01900000000'),
(25, 'Abdul Hanna', '21', 57855, 8555, '01830000000'),
(26, 'Abinash Kundu', '17', 708812, 546885, '0170000000');

-- --------------------------------------------------------

--
-- Table structure for table `db_p_ciproject_addissua`
--

CREATE TABLE IF NOT EXISTS `db_p_ciproject_addissua` (
  `id` int(11) NOT NULL,
  `studentname` varchar(200) NOT NULL,
  `studentreg` varchar(200) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `book` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `return` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_p_ciproject_addissua`
--

INSERT INTO `db_p_ciproject_addissua` (`id`, `studentname`, `studentreg`, `dep`, `book`, `date`, `return`) VALUES
(19, 'Abinash Kundu', '546885', '17', '18', '2017-10-24 06:31:23', '2019-01-12'),
(21, 'Ajmal Hossain', '548523', '18', '20', '2017-10-24 06:32:50', '2018-11-12'),
(22, 'Ajufa Khatun', '669797', '17', '18', '2017-10-24 06:33:08', '2018-11-11'),
(23, 'Homaira Khatun', '654475', '17', '14', '2017-10-24 06:33:24', '2018-06-12'),
(24, 'Homaira Khatun', '654475', '17', '15', '2017-10-24 06:33:34', '2018-09-11'),
(25, 'Md. Rana Pervez', '6697200', '17', '17', '2017-10-24 06:33:49', '2018-01-18'),
(26, 'Md. Rana Pervez', '6697200', '17', '18', '2017-10-24 06:34:06', '2018-11-22'),
(27, 'Md. Shahidul Islam', '669796', '17', '17', '2017-10-24 06:34:22', '2019-08-12'),
(28, 'Md. Shahidul Islam', '669796', '17', '18', '2017-10-24 06:34:33', '2018-01-12'),
(29, 'Md. Shahidul Islam', '669796', '17', '14', '2017-10-24 06:50:20', '2018-01-12'),
(30, 'Md. Rana Pervez', '6697200', '17', '14', '2017-10-24 09:02:14', '2018-01-19'),
(31, 'Homaira Khatun', '654475', '17', '16', '2017-10-24 09:02:56', '2017-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `db_p_ciproject_admin`
--

CREATE TABLE IF NOT EXISTS `db_p_ciproject_admin` (
  `userid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_p_ciproject_admin`
--

INSERT INTO `db_p_ciproject_admin` (`userid`, `username`, `pass`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `db_p_ciproject_author`
--

CREATE TABLE IF NOT EXISTS `db_p_ciproject_author` (
  `autid` int(11) NOT NULL,
  `autname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_p_ciproject_author`
--

INSERT INTO `db_p_ciproject_author` (`autid`, `autname`) VALUES
(15, 'Ajufa Author'),
(16, 'Adobe'),
(17, 'Balargushami'),
(18, 'Php Author'),
(19, 'Java Author'),
(20, 'C# Author'),
(21, 'Electrical Author');

-- --------------------------------------------------------

--
-- Table structure for table `db_p_ciproject_book`
--

CREATE TABLE IF NOT EXISTS `db_p_ciproject_book` (
  `bookid` int(11) NOT NULL,
  `bookname` varchar(111) NOT NULL,
  `dep` varchar(111) NOT NULL,
  `author` varchar(111) NOT NULL,
  `stock` int(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_p_ciproject_book`
--

INSERT INTO `db_p_ciproject_book` (`bookid`, `bookname`, `dep`, `author`, `stock`) VALUES
(14, 'Adobe Photoshop', '17', '16', 55),
(15, 'Adobe Illustrator', '17', '16', 80),
(16, 'Bangla', '17', '15', 9),
(17, 'PHP', '17', '18', 22),
(18, 'C# Advanced', '17', '20', 44),
(19, 'Mining Book', '21', '21', 55),
(20, 'Electrical Book 1', '18', '21', 11),
(21, 'Bangla 1st Paper', '17', '15', 220);

-- --------------------------------------------------------

--
-- Table structure for table `db_p_ciproject_dep`
--

CREATE TABLE IF NOT EXISTS `db_p_ciproject_dep` (
  `depid` int(11) NOT NULL,
  `depname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_p_ciproject_dep`
--

INSERT INTO `db_p_ciproject_dep` (`depid`, `depname`) VALUES
(17, 'CSE'),
(18, 'Electrical'),
(19, 'Power'),
(21, 'Mining');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_p_ciproject`
--
ALTER TABLE `db_p_ciproject`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `db_p_ciproject_addissua`
--
ALTER TABLE `db_p_ciproject_addissua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_p_ciproject_admin`
--
ALTER TABLE `db_p_ciproject_admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `db_p_ciproject_author`
--
ALTER TABLE `db_p_ciproject_author`
  ADD PRIMARY KEY (`autid`);

--
-- Indexes for table `db_p_ciproject_book`
--
ALTER TABLE `db_p_ciproject_book`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `db_p_ciproject_dep`
--
ALTER TABLE `db_p_ciproject_dep`
  ADD PRIMARY KEY (`depid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_p_ciproject`
--
ALTER TABLE `db_p_ciproject`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `db_p_ciproject_addissua`
--
ALTER TABLE `db_p_ciproject_addissua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `db_p_ciproject_admin`
--
ALTER TABLE `db_p_ciproject_admin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `db_p_ciproject_author`
--
ALTER TABLE `db_p_ciproject_author`
  MODIFY `autid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `db_p_ciproject_book`
--
ALTER TABLE `db_p_ciproject_book`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `db_p_ciproject_dep`
--
ALTER TABLE `db_p_ciproject_dep`
  MODIFY `depid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
