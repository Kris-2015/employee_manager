-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2016 at 05:21 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) NOT NULL,
  `type` enum('residence','office') NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` int(10) NOT NULL,
  `mobile` int(10) NOT NULL,
  `landline` int(10) NOT NULL,
  `fax` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=159 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `employee_id`, `type`, `street`, `city`, `state`, `zip`, `mobile`, `landline`, `fax`) VALUES
(61, 56, 'residence', 'Namkum', 'Ranchi', 'Gujarat', 834010, 23232323, 23232, 2147483647),
(62, 56, 'office', 'carnaught place', 'delhi', 'Delhi', 0, 0, 0, 0),
(119, 85, 'residence', 'Anantpur,Doranda', 'Ranchi', 'Jharkhand', 834002, 2147483647, 2147483647, 2147483647),
(120, 85, 'office', 'capitol hill', 'ranchi', 'Jharkhand', 834001, 0, 2147483647, 2147483647),
(121, 86, 'residence', 'Namkum', 'Ranchi', 'Jharkhand', 834002, 2147483647, 23979323, 2147483647),
(122, 86, 'office', 'dlf cyber city', 'bbsr', 'Orissa', 756070, 0, 2147483647, 999883728),
(141, 104, 'residence', 'DAV ,koyla nagar', 'Dhanbad', 'Jharkhand', 834002, 2147483647, 998989888, 223334444),
(142, 104, 'office', 'HRBR layout, 5th cross main', 'bangalore', 'Karnataka', 756070, 2147483647, 2147483647, 2147483647),
(143, 105, 'residence', 'park street', 'Kolkata', 'West Bengal', 339001, 2147483647, 2147483647, 2225565),
(144, 105, 'office', 'carnaught place', 'Delhi', 'Delhi', 1028886, 2147483647, 2147483647, 118289989),
(145, 106, 'residence', 'koyla nagar ', 'Dhanbad', 'Jharkhand', 8349092, 2147483647, 2147483647, 998887767),
(146, 106, 'office', 'furex technologies, hrbr layou', 'bangalore', 'Karnataka', 6799873, 2147483647, 2147483647, 667779898),
(147, 119, 'residence', ' D.K.Singh', 'ranchi', 'Jharkhand', 834002, 2147483647, 2147483647, 2147483647),
(148, 119, 'office', 'capitol hill', 'ranchi', 'Jharkhand', 834001, 2147483647, 2147483647, 2147483647),
(149, 120, 'residence', 'hrbr layout, 12th main', 'Bangalore', 'Karnataka', 768801, 2147483647, 2147483647, 991114444),
(150, 120, 'office', 'Kammnahali Road', 'Bangalore', 'Karnataka', 768802, 2147483647, 2147483647, 882227777),
(151, 121, 'residence', '5th street, chawla chowk', 'kharagpur', 'West Bengal', 334998, 2147483647, 2147483647, 3334578),
(152, 121, 'office', 'capitol hill', 'ranchi', 'Jharkhand', 834001, 2147483647, 2147483647, 827836787),
(153, 122, 'residence', '7th j-high street, near glitz', 'ranchi', 'Jharkhand', 834002, 2147483647, 2147483647, 2147483647),
(154, 122, 'office', 'dlf cyber city', 'bbsr', 'Orissa', 2147483647, 2147483647, 2147483647, 2147483647),
(155, 123, 'residence', 'patia', 'bbsr', 'Orissa', 768803, 2147483647, 2147483647, 92080802),
(156, 123, 'office', 'dlf cyber city', 'bbsr', 'Orissa', 787838, 2147483647, 2147483647, 2147483647),
(157, 124, 'residence', 'Anantpur,Doranda', 'ranchi', 'Jharkhand', 834002, 2147483647, 2147483647, 2147483647),
(158, 124, 'office', 'kiit', 'bhubaneswar', 'Orissa', 756070, 2147483647, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `communication`
--

CREATE TABLE IF NOT EXISTS `communication` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT '"phone","sms","email","any"',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `communication`
--

INSERT INTO `communication` (`id`, `employee_id`, `type`) VALUES
(1, 120, 'mobile,sms'),
(2, 121, 'mobile,email'),
(3, 122, 'email'),
(4, 123, 'mobile,sms'),
(5, 124, 'mobile,sms,email');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) NOT NULL DEFAULT '2' COMMENT '''admin(1)'',''user(2)''',
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `prefix` varchar(10) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dob` date NOT NULL,
  `marital_status` enum('Single','Married') NOT NULL,
  `employer` varchar(20) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `employment` enum('Employed','Unemployed') NOT NULL,
  `image` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `role_id`, `first_name`, `middle_name`, `last_name`, `prefix`, `gender`, `dob`, `marital_status`, `employer`, `email_id`, `password`, `employment`, `image`) VALUES
