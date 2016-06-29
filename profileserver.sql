-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2016 at 07:07 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `profileserver`
--

CREATE TABLE `profileserver` (
  `uid` int(11) NOT NULL,
  `uname` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `course` text NOT NULL,
  `grad_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profileserver`
--

INSERT INTO `profileserver` (`uid`, `uname`, `pass`, `email`, `fname`, `mname`, `lname`, `dob`, `course`, `grad_year`) VALUES
(1, 'johndoe', '3b6beb51e76816e632a40d440eab0097', 'johndoe@gmail.com', 'John', 'E', 'Doe', '2016-06-01', 'B.tech', 2021),
(2, 'shubham-padia', '3b6beb51e76816e632a40d440eab0097', 'shubhamapadia@gmail.com', 'Shubham', 'A', 'Padia', '1998-02-27', 'B.tech', 2020),
(3, 'janedoe', '3b6beb51e76816e632a40d440eab0097', 'janedoe@gmail.com', 'Jane', 'Janardan', 'Doe', '2016-06-29', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profileserver`
--
ALTER TABLE `profileserver`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profileserver`
--
ALTER TABLE `profileserver`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
