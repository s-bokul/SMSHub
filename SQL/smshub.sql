-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 14, 2012 at 10:38 PM
-- Server version: 5.1.63-0ubuntu0.11.04.1
-- PHP Version: 5.3.5-1ubuntu7.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `smshub`
--

-- --------------------------------------------------------

--
-- Table structure for table `smshub_campaign`
--

CREATE TABLE IF NOT EXISTS `smshub_campaign` (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `campaign_name` varchar(255) NOT NULL,
  `campaign_description` text NOT NULL,
  `message` varchar(500) NOT NULL,
  `sender_id` varchar(32) NOT NULL,
  `delivery_time` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`campaign_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `smshub_campaign`
--

INSERT INTO `smshub_campaign` (`campaign_id`, `user_id`, `campaign_name`, `campaign_description`, `message`, `sender_id`, `delivery_time`, `create_date`) VALUES
(1, 11, 'test', 'des', 'asd sadasd asdasd ', 'test2', '2012-11-14 00:00:00', '0000-00-00 00:00:00'),
(2, 11, 'test', 'des', 'asd sadasd asdasd ', 'test2', '2012-11-14 00:00:00', '0000-00-00 00:00:00'),
(3, 11, 'test', 'des', 'asd sadasd asdasd ', 'test2', '2012-11-14 00:00:00', '0000-00-00 00:00:00'),
(4, 11, 'test2', '2', 'asdas', 'as', '2012-11-14 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `smshub_contacts`
--

INSERT INTO `smshub_contacts` (`id`, `user_id`, `group_id`, `name`, `number`, `date_created`, `last_update_date`, `is_active`) VALUES
(1, 11, 1, 'a', '01717251418', '2012-11-13', '0000-00-00', 0),
(2, 11, 1, 'b', '01717251419', '2012-11-13', '0000-00-00', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `smshub_groups`
--

INSERT INTO `smshub_groups` (`id`, `user_id`, `group_name`, `status`, `date_created`, `last_update_date`) VALUES
(1, 11, 'test', 1, '2012-11-12', '2012-11-12 16:43:54'),
(2, 11, 'test2', 1, '2012-11-12', '2012-11-12 17:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `smshub_interface`
--

CREATE TABLE IF NOT EXISTS `smshub_interface` (
  `interface_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receive_low_warning_type` varchar(50) NOT NULL,
  `balance_threshold` varchar(100) NOT NULL,
  `balance_override` varchar(500) NOT NULL,
  `recive_invoice_email` varchar(500) NOT NULL,
  `invoice_email_override` varchar(500) NOT NULL,
  `messages_to_email` int(11) NOT NULL,
  `message_email_override` varchar(500) NOT NULL,
  PRIMARY KEY (`interface_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `smshub_interface`
--

INSERT INTO `smshub_interface` (`interface_id`, `user_id`, `receive_low_warning_type`, `balance_threshold`, `balance_override`, `recive_invoice_email`, `invoice_email_override`, `messages_to_email`, `message_email_override`) VALUES
(1, 0, 'sms', '0', 's', 'd', 'f', 1, 'g'),
(2, 5, 'sms', 'a', 's', 'd', 'f', 1, 'g'),
(3, 5, 'sms', 'dsf', 'sdaf', 'dsaf', 'sdfds', 1, 'dsfsda');

-- --------------------------------------------------------

--
-- Table structure for table `smshub_sender`
--

CREATE TABLE IF NOT EXISTS `smshub_sender` (
  `sender_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sender_number` varchar(500) NOT NULL,
  `sender_status` int(11) NOT NULL,
  PRIMARY KEY (`sender_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `smshub_sender`
--

INSERT INTO `smshub_sender` (`sender_id`, `user_id`, `sender_number`, `sender_status`) VALUES
(9, 5, '5555', 0),
(7, 5, '1111111', 0),
(8, 5, '111111', 0),
(12, 11, 'test', 0),
(13, 11, 'test2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smshub_sending_numbers`
--

CREATE TABLE IF NOT EXISTS `smshub_sending_numbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) NOT NULL,
  `number` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `smshub_sending_numbers`
--

INSERT INTO `smshub_sending_numbers` (`id`, `campaign_id`, `number`, `status`, `modified_time`) VALUES
(1, 1, '01717251418', 0, '2012-11-14 16:29:58'),
(2, 1, '01717251419', 0, '2012-11-14 16:29:58'),
(3, 2, '01717251418', 0, '2012-11-14 16:31:14'),
(4, 2, '01717251419', 0, '2012-11-14 16:31:14'),
(5, 3, '01717251418', 0, '2012-11-14 16:33:37'),
(6, 3, '01717251419', 0, '2012-11-14 16:33:37'),
(7, 4, '01717251418', 0, '2012-11-14 16:36:46'),
(8, 4, '01717251419', 0, '2012-11-14 16:36:46');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `smshub_users`
--

INSERT INTO `smshub_users` (`user_id`, `first_name`, `last_name`, `email`, `mobile_number`, `password`, `company_name`, `sms_credits`, `role_code`, `address_line_1`, `address_line_2`, `city`, `suburb`, `state_code`, `country_code`, `postcode`, `status`, `salt`, `timezone`, `created_by`, `date_created`, `last_updated_by`, `date_last_updated`, `last_login_ip`) VALUES
(1, 'asd', 'asd', 'shakil_bokul@yahoo.co.in', '12312', NULL, '', NULL, NULL, '', NULL, NULL, '', 'New South ', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(2, 'asd', 'asd', 'asdasd@asd.com', '234234234', NULL, 'asd', NULL, NULL, 'asd', NULL, NULL, 'asd', 'New South ', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(3, 'asd', 'asd', 'asdasd@asd.com', '234234234', NULL, '', NULL, NULL, '', NULL, NULL, '', 'New South ', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(4, 'asd', 'asd', 'asdasd@asd.com', '234234234', NULL, '', NULL, NULL, '', NULL, NULL, '', 'New South ', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(11, 'shakil', 'bokul', 'bokul@horoppa.com', '8801717251417', 'e10adc3949ba59abbe56e057f20f883e', 'None', NULL, NULL, 'dhaka', NULL, NULL, 'asd', 'New South ', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL);
