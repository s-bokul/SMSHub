-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2012 at 04:25 PM
-- Server version: 5.1.63-0ubuntu0.11.04.1
-- PHP Version: 5.3.5-1ubuntu7.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smshub`
--

-- --------------------------------------------------------

--
-- Table structure for table `smshub_contacts`
--

CREATE TABLE IF NOT EXISTS `smshub_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(30) NOT NULL,
  `date_created` date NOT NULL,
  `last_update_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smshub_groups`
--

CREATE TABLE IF NOT EXISTS `smshub_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '(1-active, 0-inactive)',
  `date_created` date NOT NULL,
  `last_update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `smshub_users`
--

CREATE TABLE IF NOT EXISTS `smshub_users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `sms_credits` int(10) unsigned DEFAULT NULL,
  `role_code` varchar(20) DEFAULT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `suburb` varchar(255) DEFAULT NULL,
  `state_code` varchar(10) DEFAULT NULL,
  `country_code` varchar(5) NOT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `timezone` varchar(50) NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `last_updated_by` int(10) unsigned DEFAULT NULL,
  `date_last_updated` datetime DEFAULT NULL,
  `last_login_ip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `ind_usrs_role` (`role_code`),
  KEY `ind_usrs_cb` (`created_by`),
  KEY `ind_usrs_lub` (`last_updated_by`),
  KEY `ind_country_code` (`country_code`),
  KEY `ind_state_code` (`state_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `smshub_users`
--

INSERT INTO `smshub_users` (`user_id`, `first_name`, `last_name`, `email`, `mobile_number`, `password`, `company_name`, `sms_credits`, `role_code`, `address_line_1`, `address_line_2`, `city`, `suburb`, `state_code`, `country_code`, `postcode`, `status`, `salt`, `timezone`, `created_by`, `date_created`, `last_updated_by`, `date_last_updated`, `last_login_ip`) VALUES
(1, 'asd', 'asd', 'shakil_bokul@yahoo.co.in', '12312', NULL, '', NULL, NULL, '', NULL, NULL, '', 'New South ', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(2, 'asd', 'asd', 'asdasd@asd.com', '234234234', NULL, 'asd', NULL, NULL, 'asd', NULL, NULL, 'asd', 'New South ', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(3, 'asd', 'asd', 'asdasd@asd.com', '234234234', NULL, '', NULL, NULL, '', NULL, NULL, '', 'New South ', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(4, 'asd', 'asd', 'asdasd@asd.com', '234234234', NULL, '', NULL, NULL, '', NULL, NULL, '', 'New South ', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
