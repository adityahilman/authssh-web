-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2015 at 09:25 PM
-- Server version: 5.5.40-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `USER_DETAIL` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`ID`, `USER_NAME`, `USER_DETAIL`) VALUES
(5, 'root', 'uid=0(root) gid=0(root) groups=0(root)\n'),
(6, 'adit', 'uid=1000(adit) gid=1000(adit) groups=1000(adit),4(adm),24(cdrom),27(sudo),30(dip),46(plugdev),108(lpadmin),124(sambashare)\n'),
(8, 'bin', 'uid=2(bin) gid=2(bin) groups=2(bin)\n');

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
  `CREATED_BY` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `USER_ADMIN`
--

INSERT INTO `USER_ADMIN` (`ID_ADMIN`, `USERNAME_ADMIN`, `PASSWORD_ADMIN`, `EMAIL_ADMIN`, `LEVEL_ADMIN`, `CREATED_BY`) VALUES
(23, 'nusa', 'mandiri', 'nusa@1rstwap.com', 'user', 'admin'),
(1, 'admin', '123456', 'admin@1rstwap.com', 'superuser', 'system'),
(25, 'hilman', 'hilman', 'hilman@1rstwap.com', 'administrator', 'admin'),
(21, 'linux', '123', 'linux@1rstwap.com', 'user', 'admin'),
(22, 'report', 'report', 'report@1rstwap.com', 'user', 'admin'),
(26, 'root', 'hilman', 'root@1rstwap.com', 'administrator', 'admin');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

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
(41, 'root', '192.168.0.1', '12-12-2014 17:31:34', 'Success'),
(42, 'root', '192.168.0.1', '12-12-2014 17:31:34', 'Success'),
(43, 'root', '192.168.0.1', '12-12-2014 17:31:34', 'Success'),
(44, 'root', '192.168.0.200', '12-02-2015 17:31:34', 'Failed'),
(45, 'root', '192.168.0.18', '12-02-2015 17:32:34', 'Success'),
(46, 'root', '192.168.0.17', '12-02-2015 17:33:34', 'Failed'),
(47, 'root', '192.168.0.200', '12-02-2015 17:34:34', 'Failed'),
(48, 'root', '192.168.0.15', '12-02-2015 17:35:34', 'Success'),
(49, 'root', '192.168.0.12', '12-02-2015 17:36:34', 'Failed'),
(50, 'root', '192.168.0.200', '12-02-2015 17:37:34', 'Success'),
(51, 'root', '192.168.0.11', '12-02-2015 17:38:34', 'Failed'),
(52, 'root', '192.168.0.200', '12-02-2015 17:39:34', 'Failed'),
(53, 'root', '192.168.0.200', '12-02-2015 17:40:34', 'Failed'),
(54, 'root', '192.168.0.20', '12-02-2015 17:40:35', 'Failed'),
(55, 'root', '192.168.0.200', '12-02-2015 17:41:34', 'Failed'),
(56, 'root', '192.168.0.200', '12-02-2015 17:42:34', 'Success'),
(57, 'root', '192.168.0.200', '12-02-2015 17:43:34', 'Failed'),
(58, 'root', '192.168.0.3', '12-02-2015 17:44:34', 'Failed'),
(59, 'root', '192.168.0.2', '12-02-2015 17:45:34', 'Success'),
(60, 'root', '192.168.0.7', '12-02-2015 17:46:34', 'Failed'),
(61, 'root', '192.168.0.9', '12-02-2015 17:47:34', 'Success'),
(62, 'root', '192.168.0.20', '12-02-2015 17:48:34', 'Success'),
(63, 'root', '192.168.0.200', '12-02-2015 17:49:34', 'Failed'),
(64, 'root', '192.168.0.200', '12-02-2015 17:20:34', 'Success');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