(56, 2, 'Veer', '', 'Vikram', 'Mr', 'Male', '1986-03-03', 'Single', 'indian oil', 'veer.vikram@gmail.com', '03e13700e25563c0c0a8ffdb48dbbc19', 'Employed', 'slider 1.jpg'),
(85, 1, 'krishnadev', '', 'bhatt', 'Mr', 'Male', '1992-11-01', 'Single', 'MFS', 'krishnadev.rnc@gmail.com', '03e13700e25563c0c0a8ffdb48dbbc19', 'Employed', ' '),
(86, 2, 'Atul', 'Kumar', 'Singh', 'Mr', 'Male', '1989-12-31', 'Single', 'MFS', 'atulk@gmail.com', '367cde6ef1fc3e07ebe63476bb4a6c3f', 'Employed', 'sell_2.jpg'),
(104, 2, 'priyansha', '', 'verma', 'Mrs', 'Female', '1992-03-04', 'Single', 'Good Through', 'priyansha06@gmail.com', '03e13700e25563c0c0a8ffdb48dbbc19', 'Employed', ' '),
(105, 2, 'Ranjeet', 'Singh', 'Yadav', 'Mr', 'Male', '1992-12-25', 'Single', 'Digicol Systems', 'rsy2412@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Employed', ' '),
(106, 2, 'shreya', '', 'kamal', 'Mrs', 'Female', '1993-04-04', 'Married', 'Furex technologies', 'shreya@gmail.com', 'd68e939882371200637d5024b360fc20', 'Employed', ' '),
(119, 2, 'arjun', 'singh', 'rathore', 'Mr', 'Male', '1992-11-01', 'Single', 'ifbb', 'anoop@gmail.com', 'd68e939882371200637d5024b360fc20', 'Employed', 'new3.jpg'),
(120, 2, ' alex', '', 'finn', 'Mr', 'Male', '1992-05-04', 'Single', 'FBS', 'alex90@gmail.com', '534b44a19bf18d20b71ecc4eb77c572f', 'Employed', 'Nara-World-Blogger-M'),
(122, 1, ' Alex', '', 'Barret', 'Mr', 'Male', '1993-05-23', 'Single', 'fms', 'alex_admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Employed', 'wall_1.jpg'),
(123, 2, 'Rishi ', '', 'Tiwary', 'Mr', 'Male', '1993-05-04', 'Single', 'MFS', 'rishi@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'Employed', ''),
(124, 2, 'Shibani', '', 'Mukherjee', 'Mrs', 'Female', '1996-05-04', 'Single', 'student', 'riya@gmail.com', '3153be13ca91e847668fbf430757a0b5', 'Unemployed', '4240418-people.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `privilege`
--

CREATE TABLE IF NOT EXISTS `privilege` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL,
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `privilege`
--

INSERT INTO `privilege` (`privilege_id`, `name`, `description`) VALUES
(1, 'insert', 'insert records'),
(2, 'view', 'view records'),
(3, 'update', 'update records'),
(4, 'delete', 'delete records'),
(5, 'all', 'all permission');

-- --------------------------------------------------------

--
-- Table structure for table `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `resource_id` int(11) NOT NULL AUTO_INCREMENT,
  `resource` varchar(20) NOT NULL,
  PRIMARY KEY (`resource_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `resource`
--

INSERT INTO `resource` (`resource_id`, `resource`) VALUES
(1, 'display'),
(2, 'profile'),
(3, 'home'),
(4, 'registration');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `role_resource_privilege`
--

CREATE TABLE IF NOT EXISTS `role_resource_privilege` (
  `rrp_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  PRIMARY KEY (`rrp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `role_resource_privilege`
--

INSERT INTO `role_resource_privilege` (`rrp_id`, `role_id`, `resource_id`, `privilege_id`) VALUES
(1, 1, 1, 5),
(3, 1, 2, 5),
(4, 1, 3, 5),
(5, 1, 4, 5),
(6, 2, 3, 2),
(7, 2, 2, 2),
(8, 2, 2, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
