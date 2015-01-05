-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2015 at 02:13 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `AUTHSSH`
--

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE IF NOT EXISTS `USER` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NAME` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`ID`, `USER_NAME`) VALUES
(2, 'root'),
(3, 'adit');

-- --------------------------------------------------------

--
-- Table structure for table `USER_ADMIN`
--

CREATE TABLE IF NOT EXISTS `USER_ADMIN` (
  `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME_ADMIN` varchar(25) NOT NULL,
  `PASSWORD_ADMIN` varchar(10) NOT NULL,
  `EMAIL_ADMIN` varchar(50) NOT NULL,
  `LEVEL_ADMIN` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `USER_ADMIN`
--

INSERT INTO `USER_ADMIN` (`ID_ADMIN`, `USERNAME_ADMIN`, `PASSWORD_ADMIN`, `EMAIL_ADMIN`, `LEVEL_ADMIN`) VALUES
(1, 'admin', 'hilman', 'admin@1rstwap.com', 'superuser'),
(2, 'adit', 'hilman', 'adit@1rstwap.com', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `USER_CACHE`
--

CREATE TABLE IF NOT EXISTS `USER_CACHE` (
  `CACHE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CACHE_USER` varchar(255) NOT NULL,
  `CACHE_CODE` varchar(20) NOT NULL,
  PRIMARY KEY (`CACHE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `USER_LOG`
--

CREATE TABLE IF NOT EXISTS `USER_LOG` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NAME` varchar(255) NOT NULL,
  `USER_IP` varchar(20) NOT NULL,
  `USER_LASTLOGIN` varchar(50) NOT NULL,
  `USER_LOGIN_STATUS` varchar(20) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `USER_LOG`
--

INSERT INTO `USER_LOG` (`USER_ID`, `USER_NAME`, `USER_IP`, `USER_LASTLOGIN`, `USER_LOGIN_STATUS`) VALUES
(11, 'root', '192.168.100.1', '14-10-2014 15:56:02', 'Success'),
(12, 'root', '192.168.100.1', '14-10-2014 16:20:15', 'Failed'),
(13, 'root', '192.168.100.1', '14-10-2014 16:21:09', 'Success'),
(14, 'adit', '192.168.100.1', '14-10-2014 16:22:21', 'Failed'),
(15, 'adit', '192.168.100.1', '14-10-2014 16:29:10', 'Failed'),
(16, 'adit', '192.168.100.1', '14-10-2014 17:15:53', 'Failed'),
(17, 'root', '192.168.100.1', '15-10-2014 19:09:02', 'Success'),
(18, 'root', '192.168.100.1', '15-10-2014 19:09:45', 'Failed'),
(19, 'root', '192.168.100.1', '15-10-2014 19:15:52', 'Success'),
(20, 'root', '192.168.100.1', '15-10-2014 19:19:58', 'Success'),
(21, 'root', '192.168.100.1', '16-10-2014 17:26:16', 'Success'),
(22, 'root', '192.168.100.1', '17-10-2014 14:28:37', 'Failed'),
(23, 'root', '192.168.100.1', '17-10-2014 14:28:45', 'Success'),
(24, 'root', '192.168.100.1', '17-10-2014 14:29:20', 'Success'),
(25, 'root', '192.168.100.1', '21-10-2014 14:26:04', 'Failed'),
(26, 'root', '192.168.100.1', '21-10-2014 14:26:28', 'Success'),
(27, 'root', '192.168.100.1', '21-10-2014 14:29:07', 'Success'),
(28, 'root', '192.168.100.1', '21-10-2014 14:38:12', 'Success'),
(29, 'adit', '192.168.100.1', '21-10-2014 14:44:20', 'Failed'),
(30, 'adit', '192.168.100.1', '21-10-2014 14:47:55', 'Success'),
(31, 'adit', '192.168.100.1', '21-10-2014 15:13:21', 'Failed'),
(32, 'adit', '192.168.100.1', '21-10-2014 15:20:36', 'Success'),
(33, 'adit', '192.168.100.1', '21-10-2014 15:31:02', 'Failed'),
(34, 'root', '192.168.100.1', '22-11-2014 15:17:21', 'Success'),
(35, 'root', '192.168.100.1', '22-11-2014 15:31:39', 'Success'),
(36, 'root', '192.168.100.1', '22-11-2014 15:33:22', 'Failed'),
(37, 'root', '192.168.0.1', '02-12-2014 16:36:37', 'Success'),
(38, 'root', '192.168.0.1', '12-12-2014 17:27:44', 'Success'),
(39, 'root', '192.168.0.1', '12-12-2014 17:31:34', 'Success'),
(40, 'root', '192.168.0.1', '12-12-2014 17:34:45', 'Success');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
