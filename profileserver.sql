-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 23, 2016 at 06:20 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profileserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `ldap`
--

CREATE TABLE `ldap` (
  `roll_no` varchar(10) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ldap`
--

INSERT INTO `ldap` (`roll_no`, `pass`) VALUES
('iit2015074', '$2y$10$rwovTzVqTwYtB1xU7F.UjuzFDT7485Nxs/CyA7t8j6kV.X86qdtKW');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `roll_no` varchar(11) NOT NULL,
  `email` text NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `last_name` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `grad_year` int(4) NOT NULL,
  `batch` int(4) NOT NULL,
  `course_degree` varchar(255) NOT NULL,
  `course_area` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `fb_link` varchar(2083) NOT NULL,
  `gp_link` varchar(2083) NOT NULL,
  `li_link` varchar(2083) NOT NULL,
  `gh_link` varchar(2083) NOT NULL,
  `custom_link_1` varchar(2083) NOT NULL,
  `custom_link_2` varchar(2083) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`roll_no`, `email`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `grad_year`, `batch`, `course_degree`, `course_area`, `about`, `contact_no`, `fb_link`, `gp_link`, `li_link`, `gh_link`, `custom_link_1`, `custom_link_2`) VALUES
('iit2015074', 'shubhamapadia@gmail.com', 'Shubham', 'A', 'Padia', '2016-07-02', 2019, 2015, 'B.tech', 'IT', 'about me', '9918463021', 'dasda', 'asdfdsf', 'dasdsd', 'dasdasd', 'asddasd', 'sdsad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ldap`
--
ALTER TABLE `ldap`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`roll_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
