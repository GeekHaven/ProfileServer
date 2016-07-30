-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2016 at 10:10 AM
-- Server version: 5.6.12
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `profileserver`
--

-- --------------------------------------------------------

--
-- Table structure for table `b2k13_a`
--

CREATE TABLE IF NOT EXISTS `b2k13_a` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k13_b`
--

CREATE TABLE IF NOT EXISTS `b2k13_b` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k13_c`
--

CREATE TABLE IF NOT EXISTS `b2k13_c` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k14_a`
--

CREATE TABLE IF NOT EXISTS `b2k14_a` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k14_b`
--

CREATE TABLE IF NOT EXISTS `b2k14_b` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k14_c`
--

CREATE TABLE IF NOT EXISTS `b2k14_c` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k15_a`
--

CREATE TABLE IF NOT EXISTS `b2k15_a` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k15_b`
--

CREATE TABLE IF NOT EXISTS `b2k15_b` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k15_c`
--

CREATE TABLE IF NOT EXISTS `b2k15_c` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k16_a`
--

CREATE TABLE IF NOT EXISTS `b2k16_a` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k16_b`
--

CREATE TABLE IF NOT EXISTS `b2k16_b` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `b2k16_c`
--

CREATE TABLE IF NOT EXISTS `b2k16_c` (
  `rollnum` varchar(20) NOT NULL,
  PRIMARY KEY (`rollnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ldap`
--

CREATE TABLE IF NOT EXISTS `ldap` (
  `roll_no` varchar(10) NOT NULL,
  `pass` varchar(255) NOT NULL,
  PRIMARY KEY (`roll_no`)
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

CREATE TABLE IF NOT EXISTS `user_info` (
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
  `custom_link_2` varchar(2083) NOT NULL,
  PRIMARY KEY (`roll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`roll_no`, `email`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `grad_year`, `batch`, `course_degree`, `course_area`, `about`, `contact_no`, `fb_link`, `gp_link`, `li_link`, `gh_link`, `custom_link_1`, `custom_link_2`) VALUES
('iit2015074', 'shubhamapadia@gmail.com', 'Shubham', 'A', 'Padia', '2016-07-02', 2019, 2015, 'B.tech', 'IT', 'about me', '9918463021', 'dasda', 'asdfdsf', 'dasdsd', 'dasdasd', 'asddasd', 'sdsad');

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

CREATE TABLE IF NOT EXISTS `user_projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `roll_no` varchar(10) NOT NULL,
  `project_title` varchar(255) NOT NULL,
  `project_about` text NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_projects`
--

INSERT INTO `user_projects` (`project_id`, `roll_no`, `project_title`, `project_about`) VALUES
(7, 'iit2015074', 'Project 1', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut aliquam erat, a efficitur mauris. Sed non massa et eros scelerisque dictum. Pellentesque congue molestie nulla. Vivamus at pellentesque turpis. Vestibulum ullamcorper risus eget lorem mollis cursus. Donec mattis mauris eget ipsum hendrerit luctus. Nunc vestibulum mauris eget sem suscipit, a vestibulum sapien convallis. Nulla elementum eros quis massa mollis maximus. Integer finibus gorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut aliquam erat, a efficitur mauris. Sed non massa et eros scelerisque dictum. Pellentesque congue molestie nulla. Vivamus at pellentesque turpis. Vestibulum ullamcorper risus eget lorem mollis cursus. Donec mattis mauris eget ipsum hendrerit luctus. Nunc vestibulum mauris eget sem suscipit, a vestibulum sapien convallis. Nulla elementum eros quis massa mollis maximus. Integer finibus gLorem ipsum dolor sit amet.'),
(8, 'iit2015074', 'Project 2', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut aliquam erat, a efficitur mauris. Sed non massa et eros scelerisque dictum. Pellentesque congue molestie nulla. Vivamus at pellentesque turpis. Vestibulum ullamcorper risus eget lorem mollis cursus. Donec mattis mauris eget ipsum hendrerit luctus. Nunc vestibulum mauris eget sem suscipit, a vestibulum sapien convallis. Nulla elementum eros quis massa mollis maximus. Integer finibus gorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut aliquam erat, a efficitur mauris. Sed non massa et eros scelerisque dictum. Pellentesque congue molestie nulla. Vivamus at pellentesque turpis. Vestibulum ullamcorper risus eget lorem mollis cursus. Donec mattis mauris eget ipsum hendrerit luctus. Nunc vestibulum mauris eget sem suscipit, a vestibulum sapien convallis. Nulla elementum eros quis massa mollis maximus. Integer finibus gLorem ipsum dolor sit amet.'),
(9, 'iit2015074', 'Project 3', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut aliquam erat, a efficitur mauris. Sed non massa et eros scelerisque dictum. Pellentesque congue molestie nulla. Vivamus at pellentesque turpis. Vestibulum ullamcorper risus eget lorem mollis cursus. Donec mattis mauris eget ipsum hendrerit luctus. Nunc vestibulum mauris eget sem suscipit, a vestibulum sapien convallis. Nulla elementum eros quis massa mollis maximus. Integer finibus gorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut aliquam erat, a efficitur mauris. Sed non massa et eros scelerisque dictum. Pellentesque congue molestie nulla. Vivamus at pellentesque turpis. Vestibulum ullamcorper risus eget lorem mollis cursus. Donec mattis mauris eget ipsum hendrerit luctus. Nunc vestibulum mauris eget sem suscipit, a vestibulum sapien convallis. Nulla elementum eros quis massa mollis maximus. Integer finibus gLorem ipsum dolor sit amet.');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE IF NOT EXISTS `user_skills` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `roll_no` varchar(10) NOT NULL,
  `skill_title` varchar(255) NOT NULL,
  `skill_points` int(11) NOT NULL,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`skill_id`, `roll_no`, `skill_title`, `skill_points`) VALUES
(1, 'iit2015074', 'Javascript', 0),
(2, 'iit2015074', 'CSS - 3', 4),
(6, 'iit2015074', 'New Skill', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
