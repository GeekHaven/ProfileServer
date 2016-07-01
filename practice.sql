-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2016 at 05:26 AM
-- Server version: 5.6.12
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `iit2015000`
--

CREATE TABLE IF NOT EXISTS `iit2015000` (
  `Date` date NOT NULL,
  `Subject 1` int(11) NOT NULL DEFAULT '0',
  `Subject 2` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `iit2015000`
--

INSERT INTO `iit2015000` (`Date`, `Subject 1`, `Subject 2`) VALUES
('2016-06-01', 1, 1),
('2016-06-02', 1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `profileserver`
--

CREATE TABLE IF NOT EXISTS `profileserver` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `course` text NOT NULL,
  `grad_year` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `profileserver`
--

INSERT INTO `profileserver` (`uid`, `uname`, `pass`, `email`, `fname`, `mname`, `lname`, `dob`, `course`, `grad_year`) VALUES
(1, 'johndoe', '3b6beb51e76816e632a40d440eab0097', 'johndoe@gmail.com', 'John', 'E', 'Doe', '2016-06-01', 'B.tech', 2021),
(2, 'shubham-padia', '3b6beb51e76816e632a40d440eab0097', 'shubhamapadia@gmail.com', 'Shubham', 'A', 'Padia', '1998-02-27', 'B.tech', 2020),
(3, 'janedoe', '3b6beb51e76816e632a40d440eab0097', 'janedoe@gmail.com', 'Jane', 'Janardan', 'Doe', '2016-06-29', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
