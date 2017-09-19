-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 19, 2017 at 06:24 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a3bhacey_lalamove`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_us_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_us_id`, `title`, `description`) VALUES
(1, 'demortertre', 'demomotreterter');

-- --------------------------------------------------------

--
-- Table structure for table `billing_receipt`
--

CREATE TABLE `billing_receipt` (
  `billing_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `e_receipt` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_receipt`
--

INSERT INTO `billing_receipt` (`billing_id`, `party_id`, `email`, `e_receipt`) VALUES
(1, 1, 'customer@gmail.com', 'yes'),
(2, 29, 'customer1@gmail.com', 'yes'),
(3, 30, 'gyan@test.com', 'yes'),
(4, 31, 'kushvishal@gmail.com', 'yes'),
(5, 76, 'kushvishal777@gmail.com', 'YES'),
(6, 77, 'kushvishal7@gmail.com', 'YES'),
(7, 78, 'vishal7@gmail.com', 'YES'),
(8, 79, 'business@gmail.com', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `contact_mech`
--

CREATE TABLE `contact_mech` (
  `contact_mech_id` int(20) NOT NULL,
  `contact_mech_type_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `info_string` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `last_updated_stamp` datetime DEFAULT NULL,
  `last_updated_tx_stamp` datetime DEFAULT NULL,
  `created_stamp` datetime DEFAULT NULL,
  `created_tx_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `contact_mech`
--

INSERT INTO `contact_mech` (`contact_mech_id`, `contact_mech_type_id`, `info_string`, `last_updated_stamp`, `last_updated_tx_stamp`, `created_stamp`, `created_tx_stamp`) VALUES
(9001, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9002, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9008, 'email_address', 'admin@test.com', NULL, NULL, NULL, NULL),
(9114, 'email_address', 'customer@gmail.com', NULL, NULL, NULL, NULL),
(9115, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9116, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9118, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9119, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9120, 'email_address', 'business@gmail.com', NULL, NULL, NULL, NULL),
(9121, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9122, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9124, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9125, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9127, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9128, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9130, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9131, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9133, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9134, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9136, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9137, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9138, 'email_address', 'driver@gmail.com', NULL, NULL, NULL, NULL),
(9139, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9140, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9141, 'email_address', 'asdasd@gmail.com', NULL, NULL, NULL, NULL),
(9142, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9143, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9144, 'email_address', 'driver2@gmail.com', NULL, NULL, NULL, NULL),
(9145, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9146, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9147, 'email_address', 'monako@gmail.com', NULL, NULL, NULL, NULL),
(9148, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9149, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9150, 'email_address', 'driver@gmail.com', NULL, NULL, NULL, NULL),
(9151, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9152, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9179, 'email_address', 'www@www.com', NULL, NULL, NULL, NULL),
(9180, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9181, 'postal_address', NULL, NULL, NULL, NULL, NULL),
(9182, 'EMAIL_ADDRESS', 'kushvishal7@gmail.com', NULL, NULL, NULL, NULL),
(9183, 'TELECOM_NUMBER', NULL, NULL, NULL, NULL, NULL),
(9184, 'EMAIL_ADDRESS', 'vishal7@gmail.com', NULL, NULL, NULL, NULL),
(9185, 'TELECOM_NUMBER', NULL, NULL, NULL, NULL, NULL),
(9186, 'POSTAL_ADDRESS', NULL, NULL, NULL, NULL, NULL),
(9187, 'EMAIL_ADDRESS', 'business@gmail.com', NULL, NULL, NULL, NULL),
(9188, 'TELECOM_NUMBER', NULL, NULL, NULL, NULL, NULL),
(9189, 'POSTAL_ADDRESS', NULL, NULL, NULL, NULL, NULL),
(9190, 'email_address', 'tfox159@hotmail.com', NULL, NULL, NULL, NULL),
(9191, 'telecom_number', NULL, NULL, NULL, NULL, NULL),
(9192, 'postal_address', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_mech_type`
--

CREATE TABLE `contact_mech_type` (
  `contact_mech_type_id` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `parent_type_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `has_table` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `description` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `last_updated_stamp` datetime DEFAULT NULL,
  `last_updated_tx_stamp` datetime DEFAULT NULL,
  `created_stamp` datetime DEFAULT NULL,
  `created_tx_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `contact_mech_type`
--

INSERT INTO `contact_mech_type` (`contact_mech_type_id`, `parent_type_id`, `has_table`, `description`, `last_updated_stamp`, `last_updated_tx_stamp`, `created_stamp`, `created_tx_stamp`) VALUES
('domain_name', 'electronic_address', 'n', 'internet domain name', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('electronic_address', NULL, 'n', 'electronic address', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('email_address', 'electronic_address', 'n', 'email address', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('internal_partyid', 'electronic_address', 'n', 'internal note via partyid', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('ip_address', 'electronic_address', 'n', 'internet ip address', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('ldap_address', 'electronic_address', 'n', 'ldap url', '2017-07-07 00:16:26', '2017-07-07 00:16:25', '2017-07-07 00:16:26', '2017-07-07 00:16:25'),
('postal_address', NULL, 'y', 'postal address', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('telecom_number', NULL, 'y', 'phone number', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('web_address', 'electronic_address', 'n', 'web url/address', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `discount_promocode`
--

CREATE TABLE `discount_promocode` (
  `discount_promocode_id` int(11) NOT NULL,
  `promo_code` varchar(100) NOT NULL,
  `party_id` int(11) NOT NULL,
  `for_all` varchar(11) NOT NULL,
  `price` int(11) NOT NULL,
  `is_expired` varchar(255) NOT NULL,
  `promocode_status` int(11) NOT NULL DEFAULT '0',
  `used_by_partyids` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount_promocode`
--

INSERT INTO `discount_promocode` (`discount_promocode_id`, `promo_code`, `party_id`, `for_all`, `price`, `is_expired`, `promocode_status`, `used_by_partyids`) VALUES
(1, 'LALAMOVE', 0, 'yes', 100, '09/01/2017 - 09/06/2017', 0, '25,27,31');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `faq_id` int(100) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`faq_id`, `question`, `answer`, `status`) VALUES
(1, 'qw', 'qwqw', 1),
(2, 'whay', '<p><b>what</b><br></p><br>', 1),
(3, 'r5tyrt', 'ytrytrytryt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `item_type_id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`item_type_id`, `name`, `description`) VALUES
(1, 'document', 'any kind of files'),
(2, 'parcel', 'any parcel,gift etc'),
(3, 'food', 'any kind of food');

-- --------------------------------------------------------

--
-- Table structure for table `news_suscription`
--

CREATE TABLE `news_suscription` (
  `news_sub_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operational_city`
--

CREATE TABLE `operational_city` (
  `operational_city_id` varchar(100) NOT NULL,
  `city_name` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `lattitude` varchar(20) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operational_city`
--

INSERT INTO `operational_city` (`operational_city_id`, `city_name`, `longitude`, `lattitude`, `description`) VALUES
('bangkok', 'bangkok', '232', '2131', ''),
('hongkok', 'hongkok', '232', '232', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_additional_services`
--

CREATE TABLE `order_additional_services` (
  `service_id` int(11) NOT NULL,
  `parent_services_id` int(11) NOT NULL,
  `services_title` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_additional_services`
--

INSERT INTO `order_additional_services` (`service_id`, `parent_services_id`, `services_title`, `price`, `description`, `status`) VALUES
(1, 5, ' lalamove ', ' 1123', ' ', 1),
(2, 0, ' free ', ' 2123', ' 100 ', 1),
(5, 1, ' 454', '43544', '54355', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_bid`
--

CREATE TABLE `order_bid` (
  `no` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `createtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vehicle_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_bid`
--

INSERT INTO `order_bid` (`no`, `order_id`, `party_id`, `createtime`, `vehicle_id`) VALUES
(1, 37, 74, '2017-09-18 16:49:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_bidding`
--

CREATE TABLE `order_bidding` (
  `order_bidding_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `party_id` int(100) NOT NULL,
  `bid_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_bidding`
--

INSERT INTO `order_bidding` (`order_bidding_id`, `order_id`, `party_id`, `bid_amount`) VALUES
(16, 35, 49, 3560),
(17, 35, 49, 3500),
(18, 35, 49, 3520);

-- --------------------------------------------------------

--
-- Table structure for table `order_contact`
--

CREATE TABLE `order_contact` (
  `contact_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_contact_name` varchar(20) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `alt_mobile_id` varchar(10) DEFAULT NULL,
  `favorite_drivers_licence` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_contact`
--

INSERT INTO `order_contact` (`contact_id`, `order_id`, `order_contact_name`, `mobile_no`, `alt_mobile_id`, `favorite_drivers_licence`) VALUES
(1, 48, 'vishal', '789456000', NULL, NULL),
(2, 49, 'vishal', '789456000', NULL, NULL),
(3, 50, 'vishal', '789456000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery_contact`
--

CREATE TABLE `order_delivery_contact` (
  `deliver_contact_id` int(100) NOT NULL,
  `order_location_id` int(100) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_mobile` int(11) NOT NULL,
  `contact_address` varchar(255) NOT NULL,
  `building_block` varchar(255) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `room` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_delivery_contact`
--

INSERT INTO `order_delivery_contact` (`deliver_contact_id`, `order_location_id`, `contact_name`, `contact_mobile`, `contact_address`, `building_block`, `floor`, `room`) VALUES
(26, 68, ' kwaistop ', 78945123, ' add ', 'dfgd', '2', '205'),
(27, 70, ' mong kok ', 789465, ' add ', '1', '1', '1'),
(28, 69, ' yau tonh ', 47485155, ' add ', '55', '55', '55'),
(29, 71, ' tsuen wan ', 123456489, ' add ', '12', '12', '12'),
(30, 72, '', 0, '', '', '', ''),
(31, 73, '', 0, '', '', '', ''),
(32, 74, '', 0, '', '', '', ''),
(33, 75, '', 0, '', '', '', ''),
(34, 76, '', 0, '', '', '', ''),
(35, 77, '', 0, '', '', '', ''),
(36, 85, '??', 811111111, '', '', '', ''),
(37, 86, '???', 822222222, '', '', '', '\n\n');

-- --------------------------------------------------------

--
-- Table structure for table `order_invoice`
--

CREATE TABLE `order_invoice` (
  `invoice_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `order_email` varchar(255) DEFAULT NULL,
  `order_price` int(100) DEFAULT NULL,
  `order_duration` varchar(255) DEFAULT NULL,
  `order_distance` varchar(255) DEFAULT NULL,
  `party_id` int(100) DEFAULT NULL,
  `item_type_id` int(100) NOT NULL,
  `vehicle_type_id` varchar(255) DEFAULT NULL,
  `vehicle_id` varchar(255) DEFAULT NULL,
  `driver_id` int(100) DEFAULT NULL,
  `discount_promocode_id` int(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `order_status_id` varchar(100) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_invoice`
--

INSERT INTO `order_invoice` (`invoice_id`, `order_id`, `order_date`, `order_email`, `order_price`, `order_duration`, `order_distance`, `party_id`, `item_type_id`, `vehicle_type_id`, `vehicle_id`, `driver_id`, `discount_promocode_id`, `description`, `order_status_id`, `created_date`, `last_modified_date`) VALUES
(1, 35, '2017-09-04 00:00:00', '', 3854, '12', '123', 58, 0, '3', 'mp-09az5266', 55, 1, 'dsg', 'matched', '2017-09-18 13:22:46', NULL),
(2, 35, '2017-09-04 00:00:00', '', 3854, '12', '123', 58, 0, '3', 'mp-09az5266', 55, 1, 'dsg', 'cancel', '2017-09-18 13:23:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_location`
--

CREATE TABLE `order_location` (
  `order_location_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `location_type` varchar(100) NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_lat` varchar(255) NOT NULL,
  `location_lng` varchar(255) NOT NULL,
  `stop_time` int(100) NOT NULL,
  `stop_time_charge` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_location`
--

INSERT INTO `order_location` (`order_location_id`, `order_id`, `location_type`, `location_name`, `location_lat`, `location_lng`, `stop_time`, `stop_time_charge`) VALUES
(68, 35, 'START', 'kam tin, hong kong', '22.440058', '114.06500770000002', 17, 60),
(69, 35, 'STOP', 'mong kok, hong kong', '22.3203648', '114.16977300000008', 13, 12),
(70, 35, 'STOP', 'tsuen wan, hong kong', '22.3699122', '114.11443059999999', 13, 12),
(71, 35, 'END', 'yau tong, hong kong', '22.2940736', '114.23756379999998', 14, 24),
(72, 37, 'START', '124 San Hao Jie, JinLang ShangQuan, Heping Qu, Shenyang Shi, Liaoning Sheng, China, 110016', '41.75953014028567', '123.42556100338697', 0, 0),
(73, 37, 'END', '50 Chang Bai Si Jie, Heping Qu, Shenyang Shi, Liaoning Sheng, China, 110016', '41.741347434838524', '123.40872444212438', 0, 0),
(74, 38, 'START', 'Shen Shui Lu, Heping Qu, Shenyang Shi, Liaoning Sheng, China, 110016', '41.758856122395485', '123.4245015308261', 0, 0),
(75, 38, 'END', '46 Chang Bai Si Jie, Heping Qu, Shenyang Shi, Liaoning Sheng, China, 110016', '41.74852162903474', '123.40601038187744', 0, 0),
(76, 39, 'START', 'Rural Rd, Tambon Chiang Sue, Amphoe Phon Na Kaeo, Chang Wat Sakon Nakhon 47230, Thailand', '17.1186079024066', '104.35563862323761', 0, 0),
(77, 39, 'END', 'Rural Rd, Tambon Chiang Sue, Amphoe Phon Na Kaeo, Chang Wat Sakon Nakhon 47230, Thailand', '17.104222296587967', '104.35387205332518', 0, 0),
(78, 48, 'START', 'Pattaya City, Bang Lamung District, Chon Buri 20150, Thailand', '12.9276082', '100.87708129999999', 0, 0),
(79, 48, 'END', 'Pak Kret, Pak Kret District, Nonthaburi 11120, Thailand', '13.8994973', '100.54264420000004', 0, 0),
(80, 49, 'START', 'Pattaya City, Bang Lamung District, Chon Buri 20150, Thailand', '12.9276082', '100.87708129999999', 0, 0),
(81, 49, 'END', 'Pak Kret, Pak Kret District, Nonthaburi 11120, Thailand', '13.8994973', '100.54264420000004', 0, 0),
(82, 50, 'START', 'Pattaya City, Bang Lamung District, Chon Buri 20150, Thailand', '12.9276082', '100.87708129999999', 0, 0),
(83, 50, 'STOP', 'Laem Chabang, Bang Lamung District, Chon Buri, Thailand', '13.1040552', '100.91580729999998', 0, 0),
(84, 50, 'END', 'Pak Kret, Pak Kret District, Nonthaburi 11120, Thailand', '13.8994973', '100.54264420000004', 0, 0),
(85, 51, 'START', '6/22 ??? ??????? Khwaeng Ao Ngoen, Khet Sai Mai, Krung Thep Maha Nakhon 10220, Thailand', '13.898296961983323', '100.67526865750551', 0, 0),
(86, 51, 'END', '2 Wat Sutthawat, Khwaeng Siriraj, Khet Bangkok Noi, Krung Thep Maha Nakhon 10700, Thailand', '13.758396360201333', '100.48752643167973', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_move`
--

CREATE TABLE `order_move` (
  `order_id` int(100) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_by` varchar(255) NOT NULL,
  `order_price` int(100) NOT NULL,
  `bid_amount` int(100) NOT NULL,
  `order_duration` varchar(255) NOT NULL,
  `order_distance` varchar(255) NOT NULL,
  `party_id` int(100) NOT NULL,
  `item_type_id` int(100) NOT NULL,
  `vehicle_type_id` varchar(255) NOT NULL,
  `vehicle_id` varchar(255) DEFAULT NULL,
  `business_id` int(100) NOT NULL,
  `driver_id` int(100) DEFAULT NULL,
  `discount_promocode_id` int(100) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `favorite_driver_first` int(11) NOT NULL,
  `order_status_id` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_modified_date` datetime NOT NULL,
  `driver_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_move`
--

INSERT INTO `order_move` (`order_id`, `order_date`, `order_by`, `order_price`, `bid_amount`, `order_duration`, `order_distance`, `party_id`, `item_type_id`, `vehicle_type_id`, `vehicle_id`, `business_id`, `driver_id`, `discount_promocode_id`, `description`, `favorite_driver_first`, `order_status_id`, `created_date`, `last_modified_date`, `driver_type`) VALUES
(35, '2017-09-04 00:00:00', '', 3854, 3500, '12', '123', 58, 0, '3', 'mp-09az5266', 49, 55, 1, 'dsg', 0, 'complete', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(37, '2017-09-18 23:11:00', 'CUSTOMER', 3676, 0, '', '', 60, 0, '1', NULL, 0, NULL, NULL, '', 0, 'PickUp', '2017-09-18 07:09:38', '0000-00-00 00:00:00', 0),
(38, '2017-09-19 00:20:00', 'CUSTOMER', 1851, 0, '', '', 72, 0, '1', NULL, 0, NULL, NULL, '', 0, 'PickUp', '2017-09-18 09:09:08', '0000-00-00 00:00:00', 0),
(39, '2017-09-19 00:27:00', 'CUSTOMER', 234, 0, '', '', 75, 0, '4', NULL, 0, NULL, NULL, '', 0, 'PickUp', '2017-09-18 10:09:48', '0000-00-00 00:00:00', 0),
(40, '2017-09-22 23:20:00', ' BUSINESS', 1223, 0, '2', '160.00', 79, 1, '2', NULL, 0, NULL, NULL, 'test order', 0, 'CANCELLED', '2017-09-18 23:13:17', '2017-09-18 23:27:36', 0),
(41, '2017-09-22 23:20:00', ' BUSINESS', 1223, 0, '2', '160.00', 79, 1, '2', NULL, 0, NULL, NULL, 'test order', 0, 'CANCELLED', '2017-09-18 23:14:18', '2017-09-18 23:27:39', 0),
(42, '2017-09-22 23:20:00', ' BUSINESS', 1223, 0, '2', '160.00', 79, 1, '2', NULL, 0, NULL, NULL, 'test order', 0, 'CANCELLED', '2017-09-18 23:14:45', '2017-09-18 23:27:42', 0),
(43, '2017-09-22 23:20:00', ' BUSINESS', 1223, 0, '2', '160.00', 79, 1, '2', NULL, 0, NULL, NULL, 'test order', 0, 'CANCELLED', '2017-09-18 23:15:15', '2017-09-18 23:27:45', 0),
(44, '2017-09-22 23:20:00', ' BUSINESS', 1223, 0, '2', '160.00', 79, 1, '2', NULL, 0, NULL, NULL, 'test order', 0, 'CANCELLED', '2017-09-18 23:15:40', '2017-09-18 23:28:00', 0),
(45, '2017-09-30 23:40:00', ' BUSINESS', 1223, 0, '2', '160.00', 79, 1, '2', NULL, 0, NULL, NULL, 'test order', 0, 'CANCELLED', '2017-09-18 23:16:33', '2017-09-18 23:28:04', 0),
(46, '2017-09-23 23:40:00', ' BUSINESS', 100, 0, '2', '160.00', 79, 1, '2', NULL, 0, NULL, NULL, 'test description', 0, 'CANCELLED', '2017-09-18 23:18:59', '2017-09-18 23:28:08', 0),
(47, '2017-09-23 23:30:00', ' BUSINESS', 100, 0, '2', '160.00', 79, 1, '2', NULL, 0, NULL, NULL, '', 0, 'CANCELLED', '2017-09-18 23:20:59', '2017-09-18 23:28:15', 0),
(48, '2017-09-23 23:30:00', ' BUSINESS', 100, 0, '2', '160.00', 79, 1, '2', NULL, 0, NULL, NULL, '', 0, 'ACTIVE', '2017-09-18 23:25:21', '2017-09-18 23:25:21', 0),
(49, '2017-09-23 23:30:00', ' BUSINESS', 100, 0, '2', '160.00', 79, 1, '2', NULL, 0, NULL, NULL, '', 0, 'ACTIVE', '2017-09-18 23:26:19', '2017-09-18 23:26:19', 0),
(50, '2017-09-29 23:40:00', ' BUSINESS', 130, 0, '38', '159.20', 79, 0, '1', '', 0, 0, NULL, 'tests description', 0, 'confirm', '2017-09-18 23:27:22', '2017-09-18 23:27:22', 0),
(51, '2017-09-19 07:10:00', 'CUSTOMER', 51618, 0, '', '', 0, 0, '1', NULL, 0, NULL, NULL, '', 0, 'PickUp', '2017-09-19 04:09:18', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_services_conn`
--

CREATE TABLE `order_services_conn` (
  `order_services_conn_id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `service_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_services_conn`
--

INSERT INTO `order_services_conn` (`order_services_conn_id`, `order_id`, `service_id`) VALUES
(107, 35, 1),
(108, 35, 2),
(109, 37, 1),
(110, 37, 2),
(111, 38, 1),
(112, 39, 0),
(113, 51, 1),
(114, 51, 2),
(115, 51, 5);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` varchar(100) NOT NULL,
  `title` varchar(10) NOT NULL,
  `description` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `title`, `description`) VALUES
('active', 'active', 'order active'),
('cancelled', 'cancelled', 'cancelled by custome'),
('confirm', 'confirm', 'confirm by admin'),
('matched', 'matched', 'driver matched');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `party_id` int(20) NOT NULL,
  `party_type_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `external_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `preferred_currency_uom_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `description` longtext COLLATE latin1_general_cs,
  `status_id` varchar(20) COLLATE latin1_general_cs DEFAULT 'Active',
  `created_date` datetime DEFAULT NULL,
  `created_by_user_login` varchar(250) COLLATE latin1_general_cs DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  `last_modified_by_user_login` varchar(250) COLLATE latin1_general_cs DEFAULT NULL,
  `data_source_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `is_unread` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `last_updated_stamp` datetime DEFAULT NULL,
  `last_updated_tx_stamp` datetime DEFAULT NULL,
  `created_stamp` datetime DEFAULT NULL,
  `created_tx_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`party_id`, `party_type_id`, `external_id`, `preferred_currency_uom_id`, `description`, `status_id`, `created_date`, `created_by_user_login`, `last_modified_date`, `last_modified_by_user_login`, `data_source_id`, `is_unread`, `last_updated_stamp`, `last_updated_tx_stamp`, `created_stamp`, `created_tx_stamp`) VALUES
(1, 'admin', '', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'customer', '', NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'business', '', NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'driver', '49', NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'driver', '49', NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'customer', '', NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'driver', '49', NULL, NULL, 'Delete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 'customer', NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'driver', NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, 'driver', NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'customer', NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'CUSTOMER', NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 'CUSTOMER', NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'CUSTOMER', NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 'BUSINESS', NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'customer', '', NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'customer', NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'customer', NULL, NULL, NULL, 'Active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `party_contact_mech`
--

CREATE TABLE `party_contact_mech` (
  `party_id` int(20) NOT NULL,
  `contact_mech_id` int(20) NOT NULL,
  `from_date` datetime NOT NULL,
  `thru_date` datetime DEFAULT NULL,
  `role_type_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `allow_solicitation` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `extension` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `verified` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `comments` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `years_with_contact_mech` decimal(20,0) DEFAULT NULL,
  `months_with_contact_mech` decimal(20,0) DEFAULT NULL,
  `last_updated_stamp` datetime DEFAULT NULL,
  `last_updated_tx_stamp` datetime DEFAULT NULL,
  `created_stamp` datetime DEFAULT NULL,
  `created_tx_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `party_contact_mech`
--

INSERT INTO `party_contact_mech` (`party_id`, `contact_mech_id`, `from_date`, `thru_date`, `role_type_id`, `allow_solicitation`, `extension`, `verified`, `comments`, `years_with_contact_mech`, `months_with_contact_mech`, `last_updated_stamp`, `last_updated_tx_stamp`, `created_stamp`, `created_tx_stamp`) VALUES
(1, 9001, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 9002, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 9008, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 9114, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 9115, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 9116, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 9120, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 9121, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 9122, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 9138, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 9139, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 9140, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 9141, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 9142, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 9143, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 9144, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 9145, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 9146, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 9147, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 9148, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 9149, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 9150, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 9151, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 9152, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 9171, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 9172, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 9173, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 9174, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 9175, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 9176, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 9177, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 9178, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 9179, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 9180, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, 9181, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 9182, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 9183, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 9184, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 9185, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 9186, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 9187, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 9188, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, 9189, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 9190, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 9191, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 9192, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `party_favourite_driver`
--

CREATE TABLE `party_favourite_driver` (
  `party_favourite_driver_id` int(100) NOT NULL,
  `party_customer_id` int(100) NOT NULL,
  `party_driver_id` int(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party_favourite_driver`
--

INSERT INTO `party_favourite_driver` (`party_favourite_driver_id`, `party_customer_id`, `party_driver_id`, `status`) VALUES
(1, 47, 48, 0);

-- --------------------------------------------------------

--
-- Table structure for table `party_notification`
--

CREATE TABLE `party_notification` (
  `notification_id` int(100) NOT NULL,
  `from_party` int(100) NOT NULL,
  `to_party` int(100) NOT NULL,
  `notification_for` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_status` int(11) NOT NULL DEFAULT '1',
  `customer_status` int(11) NOT NULL DEFAULT '1',
  `manager_status` int(11) NOT NULL DEFAULT '1',
  `dogwalker_status` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party_notification`
--

INSERT INTO `party_notification` (`notification_id`, `from_party`, `to_party`, `notification_for`, `subject`, `message`, `datetime`, `admin_status`, `customer_status`, `manager_status`, `dogwalker_status`, `status`) VALUES
(1, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:08:18', 1, 1, 1, 1, 0),
(2, 1, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-12 10:08:27', 1, 1, 1, 1, 0),
(3, 1, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-12 10:08:27', 1, 1, 1, 1, 0),
(4, 1, 57, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-12 10:08:29', 1, 1, 1, 1, 0),
(5, 1, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-12 10:08:29', 1, 1, 1, 1, 0),
(6, 1, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-12 10:08:31', 1, 1, 1, 1, 0),
(7, 1, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-12 10:08:31', 1, 1, 1, 1, 0),
(8, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-12 10:08:40', 1, 1, 1, 1, 0),
(9, 1, 0, 'vehicletype', 'Vehicle type tampoo Updated in system by admin admin', '', '2017-09-12 10:11:45', 1, 1, 1, 1, 3),
(10, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:11:54', 1, 1, 1, 1, 0),
(11, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:11:54', 1, 1, 1, 1, 3),
(12, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:11:58', 1, 1, 1, 1, 0),
(13, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:11:58', 1, 1, 1, 1, 3),
(14, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:12:01', 1, 1, 1, 1, 0),
(15, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:12:01', 1, 1, 1, 1, 3),
(16, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:12:02', 1, 1, 1, 1, 0),
(17, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:12:02', 1, 1, 1, 1, 3),
(18, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:12:05', 1, 1, 1, 1, 0),
(19, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:12:05', 1, 1, 1, 1, 3),
(20, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:12:10', 1, 1, 1, 1, 0),
(21, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:12:10', 1, 1, 1, 1, 3),
(22, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:12:14', 1, 1, 1, 1, 0),
(23, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:12:14', 1, 1, 1, 1, 3),
(24, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:12:15', 1, 1, 1, 1, 0),
(25, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:12:15', 1, 1, 1, 1, 3),
(26, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:12:24', 1, 1, 1, 1, 0),
(27, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:12:24', 1, 1, 1, 1, 3),
(28, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:12:29', 1, 1, 1, 1, 0),
(29, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', '', '2017-09-12 10:12:29', 1, 1, 1, 1, 3),
(30, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:12:32', 1, 1, 1, 1, 0),
(31, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', '', '2017-09-12 10:12:32', 1, 1, 1, 1, 3),
(32, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:12:40', 1, 1, 1, 1, 0),
(33, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:12:40', 1, 1, 1, 1, 3),
(34, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:12:45', 1, 1, 1, 1, 0),
(35, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', '', '2017-09-12 10:12:45', 1, 1, 1, 1, 3),
(36, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:13:12', 1, 1, 1, 1, 0),
(37, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:13:12', 1, 1, 1, 1, 3),
(38, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:13:14', 1, 1, 1, 1, 0),
(39, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:13:14', 1, 1, 1, 1, 3),
(40, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:13:14', 1, 1, 1, 1, 0),
(41, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:13:14', 1, 1, 1, 1, 3),
(42, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:13:15', 1, 1, 1, 1, 0),
(43, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:13:15', 1, 1, 1, 1, 3),
(44, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:13:16', 1, 1, 1, 1, 0),
(45, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:13:16', 1, 1, 1, 1, 3),
(46, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:13:35', 1, 1, 1, 1, 0),
(47, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:13:35', 1, 1, 1, 1, 3),
(48, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:13:36', 1, 1, 1, 1, 0),
(49, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:13:36', 1, 1, 1, 1, 3),
(50, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:13:38', 1, 1, 1, 1, 0),
(51, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:13:38', 1, 1, 1, 1, 3),
(52, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:15:11', 1, 1, 1, 1, 0),
(53, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:15:11', 1, 1, 1, 1, 3),
(54, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:15:12', 1, 1, 1, 1, 0),
(55, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:15:12', 1, 1, 1, 1, 3),
(56, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:15:14', 1, 1, 1, 1, 0),
(57, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:15:14', 1, 1, 1, 1, 3),
(58, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:15:16', 1, 1, 1, 1, 0),
(59, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:15:16', 1, 1, 1, 1, 3),
(60, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:15:18', 1, 1, 1, 1, 0),
(61, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:15:18', 1, 1, 1, 1, 3),
(62, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:15:19', 1, 1, 1, 1, 0),
(63, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', '', '2017-09-12 10:15:19', 1, 1, 1, 1, 3),
(64, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:16:08', 1, 1, 1, 1, 0),
(65, 1, 0, 'order', 'order #00 of customer   updated successfully', '', '2017-09-12 10:16:08', 1, 1, 1, 1, 3),
(66, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:18:24', 1, 1, 1, 1, 0),
(67, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', '', '2017-09-12 10:18:24', 1, 1, 1, 1, 3),
(68, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:19:31', 1, 1, 1, 1, 0),
(69, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:19:31', 1, 1, 1, 1, 3),
(70, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-12 10:19:40', 1, 1, 1, 1, 0),
(71, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-12 10:19:40', 1, 1, 1, 1, 3),
(72, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:02', 1, 1, 1, 1, 3),
(73, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:02', 1, 1, 1, 1, 0),
(74, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:02', 1, 1, 1, 1, 3),
(75, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:03', 1, 1, 1, 1, 3),
(76, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:03', 1, 1, 1, 1, 0),
(77, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:03', 1, 1, 1, 1, 3),
(78, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:03', 1, 1, 1, 1, 3),
(79, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:03', 1, 1, 1, 1, 0),
(80, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:03', 1, 1, 1, 1, 3),
(81, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:04', 1, 1, 1, 1, 3),
(82, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:04', 1, 1, 1, 1, 0),
(83, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:04', 1, 1, 1, 1, 3),
(84, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:06', 1, 1, 1, 1, 3),
(85, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:06', 1, 1, 1, 1, 0),
(86, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:06', 1, 1, 1, 1, 3),
(87, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:07', 1, 1, 1, 1, 3),
(88, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:07', 1, 1, 1, 1, 0),
(89, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:07', 1, 1, 1, 1, 3),
(90, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:13', 1, 1, 1, 1, 3),
(91, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:13', 1, 1, 1, 1, 0),
(92, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:13', 1, 1, 1, 1, 3),
(93, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:13', 1, 1, 1, 1, 3),
(94, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:13', 1, 1, 1, 1, 0),
(95, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:13', 1, 1, 1, 1, 3),
(96, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-12 10:23:19', 1, 1, 1, 1, 0),
(97, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-12 14:42:47', 0, 1, 1, 1, 0),
(98, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-12 10:23:19', 1, 1, 1, 1, 3),
(99, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:25', 1, 1, 1, 1, 3),
(100, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:25', 1, 1, 1, 1, 0),
(101, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:25', 1, 1, 1, 1, 3),
(102, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver   and vehicle mp-09 az 5206', NULL, '2017-09-12 10:23:27', 1, 1, 1, 1, 3),
(103, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:27', 1, 1, 1, 1, 0),
(104, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:27', 1, 1, 1, 1, 3),
(105, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:23:34', 1, 1, 1, 1, 3),
(106, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:34', 1, 1, 1, 1, 0),
(107, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:34', 1, 1, 1, 1, 3),
(108, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:23:38', 1, 1, 1, 1, 3),
(109, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:38', 1, 1, 1, 1, 0),
(110, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:38', 1, 1, 1, 1, 3),
(111, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:39', 1, 1, 1, 1, 3),
(112, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:39', 1, 1, 1, 1, 0),
(113, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:39', 1, 1, 1, 1, 3),
(114, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:23:42', 1, 1, 1, 1, 3),
(115, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:42', 1, 1, 1, 1, 0),
(116, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:42', 1, 1, 1, 1, 3),
(117, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver   and vehicle mp-09 az 5206', NULL, '2017-09-12 10:23:43', 1, 1, 1, 1, 3),
(118, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:23:43', 1, 1, 1, 1, 0),
(119, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:23:43', 1, 1, 1, 1, 3),
(120, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:25:01', 1, 1, 1, 1, 3),
(121, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:25:01', 1, 1, 1, 1, 0),
(122, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:25:01', 1, 1, 1, 1, 3),
(123, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:25:04', 1, 1, 1, 1, 3),
(124, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:25:04', 1, 1, 1, 1, 0),
(125, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:25:04', 1, 1, 1, 1, 3),
(126, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:25:05', 1, 1, 1, 1, 3),
(127, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:25:05', 1, 1, 1, 1, 0),
(128, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:25:05', 1, 1, 1, 1, 3),
(129, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:25:07', 1, 1, 1, 1, 3),
(130, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:25:07', 1, 1, 1, 1, 0),
(131, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:25:07', 1, 1, 1, 1, 3),
(132, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver   and vehicle mp-09 az 5206', NULL, '2017-09-12 10:25:08', 1, 1, 1, 1, 3),
(133, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:25:08', 1, 1, 1, 1, 0),
(134, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:25:08', 1, 1, 1, 1, 3),
(135, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:25:09', 1, 1, 1, 1, 3),
(136, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:25:09', 1, 1, 1, 1, 0),
(137, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:25:09', 1, 1, 1, 1, 3),
(138, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:25:09', 1, 1, 1, 1, 3),
(139, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:25:09', 1, 1, 1, 1, 0),
(140, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:25:09', 1, 1, 1, 1, 3),
(141, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:25:10', 1, 1, 1, 1, 3),
(142, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:25:10', 1, 1, 1, 1, 0),
(143, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:25:10', 1, 1, 1, 1, 3),
(144, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver   and vehicle mp-09 az 5206', NULL, '2017-09-12 10:25:11', 1, 1, 1, 1, 3),
(145, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:25:11', 1, 1, 1, 1, 0),
(146, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:25:11', 1, 1, 1, 1, 3),
(147, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:28:27', 1, 1, 1, 1, 3),
(148, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:28:27', 1, 1, 1, 1, 0),
(149, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:28:27', 1, 1, 1, 1, 3),
(150, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:28:28', 1, 1, 1, 1, 3),
(151, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:28:28', 1, 1, 1, 1, 0),
(152, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:28:28', 1, 1, 1, 1, 3),
(153, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:28:31', 1, 1, 1, 1, 3),
(154, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:28:31', 1, 1, 1, 1, 0),
(155, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:28:31', 1, 1, 1, 1, 3),
(156, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver   and vehicle mp-09 az 5206', NULL, '2017-09-12 10:28:34', 1, 1, 1, 1, 3),
(157, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:28:34', 1, 1, 1, 1, 0),
(158, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:28:34', 1, 1, 1, 1, 3),
(159, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:34:45', 1, 1, 1, 1, 0),
(160, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:34:45', 1, 1, 1, 1, 3),
(161, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:34:50', 1, 1, 1, 1, 0),
(162, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:34:50', 1, 1, 1, 1, 3),
(163, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:34:51', 1, 1, 1, 1, 0),
(164, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:34:51', 1, 1, 1, 1, 3),
(165, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:34:52', 1, 1, 1, 1, 0),
(166, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:34:52', 1, 1, 1, 1, 3),
(167, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:34:55', 1, 1, 1, 1, 0),
(168, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:34:55', 1, 1, 1, 1, 3),
(169, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:34:59', 1, 1, 1, 1, 0),
(170, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:34:59', 1, 1, 1, 1, 3),
(171, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:34:59', 1, 1, 1, 1, 0),
(172, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:34:59', 1, 1, 1, 1, 3),
(173, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:35:00', 1, 1, 1, 1, 0),
(174, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:35:00', 1, 1, 1, 1, 3),
(175, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:35:11', 1, 1, 1, 1, 0),
(176, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:35:11', 1, 1, 1, 1, 3),
(177, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:35:13', 1, 1, 1, 1, 0),
(178, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:35:13', 1, 1, 1, 1, 3),
(179, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:35:14', 1, 1, 1, 1, 0),
(180, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:35:14', 1, 1, 1, 1, 3),
(181, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:35:16', 1, 1, 1, 1, 0),
(182, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:35:16', 1, 1, 1, 1, 3),
(183, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:35:17', 1, 1, 1, 1, 0),
(184, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:35:17', 1, 1, 1, 1, 3),
(185, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:35:29', 1, 1, 1, 1, 3),
(186, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:35:29', 1, 1, 1, 1, 0),
(187, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:35:29', 1, 1, 1, 1, 3),
(188, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:35:29', 1, 1, 1, 1, 3),
(189, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:35:29', 1, 1, 1, 1, 0),
(190, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:35:29', 1, 1, 1, 1, 3),
(191, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:35:32', 1, 1, 1, 1, 3),
(192, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:35:32', 1, 1, 1, 1, 0),
(193, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:35:32', 1, 1, 1, 1, 3),
(194, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver   and vehicle mp-09 az 5206', NULL, '2017-09-12 10:35:33', 1, 1, 1, 1, 3),
(195, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:35:33', 1, 1, 1, 1, 0),
(196, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:35:33', 1, 1, 1, 1, 3),
(197, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:37:25', 1, 1, 1, 1, 3),
(198, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:37:25', 1, 1, 1, 1, 0),
(199, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:37:25', 1, 1, 1, 1, 3),
(200, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:37:25', 1, 1, 1, 1, 3),
(201, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:37:25', 1, 1, 1, 1, 0),
(202, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:37:25', 1, 1, 1, 1, 3),
(203, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:37:28', 1, 1, 1, 1, 3),
(204, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:37:28', 1, 1, 1, 1, 0),
(205, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:37:28', 1, 1, 1, 1, 3),
(206, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver   and vehicle mp-09 az 5206', NULL, '2017-09-12 10:37:29', 1, 1, 1, 1, 3),
(207, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:37:29', 1, 1, 1, 1, 0),
(208, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:37:29', 1, 1, 1, 1, 3),
(209, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle ', NULL, '2017-09-12 10:39:43', 1, 1, 1, 1, 3),
(210, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:39:43', 1, 1, 1, 1, 0),
(211, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:39:43', 1, 1, 1, 1, 3),
(212, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:39:44', 1, 1, 1, 1, 3),
(213, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:39:44', 1, 1, 1, 1, 0),
(214, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:39:44', 1, 1, 1, 1, 3),
(215, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:39:46', 1, 1, 1, 1, 3),
(216, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:39:46', 1, 1, 1, 1, 0),
(217, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:39:46', 1, 1, 1, 1, 3),
(218, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver   and vehicle ', NULL, '2017-09-12 10:39:47', 1, 1, 1, 1, 3),
(219, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:39:47', 1, 1, 1, 1, 0),
(220, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:39:47', 1, 1, 1, 1, 3),
(221, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:44:54', 1, 1, 1, 1, 3),
(222, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:44:55', 1, 1, 1, 1, 3),
(223, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:45:13', 1, 1, 1, 1, 3),
(224, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:45:13', 1, 1, 1, 1, 0),
(225, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:45:13', 1, 1, 1, 1, 3),
(226, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:45:14', 1, 1, 1, 1, 3),
(227, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:45:14', 1, 1, 1, 1, 0),
(228, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:45:14', 1, 1, 1, 1, 3),
(229, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:45:17', 1, 1, 1, 1, 3),
(230, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:45:17', 1, 1, 1, 1, 0),
(231, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:45:17', 1, 1, 1, 1, 3),
(232, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:45:18', 1, 1, 1, 1, 3),
(233, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:45:18', 1, 1, 1, 1, 0),
(234, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:45:18', 1, 1, 1, 1, 3),
(235, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:45:22', 1, 1, 1, 1, 3),
(236, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:45:22', 1, 1, 1, 1, 0),
(237, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:45:22', 1, 1, 1, 1, 3),
(238, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver   and vehicle mp-09 az 5206', NULL, '2017-09-12 10:45:25', 1, 1, 1, 1, 3),
(239, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:45:25', 1, 1, 1, 1, 0),
(240, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:45:25', 1, 1, 1, 1, 3),
(241, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:46:57', 1, 1, 1, 1, 0),
(242, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:46:57', 1, 1, 1, 1, 3),
(243, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:46:57', 1, 1, 1, 1, 3),
(244, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:46:57', 1, 1, 1, 1, 0),
(245, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:46:57', 1, 1, 1, 1, 3),
(246, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:47:01', 1, 1, 1, 1, 3),
(247, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:47:01', 1, 1, 1, 1, 0),
(248, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:47:01', 1, 1, 1, 1, 3),
(249, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:47:01', 1, 1, 1, 1, 0),
(250, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:47:01', 1, 1, 1, 1, 3),
(251, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:47:08', 1, 1, 1, 1, 0),
(252, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:47:08', 1, 1, 1, 1, 3),
(253, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:47:08', 1, 1, 1, 1, 3),
(254, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:47:08', 1, 1, 1, 1, 0),
(255, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:47:08', 1, 1, 1, 1, 3),
(256, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:47:09', 1, 1, 1, 1, 3),
(257, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:47:09', 1, 1, 1, 1, 0),
(258, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:47:09', 1, 1, 1, 1, 3),
(259, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:47:10', 1, 1, 1, 1, 0),
(260, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:47:10', 1, 1, 1, 1, 3),
(261, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:48:05', 1, 1, 1, 1, 3),
(262, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:48:05', 1, 1, 1, 1, 0),
(263, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:48:05', 1, 1, 1, 1, 3),
(264, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:48:06', 1, 1, 1, 1, 3),
(265, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:48:06', 1, 1, 1, 1, 0),
(266, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:48:06', 1, 1, 1, 1, 3),
(267, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:48:07', 1, 1, 1, 1, 3),
(268, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:48:07', 1, 1, 1, 1, 0),
(269, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:48:07', 1, 1, 1, 1, 3),
(270, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver   and vehicle mp-09 az 5206', NULL, '2017-09-12 10:48:08', 1, 1, 1, 1, 3),
(271, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:48:08', 1, 1, 1, 1, 0),
(272, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:48:08', 1, 1, 1, 1, 3),
(273, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:51:55', 1, 1, 1, 1, 3),
(274, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:51:55', 1, 1, 1, 1, 0),
(275, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:51:55', 1, 1, 1, 1, 3),
(276, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:51:57', 1, 1, 1, 1, 3),
(277, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:51:57', 1, 1, 1, 1, 0),
(278, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:51:57', 1, 1, 1, 1, 3),
(279, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:56:10', 1, 1, 1, 1, 3),
(280, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:56:10', 1, 1, 1, 1, 0),
(281, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:56:10', 1, 1, 1, 1, 3),
(282, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:56:14', 1, 1, 1, 1, 3),
(283, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:56:14', 1, 1, 1, 1, 0),
(284, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:56:14', 1, 1, 1, 1, 3),
(285, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:56:35', 1, 1, 1, 1, 3),
(286, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:56:35', 1, 1, 1, 1, 0),
(287, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:56:35', 1, 1, 1, 1, 3),
(288, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:56:36', 1, 1, 1, 1, 3),
(289, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:56:36', 1, 1, 1, 1, 0),
(290, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:56:36', 1, 1, 1, 1, 3),
(291, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-12 10:56:36', 1, 1, 1, 1, 3),
(292, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:56:36', 1, 1, 1, 1, 0),
(293, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:56:36', 1, 1, 1, 1, 3),
(294, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver2 Driver and vehicle mp-09 az 5206', NULL, '2017-09-12 10:56:37', 1, 1, 1, 1, 3),
(295, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 10:56:37', 1, 1, 1, 1, 0),
(296, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 10:56:37', 1, 1, 1, 1, 3),
(297, 1, 47, '', 'Order #0035 service info updated successfully', 'order #0035 of customer customer customer service info updated successfully by admin admin', '2017-09-12 10:56:44', 1, 1, 1, 1, 0),
(298, 1, 0, 'order', 'order #0035 of customer customer customer service info updated successfully', NULL, '2017-09-12 10:56:44', 1, 1, 1, 1, 3),
(299, 1, 47, '', 'Order #0035 service info updated successfully', 'order #0035 of customer customer customer service info updated successfully by admin admin', '2017-09-12 10:56:45', 1, 1, 1, 1, 0),
(300, 1, 0, 'order', 'order #0035 of customer customer customer service info updated successfully', NULL, '2017-09-12 10:56:45', 1, 1, 1, 1, 3),
(301, 1, 47, '', 'Order #0035 service info updated successfully', 'order #0035 of customer customer customer service info updated successfully by admin admin', '2017-09-12 10:56:47', 1, 1, 1, 1, 0),
(302, 1, 0, 'order', 'order #0035 of customer customer customer service info updated successfully', NULL, '2017-09-12 10:56:47', 1, 1, 1, 1, 3),
(303, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-12 10:56:57', 1, 1, 1, 1, 0),
(304, 1, 0, 'order', 'Wallet info of customer customer customer updated', NULL, '2017-09-12 10:56:57', 1, 1, 1, 1, 3),
(305, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-12 10:56:58', 1, 1, 1, 1, 0),
(306, 1, 0, 'order', 'Wallet info of customer customer customer updated', NULL, '2017-09-12 10:56:58', 1, 1, 1, 1, 3),
(307, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-12 10:56:59', 1, 1, 1, 1, 0),
(308, 1, 0, 'order', 'Wallet info of customer customer customer updated', NULL, '2017-09-12 10:56:59', 1, 1, 1, 1, 3),
(309, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-12 10:57:00', 1, 1, 1, 1, 0),
(310, 1, 0, 'order', 'Wallet info of customer customer customer updated', NULL, '2017-09-12 10:57:00', 1, 1, 1, 1, 3),
(311, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-12 10:57:16', 1, 1, 1, 1, 0),
(312, 1, 0, 'order', 'Wallet info of customer customer customer updated', NULL, '2017-09-12 10:57:16', 1, 1, 1, 1, 3),
(313, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-12 11:01:42', 1, 1, 1, 1, 0),
(314, 1, 0, 'wallet', 'Wallet info of customer customer customer updated', NULL, '2017-09-12 11:01:42', 1, 1, 1, 1, 3),
(315, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-12 11:01:44', 1, 1, 1, 1, 0),
(316, 1, 0, 'wallet', 'Wallet info of customer customer customer updated', NULL, '2017-09-12 11:01:44', 1, 1, 1, 1, 3),
(317, 1, 47, '', 'Your basic info updated successfully', 'Basic info of customer customer customerupdated successfully', '2017-09-12 11:02:37', 1, 1, 1, 1, 0),
(318, 1, 0, 'Basic info of customer customer customerupdated successfully', '', NULL, '2017-09-12 11:02:37', 1, 1, 1, 1, 3),
(319, 1, 1, '', 'Your basic info updated successfully', 'Basic info of  admin adminupdated successfully', '2017-09-12 11:47:38', 1, 1, 1, 1, 0),
(320, 1, 0, 'party', 'Basic info of  admin adminupdated successfully', NULL, '2017-09-12 11:47:38', 1, 1, 1, 1, 3),
(321, 1, 47, '', 'Your basic info updated successfully', 'Basic info of customer customer customerupdated successfully', '2017-09-12 11:47:54', 1, 1, 1, 1, 0),
(322, 1, 0, 'party', 'Basic info of customer customer customerupdated successfully', NULL, '2017-09-12 11:47:54', 1, 1, 1, 1, 3),
(323, 1, 55, '', 'Your basic info updated successfully', 'Basic info of driver Driver Driverupdated successfully', '2017-09-12 11:48:17', 1, 1, 1, 1, 0),
(324, 1, 0, 'party', 'Basic info of driver Driver Driverupdated successfully', NULL, '2017-09-12 11:48:17', 1, 1, 1, 1, 3),
(325, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 12:13:55', 1, 1, 1, 1, 0),
(326, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 12:13:55', 1, 1, 1, 1, 3),
(327, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 12:13:57', 1, 1, 1, 1, 0),
(328, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 12:13:57', 1, 1, 1, 1, 3),
(329, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 12:14:00', 1, 1, 1, 1, 0),
(330, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 12:14:00', 1, 1, 1, 1, 3),
(331, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 12:14:02', 1, 1, 1, 1, 0),
(332, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 12:14:02', 1, 1, 1, 1, 3),
(333, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-12 12:14:02', 1, 1, 1, 1, 0),
(334, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-12 12:14:02', 1, 1, 1, 1, 3);
INSERT INTO `party_notification` (`notification_id`, `from_party`, `to_party`, `notification_for`, `subject`, `message`, `datetime`, `admin_status`, `customer_status`, `manager_status`, `dogwalker_status`, `status`) VALUES
(335, 49, 1, '', 'fdfwerewrwrwrew', 'Thank You,<br>\r\n                          business business<br>\r\n                          12 Sep, 2017', '2017-09-12 14:40:45', 2, 1, 1, 1, 0),
(336, 49, 1, '', 'dfgdgdf', 'Thank You,<br>\r\n                          business business<br>\r\n                          12 Sep, 2017', '2017-09-12 14:41:17', 0, 1, 1, 1, 0),
(337, 49, 49, '', 'Your basic info updated successfully', 'Basic info of  business businessupdated successfully', '2017-09-12 14:28:19', 1, 1, 1, 1, 0),
(338, 49, 0, 'party', 'Basic info of  business businessupdated successfully', NULL, '2017-09-12 14:28:19', 1, 1, 1, 1, 3),
(339, 49, 49, '', 'Your basic info updated successfully', 'Basic info of  business businessupdated successfully', '2017-09-12 14:28:29', 1, 1, 1, 1, 0),
(340, 49, 0, 'party', 'Basic info of  business businessupdated successfully', NULL, '2017-09-12 14:28:29', 1, 1, 1, 1, 3),
(341, 49, 49, '', 'Your basic info updated successfully', 'Basic info of  business businessupdated successfully', '2017-09-12 14:32:30', 1, 1, 1, 1, 0),
(342, 49, 0, 'party', 'Basic info of  business businessupdated successfully', NULL, '2017-09-12 14:32:30', 1, 1, 1, 1, 3),
(343, 49, 49, '', 'Your basic info updated successfully', 'Basic info of  business businessupdated successfully', '2017-09-12 14:40:29', 0, 1, 1, 1, 0),
(344, 49, 0, 'party', 'Basic info of  business businessupdated successfully', NULL, '2017-09-12 14:36:42', 1, 1, 1, 1, 3),
(345, 49, 49, '', 'Your basic info updated successfully', 'Basic info of  business businessupdated successfully', '2017-09-12 14:40:48', 2, 1, 1, 1, 0),
(346, 49, 0, 'party', 'Basic info of  business businessupdated successfully', NULL, '2017-09-12 14:36:44', 1, 1, 1, 1, 3),
(347, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 03:46:56', 1, 1, 1, 1, 0),
(348, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 03:46:56', 1, 1, 1, 1, 3),
(349, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 03:47:02', 1, 1, 1, 1, 0),
(350, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 03:47:02', 1, 1, 1, 1, 3),
(351, 49, 47, '', 'Order #0035 service info updated successfully', 'order #0035 of customer customer customer service info updated successfully by business business', '2017-09-13 03:47:08', 1, 1, 1, 1, 0),
(352, 49, 0, 'order', 'order #0035 of customer customer customer service info updated successfully', NULL, '2017-09-13 03:47:08', 1, 1, 1, 1, 3),
(353, 49, 47, '', 'Order #0035 service info updated successfully', 'order #0035 of customer customer customer service info updated successfully by business business', '2017-09-13 03:47:09', 1, 1, 1, 1, 0),
(354, 49, 0, 'order', 'order #0035 of customer customer customer service info updated successfully', NULL, '2017-09-13 03:47:09', 1, 1, 1, 1, 3),
(355, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 03:47:14', 1, 1, 1, 1, 0),
(356, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 03:47:14', 1, 1, 1, 1, 3),
(357, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 03:47:15', 1, 1, 1, 1, 0),
(358, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 03:47:15', 1, 1, 1, 1, 3),
(359, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 03:47:19', 1, 1, 1, 1, 0),
(360, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 03:47:19', 1, 1, 1, 1, 3),
(361, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 03:47:19', 1, 1, 1, 1, 0),
(362, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 03:47:19', 1, 1, 1, 1, 3),
(363, 49, 57, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-13 03:51:00', 1, 1, 1, 1, 0),
(364, 49, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-13 03:51:00', 1, 1, 1, 1, 0),
(365, 49, 0, 'Vehicle mp-09 az 5266 of type [van] assigned to Driver Driver2 Driver', '', NULL, '2017-09-13 03:51:00', 1, 1, 1, 1, 3),
(366, 49, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-13 03:51:00', 1, 1, 1, 1, 3),
(367, 49, 55, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-13 03:51:05', 1, 1, 1, 1, 0),
(368, 49, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-13 03:51:05', 1, 1, 1, 1, 0),
(369, 49, 0, 'Vehicle mp-09 az 5266 of type [van] assigned to Driver Driver Driver', '', NULL, '2017-09-13 03:51:05', 1, 1, 1, 1, 3),
(370, 49, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-13 03:51:05', 1, 1, 1, 1, 3),
(371, 49, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:29', 1, 1, 1, 1, 0),
(372, 49, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:29', 1, 1, 1, 1, 0),
(373, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] assigned to Driver Driver2 Driver', '', NULL, '2017-09-13 03:52:29', 1, 1, 1, 1, 3),
(374, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-13 03:52:29', 1, 1, 1, 1, 3),
(375, 49, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:29', 1, 1, 1, 1, 0),
(376, 49, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:29', 1, 1, 1, 1, 0),
(377, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] assigned to Driver Driver2 Driver', '', NULL, '2017-09-13 03:52:29', 1, 1, 1, 1, 3),
(378, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-13 03:52:29', 1, 1, 1, 1, 3),
(379, 49, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:29', 1, 1, 1, 1, 0),
(380, 49, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:29', 1, 1, 1, 1, 0),
(381, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] assigned to Driver Driver2 Driver', '', NULL, '2017-09-13 03:52:29', 1, 1, 1, 1, 3),
(382, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-13 03:52:29', 1, 1, 1, 1, 3),
(383, 49, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:37', 1, 1, 1, 1, 0),
(384, 49, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:37', 1, 1, 1, 1, 0),
(385, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] assigned to Driver Driver2 Driver', '', NULL, '2017-09-13 03:52:37', 1, 1, 1, 1, 3),
(386, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-13 03:52:37', 1, 1, 1, 1, 3),
(387, 49, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:37', 1, 1, 1, 1, 0),
(388, 49, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:37', 1, 1, 1, 1, 0),
(389, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] assigned to Driver Driver2 Driver', '', NULL, '2017-09-13 03:52:37', 1, 1, 1, 1, 3),
(390, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-13 03:52:37', 1, 1, 1, 1, 3),
(391, 49, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:37', 1, 1, 1, 1, 0),
(392, 49, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:37', 1, 1, 1, 1, 0),
(393, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] assigned to Driver Driver2 Driver', '', NULL, '2017-09-13 03:52:37', 1, 1, 1, 1, 3),
(394, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-13 03:52:37', 1, 1, 1, 1, 3),
(395, 49, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:52', 1, 1, 1, 1, 0),
(396, 49, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-13 03:52:52', 1, 1, 1, 1, 0),
(397, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] assigned to Driver Driver2 Driver', '', NULL, '2017-09-13 03:52:52', 1, 1, 1, 1, 3),
(398, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-13 03:52:52', 1, 1, 1, 1, 3),
(399, 49, 0, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-13 04:08:43', 1, 1, 1, 1, 0),
(400, 49, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-13 04:08:43', 1, 1, 1, 1, 0),
(401, 49, 0, 'Vehicle mp-09 az 5266 of type [van] assigned to Driver  ', '', NULL, '2017-09-13 04:08:43', 1, 1, 1, 1, 3),
(402, 49, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-13 04:08:43', 1, 1, 1, 1, 3),
(403, 49, 55, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-13 04:08:49', 1, 1, 1, 1, 0),
(404, 49, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-13 04:08:49', 1, 1, 1, 1, 0),
(405, 49, 0, 'Vehicle mp-09 az 5566 of type [van] assigned to Driver Driver Driver', '', NULL, '2017-09-13 04:08:49', 1, 1, 1, 1, 3),
(406, 49, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-13 04:08:49', 1, 1, 1, 1, 3),
(407, 49, 55, '', 'New Vehicle sfgsddsgsg of type [5.5 ton] Added', 'New Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business assigned you', '2017-09-13 04:24:40', 1, 1, 1, 1, 0),
(408, 49, 49, '', 'New Vehicle sfgsddsgsg of type [5.5 ton] Added', 'New Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info added', '2017-09-13 04:24:40', 1, 1, 1, 1, 0),
(409, 49, 0, 'vehicle', 'New Vehicle sfgsddsgsg of type [5.5 ton] assigned to Driver Driver Driver', NULL, '2017-09-13 04:24:40', 1, 1, 1, 1, 3),
(410, 49, 0, 'vehicle', 'New Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info added', NULL, '2017-09-13 04:24:40', 1, 1, 1, 1, 3),
(411, 49, 55, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:31:00', 1, 1, 1, 1, 0),
(412, 49, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:31:00', 1, 1, 1, 1, 0),
(413, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] assigned to Driver Driver Driver', '', NULL, '2017-09-13 04:31:00', 1, 1, 1, 1, 3),
(414, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:31:00', 1, 1, 1, 1, 3),
(415, 49, 55, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:31:16', 1, 1, 1, 1, 0),
(416, 49, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:31:16', 1, 1, 1, 1, 0),
(417, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] assigned to Driver Driver Driver', '', NULL, '2017-09-13 04:31:16', 1, 1, 1, 1, 3),
(418, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:31:16', 1, 1, 1, 1, 3),
(419, 49, 55, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:32:00', 1, 1, 1, 1, 0),
(420, 49, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:32:00', 1, 1, 1, 1, 0),
(421, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] assigned to Driver Driver Driver', '', NULL, '2017-09-13 04:32:00', 1, 1, 1, 1, 3),
(422, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:32:00', 1, 1, 1, 1, 3),
(423, 49, 55, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:38:55', 1, 1, 1, 1, 0),
(424, 49, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:38:55', 1, 1, 1, 1, 0),
(425, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] assigned to Driver Driver Driver', '', NULL, '2017-09-13 04:38:55', 1, 1, 1, 1, 3),
(426, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:38:55', 1, 1, 1, 1, 3),
(427, 49, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:38:59', 1, 1, 1, 1, 0),
(428, 49, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:38:59', 1, 1, 1, 1, 0),
(429, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] assigned to Driver  ', '', NULL, '2017-09-13 04:38:59', 1, 1, 1, 1, 3),
(430, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:38:59', 1, 1, 1, 1, 3),
(431, 49, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:39:04', 1, 1, 1, 1, 0),
(432, 49, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:39:04', 1, 1, 1, 1, 0),
(433, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] assigned to Driver  ', '', NULL, '2017-09-13 04:39:04', 1, 1, 1, 1, 3),
(434, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:39:04', 1, 1, 1, 1, 3),
(435, 49, 55, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:42:06', 1, 1, 1, 1, 0),
(436, 49, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:42:06', 1, 1, 1, 1, 0),
(437, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:42:06', 1, 1, 1, 1, 3),
(438, 49, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:42:15', 1, 1, 1, 1, 0),
(439, 49, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:42:15', 1, 1, 1, 1, 0),
(440, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:42:15', 1, 1, 1, 1, 3),
(441, 49, 0, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-13 04:42:21', 1, 1, 1, 1, 0),
(442, 49, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-13 04:42:21', 1, 1, 1, 1, 0),
(443, 49, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-13 04:42:21', 1, 1, 1, 1, 3),
(444, 49, 55, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:42:48', 1, 1, 1, 1, 0),
(445, 49, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:42:48', 1, 1, 1, 1, 0),
(446, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:42:48', 1, 1, 1, 1, 3),
(447, 49, 55, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:42:50', 1, 1, 1, 1, 0),
(448, 49, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:42:50', 1, 1, 1, 1, 0),
(449, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:42:50', 1, 1, 1, 1, 3),
(450, 49, 55, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:42:52', 1, 1, 1, 1, 0),
(451, 49, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:42:52', 1, 1, 1, 1, 0),
(452, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:42:52', 1, 1, 1, 1, 3),
(453, 49, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:43:13', 1, 1, 1, 1, 0),
(454, 49, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:43:13', 1, 1, 1, 1, 0),
(455, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:43:13', 1, 1, 1, 1, 3),
(456, 49, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:43:23', 1, 1, 1, 1, 0),
(457, 49, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:43:23', 1, 1, 1, 1, 0),
(458, 49, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:43:23', 1, 1, 1, 1, 3),
(459, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:45:29', 1, 1, 1, 1, 0),
(460, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:45:29', 1, 1, 1, 1, 3),
(461, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:45:34', 1, 1, 1, 1, 0),
(462, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:45:34', 1, 1, 1, 1, 3),
(463, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:45:34', 1, 1, 1, 1, 0),
(464, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:45:34', 1, 1, 1, 1, 3),
(465, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:45:34', 1, 1, 1, 1, 0),
(466, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:45:34', 1, 1, 1, 1, 3),
(467, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:45:36', 1, 1, 1, 1, 0),
(468, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:45:36', 1, 1, 1, 1, 3),
(469, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:45:37', 1, 1, 1, 1, 0),
(470, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:45:37', 1, 1, 1, 1, 3),
(471, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:45:37', 1, 1, 1, 1, 0),
(472, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:45:37', 1, 1, 1, 1, 3),
(473, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:46:37', 1, 1, 1, 1, 0),
(474, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:46:37', 1, 1, 1, 1, 3),
(475, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:46:37', 1, 1, 1, 1, 0),
(476, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:46:37', 1, 1, 1, 1, 3),
(477, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:46:38', 1, 1, 1, 1, 0),
(478, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:46:38', 1, 1, 1, 1, 3),
(479, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:46:39', 1, 1, 1, 1, 0),
(480, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:46:39', 1, 1, 1, 1, 3),
(481, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:46:39', 1, 1, 1, 1, 0),
(482, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:46:39', 1, 1, 1, 1, 3),
(483, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:46:39', 1, 1, 1, 1, 0),
(484, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:46:39', 1, 1, 1, 1, 3),
(485, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:46:53', 1, 1, 1, 1, 0),
(486, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:46:53', 1, 1, 1, 1, 3),
(487, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:47:04', 1, 1, 1, 1, 0),
(488, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:47:04', 1, 1, 1, 1, 3),
(489, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:47:05', 1, 1, 1, 1, 0),
(490, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:47:05', 1, 1, 1, 1, 3),
(491, 49, 47, '', 'Order #0035 service info updated successfully', 'order #0035 of customer customer customer service info updated successfully by business business', '2017-09-13 04:47:06', 1, 1, 1, 1, 0),
(492, 49, 0, 'order', 'order #0035 of customer customer customer service info updated successfully', NULL, '2017-09-13 04:47:06', 1, 1, 1, 1, 3),
(493, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:47:56', 1, 1, 1, 1, 0),
(494, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:47:56', 1, 1, 1, 1, 3),
(495, 49, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 04:48:54', 1, 1, 1, 1, 3),
(496, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:48:54', 1, 1, 1, 1, 0),
(497, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:48:54', 1, 1, 1, 1, 3),
(498, 49, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 04:48:55', 1, 1, 1, 1, 3),
(499, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 04:48:55', 1, 1, 1, 1, 0),
(500, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 04:48:55', 1, 1, 1, 1, 3),
(501, 1, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-13 04:53:51', 1, 1, 1, 1, 0),
(502, 1, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-13 04:53:51', 1, 1, 1, 1, 0),
(503, 1, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-13 04:53:51', 1, 1, 1, 1, 3),
(504, 1, 55, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-13 04:53:56', 1, 1, 1, 1, 0),
(505, 1, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-13 04:53:56', 1, 1, 1, 1, 0),
(506, 1, 0, 'Vehicle mp-09 az 5266 of type [van] assigned to Driver Driver Driver', '', NULL, '2017-09-13 04:53:56', 1, 1, 1, 1, 3),
(507, 1, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-13 04:53:56', 1, 1, 1, 1, 3),
(508, 1, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-13 04:53:58', 1, 1, 1, 1, 0),
(509, 1, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-13 04:53:58', 1, 1, 1, 1, 0),
(510, 1, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-13 04:53:58', 1, 1, 1, 1, 3),
(511, 1, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-13 04:59:55', 1, 1, 1, 1, 0),
(512, 1, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-13 04:59:55', 1, 1, 1, 1, 0),
(513, 1, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-13 04:59:55', 1, 1, 1, 1, 3),
(514, 1, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:59:58', 1, 1, 1, 1, 0),
(515, 1, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:59:58', 1, 1, 1, 1, 0),
(516, 1, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:59:58', 1, 1, 1, 1, 3),
(517, 1, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:59:59', 1, 1, 1, 1, 0),
(518, 1, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-13 04:59:59', 1, 1, 1, 1, 0),
(519, 1, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-13 04:59:59', 1, 1, 1, 1, 3),
(520, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:00:38', 1, 1, 1, 1, 0),
(521, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:00:38', 1, 1, 1, 1, 3),
(522, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:38:06', 1, 1, 1, 1, 3),
(523, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:38:06', 1, 1, 1, 1, 0),
(524, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:38:07', 1, 1, 1, 1, 3),
(525, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:38:07', 1, 1, 1, 1, 3),
(526, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:38:07', 1, 1, 1, 1, 0),
(527, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:38:07', 1, 1, 1, 1, 3),
(528, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-13 05:38:45', 1, 1, 1, 1, 0),
(529, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-13 05:38:45', 1, 1, 1, 1, 3),
(530, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-13 05:38:47', 1, 1, 1, 1, 0),
(531, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-13 05:38:47', 1, 1, 1, 1, 3),
(532, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:40:38', 1, 1, 1, 1, 0),
(533, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:40:38', 1, 1, 1, 1, 3),
(534, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:40:39', 1, 1, 1, 1, 0),
(535, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:40:39', 1, 1, 1, 1, 3),
(536, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:41:01', 1, 1, 1, 1, 0),
(537, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:41:01', 1, 1, 1, 1, 3),
(538, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:41:02', 1, 1, 1, 1, 0),
(539, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:41:02', 1, 1, 1, 1, 3),
(540, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:41:50', 1, 1, 1, 1, 3),
(541, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:41:50', 1, 1, 1, 1, 0),
(542, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:41:50', 1, 1, 1, 1, 3),
(543, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:41:50', 1, 1, 1, 1, 3),
(544, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:41:50', 1, 1, 1, 1, 0),
(545, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:41:50', 1, 1, 1, 1, 3),
(546, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:41:52', 1, 1, 1, 1, 3),
(547, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:41:52', 1, 1, 1, 1, 0),
(548, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:41:52', 1, 1, 1, 1, 3),
(549, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:41:53', 1, 1, 1, 1, 3),
(550, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:41:53', 1, 1, 1, 1, 0),
(551, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:41:53', 1, 1, 1, 1, 3),
(552, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:00', 1, 1, 1, 1, 0),
(553, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:00', 1, 1, 1, 1, 3),
(554, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:01', 1, 1, 1, 1, 0),
(555, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:01', 1, 1, 1, 1, 3),
(556, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:04', 1, 1, 1, 1, 0),
(557, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:04', 1, 1, 1, 1, 3),
(558, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:04', 1, 1, 1, 1, 0),
(559, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:04', 1, 1, 1, 1, 3),
(560, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:42:07', 1, 1, 1, 1, 3),
(561, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:07', 1, 1, 1, 1, 0),
(562, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:07', 1, 1, 1, 1, 3),
(563, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:42:07', 1, 1, 1, 1, 3),
(564, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:07', 1, 1, 1, 1, 0),
(565, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:07', 1, 1, 1, 1, 3),
(566, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:42:19', 1, 1, 1, 1, 3),
(567, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:19', 1, 1, 1, 1, 0),
(568, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:19', 1, 1, 1, 1, 3),
(569, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:42:19', 1, 1, 1, 1, 3),
(570, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:19', 1, 1, 1, 1, 0),
(571, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:19', 1, 1, 1, 1, 3),
(572, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:20', 1, 1, 1, 1, 0),
(573, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:20', 1, 1, 1, 1, 3),
(574, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:21', 1, 1, 1, 1, 0),
(575, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:21', 1, 1, 1, 1, 3),
(576, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:42:22', 1, 1, 1, 1, 3),
(577, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:22', 1, 1, 1, 1, 0),
(578, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:22', 1, 1, 1, 1, 3),
(579, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-13 05:42:23', 1, 1, 1, 1, 3),
(580, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:42:23', 1, 1, 1, 1, 0),
(581, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:42:23', 1, 1, 1, 1, 3),
(582, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:33', 1, 1, 1, 1, 0),
(583, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:33', 1, 1, 1, 1, 3),
(584, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:34', 1, 1, 1, 1, 0),
(585, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:34', 1, 1, 1, 1, 3),
(586, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:53:35', 1, 1, 1, 1, 3),
(587, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:35', 1, 1, 1, 1, 0),
(588, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:35', 1, 1, 1, 1, 3),
(589, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-13 05:53:36', 1, 1, 1, 1, 3),
(590, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:36', 1, 1, 1, 1, 0),
(591, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:36', 1, 1, 1, 1, 3),
(592, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-13 05:53:44', 1, 1, 1, 1, 3),
(593, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:44', 1, 1, 1, 1, 0),
(594, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:44', 1, 1, 1, 1, 3),
(595, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:53:45', 1, 1, 1, 1, 3),
(596, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:45', 1, 1, 1, 1, 0),
(597, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:45', 1, 1, 1, 1, 3),
(598, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:48', 1, 1, 1, 1, 0),
(599, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:48', 1, 1, 1, 1, 3),
(600, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:49', 1, 1, 1, 1, 0),
(601, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:49', 1, 1, 1, 1, 3),
(602, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:51', 1, 1, 1, 1, 0),
(603, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:51', 1, 1, 1, 1, 3),
(604, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:51', 1, 1, 1, 1, 0),
(605, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:51', 1, 1, 1, 1, 3),
(606, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:53:53', 1, 1, 1, 1, 3),
(607, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:53', 1, 1, 1, 1, 0),
(608, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:53', 1, 1, 1, 1, 3),
(609, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 05:53:54', 1, 1, 1, 1, 3),
(610, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:54', 1, 1, 1, 1, 0),
(611, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:54', 1, 1, 1, 1, 3),
(612, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:56', 1, 1, 1, 1, 0),
(613, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:56', 1, 1, 1, 1, 3),
(614, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:53:59', 1, 1, 1, 1, 0),
(615, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:53:59', 1, 1, 1, 1, 3),
(616, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:54:00', 1, 1, 1, 1, 0),
(617, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:54:00', 1, 1, 1, 1, 3),
(618, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:56:30', 1, 1, 1, 1, 0),
(619, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:56:30', 1, 1, 1, 1, 3),
(620, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 05:56:31', 1, 1, 1, 1, 0),
(621, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 05:56:31', 1, 1, 1, 1, 3),
(622, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-13 06:02:50', 1, 1, 1, 1, 3),
(623, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:02:50', 1, 1, 1, 1, 0),
(624, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:02:50', 1, 1, 1, 1, 3),
(625, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-13 06:02:51', 1, 1, 1, 1, 3),
(626, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:02:51', 1, 1, 1, 1, 0),
(627, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:02:51', 1, 1, 1, 1, 3),
(628, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-13 06:03:29', 1, 1, 1, 1, 3),
(629, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:29', 1, 1, 1, 1, 0),
(630, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:29', 1, 1, 1, 1, 3),
(631, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-13 06:03:40', 1, 1, 1, 1, 3),
(632, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:40', 1, 1, 1, 1, 0),
(633, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:40', 1, 1, 1, 1, 3),
(634, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 06:03:41', 1, 1, 1, 1, 3),
(635, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:41', 1, 1, 1, 1, 0),
(636, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:41', 1, 1, 1, 1, 3),
(637, 1, 0, 'order', 'order #0035 of customer customer customer allocated Business Owner business business', NULL, '2017-09-13 06:03:45', 1, 1, 1, 1, 3),
(638, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:45', 1, 1, 1, 1, 0),
(639, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:45', 1, 1, 1, 1, 3),
(640, 1, 0, 'order', 'order #0035 of customer customer customer Business Owner removed', NULL, '2017-09-13 06:03:46', 1, 1, 1, 1, 3),
(641, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:46', 1, 1, 1, 1, 0),
(642, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:46', 1, 1, 1, 1, 3),
(643, 1, 0, 'order', 'order #0035 of customer customer customer Business Owner removed', NULL, '2017-09-13 06:03:47', 1, 1, 1, 1, 3),
(644, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:47', 1, 1, 1, 1, 0),
(645, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:47', 1, 1, 1, 1, 3),
(646, 1, 0, 'order', 'order #0035 of customer customer customer allocated Business Owner business business', NULL, '2017-09-13 06:03:48', 1, 1, 1, 1, 3),
(647, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:48', 1, 1, 1, 1, 0),
(648, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:48', 1, 1, 1, 1, 3),
(649, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 06:03:49', 1, 1, 1, 1, 3),
(650, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:49', 1, 1, 1, 1, 0);
INSERT INTO `party_notification` (`notification_id`, `from_party`, `to_party`, `notification_for`, `subject`, `message`, `datetime`, `admin_status`, `customer_status`, `manager_status`, `dogwalker_status`, `status`) VALUES
(651, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:49', 1, 1, 1, 1, 3),
(652, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-13 06:03:50', 1, 1, 1, 1, 3),
(653, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:50', 1, 1, 1, 1, 0),
(654, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:50', 1, 1, 1, 1, 3),
(655, 1, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-13 06:03:51', 1, 1, 1, 1, 3),
(656, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:51', 1, 1, 1, 1, 0),
(657, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:51', 1, 1, 1, 1, 3),
(658, 1, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 06:03:52', 1, 1, 1, 1, 3),
(659, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:03:52', 1, 1, 1, 1, 0),
(660, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:03:52', 1, 1, 1, 1, 3),
(661, 1, 0, 'order', 'order #0035 of customer customer customer allocated Business Owner business business', NULL, '2017-09-13 06:04:50', 1, 1, 1, 1, 3),
(662, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:04:50', 1, 1, 1, 1, 0),
(663, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:04:50', 1, 1, 1, 1, 3),
(664, 1, 0, 'order', 'order #0035 of customer customer customer Business Owner removed', NULL, '2017-09-13 06:04:51', 1, 1, 1, 1, 3),
(665, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:04:51', 1, 1, 1, 1, 0),
(666, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:04:51', 1, 1, 1, 1, 3),
(667, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 06:16:30', 1, 1, 1, 1, 0),
(668, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 06:16:30', 1, 1, 1, 1, 3),
(669, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 08:04:07', 1, 1, 1, 1, 3),
(670, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 08:04:07', 1, 1, 1, 1, 0),
(671, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 08:13:14', 1, 1, 1, 1, 3),
(672, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 08:13:14', 1, 1, 1, 1, 0),
(673, 49, 0, 'order', 'Apply for order #00', NULL, '2017-09-13 08:18:06', 1, 1, 1, 1, 3),
(674, 49, 1, '', 'Applyed bid for order #00 by Business owner business business', '', '2017-09-13 08:18:06', 1, 1, 1, 1, 0),
(675, 49, 0, 'order', 'Apply for order #00', NULL, '2017-09-13 08:18:09', 1, 1, 1, 1, 3),
(676, 49, 1, '', 'Applyed bid for order #00 by Business owner business business', '', '2017-09-13 08:18:09', 1, 1, 1, 1, 0),
(677, 49, 0, 'order', 'Apply for order #00', NULL, '2017-09-13 08:19:18', 1, 1, 1, 1, 3),
(678, 49, 1, '', 'Applyed bid for order #00 by Business owner business business', '', '2017-09-13 08:19:18', 1, 1, 1, 1, 0),
(679, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 08:25:14', 1, 1, 1, 1, 3),
(680, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 08:25:14', 1, 1, 1, 1, 0),
(681, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 09:20:13', 1, 1, 1, 1, 3),
(682, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 09:20:13', 1, 1, 1, 1, 0),
(683, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 09:21:17', 1, 1, 1, 1, 3),
(684, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 09:21:17', 1, 1, 1, 1, 0),
(685, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 09:21:39', 1, 1, 1, 1, 3),
(686, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 09:21:39', 1, 1, 1, 1, 0),
(687, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 09:37:12', 1, 1, 1, 1, 3),
(688, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 09:37:12', 1, 1, 1, 1, 0),
(689, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 09:41:32', 1, 1, 1, 1, 3),
(690, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 09:41:32', 1, 1, 1, 1, 0),
(691, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 09:44:41', 1, 1, 1, 1, 3),
(692, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 09:44:41', 1, 1, 1, 1, 0),
(693, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 09:45:38', 1, 1, 1, 1, 3),
(694, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 09:45:38', 1, 1, 1, 1, 0),
(695, 49, 0, 'order', 'Apply for order #0035', NULL, '2017-09-13 09:46:32', 1, 1, 1, 1, 3),
(696, 49, 1, '', 'Applyed bid for order #0035 by Business owner business business', '', '2017-09-13 09:46:32', 1, 1, 1, 1, 0),
(697, 1, 49, '', 'New Order #0035 assigned', 'New Order #0035 assigned to business owner   by admin admin', '2017-09-13 09:50:30', 1, 1, 1, 1, 0),
(698, 1, 0, 'order', 'order #0035 assigned to business owner  ', NULL, '2017-09-13 09:50:30', 1, 1, 1, 1, 3),
(699, 1, 49, '', 'New Order #0035 assigned', 'New Order #0035 assigned to business owner business business by admin admin', '2017-09-13 09:51:00', 1, 1, 1, 1, 0),
(700, 1, 0, 'order', 'order #0035 assigned to business owner business business', NULL, '2017-09-13 09:51:00', 1, 1, 1, 1, 3),
(701, 49, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 09:54:56', 1, 1, 1, 1, 3),
(702, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:54:56', 1, 1, 1, 1, 0),
(703, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:54:56', 1, 1, 1, 1, 3),
(704, 49, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 09:54:57', 1, 1, 1, 1, 3),
(705, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:54:57', 1, 1, 1, 1, 0),
(706, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:54:57', 1, 1, 1, 1, 3),
(707, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:55:09', 1, 1, 1, 1, 0),
(708, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:55:09', 1, 1, 1, 1, 3),
(709, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:55:32', 1, 1, 1, 1, 0),
(710, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:55:32', 1, 1, 1, 1, 3),
(711, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:55:32', 1, 1, 1, 1, 0),
(712, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:55:32', 1, 1, 1, 1, 3),
(713, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:55:32', 1, 1, 1, 1, 0),
(714, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:55:32', 1, 1, 1, 1, 3),
(715, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:56:16', 1, 1, 1, 1, 0),
(716, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:56:16', 1, 1, 1, 1, 3),
(717, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:56:17', 1, 1, 1, 1, 0),
(718, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:56:17', 1, 1, 1, 1, 3),
(719, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:56:17', 1, 1, 1, 1, 0),
(720, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:56:17', 1, 1, 1, 1, 3),
(721, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:56:18', 1, 1, 1, 1, 0),
(722, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:56:18', 1, 1, 1, 1, 3),
(723, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:56:18', 1, 1, 1, 1, 0),
(724, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:56:18', 1, 1, 1, 1, 3),
(725, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:56:18', 1, 1, 1, 1, 0),
(726, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:56:18', 1, 1, 1, 1, 3),
(727, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:56:48', 1, 1, 1, 1, 0),
(728, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:56:48', 1, 1, 1, 1, 3),
(729, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:58:30', 1, 1, 1, 1, 0),
(730, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:58:30', 1, 1, 1, 1, 3),
(731, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 09:59:42', 1, 1, 1, 1, 0),
(732, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 09:59:42', 1, 1, 1, 1, 3),
(733, 1, 49, '', 'New Order #0035 assigned', 'New Order #0035 assigned to business owner business business by admin admin', '2017-09-13 10:00:52', 1, 1, 1, 1, 0),
(734, 1, 0, 'order', 'order #0035 assigned to business owner business business', NULL, '2017-09-13 10:00:52', 1, 1, 1, 1, 3),
(735, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:01:01', 1, 1, 1, 1, 0),
(736, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:01:01', 1, 1, 1, 1, 3),
(737, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:01:02', 1, 1, 1, 1, 0),
(738, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:01:02', 1, 1, 1, 1, 3),
(739, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:01:03', 1, 1, 1, 1, 0),
(740, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:01:03', 1, 1, 1, 1, 3),
(741, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:01:03', 1, 1, 1, 1, 0),
(742, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:01:03', 1, 1, 1, 1, 3),
(743, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:01:15', 1, 1, 1, 1, 0),
(744, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:01:15', 1, 1, 1, 1, 3),
(745, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:01:17', 1, 1, 1, 1, 0),
(746, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:01:17', 1, 1, 1, 1, 3),
(747, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:01:18', 1, 1, 1, 1, 0),
(748, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:01:18', 1, 1, 1, 1, 3),
(749, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:01:19', 1, 1, 1, 1, 0),
(750, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:01:19', 1, 1, 1, 1, 3),
(751, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:01:20', 1, 1, 1, 1, 0),
(752, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:01:20', 1, 1, 1, 1, 3),
(753, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:03:06', 1, 1, 1, 1, 0),
(754, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:03:06', 1, 1, 1, 1, 3),
(755, 49, 0, 'order', 'order #0035 of customer customer customer driver removed', NULL, '2017-09-13 10:03:19', 1, 1, 1, 1, 3),
(756, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:03:19', 1, 1, 1, 1, 0),
(757, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:03:19', 1, 1, 1, 1, 3),
(758, 49, 0, 'order', 'order #0035 of customer customer customer allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-13 10:03:20', 1, 1, 1, 1, 3),
(759, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:03:20', 1, 1, 1, 1, 0),
(760, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:03:20', 1, 1, 1, 1, 3),
(761, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 10:08:39', 1, 1, 1, 1, 0),
(762, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:08:39', 1, 1, 1, 1, 3),
(763, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:09:57', 1, 1, 1, 1, 0),
(764, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:09:57', 1, 1, 1, 1, 3),
(765, 49, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully bybusiness business', '2017-09-13 10:10:04', 1, 1, 1, 1, 0),
(766, 49, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:10:04', 1, 1, 1, 1, 3),
(767, 49, 55, '', 'Your basic info updated successfully', 'Basic info of driver Driver Driver updated successfully', '2017-09-13 10:11:52', 1, 1, 1, 1, 0),
(768, 49, 0, 'party', 'Basic info of driver Driver Driver updated successfully', NULL, '2017-09-13 10:11:52', 1, 1, 1, 1, 3),
(769, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 10:54:54', 1, 1, 1, 1, 0),
(770, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:54:54', 1, 1, 1, 1, 3),
(771, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 10:57:26', 1, 1, 1, 1, 0),
(772, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:57:26', 1, 1, 1, 1, 3),
(773, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 10:58:22', 1, 1, 1, 1, 0),
(774, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:58:22', 1, 1, 1, 1, 3),
(775, 1, 47, '', 'Order #0035 info updated successfully', 'order #0035 of customer customer customer info updated successfully byadmin admin', '2017-09-13 10:58:23', 1, 1, 1, 1, 0),
(776, 1, 0, 'order', 'order #0035 of customer customer customer updated successfully', NULL, '2017-09-13 10:58:23', 1, 1, 1, 1, 3),
(777, 1, 1, '', 'Your basic info updated successfully', 'Basic info of  admin admin updated successfully', '2017-09-15 03:55:50', 1, 1, 1, 1, 0),
(778, 1, 0, 'party', 'Basic info of  admin admin updated successfully', NULL, '2017-09-15 03:55:50', 1, 1, 1, 1, 3),
(779, 1, 58, '', 'Welcome, Your registration info added successfully', 'Welcome, <br>Your registration info added successfully for customer', '2017-09-15 04:08:13', 1, 1, 1, 1, 0),
(780, 1, 0, 'party', 'New customer info with name sudeep jainadded successfully', NULL, '2017-09-15 04:08:13', 1, 1, 1, 1, 3),
(781, 1, 0, 'delete', 'Info of customer customer customer deleted by admin admin', NULL, '2017-09-15 04:08:49', 1, 1, 1, 1, 3),
(782, 1, 0, 'delete', 'Info of driver Driver Driver deleted by admin admin', NULL, '2017-09-15 04:10:08', 1, 1, 1, 1, 3),
(783, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:21:22', 1, 1, 1, 1, 0),
(784, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:21:22', 1, 1, 1, 1, 0),
(785, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:21:22', 1, 1, 1, 1, 3),
(786, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:22:20', 1, 1, 1, 1, 0),
(787, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:22:20', 1, 1, 1, 1, 0),
(788, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:22:20', 1, 1, 1, 1, 3),
(789, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:22:25', 1, 1, 1, 1, 0),
(790, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:22:25', 1, 1, 1, 1, 0),
(791, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:22:25', 1, 1, 1, 1, 3),
(792, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:22:29', 1, 1, 1, 1, 0),
(793, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:22:29', 1, 1, 1, 1, 0),
(794, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:22:29', 1, 1, 1, 1, 3),
(795, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:22:34', 1, 1, 1, 1, 0),
(796, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:22:34', 1, 1, 1, 1, 0),
(797, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:22:34', 1, 1, 1, 1, 3),
(798, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:24:16', 1, 1, 1, 1, 0),
(799, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:24:16', 1, 1, 1, 1, 0),
(800, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:24:16', 1, 1, 1, 1, 3),
(801, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:24:20', 1, 1, 1, 1, 0),
(802, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:24:20', 1, 1, 1, 1, 0),
(803, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:24:20', 1, 1, 1, 1, 3),
(804, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:36:34', 1, 1, 1, 1, 0),
(805, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:36:34', 1, 1, 1, 1, 0),
(806, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:36:34', 1, 1, 1, 1, 3),
(807, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:38:17', 1, 1, 1, 1, 0),
(808, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:38:17', 1, 1, 1, 1, 0),
(809, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:38:17', 1, 1, 1, 1, 3),
(810, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:38:22', 1, 1, 1, 1, 0),
(811, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:38:22', 1, 1, 1, 1, 0),
(812, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:38:22', 1, 1, 1, 1, 3),
(813, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:38:42', 1, 1, 1, 1, 0),
(814, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:38:42', 1, 1, 1, 1, 0),
(815, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:38:42', 1, 1, 1, 1, 3),
(816, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:39:08', 1, 1, 1, 1, 0),
(817, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:39:08', 1, 1, 1, 1, 0),
(818, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:39:08', 1, 1, 1, 1, 3),
(819, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:39:13', 1, 1, 1, 1, 0),
(820, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:39:13', 1, 1, 1, 1, 0),
(821, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:39:13', 1, 1, 1, 1, 3),
(822, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:39:45', 1, 1, 1, 1, 0),
(823, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:39:45', 1, 1, 1, 1, 0),
(824, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:39:45', 1, 1, 1, 1, 3),
(825, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:40:31', 1, 1, 1, 1, 0),
(826, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:40:31', 1, 1, 1, 1, 0),
(827, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:40:31', 1, 1, 1, 1, 3),
(828, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:40:35', 1, 1, 1, 1, 0),
(829, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:40:35', 1, 1, 1, 1, 0),
(830, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:40:35', 1, 1, 1, 1, 3),
(831, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:41:05', 1, 1, 1, 1, 0),
(832, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:41:05', 1, 1, 1, 1, 0),
(833, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:41:05', 1, 1, 1, 1, 3),
(834, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:41:29', 1, 1, 1, 1, 0),
(835, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:41:29', 1, 1, 1, 1, 0),
(836, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:41:29', 1, 1, 1, 1, 3),
(837, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:41:33', 1, 1, 1, 1, 0),
(838, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:41:33', 1, 1, 1, 1, 0),
(839, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:41:33', 1, 1, 1, 1, 3),
(840, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:42:33', 1, 1, 1, 1, 0),
(841, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:42:33', 1, 1, 1, 1, 0),
(842, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:42:33', 1, 1, 1, 1, 3),
(843, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:42:39', 1, 1, 1, 1, 0),
(844, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:42:39', 1, 1, 1, 1, 0),
(845, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:42:39', 1, 1, 1, 1, 3),
(846, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:42:51', 1, 1, 1, 1, 0),
(847, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:42:51', 1, 1, 1, 1, 0),
(848, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:42:51', 1, 1, 1, 1, 3),
(849, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:43:07', 1, 1, 1, 1, 0),
(850, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:43:07', 1, 1, 1, 1, 0),
(851, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:43:07', 1, 1, 1, 1, 3),
(852, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:43:27', 1, 1, 1, 1, 0),
(853, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:43:27', 1, 1, 1, 1, 0),
(854, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:43:27', 1, 1, 1, 1, 3),
(855, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:43:31', 1, 1, 1, 1, 0),
(856, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:43:31', 1, 1, 1, 1, 0),
(857, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:43:31', 1, 1, 1, 1, 3),
(858, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:44:17', 1, 1, 1, 1, 0),
(859, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:44:17', 1, 1, 1, 1, 0),
(860, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:44:17', 1, 1, 1, 1, 3),
(861, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:44:20', 1, 1, 1, 1, 0),
(862, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:44:20', 1, 1, 1, 1, 0),
(863, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:44:20', 1, 1, 1, 1, 3),
(864, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:44:24', 1, 1, 1, 1, 0),
(865, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:44:24', 1, 1, 1, 1, 0),
(866, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:44:24', 1, 1, 1, 1, 3),
(867, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:55:53', 1, 1, 1, 1, 0),
(868, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:55:53', 1, 1, 1, 1, 0),
(869, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:55:53', 1, 1, 1, 1, 3),
(870, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:55:59', 1, 1, 1, 1, 0),
(871, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:55:59', 1, 1, 1, 1, 0),
(872, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:55:59', 1, 1, 1, 1, 3),
(873, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:56:27', 1, 1, 1, 1, 0),
(874, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:56:27', 1, 1, 1, 1, 0),
(875, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:56:27', 1, 1, 1, 1, 3),
(876, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:56:41', 1, 1, 1, 1, 0),
(877, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:56:41', 1, 1, 1, 1, 0),
(878, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:56:41', 1, 1, 1, 1, 3),
(879, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:56:44', 1, 1, 1, 1, 0),
(880, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:56:44', 1, 1, 1, 1, 0),
(881, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:56:44', 1, 1, 1, 1, 3),
(882, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:57:01', 1, 1, 1, 1, 0),
(883, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:57:01', 1, 1, 1, 1, 0),
(884, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:57:01', 1, 1, 1, 1, 3),
(885, 1, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 04:57:03', 1, 1, 1, 1, 0),
(886, 1, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by admin admin', '2017-09-15 04:57:03', 1, 1, 1, 1, 0),
(887, 1, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 04:57:03', 1, 1, 1, 1, 3),
(888, 1, 59, '', 'Welcome, Your registration info added successfully', 'Welcome, <br>Your registration info added successfully for driver', '2017-09-15 04:57:38', 1, 1, 1, 1, 0),
(889, 1, 49, '', 'basic info of driver dsfsdfsdf 4234updated successfully', 'Basic info of driver dsfsdfsdf 4234 updated successfully', '2017-09-15 04:57:38', 1, 1, 1, 1, 0),
(890, 1, 0, 'party', 'New driver info with name dsfsdfsdf 4234added successfully', NULL, '2017-09-15 04:57:38', 1, 1, 1, 1, 3),
(891, 1, 59, '', 'Your basic info updated successfully', 'Basic info of driver dsfsdfsdf 4234updated successfully', '2017-09-15 04:57:42', 1, 1, 1, 1, 0),
(892, 1, 49, '', 'basic info of driver driver dsfsdfsdf updated successfully', 'Basic info of driver driver dsfsdfsdf updated successfully by admin admin', '2017-09-15 04:57:42', 1, 1, 1, 1, 0),
(893, 1, 0, 'party', 'Basic info of driver dsfsdfsdf 4234 updated successfully', NULL, '2017-09-15 04:57:42', 1, 1, 1, 1, 3),
(894, 1, 59, '', 'Your basic info updated successfully', 'Basic info of driver dsfsdfsdf 4234updated successfully', '2017-09-15 04:57:45', 1, 1, 1, 1, 0),
(895, 1, 49, '', 'basic info of driver driver dsfsdfsdf updated successfully', 'Basic info of driver driver dsfsdfsdf updated successfully by admin admin', '2017-09-15 04:57:45', 1, 1, 1, 1, 0),
(896, 1, 0, 'party', 'Basic info of driver dsfsdfsdf 4234 updated successfully', NULL, '2017-09-15 04:57:45', 1, 1, 1, 1, 3),
(897, 1, 0, 'delete', 'Info of driver dsfsdfsdf 4234 deleted by admin admin', NULL, '2017-09-15 04:57:47', 1, 1, 1, 1, 3),
(898, 1, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 05:07:22', 1, 1, 1, 1, 0),
(899, 1, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 05:07:22', 1, 1, 1, 1, 0),
(900, 1, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-15 05:07:22', 1, 1, 1, 1, 3),
(901, 1, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:07:24', 1, 1, 1, 1, 0),
(902, 1, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:07:24', 1, 1, 1, 1, 0),
(903, 1, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 05:07:24', 1, 1, 1, 1, 3),
(904, 1, 55, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-15 05:07:33', 1, 1, 1, 1, 0),
(905, 1, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-15 05:07:33', 1, 1, 1, 1, 0),
(906, 1, 0, 'Vehicle mp-09 az 5266 of type [van] assigned to Driver Driver Driver', '', NULL, '2017-09-15 05:07:33', 1, 1, 1, 1, 3),
(907, 1, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-15 05:07:33', 1, 1, 1, 1, 3),
(908, 1, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 05:08:54', 1, 1, 1, 1, 0),
(909, 1, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 05:08:54', 1, 1, 1, 1, 0),
(910, 1, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-15 05:08:54', 1, 1, 1, 1, 3),
(911, 1, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:09:02', 1, 1, 1, 1, 0),
(912, 1, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:09:02', 1, 1, 1, 1, 0),
(913, 1, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 05:09:02', 1, 1, 1, 1, 3),
(914, 1, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 05:10:15', 1, 1, 1, 1, 0),
(915, 1, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 05:10:15', 1, 1, 1, 1, 0),
(916, 1, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-15 05:10:15', 1, 1, 1, 1, 3),
(917, 1, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:10:19', 1, 1, 1, 1, 0),
(918, 1, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:10:19', 1, 1, 1, 1, 0),
(919, 1, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 05:10:19', 1, 1, 1, 1, 3),
(920, 1, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:11:12', 1, 1, 1, 1, 0),
(921, 1, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:11:12', 1, 1, 1, 1, 0),
(922, 1, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 05:11:12', 1, 1, 1, 1, 3),
(923, 1, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:11:15', 1, 1, 1, 1, 0),
(924, 1, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:11:15', 1, 1, 1, 1, 0),
(925, 1, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 05:11:15', 1, 1, 1, 1, 3),
(926, 1, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:12:02', 1, 1, 1, 1, 0),
(927, 1, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:12:02', 1, 1, 1, 1, 0),
(928, 1, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 05:12:02', 1, 1, 1, 1, 3),
(929, 1, 55, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-15 05:12:06', 1, 1, 1, 1, 0),
(930, 1, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-15 05:12:06', 1, 1, 1, 1, 0),
(931, 1, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-15 05:12:06', 1, 1, 1, 1, 3),
(932, 1, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:18:23', 1, 1, 1, 1, 0),
(933, 1, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:18:23', 1, 1, 1, 1, 0),
(934, 1, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 05:18:23', 1, 1, 1, 1, 3),
(935, 1, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:18:23', 1, 1, 1, 1, 0),
(936, 1, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:18:23', 1, 1, 1, 1, 0),
(937, 1, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 05:18:23', 1, 1, 1, 1, 3),
(938, 1, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:19:18', 1, 1, 1, 1, 0),
(939, 1, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:19:18', 1, 1, 1, 1, 0),
(940, 1, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 05:19:18', 1, 1, 1, 1, 3),
(941, 1, 0, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:19:18', 1, 1, 1, 1, 0),
(942, 1, 49, '', 'Vehicle sfgsddsgsg of type [5.5 ton] updated', 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '2017-09-15 05:19:18', 1, 1, 1, 1, 0),
(943, 1, 0, 'Vehicle sfgsddsgsg of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 05:19:18', 1, 1, 1, 1, 3),
(944, 1, 0, 'order', 'Order additional service  lalamove  updated in system by admin admin', NULL, '2017-09-15 05:25:11', 1, 1, 1, 1, 3),
(945, 1, 0, 'order', 'Order additional service  lalamove  updated in system by admin admin', NULL, '2017-09-15 05:25:13', 1, 1, 1, 1, 3),
(946, 1, 0, 'order', 'Order additional service  free  updated in system by admin admin', NULL, '2017-09-15 05:35:16', 1, 1, 1, 1, 3),
(947, 1, 0, 'order', 'Order additional service  lalamove  updated in system by admin admin', NULL, '2017-09-15 05:35:18', 1, 1, 1, 1, 3),
(948, 1, 0, 'order', 'Order additional service  TATAPROMO  updated in system by admin admin', NULL, '2017-09-15 05:35:20', 1, 1, 1, 1, 3),
(949, 1, 0, 'order', 'Order additional service  TATAPROMO  updated in system by admin admin', NULL, '2017-09-15 05:36:46', 1, 1, 1, 1, 3),
(950, 1, 0, 'order', 'Order additional service  TATAPROMO  updated in system by admin admin', NULL, '2017-09-15 05:36:48', 1, 1, 1, 1, 3),
(951, 1, 0, 'service', 'Order additional service wqerwr added in system by admin admin', NULL, '2017-09-15 05:37:12', 1, 1, 1, 1, 3),
(952, 1, 0, 'order', 'Order additional service  updated in system by admin admin', NULL, '2017-09-15 05:37:16', 1, 1, 1, 1, 3),
(953, 1, 0, 'service', 'Order additional service 454 added in system by admin admin', NULL, '2017-09-15 05:37:29', 1, 1, 1, 1, 3),
(954, 1, 0, 'order', 'Order additional service  TATAPROMO  updated in system by admin admin', NULL, '2017-09-15 05:37:36', 1, 1, 1, 1, 3),
(955, 1, 0, 'order', 'Order additional service  updated in system by admin admin', NULL, '2017-09-15 05:37:40', 1, 1, 1, 1, 3),
(956, 1, 0, 'order', 'Order additional service 454 updated in system by admin admin', NULL, '2017-09-15 05:38:26', 1, 1, 1, 1, 3),
(957, 1, 0, 'service', 'Order additional service retretert added in system by admin admin', NULL, '2017-09-15 05:38:37', 1, 1, 1, 1, 3),
(958, 1, 0, 'order', 'Order additional service retretert updated in system by admin admin', NULL, '2017-09-15 05:38:44', 1, 1, 1, 1, 3),
(959, 1, 0, 'order', 'Order additional service  updated in system by admin admin', NULL, '2017-09-15 05:38:48', 1, 1, 1, 1, 3),
(960, 1, 0, 'order', 'Order additional service  updated in system by admin admin', NULL, '2017-09-15 05:38:49', 1, 1, 1, 1, 3),
(961, 1, 0, 'order', 'Order additional service  updated in system by admin admin', NULL, '2017-09-15 05:38:49', 1, 1, 1, 1, 3),
(962, 1, 0, 'order', 'Order additional service  updated in system by admin admin', NULL, '2017-09-15 05:38:49', 1, 1, 1, 1, 3),
(963, 1, 0, 'order', 'Order additional service  updated in system by admin admin', NULL, '2017-09-15 05:38:57', 1, 1, 1, 1, 3),
(964, 1, 0, 'service', 'Order additional service retret added in system by admin admin', NULL, '2017-09-15 05:40:07', 1, 1, 1, 1, 3),
(965, 1, 0, 'order', 'Order additional service retret updated in system by admin admin', NULL, '2017-09-15 05:40:08', 1, 1, 1, 1, 3),
(966, 1, 0, 'order', 'Order additional service retret updated in system by admin admin', NULL, '2017-09-15 05:40:12', 1, 1, 1, 1, 3),
(967, 1, 0, 'order', 'Order additional service FREECODE updated by admin admin', NULL, '2017-09-15 05:48:31', 1, 1, 1, 1, 3),
(968, 1, 0, 'order', 'Order additional service FREECODE updated by admin admin', NULL, '2017-09-15 05:48:34', 1, 1, 1, 1, 3),
(969, 1, 0, 'order', 'Order additional service FREECODE Deleted by admin admin', NULL, '2017-09-15 05:48:37', 1, 1, 1, 1, 3),
(970, 49, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 05:54:53', 1, 1, 1, 1, 0),
(971, 49, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by business business', '2017-09-15 05:54:53', 1, 1, 1, 1, 0),
(972, 49, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 05:54:53', 1, 1, 1, 1, 3),
(973, 49, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 05:54:56', 1, 1, 1, 1, 0),
(974, 49, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by business business', '2017-09-15 05:54:56', 1, 1, 1, 1, 0),
(975, 49, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 05:54:56', 1, 1, 1, 1, 3),
(976, 49, 57, '', 'Your basic info updated successfully', 'Basic info of driver Driver2 Driverupdated successfully', '2017-09-15 06:00:46', 1, 1, 1, 1, 0),
(977, 49, 49, '', 'basic info of driver driver Driver2 updated successfully', 'Basic info of driver driver Driver2 updated successfully by business business', '2017-09-15 06:00:46', 1, 1, 1, 1, 0),
(978, 49, 0, 'party', 'Basic info of driver Driver2 Driver updated successfully', NULL, '2017-09-15 06:00:46', 1, 1, 1, 1, 3),
(979, 49, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 06:02:24', 1, 1, 1, 1, 0),
(980, 49, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 06:02:24', 1, 1, 1, 1, 0);
INSERT INTO `party_notification` (`notification_id`, `from_party`, `to_party`, `notification_for`, `subject`, `message`, `datetime`, `admin_status`, `customer_status`, `manager_status`, `dogwalker_status`, `status`) VALUES
(981, 49, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-15 06:02:24', 1, 1, 1, 1, 3),
(982, 49, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:02:28', 1, 1, 1, 1, 0),
(983, 49, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:02:28', 1, 1, 1, 1, 0),
(984, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 06:02:28', 1, 1, 1, 1, 3),
(985, 49, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 06:02:40', 1, 1, 1, 1, 0),
(986, 49, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 06:02:40', 1, 1, 1, 1, 0),
(987, 49, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-15 06:02:40', 1, 1, 1, 1, 3),
(988, 49, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:03:55', 1, 1, 1, 1, 0),
(989, 49, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:03:55', 1, 1, 1, 1, 0),
(990, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 06:03:55', 1, 1, 1, 1, 3),
(991, 49, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 06:04:00', 1, 1, 1, 1, 0),
(992, 49, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 06:04:00', 1, 1, 1, 1, 0),
(993, 49, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-15 06:04:00', 1, 1, 1, 1, 3),
(994, 49, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-15 06:04:01', 1, 1, 1, 1, 0),
(995, 49, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-15 06:04:01', 1, 1, 1, 1, 0),
(996, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-15 06:04:01', 1, 1, 1, 1, 3),
(997, 49, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 06:06:22', 1, 1, 1, 1, 0),
(998, 49, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 06:06:22', 1, 1, 1, 1, 0),
(999, 49, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-15 06:06:22', 1, 1, 1, 1, 3),
(1000, 49, 0, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 06:06:22', 1, 1, 1, 1, 0),
(1001, 49, 49, '', 'Vehicle mp-09 az 5566 of type [van] updated', 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '2017-09-15 06:06:22', 1, 1, 1, 1, 0),
(1002, 49, 0, 'Vehicle mp-09 az 5566 of type [van] of Owner business business info updated', '', NULL, '2017-09-15 06:06:22', 1, 1, 1, 1, 3),
(1003, 49, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:06:24', 1, 1, 1, 1, 0),
(1004, 49, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:06:24', 1, 1, 1, 1, 0),
(1005, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 06:06:24', 1, 1, 1, 1, 3),
(1006, 49, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:06:24', 1, 1, 1, 1, 0),
(1007, 49, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:06:24', 1, 1, 1, 1, 0),
(1008, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 06:06:24', 1, 1, 1, 1, 3),
(1009, 49, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-15 06:06:30', 1, 1, 1, 1, 0),
(1010, 49, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-15 06:06:30', 1, 1, 1, 1, 0),
(1011, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-15 06:06:30', 1, 1, 1, 1, 3),
(1012, 49, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-15 06:06:30', 1, 1, 1, 1, 0),
(1013, 49, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-15 06:06:30', 1, 1, 1, 1, 0),
(1014, 49, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-15 06:06:30', 1, 1, 1, 1, 3),
(1015, 49, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:06:33', 1, 1, 1, 1, 0),
(1016, 49, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:06:33', 1, 1, 1, 1, 0),
(1017, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 06:06:33', 1, 1, 1, 1, 3),
(1018, 49, 0, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:06:33', 1, 1, 1, 1, 0),
(1019, 49, 49, '', 'Vehicle mp-09 az 6655 of type [5.5 ton] updated', 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '2017-09-15 06:06:33', 1, 1, 1, 1, 0),
(1020, 49, 0, 'Vehicle mp-09 az 6655 of type [5.5 ton] of Owner business business info updated', '', NULL, '2017-09-15 06:06:33', 1, 1, 1, 1, 3),
(1021, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated Business Owner business business', NULL, '2017-09-17 07:08:01', 1, 1, 1, 1, 3),
(1022, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:01', 1, 1, 1, 1, 0),
(1023, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:01', 1, 1, 1, 1, 3),
(1024, 1, 0, 'order', 'order #0035 of customer sudeep jain Business Owner removed', NULL, '2017-09-17 07:08:02', 1, 1, 1, 1, 3),
(1025, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:02', 1, 1, 1, 1, 0),
(1026, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:02', 1, 1, 1, 1, 3),
(1027, 1, 0, 'order', 'order #0035 of customer sudeep jain Business Owner removed', NULL, '2017-09-17 07:08:06', 1, 1, 1, 1, 3),
(1028, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:06', 1, 1, 1, 1, 0),
(1029, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:06', 1, 1, 1, 1, 3),
(1030, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated Business Owner business business', NULL, '2017-09-17 07:08:07', 1, 1, 1, 1, 3),
(1031, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:07', 1, 1, 1, 1, 0),
(1032, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:07', 1, 1, 1, 1, 3),
(1033, 1, 0, 'order', 'order #0035 of customer sudeep jain driver removed', NULL, '2017-09-17 07:08:09', 1, 1, 1, 1, 3),
(1034, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:09', 1, 1, 1, 1, 0),
(1035, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:09', 1, 1, 1, 1, 3),
(1036, 1, 0, 'order', 'order #0035 of customer sudeep jain driver removed', NULL, '2017-09-17 07:08:10', 1, 1, 1, 1, 3),
(1037, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:10', 1, 1, 1, 1, 0),
(1038, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:10', 1, 1, 1, 1, 3),
(1039, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated Business Owner business business', NULL, '2017-09-17 07:08:11', 1, 1, 1, 1, 3),
(1040, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:11', 1, 1, 1, 1, 0),
(1041, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:11', 1, 1, 1, 1, 3),
(1042, 1, 0, 'order', 'order #0035 of customer sudeep jain driver removed', NULL, '2017-09-17 07:08:12', 1, 1, 1, 1, 3),
(1043, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:12', 1, 1, 1, 1, 0),
(1044, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:12', 1, 1, 1, 1, 3),
(1045, 1, 0, 'order', 'order #0035 of customer sudeep jain driver removed', NULL, '2017-09-17 07:08:13', 1, 1, 1, 1, 3),
(1046, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:13', 1, 1, 1, 1, 0),
(1047, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:13', 1, 1, 1, 1, 3),
(1048, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-17 07:08:14', 1, 1, 1, 1, 3),
(1049, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:14', 1, 1, 1, 1, 0),
(1050, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:14', 1, 1, 1, 1, 3),
(1051, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated Business Owner business business', NULL, '2017-09-17 07:08:16', 1, 1, 1, 1, 3),
(1052, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:16', 1, 1, 1, 1, 0),
(1053, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:16', 1, 1, 1, 1, 3),
(1054, 1, 0, 'order', 'order #0035 of customer sudeep jain Business Owner removed', NULL, '2017-09-17 07:08:17', 1, 1, 1, 1, 3),
(1055, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:08:17', 1, 1, 1, 1, 0),
(1056, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:08:17', 1, 1, 1, 1, 3),
(1057, 1, 0, 'order', 'order #0035 of customer sudeep jain Business Owner removed', NULL, '2017-09-17 07:10:48', 1, 1, 1, 1, 3),
(1058, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:10:48', 1, 1, 1, 1, 0),
(1059, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:10:48', 1, 1, 1, 1, 3),
(1060, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated Business Owner business business', NULL, '2017-09-17 07:10:48', 1, 1, 1, 1, 3),
(1061, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:10:48', 1, 1, 1, 1, 0),
(1062, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:10:48', 1, 1, 1, 1, 3),
(1063, 1, 0, 'order', 'order #0035 of customer sudeep jain driver removed', NULL, '2017-09-17 07:10:52', 1, 1, 1, 1, 3),
(1064, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:10:52', 1, 1, 1, 1, 0),
(1065, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:10:52', 1, 1, 1, 1, 3),
(1066, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-17 07:10:53', 1, 1, 1, 1, 3),
(1067, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:10:53', 1, 1, 1, 1, 0),
(1068, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:10:53', 1, 1, 1, 1, 3),
(1069, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated Business Owner business business', NULL, '2017-09-17 07:10:55', 1, 1, 1, 1, 3),
(1070, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:10:55', 1, 1, 1, 1, 0),
(1071, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:10:55', 1, 1, 1, 1, 3),
(1072, 1, 0, 'order', 'order #0035 of customer sudeep jain Business Owner removed', NULL, '2017-09-17 07:10:56', 1, 1, 1, 1, 3),
(1073, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:10:56', 1, 1, 1, 1, 0),
(1074, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:10:56', 1, 1, 1, 1, 3),
(1075, 1, 0, 'order', 'order #0035 of customer sudeep jain Business Owner removed', NULL, '2017-09-17 07:12:00', 1, 1, 1, 1, 3),
(1076, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:00', 1, 1, 1, 1, 0),
(1077, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:00', 1, 1, 1, 1, 3),
(1078, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated Business Owner business business', NULL, '2017-09-17 07:12:01', 1, 1, 1, 1, 3),
(1079, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:01', 1, 1, 1, 1, 0),
(1080, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:01', 1, 1, 1, 1, 3),
(1081, 1, 0, 'order', 'order #0035 of customer sudeep jain driver removed', NULL, '2017-09-17 07:12:01', 1, 1, 1, 1, 3),
(1082, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:01', 1, 1, 1, 1, 0),
(1083, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:01', 1, 1, 1, 1, 3),
(1084, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-17 07:12:02', 1, 1, 1, 1, 3),
(1085, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:02', 1, 1, 1, 1, 0),
(1086, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:02', 1, 1, 1, 1, 3),
(1087, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated Business Owner business business', NULL, '2017-09-17 07:12:04', 1, 1, 1, 1, 3),
(1088, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:04', 1, 1, 1, 1, 0),
(1089, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:04', 1, 1, 1, 1, 3),
(1090, 1, 0, 'order', 'order #0035 of customer sudeep jain Business Owner removed', NULL, '2017-09-17 07:12:05', 1, 1, 1, 1, 3),
(1091, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:05', 1, 1, 1, 1, 0),
(1092, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:05', 1, 1, 1, 1, 3),
(1093, 1, 0, 'order', 'order #0035 of customer sudeep jain Business Owner removed', NULL, '2017-09-17 07:12:08', 1, 1, 1, 1, 3),
(1094, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:08', 1, 1, 1, 1, 0),
(1095, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:08', 1, 1, 1, 1, 3),
(1096, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated Business Owner business business', NULL, '2017-09-17 07:12:09', 1, 1, 1, 1, 3),
(1097, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:09', 1, 1, 1, 1, 0),
(1098, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:09', 1, 1, 1, 1, 3),
(1099, 1, 0, 'order', 'order #0035 of customer sudeep jain driver removed', NULL, '2017-09-17 07:12:10', 1, 1, 1, 1, 3),
(1100, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:10', 1, 1, 1, 1, 0),
(1101, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:10', 1, 1, 1, 1, 3),
(1102, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-17 07:12:11', 1, 1, 1, 1, 3),
(1103, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:11', 1, 1, 1, 1, 0),
(1104, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:11', 1, 1, 1, 1, 3),
(1105, 1, 0, 'order', 'order #0035 of customer sudeep jain allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-17 07:12:12', 1, 1, 1, 1, 3),
(1106, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:12', 1, 1, 1, 1, 0),
(1107, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:12', 1, 1, 1, 1, 3),
(1108, 1, 0, 'order', 'order #0035 of customer sudeep jain driver removed', NULL, '2017-09-17 07:12:13', 1, 1, 1, 1, 3),
(1109, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:13', 1, 1, 1, 1, 0),
(1110, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:13', 1, 1, 1, 1, 3),
(1111, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:18', 1, 1, 1, 1, 0),
(1112, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:18', 1, 1, 1, 1, 3),
(1113, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer sudeep jain info updated successfully byadmin admin', '2017-09-17 07:12:21', 1, 1, 1, 1, 0),
(1114, 1, 0, 'order', 'order #0035 of customer sudeep jain updated successfully', NULL, '2017-09-17 07:12:21', 1, 1, 1, 1, 3),
(1115, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-18 12:51:55', 1, 1, 1, 1, 0),
(1116, 1, 0, 'wallet', 'Wallet info of customer customer customer updated', NULL, '2017-09-18 12:51:55', 1, 1, 1, 1, 3),
(1117, 1, 58, '', 'Wallet info of customer sudeep jain updated', 'Wallet info of customer sudeep jain updated by admin admin', '2017-09-18 12:51:55', 1, 1, 1, 1, 0),
(1118, 1, 0, 'wallet', 'Wallet info of customer sudeep jain updated', NULL, '2017-09-18 12:51:55', 1, 1, 1, 1, 3),
(1119, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-18 12:51:55', 1, 1, 1, 1, 0),
(1120, 1, 0, 'wallet', 'Wallet info of customer customer customer updated', NULL, '2017-09-18 12:51:55', 1, 1, 1, 1, 3),
(1121, 1, 58, '', 'Wallet info of customer sudeep jain updated', 'Wallet info of customer sudeep jain updated by admin admin', '2017-09-18 12:51:55', 1, 1, 1, 1, 0),
(1122, 1, 0, 'wallet', 'Wallet info of customer sudeep jain updated', NULL, '2017-09-18 12:51:55', 1, 1, 1, 1, 3),
(1123, 1, 58, '', 'Wallet info of customer sudeep jain updated', 'Wallet info of customer sudeep jain updated by admin admin', '2017-09-18 12:51:55', 1, 1, 1, 1, 0),
(1124, 1, 0, 'wallet', 'Wallet info of customer sudeep jain updated', NULL, '2017-09-18 12:51:55', 1, 1, 1, 1, 3),
(1125, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-18 12:51:55', 1, 1, 1, 1, 0),
(1126, 1, 0, 'wallet', 'Wallet info of customer customer customer updated', NULL, '2017-09-18 12:51:55', 1, 1, 1, 1, 3),
(1127, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-18 12:51:55', 1, 1, 1, 1, 0),
(1128, 1, 0, 'wallet', 'Wallet info of customer customer customer updated', NULL, '2017-09-18 12:51:55', 1, 1, 1, 1, 3),
(1129, 1, 58, '', 'Wallet info of customer sudeep jain updated', 'Wallet info of customer sudeep jain updated by admin admin', '2017-09-18 12:51:56', 1, 1, 1, 1, 0),
(1130, 1, 0, 'wallet', 'Wallet info of customer sudeep jain updated', NULL, '2017-09-18 12:51:56', 1, 1, 1, 1, 3),
(1131, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-18 12:51:56', 1, 1, 1, 1, 0),
(1132, 1, 0, 'wallet', 'Wallet info of customer customer customer updated', NULL, '2017-09-18 12:51:56', 1, 1, 1, 1, 3),
(1133, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-18 12:51:57', 1, 1, 1, 1, 0),
(1134, 1, 0, 'wallet', 'Wallet info of customer customer customer updated', NULL, '2017-09-18 12:51:57', 1, 1, 1, 1, 3),
(1135, 1, 55, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:09', 1, 1, 1, 1, 0),
(1136, 1, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:09', 1, 1, 1, 1, 0),
(1137, 1, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-18 12:57:09', 1, 1, 1, 1, 3),
(1138, 1, 55, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:10', 1, 1, 1, 1, 0),
(1139, 1, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:10', 1, 1, 1, 1, 0),
(1140, 1, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-18 12:57:10', 1, 1, 1, 1, 3),
(1141, 1, 55, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:10', 1, 1, 1, 1, 0),
(1142, 1, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:10', 1, 1, 1, 1, 0),
(1143, 1, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-18 12:57:10', 1, 1, 1, 1, 3),
(1144, 1, 55, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:11', 1, 1, 1, 1, 0),
(1145, 1, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:11', 1, 1, 1, 1, 0),
(1146, 1, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-18 12:57:11', 1, 1, 1, 1, 3),
(1147, 1, 55, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:18', 1, 1, 1, 1, 0),
(1148, 1, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:18', 1, 1, 1, 1, 0),
(1149, 1, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-18 12:57:18', 1, 1, 1, 1, 3),
(1150, 1, 55, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:21', 1, 1, 1, 1, 0),
(1151, 1, 49, '', 'Vehicle mp-09 az 5266 of type [van] updated', 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '2017-09-18 12:57:21', 1, 1, 1, 1, 0),
(1152, 1, 0, 'Vehicle mp-09 az 5266 of type [van] of Owner business business info updated', '', NULL, '2017-09-18 12:57:21', 1, 1, 1, 1, 3),
(1153, 1, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-18 13:02:38', 1, 1, 1, 1, 0),
(1154, 1, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-18 13:02:38', 1, 1, 1, 1, 0),
(1155, 1, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-18 13:02:38', 1, 1, 1, 1, 3),
(1156, 1, 0, 'vehicletype', 'Vehicle type 5.5 ton Updated in system by admin admin', NULL, '2017-09-18 13:08:13', 1, 1, 1, 1, 3),
(1157, 1, 58, '', 'Your basic info updated successfully', 'Basic info of customer monako jain updated successfully', '2017-09-18 13:08:31', 1, 1, 1, 1, 0),
(1158, 1, 0, 'party', 'Basic info of customer monako jain updated successfully', NULL, '2017-09-18 13:08:31', 1, 1, 1, 1, 3),
(1159, 1, 58, '', 'Your basic info updated successfully', 'Basic info of customer monako jain updated successfully', '2017-09-18 13:08:46', 1, 1, 1, 1, 0),
(1160, 1, 0, 'party', 'Basic info of customer monako jain updated successfully', NULL, '2017-09-18 13:08:46', 1, 1, 1, 1, 3),
(1161, 1, 0, 'order', 'Order additional service 454 updated in system by admin admin', NULL, '2017-09-18 13:11:04', 1, 1, 1, 1, 3),
(1162, 1, 0, 'order', 'Order additional service 454 updated in system by admin admin', NULL, '2017-09-18 13:11:14', 1, 1, 1, 1, 3),
(1163, 1, 0, 'order', 'Order additional service  lalamove  updated in system by admin admin', NULL, '2017-09-18 13:11:42', 1, 1, 1, 1, 3),
(1164, 1, 0, 'vehicletype', 'Vehicle type 5.5 ton Updated in system by admin admin', NULL, '2017-09-18 13:14:04', 1, 1, 1, 1, 3),
(1165, 1, 57, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-18 13:16:58', 1, 1, 1, 1, 0),
(1166, 1, 49, '', 'Vehicle mp-09 az 5206 of type [motorcycle] updated', 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '2017-09-18 13:16:58', 1, 1, 1, 1, 0),
(1167, 1, 0, 'Vehicle mp-09 az 5206 of type [motorcycle] of Owner business business info updated', '', NULL, '2017-09-18 13:16:58', 1, 1, 1, 1, 3),
(1168, 1, 0, 'order', 'Order additional service 454 updated in system by admin admin', NULL, '2017-09-18 13:17:18', 1, 1, 1, 1, 3),
(1169, 1, 0, 'order', 'Order additional service  free  updated in system by admin admin', NULL, '2017-09-18 13:17:20', 1, 1, 1, 1, 3),
(1170, 1, 0, 'order', 'Order additional service  lalamove  updated in system by admin admin', NULL, '2017-09-18 13:17:32', 1, 1, 1, 1, 3),
(1171, 1, 0, 'order', 'Order additional service  454 updated in system by admin admin', NULL, '2017-09-18 13:17:34', 1, 1, 1, 1, 3),
(1172, 1, 0, 'order', 'Order additional service LALAMOVE updated by admin admin', NULL, '2017-09-18 13:19:09', 1, 1, 1, 1, 3),
(1173, 1, 0, 'order', 'Order additional service  updated by admin admin', NULL, '2017-09-18 13:19:14', 1, 1, 1, 1, 3),
(1174, 1, 0, 'order', 'order #0035 of customer monako jain allocated Business Owner business business', NULL, '2017-09-18 13:21:02', 1, 1, 1, 1, 3),
(1175, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:02', 1, 1, 1, 1, 0),
(1176, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:02', 1, 1, 1, 1, 3),
(1177, 1, 0, 'order', 'order #0035 of customer monako jain driver removed', NULL, '2017-09-18 13:21:04', 1, 1, 1, 1, 3),
(1178, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:04', 1, 1, 1, 1, 0),
(1179, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:04', 1, 1, 1, 1, 3),
(1180, 1, 0, 'order', 'order #0035 of customer monako jain allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-18 13:21:05', 1, 1, 1, 1, 3),
(1181, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:05', 1, 1, 1, 1, 0),
(1182, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:05', 1, 1, 1, 1, 3),
(1183, 1, 0, 'order', 'order #0035 of customer monako jain allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-18 13:21:07', 1, 1, 1, 1, 3),
(1184, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:07', 1, 1, 1, 1, 0),
(1185, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:07', 1, 1, 1, 1, 3),
(1186, 1, 0, 'order', 'order #0035 of customer monako jain driver removed', NULL, '2017-09-18 13:21:08', 1, 1, 1, 1, 3),
(1187, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:08', 1, 1, 1, 1, 0),
(1188, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:08', 1, 1, 1, 1, 3),
(1189, 1, 0, 'order', 'order #0035 of customer monako jain driver removed', NULL, '2017-09-18 13:21:10', 1, 1, 1, 1, 3),
(1190, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:10', 1, 1, 1, 1, 0),
(1191, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:10', 1, 1, 1, 1, 3),
(1192, 1, 0, 'order', 'order #0035 of customer monako jain allocated driver Driver Driver and vehicle mp-09 az 5266', NULL, '2017-09-18 13:21:10', 1, 1, 1, 1, 3),
(1193, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:10', 1, 1, 1, 1, 0),
(1194, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:10', 1, 1, 1, 1, 3),
(1195, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:17', 1, 1, 1, 1, 0),
(1196, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:17', 1, 1, 1, 1, 3),
(1197, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:17', 1, 1, 1, 1, 0),
(1198, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:17', 1, 1, 1, 1, 3),
(1199, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:17', 1, 1, 1, 1, 0),
(1200, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:17', 1, 1, 1, 1, 3),
(1201, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:19', 1, 1, 1, 1, 0),
(1202, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:19', 1, 1, 1, 1, 3),
(1203, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:20', 1, 1, 1, 1, 0),
(1204, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:20', 1, 1, 1, 1, 3),
(1205, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:21', 1, 1, 1, 1, 0),
(1206, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:21', 1, 1, 1, 1, 3),
(1207, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:21', 1, 1, 1, 1, 0),
(1208, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:21', 1, 1, 1, 1, 3),
(1209, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:22', 1, 1, 1, 1, 0),
(1210, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:22', 1, 1, 1, 1, 3),
(1211, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:22', 1, 1, 1, 1, 0),
(1212, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:22', 1, 1, 1, 1, 3),
(1213, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:24', 1, 1, 1, 1, 0),
(1214, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:24', 1, 1, 1, 1, 3),
(1215, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:24', 1, 1, 1, 1, 0),
(1216, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:24', 1, 1, 1, 1, 3),
(1217, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:24', 1, 1, 1, 1, 0),
(1218, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:24', 1, 1, 1, 1, 3),
(1219, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:26', 1, 1, 1, 1, 0),
(1220, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:26', 1, 1, 1, 1, 3),
(1221, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:31', 1, 1, 1, 1, 0),
(1222, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:31', 1, 1, 1, 1, 3),
(1223, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:31', 1, 1, 1, 1, 0),
(1224, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:31', 1, 1, 1, 1, 3),
(1225, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:32', 1, 1, 1, 1, 0),
(1226, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:32', 1, 1, 1, 1, 3),
(1227, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:33', 1, 1, 1, 1, 0),
(1228, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:33', 1, 1, 1, 1, 3),
(1229, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:34', 1, 1, 1, 1, 0),
(1230, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:34', 1, 1, 1, 1, 3),
(1231, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:36', 1, 1, 1, 1, 0),
(1232, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:36', 1, 1, 1, 1, 3),
(1233, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:36', 1, 1, 1, 1, 0),
(1234, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:36', 1, 1, 1, 1, 3),
(1235, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:39', 1, 1, 1, 1, 0),
(1236, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:39', 1, 1, 1, 1, 3),
(1237, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:40', 1, 1, 1, 1, 0),
(1238, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:40', 1, 1, 1, 1, 3),
(1239, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:41', 1, 1, 1, 1, 0),
(1240, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:41', 1, 1, 1, 1, 3),
(1241, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:43', 1, 1, 1, 1, 0),
(1242, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:43', 1, 1, 1, 1, 3),
(1243, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:43', 1, 1, 1, 1, 0),
(1244, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:43', 1, 1, 1, 1, 3),
(1245, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:44', 1, 1, 1, 1, 0),
(1246, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:44', 1, 1, 1, 1, 3),
(1247, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:45', 1, 1, 1, 1, 0),
(1248, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:45', 1, 1, 1, 1, 3),
(1249, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:45', 1, 1, 1, 1, 0),
(1250, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:45', 1, 1, 1, 1, 3),
(1251, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:45', 1, 1, 1, 1, 0),
(1252, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:45', 1, 1, 1, 1, 3),
(1253, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:48', 1, 1, 1, 1, 0),
(1254, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:48', 1, 1, 1, 1, 3),
(1255, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:53', 1, 1, 1, 1, 0),
(1256, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:53', 1, 1, 1, 1, 3),
(1257, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:58', 1, 1, 1, 1, 0),
(1258, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:58', 1, 1, 1, 1, 3),
(1259, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:21:59', 1, 1, 1, 1, 0),
(1260, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:21:59', 1, 1, 1, 1, 3),
(1261, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:04', 1, 1, 1, 1, 0),
(1262, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:04', 1, 1, 1, 1, 3),
(1263, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:05', 1, 1, 1, 1, 0),
(1264, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:05', 1, 1, 1, 1, 3),
(1265, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:05', 1, 1, 1, 1, 0),
(1266, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:05', 1, 1, 1, 1, 3),
(1267, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:06', 1, 1, 1, 1, 0),
(1268, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:06', 1, 1, 1, 1, 3),
(1269, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:08', 1, 1, 1, 1, 0),
(1270, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:08', 1, 1, 1, 1, 3),
(1271, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:08', 1, 1, 1, 1, 0),
(1272, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:08', 1, 1, 1, 1, 3),
(1273, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:10', 1, 1, 1, 1, 0),
(1274, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:10', 1, 1, 1, 1, 3),
(1275, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:11', 1, 1, 1, 1, 0),
(1276, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:11', 1, 1, 1, 1, 3),
(1277, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:12', 1, 1, 1, 1, 0),
(1278, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:12', 1, 1, 1, 1, 3),
(1279, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:13', 1, 1, 1, 1, 0),
(1280, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:13', 1, 1, 1, 1, 3),
(1281, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:13', 1, 1, 1, 1, 0),
(1282, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:13', 1, 1, 1, 1, 3),
(1283, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:14', 1, 1, 1, 1, 0),
(1284, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:14', 1, 1, 1, 1, 3),
(1285, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:22:46', 1, 1, 1, 1, 0),
(1286, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:22:46', 1, 1, 1, 1, 3),
(1287, 1, 58, '', 'Order #0035 info updated successfully', 'order #0035 of customer monako jain info updated successfully byadmin admin', '2017-09-18 13:23:03', 1, 1, 1, 1, 0),
(1288, 1, 0, 'order', 'order #0035 of customer monako jain updated successfully', NULL, '2017-09-18 13:23:03', 1, 1, 1, 1, 3),
(1289, 1, 70, '', 'Your basic info updated successfully', 'Basic info of customer demo demo updated successfully', '2017-09-18 14:47:29', 1, 1, 1, 1, 0),
(1290, 1, 0, 'party', 'Basic info of customer demo demo updated successfully', NULL, '2017-09-18 14:47:29', 1, 1, 1, 1, 3),
(1291, 1, 70, '', 'Your basic info updated successfully', 'Basic info of customer demo demo updated successfully', '2017-09-18 14:47:29', 1, 1, 1, 1, 0),
(1292, 1, 0, 'party', 'Basic info of customer demo demo updated successfully', NULL, '2017-09-18 14:47:29', 1, 1, 1, 1, 3),
(1293, 1, 0, 'delete', 'Info of customer demo demo deleted by admin admin', NULL, '2017-09-18 14:47:38', 1, 1, 1, 1, 3),
(1294, 1, 0, 'delete', 'Info of customer demo demo deleted by admin admin', NULL, '2017-09-18 14:52:24', 1, 1, 1, 1, 3),
(1295, 1, 0, 'delete', 'Info of customer demo22 demo22 deleted by admin admin', NULL, '2017-09-18 14:52:31', 1, 1, 1, 1, 3),
(1296, 1, 0, 'delete', 'Info of customer www www deleted by admin admin', NULL, '2017-09-18 14:52:36', 1, 1, 1, 1, 3),
(1297, 1, 58, '', 'Wallet info of customer monako jain updated', 'Wallet info of customer monako jain updated by admin admin', '2017-09-18 15:25:49', 1, 1, 1, 1, 0),
(1298, 1, 0, 'wallet', 'Wallet info of customer monako jain updated', NULL, '2017-09-18 15:25:49', 1, 1, 1, 1, 3),
(1299, 1, 47, '', 'Wallet info of customer customer customer updated', 'Wallet info of customer customer customer updated by admin admin', '2017-09-18 16:22:19', 1, 1, 1, 1, 0),
(1300, 1, 0, 'wallet', 'Wallet info of customer customer customer updated', NULL, '2017-09-18 16:22:19', 1, 1, 1, 1, 3),
(1301, 1, 58, '', 'Wallet info of customer monako jain updated', 'Wallet info of customer monako jain updated by admin admin', '2017-09-18 16:22:20', 1, 1, 1, 1, 0),
(1302, 1, 0, 'wallet', 'Wallet info of customer monako jain updated', NULL, '2017-09-18 16:22:20', 1, 1, 1, 1, 3),
(1303, 1, 72, '', 'Wallet info of customer www www updated', 'Wallet info of customer www www updated by admin admin', '2017-09-18 16:22:27', 1, 1, 1, 1, 0),
(1304, 1, 0, 'wallet', 'Wallet info of customer www www updated', NULL, '2017-09-18 16:22:27', 1, 1, 1, 1, 3),
(1305, 1, 58, '', 'Wallet info of customer monako jain updated', 'Wallet info of customer monako jain updated by admin admin', '2017-09-18 16:22:29', 1, 1, 1, 1, 0),
(1306, 1, 0, 'wallet', 'Wallet info of customer monako jain updated', NULL, '2017-09-18 16:22:29', 1, 1, 1, 1, 3),
(1307, 1, 58, '', 'Wallet info of customer monako jain updated', 'Wallet info of customer monako jain updated by admin admin', '2017-09-18 16:22:46', 1, 1, 1, 1, 0),
(1308, 1, 0, 'wallet', 'Wallet info of customer monako jain updated', NULL, '2017-09-18 16:22:46', 1, 1, 1, 1, 3),
(1309, 1, 80, '', 'Welcome, Your registration info added successfully', 'Welcome, <br>Your registration info added successfully for customer', '2017-09-18 23:38:49', 1, 1, 1, 1, 0),
(1310, 1, 0, 'party', 'New customer info with name tfox tfoxadded successfully', NULL, '2017-09-18 23:38:49', 1, 1, 1, 1, 3);
INSERT INTO `party_notification` (`notification_id`, `from_party`, `to_party`, `notification_for`, `subject`, `message`, `datetime`, `admin_status`, `customer_status`, `manager_status`, `dogwalker_status`, `status`) VALUES
(1311, 1, 0, 'order', 'order #0050 of customer vishal kushwah Business Owner removed', NULL, '2017-09-18 23:50:32', 1, 1, 1, 1, 3),
(1312, 1, 79, '', 'Order #0050 info updated successfully', 'order #0050 of customer vishal kushwah info updated successfully byadmin admin', '2017-09-18 23:50:32', 1, 1, 1, 1, 0),
(1313, 1, 0, 'order', 'order #0050 of customer vishal kushwah updated successfully', NULL, '2017-09-18 23:50:32', 1, 1, 1, 1, 3),
(1314, 1, 0, 'order', 'order #0050 of customer vishal kushwah driver removed', NULL, '2017-09-18 23:50:34', 1, 1, 1, 1, 3),
(1315, 1, 79, '', 'Order #0050 info updated successfully', 'order #0050 of customer vishal kushwah info updated successfully byadmin admin', '2017-09-18 23:50:34', 1, 1, 1, 1, 0),
(1316, 1, 0, 'order', 'order #0050 of customer vishal kushwah updated successfully', NULL, '2017-09-18 23:50:34', 1, 1, 1, 1, 3),
(1317, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-18 23:50:40', 1, 1, 1, 1, 0),
(1318, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-18 23:50:40', 1, 1, 1, 1, 3),
(1319, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-18 23:50:40', 1, 1, 1, 1, 0),
(1320, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-18 23:50:40', 1, 1, 1, 1, 3),
(1321, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-18 23:50:41', 1, 1, 1, 1, 0),
(1322, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-18 23:50:41', 1, 1, 1, 1, 3),
(1323, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-18 23:50:42', 1, 1, 1, 1, 0),
(1324, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-18 23:50:42', 1, 1, 1, 1, 3),
(1325, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-18 23:50:42', 1, 1, 1, 1, 0),
(1326, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-18 23:50:42', 1, 1, 1, 1, 3),
(1327, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-18 23:50:43', 1, 1, 1, 1, 0),
(1328, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-18 23:50:43', 1, 1, 1, 1, 3),
(1329, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-18 23:50:43', 1, 1, 1, 1, 0),
(1330, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-18 23:50:43', 1, 1, 1, 1, 3),
(1331, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-18 23:50:44', 1, 1, 1, 1, 0),
(1332, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-18 23:50:44', 1, 1, 1, 1, 3),
(1333, 1, 0, '', 'Order #00 info updated successfully', 'order #00 of customer   info updated successfully byadmin admin', '2017-09-19 00:14:16', 1, 1, 1, 1, 0),
(1334, 1, 0, 'order', 'order #00 of customer   updated successfully', NULL, '2017-09-19 00:14:16', 1, 1, 1, 1, 3),
(1335, 1, 0, '', 'New Vehicle 354345435 of type [5.5 ton] Added', 'New Vehicle 354345435 of type [5.5 ton] of Owner business business assigned you', '2017-09-19 14:47:26', 1, 1, 1, 1, 0),
(1336, 1, 49, '', 'New Vehicle 354345435 of type [5.5 ton] Added', 'New Vehicle 354345435 of type [5.5 ton] of Owner business business info added', '2017-09-19 14:47:26', 1, 1, 1, 1, 0),
(1337, 1, 0, 'vehicle', 'New Vehicle 354345435 of type [5.5 ton] assigned to Driver  ', NULL, '2017-09-19 14:47:26', 1, 1, 1, 1, 3),
(1338, 1, 0, 'vehicle', 'New Vehicle 354345435 of type [5.5 ton] of Owner business business info added', NULL, '2017-09-19 14:47:26', 1, 1, 1, 1, 3),
(1339, 1, 0, '', 'New Vehicle 4363463463 of type [5.5 ton] Added', 'New Vehicle 4363463463 of type [5.5 ton] of Owner business business assigned you', '2017-09-19 14:47:38', 1, 1, 1, 1, 0),
(1340, 1, 49, '', 'New Vehicle 4363463463 of type [5.5 ton] Added', 'New Vehicle 4363463463 of type [5.5 ton] of Owner business business info added', '2017-09-19 14:47:38', 1, 1, 1, 1, 0),
(1341, 1, 0, 'vehicle', 'New Vehicle 4363463463 of type [5.5 ton] assigned to Driver  ', NULL, '2017-09-19 14:47:38', 1, 1, 1, 1, 3),
(1342, 1, 0, 'vehicle', 'New Vehicle 4363463463 of type [5.5 ton] of Owner business business info added', NULL, '2017-09-19 14:47:38', 1, 1, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `party_type`
--

CREATE TABLE `party_type` (
  `party_type_id` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `parent_type_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `has_table` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `description` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `last_updated_stamp` datetime DEFAULT NULL,
  `last_updated_tx_stamp` datetime DEFAULT NULL,
  `created_stamp` datetime DEFAULT NULL,
  `created_tx_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `party_type`
--

INSERT INTO `party_type` (`party_type_id`, `parent_type_id`, `has_table`, `description`, `last_updated_stamp`, `last_updated_tx_stamp`, `created_stamp`, `created_tx_stamp`) VALUES
('admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('business', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('informal_group', 'party_group', 'n', 'informal group', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('party_group', NULL, 'y', 'party group', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('team', 'informal_group', 'n', 'team', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `party_id` int(20) NOT NULL,
  `salutation` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `first_name` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `middle_name` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `last_name` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `mobile` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `company_name` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `industry` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `staff` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `vehicle_type` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `training_session` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `personal_title` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `suffix` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `nickname` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `first_name_local` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `middle_name_local` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `last_name_local` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `person_image_url` varchar(200) COLLATE latin1_general_cs NOT NULL,
  `other_local` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `member_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `gender` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `deceased_date` date DEFAULT NULL,
  `height` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `mothers_maiden_name` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `marital_status` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `license_number` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `criminal_case_status` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `criminal_case_clearance_no` varchar(255) COLLATE latin1_general_cs NOT NULL,
  `social_security_number` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `passport_number` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `passport_expire_date` date DEFAULT NULL,
  `total_years_work_experience` double DEFAULT NULL,
  `comments` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `employment_status_enum_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `residence_status_enum_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `occupation` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `years_with_employer` decimal(20,0) DEFAULT NULL,
  `months_with_employer` decimal(20,0) DEFAULT NULL,
  `existing_customer` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `card_id` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `last_updated_stamp` datetime DEFAULT NULL,
  `last_updated_tx_stamp` datetime DEFAULT NULL,
  `created_stamp` datetime DEFAULT NULL,
  `created_tx_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`party_id`, `salutation`, `first_name`, `middle_name`, `last_name`, `mobile`, `email`, `company_name`, `industry`, `staff`, `vehicle_type`, `training_session`, `personal_title`, `suffix`, `nickname`, `first_name_local`, `middle_name_local`, `last_name_local`, `person_image_url`, `other_local`, `member_id`, `gender`, `birth_date`, `deceased_date`, `height`, `weight`, `mothers_maiden_name`, `marital_status`, `license_number`, `criminal_case_status`, `criminal_case_clearance_no`, `social_security_number`, `passport_number`, `passport_expire_date`, `total_years_work_experience`, `comments`, `employment_status_enum_id`, `residence_status_enum_id`, `occupation`, `years_with_employer`, `months_with_employer`, `existing_customer`, `card_id`, `last_updated_stamp`, `last_updated_tx_stamp`, `created_stamp`, `created_tx_stamp`) VALUES
(1, '', 'admin', NULL, 'admin', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2017-07-07 00:16:32', '2017-07-07 00:16:32', '2017-07-07 00:16:32', '2017-07-07 00:16:32'),
(47, '', 'customer', NULL, 'customer', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '', 'driver', NULL, 'driver', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '3245354353443', 'yes', '3464564565464', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '', 'business', NULL, 'business', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '', 'Driver', NULL, 'Driver', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '434343', 'No', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '', 'Driver2', NULL, 'Driver', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '1234565', 'No', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '', 'monako', NULL, 'jain', '1234556677', 'monako@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '', 'dsfsdfsdf', NULL, '4234', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '32423423423', 'No', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, NULL, 'www', NULL, 'www', '1123456789', 'www@www.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, NULL, 'ddd', NULL, 'ddd', '1123456', 'ddd@ddd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, NULL, 'ddd', NULL, 'ddd', '1123456', 'dddd@dddd.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, NULL, 'waris', NULL, 'pad', '66821130621', 'varichhy@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, NULL, NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-18 22:59:56', NULL, '2017-09-18 22:59:56', NULL),
(77, NULL, 'vishal', NULL, 'kushwah', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-18 23:01:39', NULL, '2017-09-18 23:01:39', NULL),
(78, NULL, 'vishal', NULL, 'kushwah', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-18 23:02:46', NULL, '2017-09-18 23:02:46', NULL),
(79, NULL, 'vishal', NULL, 'kushwah', '', '', 'cis', '12,13,14', '50,200,500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-09-18 23:04:07', NULL, '2017-09-18 23:04:07', NULL),
(80, '', 'tfox', NULL, 'tfox', '0815914515', 'tfox159@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, NULL, 'tfox2', NULL, 'tfox2', '66815914515', 'tfox159@hotmakl.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, NULL, 'tfox2', NULL, 'tfox2', '66815914515', 'tfox159@hotmakl.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `postal_address`
--

CREATE TABLE `postal_address` (
  `contact_mech_id` int(20) NOT NULL,
  `to_name` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `attn_name` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `address1` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `address2` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `directions` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `city` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `postal_code` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `postal_code_ext` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `country_geo_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `state_province_geo_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `county_geo_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `postal_code_geo_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `geo_point_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `last_updated_stamp` datetime DEFAULT NULL,
  `last_updated_tx_stamp` datetime DEFAULT NULL,
  `created_stamp` datetime DEFAULT NULL,
  `created_tx_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `postal_address`
--

INSERT INTO `postal_address` (`contact_mech_id`, `to_name`, `attn_name`, `address1`, `address2`, `directions`, `city`, `postal_code`, `postal_code_ext`, `country_geo_id`, `state_province_geo_id`, `county_geo_id`, `postal_code_geo_id`, `geo_point_id`, `last_updated_stamp`, `last_updated_tx_stamp`, `created_stamp`, `created_tx_stamp`) VALUES
(9001, 'malya corporate', NULL, 'mangal city', 'rasoma', NULL, 'indore', '452001', NULL, 'usa', 'mp', NULL, NULL, '9000', '2017-07-07 00:16:31', '2017-07-07 00:16:31', '2017-07-07 00:16:31', '2017-07-07 00:16:31'),
(9116, 'demo', NULL, 'demo address', 'demo address', NULL, 'demo', '123456', NULL, NULL, 'demo', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9122, 'demo address', NULL, 'demo address', '123 demo address', NULL, 'Indore city', '452001', NULL, NULL, 'Mp India', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9140, '554', NULL, '43555', '435345', NULL, '35443', '5345345', NULL, NULL, '43534', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9143, '1212', NULL, '232', '312321', NULL, '12321', '3213213213', NULL, NULL, '321321321321', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9146, '1212', NULL, '213213213123', '23423432', NULL, '2332423423', '21321321', NULL, NULL, '2323423', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9149, 'demo', NULL, 'demo address', 'demo addrss', NULL, 'indore', '452001', NULL, NULL, ' mp', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9152, '423434234234', NULL, '423423423', '23423423', NULL, '423432423423', '2323423', NULL, NULL, '4234', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9174, '23', NULL, '3432432', '324323', NULL, '32423', '23423', NULL, NULL, '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9175, '23', NULL, '3432432', '324323', NULL, '32423', '23423', NULL, NULL, '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9192, 'office saimai', NULL, 'saimai', 'saimai', NULL, 'bangkok', '10220', NULL, NULL, 'bangkok', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `privacy_policy_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`privacy_policy_id`, `title`, `description`) VALUES
(3, 'qwqwqwqretert', 'qwqwqwqwqwqwqwqretertretre'),
(4, 'ewrewr', 'qwqwqwqwqwqwqwq');

-- --------------------------------------------------------

--
-- Table structure for table `telecom_number`
--

CREATE TABLE `telecom_number` (
  `contact_mech_id` int(20) NOT NULL,
  `country_code` varchar(10) COLLATE latin1_general_cs DEFAULT NULL,
  `area_code` varchar(10) COLLATE latin1_general_cs DEFAULT NULL,
  `contact_number` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `mobile_number` varchar(30) COLLATE latin1_general_cs DEFAULT NULL,
  `alt_mobile_number` varchar(30) COLLATE latin1_general_cs DEFAULT NULL,
  `ask_for_name` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `last_updated_stamp` datetime DEFAULT NULL,
  `last_updated_tx_stamp` datetime DEFAULT NULL,
  `created_stamp` datetime DEFAULT NULL,
  `created_tx_stamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `telecom_number`
--

INSERT INTO `telecom_number` (`contact_mech_id`, `country_code`, `area_code`, `contact_number`, `mobile_number`, `alt_mobile_number`, `ask_for_name`, `last_updated_stamp`, `last_updated_tx_stamp`, `created_stamp`, `created_tx_stamp`) VALUES
(9002, NULL, '1234', '456723', '999999999', '8888888888', NULL, '2017-07-07 00:16:37', '2017-07-07 00:16:37', '2017-07-07 00:16:37', '2017-07-07 00:16:37'),
(9115, NULL, '1234', '12345678', '12345678', '12345678', NULL, NULL, NULL, NULL, NULL),
(9121, NULL, '1234', '123456', '123456', '123456', NULL, NULL, NULL, NULL, NULL),
(9139, NULL, '543543', '5543', '43534', '5345', NULL, NULL, NULL, NULL, NULL),
(9142, NULL, '213213', '33', '321', '12312321', NULL, NULL, NULL, NULL, NULL),
(9145, NULL, '12345', '12324234', '23423423', '2343242342', NULL, NULL, NULL, NULL, NULL),
(9148, NULL, '12345', '1234567788', '1234556677', '2353456645', NULL, NULL, NULL, NULL, NULL),
(9151, NULL, '4234234', '423423423', '23423423423', '423423', NULL, NULL, NULL, NULL, NULL),
(9166, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9169, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9172, NULL, '3423432423', '3243232', '2324234', '32423432', NULL, NULL, NULL, NULL, NULL),
(9180, NULL, NULL, NULL, '1123456789', NULL, NULL, NULL, NULL, NULL, NULL),
(9191, NULL, '6681', '5914515', '0815914515', '0801592642', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `term_condition`
--

CREATE TABLE `term_condition` (
  `term_condition_id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term_condition`
--

INSERT INTO `term_condition` (`term_condition_id`, `title`, `description`) VALUES
(14, 'rterterertre', 'tertertretttretretreterter');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `token_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `party_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_login_id` varchar(250) COLLATE latin1_general_cs NOT NULL,
  `mobile_number` text COLLATE latin1_general_cs NOT NULL,
  `current_password` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `password_hint` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `is_system` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `enabled` char(1) COLLATE latin1_general_cs DEFAULT '1',
  `has_logged_out` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `require_password_change` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `last_currency_uom` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `last_locale` varchar(10) COLLATE latin1_general_cs DEFAULT NULL,
  `last_time_zone` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `disabled_date_time` datetime DEFAULT NULL,
  `successive_failed_logins` decimal(20,0) DEFAULT NULL,
  `external_auth_id` varchar(250) COLLATE latin1_general_cs DEFAULT NULL,
  `user_ldap_dn` varchar(250) COLLATE latin1_general_cs DEFAULT NULL,
  `last_updated_stamp` datetime DEFAULT NULL,
  `last_updated_tx_stamp` datetime DEFAULT NULL,
  `created_stamp` datetime DEFAULT NULL,
  `created_tx_stamp` datetime DEFAULT NULL,
  `party_id` int(20) DEFAULT NULL,
  `mobile_code` int(11) NOT NULL,
  `register_number` int(60) NOT NULL,
  `register_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_login_id`, `mobile_number`, `current_password`, `password_hint`, `is_system`, `enabled`, `has_logged_out`, `require_password_change`, `last_currency_uom`, `last_locale`, `last_time_zone`, `disabled_date_time`, `successive_failed_logins`, `external_auth_id`, `user_ldap_dn`, `last_updated_stamp`, `last_updated_tx_stamp`, `created_stamp`, `created_tx_stamp`, `party_id`, `mobile_code`, `register_number`, `register_type`) VALUES
('admin', '0', '$2y$10$t9Tmijmw4ClRxEZpJB0uw.lHtV/H4WJqBBDO5rkmEqcTbpmWxYrxG', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0),
('business', '0', '$2y$10$t9Tmijmw4ClRxEZpJB0uw.lHtV/H4WJqBBDO5rkmEqcTbpmWxYrxG', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 49, 0, 0, 0),
('business@gmail.com', '789456000', '$2y$10$cSSVPYRYjeg.6sVAKLfR6e2/nCK2XkrnFTCVt7nCiZ2wsjZ0wnrQO', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 79, 63, 0, 0),
('customer', '0', '$2y$10$t9Tmijmw4ClRxEZpJB0uw.lHtV/H4WJqBBDO5rkmEqcTbpmWxYrxG', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 47, 0, 0, 0),
('Driver', '0', '$2y$10$V/xMPStoYoMqb1RgWUzZSuczhJJO5mnie1gUOUPhsn1aOnPO5uzMG', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, 0, 0, 0),
('DriverDriver', '0', '$2y$10$/bgYcYkWq1DgTrYdqdNC8eLEVfTlMIcGTI6u89lu/MNspeWTrvHUa', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 57, 0, 0, 0),
('ddd@ddd.com', '1123456', 'ddd', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 73, 0, 0, 0),
('dddd@dddd.com', '1123456', 'ddd', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 74, 0, 0, 0),
('kushvishal777@gmail.com', '', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 76, 0, 0, 0),
('kushvishal7@gmail.com', '12345689', '$2y$10$RZgo3/Dl90thfMaUIHu4l.bciXcA/1b8MUpY1Klr4oFH.ugni.Dg2', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 77, 65, 0, 0),
('monako', '1234556677', '$2y$10$wFRkBTjG9oYg.RgpRuWs/ufAz/L0JA/Cuu8AVxQ2vcJ/Xi9Maom4G', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 58, 0, 0, 0),
('tfox', '0815914515', '$2y$10$LSwBHqqpN.XAMmyznEvc2eqlTpMKleAbwAZly/9NNWuu3rzNn8HjS', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 80, 0, 0, 0),
('tfox159@hotmakl.com', '66815914515', 'tum159mylala', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 81, 0, 0, 0),
('varichhy@hotmail.com', '66821130621', 'Va122415', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 75, 0, 0, 0),
('vishal7@gmail.com', '7712345689', '$2y$10$AYIifHIgc6Jwn6f9CpFUk.iOYbyn7jG0U.YZPV7D8xccKZbOWqlyq', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 78, 63, 0, 0),
('www@www.com', '1123456789', 'www', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 72, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_history`
--

CREATE TABLE `user_login_history` (
  `user_login_id` varchar(250) COLLATE latin1_general_cs NOT NULL,
  `visit_id` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `from_date` datetime NOT NULL,
  `thru_date` datetime DEFAULT NULL,
  `password_used` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `successful_login` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `last_updated_stamp` datetime DEFAULT NULL,
  `last_updated_tx_stamp` datetime DEFAULT NULL,
  `created_stamp` datetime DEFAULT NULL,
  `created_tx_stamp` datetime DEFAULT NULL,
  `party_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `no` int(100) NOT NULL,
  `vehicle_no` varchar(100) NOT NULL,
  `driver_id` varchar(100) DEFAULT NULL,
  `party_id` int(100) NOT NULL,
  `vehicle_type_id` int(100) NOT NULL,
  `registration_no` varchar(20) NOT NULL,
  `permit` varchar(20) NOT NULL,
  `vehicle_status` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`no`, `vehicle_no`, `driver_id`, `party_id`, `vehicle_type_id`, `registration_no`, `permit`, `vehicle_status`, `is_deleted`) VALUES
(1, 'ee', NULL, 0, 6, 'eee', 'Interstate', 0, 0),
(2, 'mp-09 az 5206', '57', 49, 2, 'SN-54645GHFW673S', 'intrastate', 0, 0),
(3, 'mp-09 az 5266', '55', 49, 3, 'sn-4354fefe653tbdfjg', 'intrastate', 1, 0),
(4, 'mp-09 az 5566', '', 49, 3, 'SN-NDURHBFHB51561', 'interstate', 0, 0),
(5, 'mp-09 az 6655', '', 49, 1, 'sn-4354etre45tbdfjgn', 'intrastate', 0, 1),
(6, 'sfgsddsgsg', '', 49, 1, 'sdferree', 'intrastate', 0, 1),
(7, '354345435', '', 49, 1, '453443534', 'intrastate', 0, 0),
(8, '4363463463', '', 49, 1, '5675756756', 'intrastate', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `vehicle_type_id` int(100) NOT NULL,
  `vehicle_type_name` varchar(100) NOT NULL,
  `working_region` varchar(20) NOT NULL,
  `min_weight_capacity` int(11) NOT NULL,
  `max_weight_capacity` int(11) NOT NULL,
  `item_height` int(11) NOT NULL,
  `item_width` int(11) NOT NULL,
  `item_length` int(11) NOT NULL,
  `base_fare` int(20) NOT NULL,
  `base_fare_limit` int(100) NOT NULL,
  `rent_per_km` int(20) NOT NULL,
  `load_unload_overtime_charge` int(20) DEFAULT NULL,
  `load_unload_max_time` int(11) NOT NULL,
  `landfills_charge` int(20) DEFAULT NULL,
  `construction_charge` int(20) DEFAULT NULL,
  `night_charge` int(20) DEFAULT NULL,
  `midnight_fee` int(20) DEFAULT NULL,
  `sunday_ph_charge` int(20) DEFAULT NULL,
  `owner_payable` int(20) DEFAULT NULL,
  `ong_charge` int(20) DEFAULT NULL,
  `parking_fee` int(20) DEFAULT NULL,
  `no` int(11) NOT NULL,
  `order_by` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`vehicle_type_id`, `vehicle_type_name`, `working_region`, `min_weight_capacity`, `max_weight_capacity`, `item_height`, `item_width`, `item_length`, `base_fare`, `base_fare_limit`, `rent_per_km`, `load_unload_overtime_charge`, `load_unload_max_time`, `landfills_charge`, `construction_charge`, `night_charge`, `midnight_fee`, `sunday_ph_charge`, `owner_payable`, `ong_charge`, `parking_fee`, `no`, `order_by`, `image1`, `image2`) VALUES
(1, '5.5 ton', 'th', 800, 1200, 1954, 450, 0, 130, 200, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 1, 3, 'truck_v2_off.png', 'truck_v2.png'),
(2, 'motorcycle', 'th', 0, 10, 80, 80, 80, 100, 200, 12, 12, 12, 21, 12, 12, 12, 1212, 12, 12, 22, 2, 1, 'moto_v2_off.png', 'moto_v2.png'),
(3, 'van', 'th', 700, 800, 121, 182, 121, 500, 200, 1, 12, 12, 55, 12, 12, 12, 12, 12, 12, 22, 3, 2, 'van_v2_off.png', 'van_v2.png'),
(4, 'tampoo', 'hongkok', 100, 500, 122, 334, 0, 300, 520, 12, 1211, 12, 12, 12, 12, 12, 12, 45, 12, 12, 4, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(11) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `party_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `amount`, `party_id`) VALUES
(1, '334', 47),
(2, '0', 51),
(3, '0', 52),
(4, '0', 53),
(5, '0', 54),
(6, '0', 55),
(7, '0', 56),
(8, '0', 57),
(9, '', 58),
(10, '0', 59),
(11, '0', 80);

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transaction`
--

CREATE TABLE `wallet_transaction` (
  `wallet_trasaction_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `original_rate` int(11) NOT NULL,
  `discounted_rate` int(100) NOT NULL,
  `trasaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet_transaction`
--

INSERT INTO `wallet_transaction` (`wallet_trasaction_id`, `party_id`, `order_id`, `original_rate`, `discounted_rate`, `trasaction_date`, `from_id`, `to_id`) VALUES
(1, 79, 48, 100, 100, '2017-09-18 17:55:21', 0, 0),
(2, 79, 49, 100, 100, '2017-09-18 17:56:19', 0, 0),
(3, 79, 50, 130, 130, '2017-09-18 17:57:22', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_us_id`);

--
-- Indexes for table `billing_receipt`
--
ALTER TABLE `billing_receipt`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `contact_mech`
--
ALTER TABLE `contact_mech`
  ADD PRIMARY KEY (`contact_mech_id`),
  ADD KEY `cont_mech_type` (`contact_mech_type_id`),
  ADD KEY `cntct_mch_txstmp` (`last_updated_tx_stamp`),
  ADD KEY `cntct_mch_txcrts` (`created_tx_stamp`),
  ADD KEY `info_string_idx` (`info_string`);

--
-- Indexes for table `contact_mech_type`
--
ALTER TABLE `contact_mech_type`
  ADD PRIMARY KEY (`contact_mech_type_id`),
  ADD KEY `cont_mech_typ_par` (`parent_type_id`),
  ADD KEY `cntt_mch_tp_txstmp` (`last_updated_tx_stamp`),
  ADD KEY `cntt_mch_tp_txcrts` (`created_tx_stamp`);

--
-- Indexes for table `discount_promocode`
--
ALTER TABLE `discount_promocode`
  ADD PRIMARY KEY (`discount_promocode_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`item_type_id`);

--
-- Indexes for table `news_suscription`
--
ALTER TABLE `news_suscription`
  ADD PRIMARY KEY (`news_sub_id`);

--
-- Indexes for table `operational_city`
--
ALTER TABLE `operational_city`
  ADD PRIMARY KEY (`operational_city_id`);

--
-- Indexes for table `order_additional_services`
--
ALTER TABLE `order_additional_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `order_bid`
--
ALTER TABLE `order_bid`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `order_bidding`
--
ALTER TABLE `order_bidding`
  ADD PRIMARY KEY (`order_bidding_id`);

--
-- Indexes for table `order_contact`
--
ALTER TABLE `order_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `order_delivery_contact`
--
ALTER TABLE `order_delivery_contact`
  ADD PRIMARY KEY (`deliver_contact_id`);

--
-- Indexes for table `order_invoice`
--
ALTER TABLE `order_invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `order_location`
--
ALTER TABLE `order_location`
  ADD PRIMARY KEY (`order_location_id`);

--
-- Indexes for table `order_move`
--
ALTER TABLE `order_move`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_services_conn`
--
ALTER TABLE `order_services_conn`
  ADD PRIMARY KEY (`order_services_conn_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`party_id`),
  ADD KEY `party_pty_typ` (`party_type_id`),
  ADD KEY `party_cul` (`created_by_user_login`),
  ADD KEY `party_lmcul` (`last_modified_by_user_login`),
  ADD KEY `party_pref_crncy` (`preferred_currency_uom_id`),
  ADD KEY `party_statusitm` (`status_id`),
  ADD KEY `party_datsrc` (`data_source_id`),
  ADD KEY `party_txstmp` (`last_updated_tx_stamp`),
  ADD KEY `party_txcrts` (`created_tx_stamp`),
  ADD KEY `partyext_id_idx` (`external_id`);

--
-- Indexes for table `party_contact_mech`
--
ALTER TABLE `party_contact_mech`
  ADD PRIMARY KEY (`party_id`,`contact_mech_id`,`from_date`),
  ADD KEY `party_cmech_party` (`party_id`),
  ADD KEY `party_cmech_prole` (`party_id`,`role_type_id`),
  ADD KEY `party_cmech_role` (`role_type_id`),
  ADD KEY `party_cmech_cmech` (`contact_mech_id`),
  ADD KEY `prt_cntt_mch_txstp` (`last_updated_tx_stamp`),
  ADD KEY `prt_cntt_mch_txcrs` (`created_tx_stamp`);

--
-- Indexes for table `party_favourite_driver`
--
ALTER TABLE `party_favourite_driver`
  ADD PRIMARY KEY (`party_favourite_driver_id`);

--
-- Indexes for table `party_notification`
--
ALTER TABLE `party_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `party_type`
--
ALTER TABLE `party_type`
  ADD PRIMARY KEY (`party_type_id`),
  ADD KEY `party_type_par` (`parent_type_id`),
  ADD KEY `party_type_txstmp` (`last_updated_tx_stamp`),
  ADD KEY `party_type_txcrts` (`created_tx_stamp`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`party_id`),
  ADD UNIQUE KEY `card_id_idx` (`card_id`),
  ADD KEY `person_party` (`party_id`),
  ADD KEY `person_emps_enum` (`employment_status_enum_id`),
  ADD KEY `person_ress_enum` (`residence_status_enum_id`),
  ADD KEY `person_txstmp` (`last_updated_tx_stamp`),
  ADD KEY `person_txcrts` (`created_tx_stamp`),
  ADD KEY `first_name_idx` (`first_name`),
  ADD KEY `last_name_idx` (`last_name`);

--
-- Indexes for table `postal_address`
--
ALTER TABLE `postal_address`
  ADD PRIMARY KEY (`contact_mech_id`),
  ADD KEY `post_addr_cmech` (`contact_mech_id`),
  ADD KEY `post_addr_cgeo` (`country_geo_id`),
  ADD KEY `post_addr_spgeo` (`state_province_geo_id`),
  ADD KEY `post_addr_cntg` (`county_geo_id`),
  ADD KEY `post_addr_pcgeo` (`postal_code_geo_id`),
  ADD KEY `post_addr_geopt` (`geo_point_id`),
  ADD KEY `pstl_addrss_txstmp` (`last_updated_tx_stamp`),
  ADD KEY `pstl_addrss_txcrts` (`created_tx_stamp`),
  ADD KEY `address1_idx` (`address1`),
  ADD KEY `address2_idx` (`address2`),
  ADD KEY `city_idx` (`city`),
  ADD KEY `postal_code_idx` (`postal_code`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`privacy_policy_id`);

--
-- Indexes for table `telecom_number`
--
ALTER TABLE `telecom_number`
  ADD PRIMARY KEY (`contact_mech_id`),
  ADD KEY `tel_num_cmech` (`contact_mech_id`),
  ADD KEY `tlcm_nmbr_txstmp` (`last_updated_tx_stamp`),
  ADD KEY `tlcm_nmbr_txcrts` (`created_tx_stamp`),
  ADD KEY `country_code_idx` (`country_code`),
  ADD KEY `area_code_idx` (`area_code`),
  ADD KEY `contact_number_idx` (`contact_number`);

--
-- Indexes for table `term_condition`
--
ALTER TABLE `term_condition`
  ADD PRIMARY KEY (`term_condition_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`token_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_login_id`),
  ADD KEY `user_party` (`party_id`),
  ADD KEY `user_login_txstmp` (`last_updated_tx_stamp`),
  ADD KEY `user_login_txcrts` (`created_tx_stamp`);

--
-- Indexes for table `user_login_history`
--
ALTER TABLE `user_login_history`
  ADD PRIMARY KEY (`user_login_id`,`from_date`),
  ADD KEY `user_lh_user` (`user_login_id`),
  ADD KEY `user_lh_party` (`party_id`),
  ADD KEY `usr_lgn_hsr_txstmp` (`last_updated_tx_stamp`),
  ADD KEY `usr_lgn_hsr_txcrts` (`created_tx_stamp`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`vehicle_type_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- Indexes for table `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  ADD PRIMARY KEY (`wallet_trasaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_us_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `billing_receipt`
--
ALTER TABLE `billing_receipt`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contact_mech`
--
ALTER TABLE `contact_mech`
  MODIFY `contact_mech_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9193;
--
-- AUTO_INCREMENT for table `discount_promocode`
--
ALTER TABLE `discount_promocode`
  MODIFY `discount_promocode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `faq_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `item_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news_suscription`
--
ALTER TABLE `news_suscription`
  MODIFY `news_sub_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_additional_services`
--
ALTER TABLE `order_additional_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_bid`
--
ALTER TABLE `order_bid`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_bidding`
--
ALTER TABLE `order_bidding`
  MODIFY `order_bidding_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `order_contact`
--
ALTER TABLE `order_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_delivery_contact`
--
ALTER TABLE `order_delivery_contact`
  MODIFY `deliver_contact_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `order_invoice`
--
ALTER TABLE `order_invoice`
  MODIFY `invoice_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `order_location`
--
ALTER TABLE `order_location`
  MODIFY `order_location_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `order_move`
--
ALTER TABLE `order_move`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `order_services_conn`
--
ALTER TABLE `order_services_conn`
  MODIFY `order_services_conn_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `party_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `party_favourite_driver`
--
ALTER TABLE `party_favourite_driver`
  MODIFY `party_favourite_driver_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `party_notification`
--
ALTER TABLE `party_notification`
  MODIFY `notification_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1343;
--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `privacy_policy_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `term_condition`
--
ALTER TABLE `term_condition`
  MODIFY `term_condition_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `token_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `vehicle_type_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  MODIFY `wallet_trasaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_mech_type`
--
ALTER TABLE `contact_mech_type`
  ADD CONSTRAINT `cont_mech_typ_par` FOREIGN KEY (`parent_type_id`) REFERENCES `contact_mech_type` (`contact_mech_type_id`);

--
-- Constraints for table `party_type`
--
ALTER TABLE `party_type`
  ADD CONSTRAINT `party_type_par` FOREIGN KEY (`parent_type_id`) REFERENCES `party_type` (`party_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
