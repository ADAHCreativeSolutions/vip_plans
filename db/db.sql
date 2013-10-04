-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 30, 2013 at 02:33 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `viplansdb`
--
CREATE DATABASE IF NOT EXISTS `viplansdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `viplansdb`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article`
--

CREATE TABLE IF NOT EXISTS `tbl_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `page` varchar(50) NOT NULL,
  `article_title` varchar(250) NOT NULL,
  `abstract` tinyblob NOT NULL,
  `article` blob NOT NULL,
  `version` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `keywords` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bottles`
--

CREATE TABLE IF NOT EXISTS `tbl_bottles` (
  `bottle_id` int(11) NOT NULL AUTO_INCREMENT,
  `bottle_name` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`bottle_id`),
  KEY `bottle_name` (`bottle_name`(191),`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(100) NOT NULL,
  `province_id` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`city_id`),
  UNIQUE KEY `city` (`city`),
  KEY `province_id` (`province_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE IF NOT EXISTS `tbl_event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) NOT NULL,
  `event_name` varchar(250) NOT NULL,
  `event_banner` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `floor_plan_image` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `starts` time NOT NULL,
  `end` time NOT NULL,
  `street` varchar(150) NOT NULL,
  `city` int(11) NOT NULL,
  `ticket_price` double NOT NULL,
  `total_heads` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`event_id`),
  KEY `venue_id` (`venue_id`),
  KEY `city` (`city`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_floorplan`
--

CREATE TABLE IF NOT EXISTS `tbl_floorplan` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `area_name` varchar(200) NOT NULL,
  `max_heads` int(11) NOT NULL,
  `area_coord_x` int(11) NOT NULL,
  `area_coord_y` int(11) NOT NULL,
  `area_coord_x2` int(11) NOT NULL,
  `area_coord_y2` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE','FULL') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`area_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(250) NOT NULL,
  `member_email` varchar(250) NOT NULL,
  `member_phone` varchar(20) NOT NULL,
  `member_password` varchar(40) NOT NULL,
  `status` enum('ACTIVE','INACTIVE','BLOCKED') NOT NULL DEFAULT 'ACTIVE',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `member_email` (`member_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE IF NOT EXISTS `tbl_product_category` (
  `prod_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`prod_cat_id`),
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE IF NOT EXISTS `tbl_province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `province` varchar(100) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`province_id`),
  UNIQUE KEY `province` (`province`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_table`
--

CREATE TABLE IF NOT EXISTS `tbl_table` (
  `table_id` int(11) NOT NULL AUTO_INCREMENT,
  `table_no` varchar(50) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `max_no_of_heads` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`table_id`),
  KEY `venue_id` (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_types`
--

CREATE TABLE IF NOT EXISTS `tbl_types` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(250) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL,
  PRIMARY KEY (`type_id`),
  KEY `type` (`type`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `last_login_date` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `email` varchar(250) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `user_role_id` (`user_role_id`),
  KEY `venue_id` (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE IF NOT EXISTS `tbl_user_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(50) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`user_role_id`),
  UNIQUE KEY `user_role` (`user_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`user_role_id`, `user_role`, `status`) VALUES
(1, 'Admin', 'ACTIVE'),
(2, 'Venue', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venue`
--

CREATE TABLE IF NOT EXISTS `tbl_venue` (
  `venue_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `main_image_path` varchar(200) NOT NULL DEFAULT 'venue-default.jpg',
  `street` varchar(200) NOT NULL,
  `city` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact_no` varchar(40) NOT NULL,
  `fax` varchar(40) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`venue_id`),
  KEY `venue_name` (`venue_name`(191),`city`),
  KEY `city` (`city`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venue_bottles`
--

CREATE TABLE IF NOT EXISTS `tbl_venue_bottles` (
  `venue_bot_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) NOT NULL,
  `bottle_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`venue_bot_id`),
  KEY `venue_id` (`venue_id`,`bottle_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venue_calendar`
--

CREATE TABLE IF NOT EXISTS `tbl_venue_calendar` (
  `venu_cal_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` enum('OPEN','CLOSED','EVENT') NOT NULL DEFAULT 'OPEN',
  PRIMARY KEY (`venu_cal_id`),
  KEY `venue_id` (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venue_hours`
--

CREATE TABLE IF NOT EXISTS `tbl_venue_hours` (
  `venue_hours_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) NOT NULL,
  `day_of_week` tinyint(4) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`venue_hours_id`),
  KEY `venue_id` (`venue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venue_images`
--

CREATE TABLE IF NOT EXISTS `tbl_venue_images` (
  `venu_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `venu_id` int(11) NOT NULL,
  `venu_image_path` varchar(250) NOT NULL,
  PRIMARY KEY (`venu_image_id`),
  KEY `venu_id` (`venu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_venue_types`
--

CREATE TABLE IF NOT EXISTS `tbl_venue_types` (
  `venu_types_id` int(11) NOT NULL AUTO_INCREMENT,
  `venue_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  PRIMARY KEY (`venu_types_id`),
  KEY `venu_id` (`venue_id`,`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=0 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD CONSTRAINT `tbl_city_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `tbl_province` (`province_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD CONSTRAINT `eventvenue` FOREIGN KEY (`venue_id`) REFERENCES `tbl_venue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_event_ibfk_1` FOREIGN KEY (`city`) REFERENCES `tbl_city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_floorplan`
--
ALTER TABLE `tbl_floorplan`
  ADD CONSTRAINT `eventarea` FOREIGN KEY (`event_id`) REFERENCES `tbl_event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_table`
--
ALTER TABLE `tbl_table`
  ADD CONSTRAINT `tbl_table_ibfk_1` FOREIGN KEY (`venue_id`) REFERENCES `tbl_venue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`venue_id`) REFERENCES `tbl_venue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `useruserrole` FOREIGN KEY (`user_role_id`) REFERENCES `tbl_user_role` (`user_role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_venue`
--
ALTER TABLE `tbl_venue`
  ADD CONSTRAINT `venuecity` FOREIGN KEY (`city`) REFERENCES `tbl_city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_venue_bottles`
--
ALTER TABLE `tbl_venue_bottles`
  ADD CONSTRAINT `venuebottles` FOREIGN KEY (`venue_id`) REFERENCES `tbl_venue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_venue_calendar`
--
ALTER TABLE `tbl_venue_calendar`
  ADD CONSTRAINT `venuecalendar` FOREIGN KEY (`venue_id`) REFERENCES `tbl_venue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_venue_hours`
--
ALTER TABLE `tbl_venue_hours`
  ADD CONSTRAINT `venuehours` FOREIGN KEY (`venue_id`) REFERENCES `tbl_venue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_venue_images`
--
ALTER TABLE `tbl_venue_images`
  ADD CONSTRAINT `venueimages` FOREIGN KEY (`venu_id`) REFERENCES `tbl_venue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_venue_types`
--
ALTER TABLE `tbl_venue_types`
  ADD CONSTRAINT `venuetypes` FOREIGN KEY (`venue_id`) REFERENCES `tbl_venue` (`venue_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
