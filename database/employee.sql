-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2016 at 11:36 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

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
(123, 87, 'residence', 'Anantpur,Doranda', 'ranchi', 'Jharkhand', 834002, 92398328, 2147483647, 2147483647),
(124, 87, 'office', 'capitol hill', 'ranchi', 'Jharkhand', 834001, 0, 2147483647, 2839023),
(129, 90, 'residence', 'aryapalli', 'bhubaneswar', 'Orissa', 751089, 2147483647, 338997868, 2147483647),
(130, 90, 'office', 'patia chowk', 'bhubaneswar', 'Orissa', 785562, 0, 8877672, 887775565),
(131, 91, 'residence', '4th main', 'bbsr', 'Orissa', 893268, 2147483647, 2147483647, 2147483647),
(132, 91, 'office', 'dlf cyber city', 'bbsr', 'Orissa', 756070, 0, 7867564, 8976756);

-- --------------------------------------------------------

--
-- Table structure for table `communication`
--

CREATE TABLE IF NOT EXISTS `communication` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(10) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT '"phone","sms","email","any"',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `communication`
--

INSERT INTO `communication` (`id`, `employee_id`, `type`) VALUES
(7, 56, 'email'),
(8, 85, 'email,sms'),
(9, 90, 'mobile,sms'),
(10, 91, 'sms,email');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `prefix` varchar(10) DEFAULT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `dob` date NOT NULL,
  `marital_status` enum('Single','Married') NOT NULL,
  `employer` varchar(20) NOT NULL,
  `employment` enum('Employed','Unemployed') NOT NULL,
  `image` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `middle_name`, `last_name`, `prefix`, `gender`, `dob`, `marital_status`, `employer`, `employment`, `image`) VALUES
(56, 'Veer', '', 'Vikram', 'Mr', 'Male', '1986-03-03', 'Single', 'indian oil', 'Employed', 'slider 1.jpg'),
(85, 'krishnadev', '', 'bhatt', 'Mr', 'Male', '1992-11-01', 'Single', 'MFS', 'Employed', 'sell_1.jpg'),
(86, 'Atul', 'Kumar', 'Singh', 'Mr', 'Male', '1989-12-31', 'Single', 'MFS', 'Employed', 'sell_2.jpg'),
(87, 'Arjun', '', 'bhatt', 'Mr', 'Male', '1996-05-30', 'Single', 'DK', 'Employed', 'sell_5.jpg'),
(90, 'Ankit', '', ' Das', 'Mr', 'Male', '0000-00-00', 'Single', 'self-employed', 'Employed', 'page.jpg'),
(91, 'vivek', '', 'kumar', 'Mr', 'Male', '1993-08-30', 'Single', 'mfs', 'Employed', 'profile_2.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
