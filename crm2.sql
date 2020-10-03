-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2020 at 10:41 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm2`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bname` text NOT NULL,
  `cname` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `zip` text NOT NULL,
  `address` text NOT NULL,
  `user` text NOT NULL,
  `df` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `add_id` text NOT NULL,
  `start_date` date NOT NULL,
  `client` text NOT NULL,
  `remarks` text NOT NULL,
  `df` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` text NOT NULL,
  `alert_email` text NOT NULL,
  `mhost` text NOT NULL,
  `mport` text NOT NULL,
  `muser` text NOT NULL,
  `mpass` text NOT NULL,
  `favicon` text NOT NULL,
  `company_web_link` text NOT NULL,
  `access_token` text NOT NULL,
  `access_token_expired` date NOT NULL,
  `last_notification` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `project_name`, `alert_email`, `mhost`, `mport`, `muser`, `mpass`, `favicon`, `company_web_link`, `access_token`, `access_token_expired`, `last_notification`) VALUES
(1, 'LYNX\'S DEN', '', '', '587', '', 'Admin@123', 'favicon.jpg', 'https://www.lynxsden.com', 'EAANa6hvXPVcBAPZCCLAIu4sPuz08TLhlEtrDWNNQZBRXf3CZCipg511MkTQn8ZCkO04rbncXdQb9pFJZCyxHu0sEyyHFL96S3OYZB0AtfIf9Qn6DrCX8cAuDhF0Q1Wm6ID8dZBkV1FUybV3LZAYBO5EivOuBNvZAhIzKnmN1XgIYC7wZDZD', '2020-09-25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `last_ip` varchar(250) DEFAULT NULL,
  `img` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `created_by` varchar(250) NOT NULL DEFAULT '1',
  `df` varchar(10) NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `otp` text NOT NULL,
  `role` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `name`, `email`, `password`, `last_login_time`, `last_ip`, `img`, `mobile`, `created_by`, `df`, `created_at`, `updated_at`, `deleted_at`, `otp`, `role`) VALUES
(1, 'admin', 'Super  Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2019-04-02 17:14:07', '103.251.217.11', 'f3.png', '4628862222', '1', '', '2018-09-21 09:15:08', NULL, NULL, '907799', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
