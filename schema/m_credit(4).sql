-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2011 at 09:22 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `m_credit`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` varchar(22) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `fulname` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fulname`) VALUES
(1, '', '24', 'l;jhfjgy');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(33) NOT NULL DEFAULT '',
  `fathersname` varchar(33) NOT NULL DEFAULT '',
  `motthersname` varchar(33) NOT NULL DEFAULT '',
  `pres_address` varchar(50) NOT NULL DEFAULT '',
  `pst_address` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(25) NOT NULL DEFAULT '',
  `email` varchar(33) NOT NULL DEFAULT '',
  `dist` varchar(15) NOT NULL DEFAULT '',
  `salary` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `fullname`, `fathersname`, `motthersname`, `pres_address`, `pst_address`, `phone`, `email`, `dist`, `salary`) VALUES
(0, 'employee', '12345678', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `num` int(11) NOT NULL DEFAULT '0',
  `g_amount` int(11) DEFAULT NULL,
  `c_amount` float DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--


-- --------------------------------------------------------

--
-- Table structure for table `loan1`
--

DROP TABLE IF EXISTS `loan1`;
CREATE TABLE IF NOT EXISTS `loan1` (
  `num` int(22) NOT NULL AUTO_INCREMENT,
  `g_amount` varchar(32) NOT NULL DEFAULT '',
  `c_amount` varchar(32) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `loan1`
--


-- --------------------------------------------------------

--
-- Table structure for table `loan2`
--

DROP TABLE IF EXISTS `loan2`;
CREATE TABLE IF NOT EXISTS `loan2` (
  `num` int(32) NOT NULL AUTO_INCREMENT,
  `g_amount` varchar(32) NOT NULL DEFAULT '',
  `c_amount` varchar(32) NOT NULL DEFAULT '',
  `percentage` varchar(32) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`num`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `loan2`
--


-- --------------------------------------------------------

--
-- Table structure for table `loan_app`
--

DROP TABLE IF EXISTS `loan_app`;
CREATE TABLE IF NOT EXISTS `loan_app` (
  `num` int(32) NOT NULL AUTO_INCREMENT,
  `asking` varchar(32) NOT NULL DEFAULT '',
  `skim` enum('skim1','skim2') NOT NULL DEFAULT 'skim1',
  `nomini` varchar(32) NOT NULL DEFAULT '',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `loan_app`
--

INSERT INTO `loan_app` (`num`, `asking`, `skim`, `nomini`, `date`, `status`) VALUES
(1, '10000', 'skim2', 'test', '2011-06-17 04:37:16', 'Inactive'),
(2, '100000', 'skim1', 'joyes khan', '2011-04-07 01:32:01', 'Inactive'),
(3, '100000', 'skim1', 'joyes', '2011-04-09 11:24:55', 'Inactive'),
(4, '500044', 'skim2', 'kjtlksrdts', '2011-06-12 09:54:08', 'Inactive'),
(5, '500044', 'skim1', 'kjtlksrdts', '2011-06-12 09:58:11', 'Inactive'),
(6, '1000000', 'skim2', 'joyes khan', '2011-06-13 12:48:25', 'Inactive'),
(7, '100000', 'skim2', 'llmjh', '2011-06-13 01:02:44', 'Inactive'),
(8, '50000', 'skim2', 'afeaeqff', '2011-06-13 09:10:37', 'Inactive'),
(9, '100000', 'skim2', 'llmjh', '2011-06-16 10:46:03', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `loan_details`
--

DROP TABLE IF EXISTS `loan_details`;
CREATE TABLE IF NOT EXISTS `loan_details` (
  `skim1` text NOT NULL,
  `skim2` text NOT NULL,
  FULLTEXT KEY `skim1` (`skim1`,`skim2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `m_collection`
--

DROP TABLE IF EXISTS `m_collection`;
CREATE TABLE IF NOT EXISTS `m_collection` (
  `numb` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `m_number` int(11) DEFAULT NULL,
  `m_rate` int(11) DEFAULT NULL,
  `due` int(11) DEFAULT NULL,
  `fine` float DEFAULT NULL,
  `book` int(11) DEFAULT NULL,
  `t_deposit` int(11) DEFAULT NULL,
  `t_pay` float DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_collection`
--

INSERT INTO `m_collection` (`numb`, `name`, `m_number`, `m_rate`, `due`, `fine`, `book`, `t_deposit`, `t_pay`, `date`) VALUES
(1, 'jj', 1, 100, 0, 0, 0, 100, 100, '0000-00-00 00:00:00'),
(2, 'joyes', 3, 100, 0, 25, 15, 100, 140, '2011-01-02 03:26:42'),
(-10, 'kn', -1, 100, 0, 0, 0, -500, -8, '2010-08-01 10:32:00'),
(-10, 'fateulhossain', -1, 0, 0, 0, 0, 0, 0, '2010-08-02 10:20:47'),
(12, 'weopkr903', 1212, 0, 0, 0, 0, 0, 0, '2010-08-03 09:35:09'),
(12345, 'ryam gledhil gg', 2, 100, 0, 23, 0, 123, 123, '2011-06-05 12:17:10'),
(22222, 'ryam gledhil gg', 3, 100, 0, 23, 0, 123, 123, '2011-06-12 11:18:43'),
(55555, 'nfgfhejds dihrawrksj', 5, 200, 20, 10, 15, 1000, 245, '2011-06-13 12:52:55'),
(1, 'testtest', 1, 100, 0, 0, 0, 100, 100, '2011-06-17 03:19:55'),
(22222, 'ryam gledhil gg', 3, 100, 0, 0, 0, 100, 123, '2011-06-17 03:26:21'),
(22222, 'ryam gledhil gg', 3, 100, 0, 0, 0, 100, 123, '2011-06-17 03:27:43'),
(22222, 'ryam gledhil gg', 3, 100, 0, 0, 0, 100, 123, '2011-06-17 03:28:07'),
(22222, 'ryam gledhil gg', 1, 100, 0, 23, 0, 100, 123, '2011-06-17 03:47:46'),
(22222, 'test', 1, 100, 0, 0, 0, 100, 100, '2011-06-17 04:25:12'),
(22222, 'test', 1, 100, 0, 0, 0, 100, 100, '2011-06-17 04:30:06'),
(11111, 'test', 1, 100, 0, 0, 0, 100, 100, '2011-06-17 04:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL DEFAULT '',
  `value` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `setting`
--


-- --------------------------------------------------------

--
-- Table structure for table `total`
--

DROP TABLE IF EXISTS `total`;
CREATE TABLE IF NOT EXISTS `total` (
  `m_earn` float DEFAULT NULL,
  `m_spend` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `total`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  `fullname` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(40) NOT NULL DEFAULT '',
  `mobile` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(25) NOT NULL DEFAULT '',
  PRIMARY KEY (`num`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`num`, `username`, `password`, `fullname`, `address`, `mobile`, `email`) VALUES
(1, 'useruser', '12345678', '', '', '', ''),
(9, 'aaaaa', '12345678', 'test', 'sylhet', '111222333', 'testtest@test.com'),
(2, 'jojojo00', '12345678', 'ryam gledhil gg', 'sylhet', '0191626125900', 'alex@test.com'),
(3, 'payaaqaa', '12345678', 'ryam gledhil gg', 'sylhet', '0214786547', 'goutam@emailbangla.com'),
(4, 'kjhiufyufdtd', '123456789', 'ryam gledhil gg', 'sylhet', '01254837', 'biplop@emailbangla.com'),
(5, 'jojojo52825', '123456789', 'ryam gledhil gg', 'sylhet', '16548646541', 'goutam@emailbangla.com'),
(6, 'kljgge5464', '123456789', 'nfgfhejds dihrawrksjhdi', 'hjghfdghrit dfdiheruwe fihwehqwnafs', '5646446464', 'alex@test.com'),
(7, 'lkhhugytfy', '123456789', 'nfgfhejds dihrawrksjhdi', 'hjghfdghrit dfdiheruwe fihwehqwnafs', '467+4477+99', 'alex@test.com'),
(10, 'hhhhhh', '12345678', 'sec', 'sylhet', '999000999', 'testadmin@test.com');
