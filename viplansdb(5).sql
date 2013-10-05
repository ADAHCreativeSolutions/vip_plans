-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2013 at 05:20 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bottles`
--

INSERT INTO `tbl_bottles` (`bottle_id`, `bottle_name`, `category_id`, `status`) VALUES
(1, 'Test Bottle 1', 1, 'ACTIVE'),
(2, 'Test Bottle 2', 1, 'ACTIVE'),
(3, 'Test Bottle 3', 1, 'ACTIVE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city`, `province_id`, `status`) VALUES
(1, 'Test City', 1, 'ACTIVE'),
(2, 'London', 1, 'ACTIVE'),
(3, 'Birmingham', 1, 'ACTIVE'),
(4, 'Essex', 1, 'INACTIVE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `venue_id`, `event_name`, `event_banner`, `description`, `floor_plan_image`, `date`, `starts`, `end`, `street`, `city`, `ticket_price`, `total_heads`, `created_date`, `last_updated`, `status`) VALUES
(1, 3, 'My event', 'my_event_banner.jpg', 'sgsdgsd', 'my_event_floor.jpg', '2013-10-05', '10:00:00', '12:00:00', 'test st', 1, 4, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ACTIVE'),
(2, 3, 'Dancing Night', 'dancing_night_banner.jpg', 'test dec', 'dancing_night_floor.jpg', '2013-10-05', '10:00:00', '12:00:00', 'test', 3, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ACTIVE'),
(3, 7, 'Another', 'another_banner.jpg', 'wewe', 'another_floor.jpg', '2013-10-05', '10:00:00', '12:00:00', 'test', 4, 5, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ACTIVE'),
(4, 9, 'Aest', 'aest_banner.jpg', 'dfdf', 'aest_floor.jpg', '2013-10-15', '10:00:00', '12:00:00', 'ewewe', 2, 30, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ACTIVE');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`prod_cat_id`, `category`, `status`) VALUES
(1, 'Bottle Cat 1', 'ACTIVE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`province_id`, `province`, `status`) VALUES
(1, 'Test', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_table`
--

INSERT INTO `tbl_table` (`table_id`, `table_no`, `venue_id`, `max_no_of_heads`, `status`) VALUES
(1, '12', 10, 5, 'ACTIVE'),
(2, '13', 10, 5, 'ACTIVE'),
(3, '14', 10, 5, 'ACTIVE'),
(4, '15', 10, 5, 'ACTIVE'),
(5, '16', 10, 5, 'ACTIVE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_types`
--

INSERT INTO `tbl_types` (`type_id`, `type`, `status`) VALUES
(1, 'Atype', 'ACTIVE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_role_id`, `venue_id`, `username`, `password`, `last_login_date`, `created_date`, `last_updated`, `email`, `status`) VALUES
(2, 1, 0, 'Admin', '123456789', '2013-09-11 00:00:00', '2013-09-19 00:00:00', '2013-09-19 00:00:00', 'test@test.com', 'ACTIVE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_venue`
--

INSERT INTO `tbl_venue` (`venue_id`, `venue_name`, `description`, `main_image_path`, `street`, `city`, `email`, `contact_no`, `fax`, `date_created`, `last_updated`, `user_id`, `status`) VALUES
(1, 'sdsdsd', 'sdsdsd', 'venue-default.jpg', 'sssd', 1, 'sdsds@dsd.com', '232323', '2323', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(2, 'ssdsd', 'sdsd', 'venue-default.jpg', 'sdsdsd', 1, 'sdsds@dsd.com', '23232323', '23232323', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(3, 'New venue', 'new venue desc', 'venue-default.jpg', 'sddd', 1, 'ss@ss.com', '2121212', '12121212', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(4, 'ert', 'sdsd', 'venue-default.jpg', 'sddsd', 1, 'sdsdsd@wewe.com', '123232323', '23232323', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(5, 'tre', 'sdsdsd', 'venue-default.jpg', 'sdsd', 1, 'ssd@sdds.com', '121212', '1212121', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(6, 'wewewe', 'wewe', 'venue-default.jpg', 'wwe', 1, 'sdsdsd@wewe.com', '121212', '121212', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'INACTIVE'),
(7, 'hope', 'sdsdsd', 'venue-default.jpg', 'sdssd', 1, 'eer@we.com', '123233', '2232323', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(8, 'koena', 'sdsdsd', 'venue-default.jpg', 'sdsd', 1, 'koena@mena.com', '12121212', '12121212', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(9, 'name', 'sdsdsd', 'venue-default.jpg', 'ssdsd', 1, 'ded@met.com', '121233434', '32323233', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(10, 'reey', 'dsdsds', 'venue-default.jpg', 'dsdsd', 1, 'ter@ee.com', '12123323', '34243434', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(11, 'reey', 'dsdsds', 'venue-default.jpg', 'dsdsd', 1, 'ter@ee.com', '12123323', '34243434', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(12, 'urecd', 'dww', 'venue-default.jpg', 'wewewe', 1, 'wer@rrt.com', '121232434', '12234344', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(13, 'wqewqe', 'wewe', 'venue-default.jpg', 'wewe', 1, '23233@wwwe.com', '2121212', '1221212', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(14, 'Amanari', 'amana ri', 'venue-default.jpg', 'test street', 1, 'test@testme.com', '87878787', '87878787', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(15, 'another venue', 'venue tested', 'venue-default.jpg', 'stree', 1, 'sha@sha.com', '1234', '1234', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(16, 'Ambar', 'sam', 'venue-default.jpg', 'wewewe', 1, 'ee@mm.com', '1234', '1234', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(17, 'hamara', 'dfdfdf', 'venue-default.jpg', 'dfdf', 1, 'dfdf@sd.com', '12323434', '11234343', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(18, 'nehari', 'nn', 'venue-default.jpg', 'dffdfdf', 1, 're@wer.com', '121212', '121212', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(19, 'telypathy', 'ddfdfdf', 'venue-default.jpg', 'sdsdsd', 1, 'sha@sha.com', '123', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(20, 'New Venue', 'sdsdsdsd', 'venue-default.jpg', 'dfdfdf', 1, 'hh@mmm.com', '23232323', '23232323', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(21, 'Manu Venue', 'sdsdsd', 'venue-default.jpg', '2323sss', 1, 'sdsd@something.com', '121212', '12121212', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE'),
(22, 'hey venue', 'sdsdsd', 'venue-default.jpg', 'sdsds', 1, 'hey@may.com', '1212121', '121212', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 'ACTIVE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_venue_bottles`
--

INSERT INTO `tbl_venue_bottles` (`venue_bot_id`, `venue_id`, `bottle_id`, `price`, `status`) VALUES
(1, 3, 1, 23.5, 'ACTIVE'),
(2, 19, 1, 13, 'ACTIVE'),
(3, 20, 1, 12, 'ACTIVE'),
(4, 20, 2, 13, 'ACTIVE'),
(5, 20, 3, 15, 'ACTIVE'),
(6, 21, 1, 0, 'ACTIVE'),
(7, 21, 2, 0, 'ACTIVE'),
(8, 21, 3, 0, 'ACTIVE'),
(9, 22, 1, 22, 'ACTIVE'),
(10, 22, 1, 0, 'ACTIVE'),
(11, 22, 1, 0, 'ACTIVE');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_venue_hours`
--

INSERT INTO `tbl_venue_hours` (`venue_hours_id`, `venue_id`, `day_of_week`, `start_time`, `end_time`) VALUES
(8, 21, 1, '00:00:00', '00:00:00'),
(9, 21, 2, '00:00:00', '00:00:00'),
(10, 21, 3, '00:00:00', '00:00:00'),
(11, 21, 4, '00:00:00', '00:00:00'),
(12, 21, 5, '00:00:00', '00:00:00'),
(13, 21, 6, '00:00:00', '00:00:00'),
(14, 21, 7, '00:00:00', '00:00:00'),
(15, 22, 1, '08:00:00', '04:00:00'),
(16, 22, 2, '08:00:00', '04:00:00'),
(17, 22, 3, '08:00:00', '04:00:00'),
(18, 22, 4, '08:00:00', '04:00:00'),
(19, 22, 5, '08:00:00', '04:00:00'),
(20, 22, 6, '08:00:00', '04:00:00'),
(21, 22, 7, '08:00:00', '04:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

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
