-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2017 at 02:37 PM
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
-- Database: `a3bhacey_lalamoves`
--

-- --------------------------------------------------------

--
-- Table structure for table `ABOUT_US`
--

CREATE TABLE `ABOUT_US` (
  `ABOUT_US_ID` int(11) NOT NULL,
  `TITLE` varchar(10) NOT NULL,
  `DESCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `CONTACT_MECH`
--

CREATE TABLE `CONTACT_MECH` (
  `CONTACT_MECH_ID` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `CONTACT_MECH_TYPE_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `INFO_STRING` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_UPDATED_STAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_TX_STAMP` datetime DEFAULT NULL,
  `CREATED_STAMP` datetime DEFAULT NULL,
  `CREATED_TX_STAMP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `CONTACT_MECH_TYPE`
--

CREATE TABLE `CONTACT_MECH_TYPE` (
  `CONTACT_MECH_TYPE_ID` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `PARENT_TYPE_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `HAS_TABLE` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `DESCRIPTION` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_UPDATED_STAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_TX_STAMP` datetime DEFAULT NULL,
  `CREATED_STAMP` datetime DEFAULT NULL,
  `CREATED_TX_STAMP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `CONTACT_MECH_TYPE`
--

INSERT INTO `CONTACT_MECH_TYPE` (`CONTACT_MECH_TYPE_ID`, `PARENT_TYPE_ID`, `HAS_TABLE`, `DESCRIPTION`, `LAST_UPDATED_STAMP`, `LAST_UPDATED_TX_STAMP`, `CREATED_STAMP`, `CREATED_TX_STAMP`) VALUES
('DOMAIN_NAME', 'ELECTRONIC_ADDRESS', 'N', 'Internet Domain Name', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('ELECTRONIC_ADDRESS', NULL, 'N', 'Electronic Address', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('EMAIL_ADDRESS', 'ELECTRONIC_ADDRESS', 'N', 'Email Address', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('INTERNAL_PARTYID', 'ELECTRONIC_ADDRESS', 'N', 'Internal Note via partyId', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('IP_ADDRESS', 'ELECTRONIC_ADDRESS', 'N', 'Internet IP Address', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('LDAP_ADDRESS', 'ELECTRONIC_ADDRESS', 'N', 'LDAP URL', '2017-07-07 00:16:26', '2017-07-07 00:16:25', '2017-07-07 00:16:26', '2017-07-07 00:16:25'),
('POSTAL_ADDRESS', NULL, 'Y', 'Postal Address', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('TELECOM_NUMBER', NULL, 'Y', 'Phone Number', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('WEB_ADDRESS', 'ELECTRONIC_ADDRESS', 'N', 'Web URL/Address', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `DISCOUNT_PROMOCOE`
--

CREATE TABLE `DISCOUNT_PROMOCOE` (
  `ID` int(11) NOT NULL,
  `PARTY_ID` int(11) NOT NULL,
  `FOR_ALL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `FAQS`
--

CREATE TABLE `FAQS` (
  `FAQ_ID` int(11) NOT NULL,
  `TITLE` varchar(10) NOT NULL,
  `QUESTION` varchar(20) NOT NULL,
  `ANWSER` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ITEM_TYPE`
--

CREATE TABLE `ITEM_TYPE` (
  `ITEM_TYPE_ID` int(11) NOT NULL,
  `NAME` varchar(10) NOT NULL,
  `DESCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `NEWS_SUSCRIPTION`
--

CREATE TABLE `NEWS_SUSCRIPTION` (
  `NEWS_SUB_ID` int(11) NOT NULL,
  `TITLE` varchar(10) NOT NULL,
  `DESCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `OPERATIONAL_CITY`
--

CREATE TABLE `OPERATIONAL_CITY` (
  `OPERATIONAL_CITY_ID` int(11) NOT NULL,
  `CITY_NAME` varchar(20) NOT NULL,
  `LONGITUDE` varchar(20) NOT NULL,
  `LATTITUDE` varchar(20) NOT NULL,
  `DESCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ORDER`
--

CREATE TABLE `ORDER` (
  `ORDER_ID` int(11) NOT NULL,
  `ORDER_DATE` datetime NOT NULL,
  `ITEM_TYPE_ID` int(11) NOT NULL,
  `ORDER_BY` int(11) NOT NULL,
  `DESCRIPTION` varchar(20) NOT NULL,
  `ORDER_STATUS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ORDER_CONTACT`
--

CREATE TABLE `ORDER_CONTACT` (
  `CONTACT_ID` int(11) NOT NULL,
  `ORDER_STOP_ID` int(11) NOT NULL,
  `ORDER_STOP_NAME` varchar(20) NOT NULL,
  `MOBILE_NO` varchar(10) NOT NULL,
  `ALT_MOBILE_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ORDER_STATUS`
--

CREATE TABLE `ORDER_STATUS` (
  `ORDER_STATUS_ID` int(11) NOT NULL,
  `TITLE` varchar(10) NOT NULL,
  `DESCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ORDER_STOP`
--

CREATE TABLE `ORDER_STOP` (
  `ORDER_STOP_ID` int(11) NOT NULL,
  `STOP_NAME` varchar(20) NOT NULL,
  `STOP_ADDRESS1` varchar(20) NOT NULL,
  `STOP_ADDRESS2` varchar(20) NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `STATUS` int(11) NOT NULL,
  `POSTAL_CODE` int(20) NOT NULL,
  `ORDER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PARTY`
--

CREATE TABLE `PARTY` (
  `PARTY_ID` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `PARTY_TYPE_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `EXTERNAL_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `PREFERRED_CURRENCY_UOM_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `DESCRIPTION` longtext COLLATE latin1_general_cs,
  `STATUS_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `CREATED_BY_USER_LOGIN` varchar(250) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_MODIFIED_DATE` datetime DEFAULT NULL,
  `LAST_MODIFIED_BY_USER_LOGIN` varchar(250) COLLATE latin1_general_cs DEFAULT NULL,
  `DATA_SOURCE_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `IS_UNREAD` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_UPDATED_STAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_TX_STAMP` datetime DEFAULT NULL,
  `CREATED_STAMP` datetime DEFAULT NULL,
  `CREATED_TX_STAMP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `PARTY_CONTACT_MECH`
--

CREATE TABLE `PARTY_CONTACT_MECH` (
  `PARTY_ID` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `CONTACT_MECH_ID` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `FROM_DATE` datetime NOT NULL,
  `THRU_DATE` datetime DEFAULT NULL,
  `ROLE_TYPE_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `ALLOW_SOLICITATION` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `EXTENSION` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `VERIFIED` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `COMMENTS` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `YEARS_WITH_CONTACT_MECH` decimal(20,0) DEFAULT NULL,
  `MONTHS_WITH_CONTACT_MECH` decimal(20,0) DEFAULT NULL,
  `LAST_UPDATED_STAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_TX_STAMP` datetime DEFAULT NULL,
  `CREATED_STAMP` datetime DEFAULT NULL,
  `CREATED_TX_STAMP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `PARTY_GROUP`
--

CREATE TABLE `PARTY_GROUP` (
  `PARTY_ID` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `GROUP_NAME` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `GROUP_NAME_LOCAL` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `OFFICE_SITE_NAME` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `ANNUAL_REVENUE` decimal(18,2) DEFAULT NULL,
  `NUM_EMPLOYEES` decimal(20,0) DEFAULT NULL,
  `TICKER_SYMBOL` varchar(10) COLLATE latin1_general_cs DEFAULT NULL,
  `COMMENTS` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `LOGO_IMAGE_URL` varchar(2000) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_UPDATED_STAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_TX_STAMP` datetime DEFAULT NULL,
  `CREATED_STAMP` datetime DEFAULT NULL,
  `CREATED_TX_STAMP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `PARTY_GROUP`
--

INSERT INTO `PARTY_GROUP` (`PARTY_ID`, `GROUP_NAME`, `GROUP_NAME_LOCAL`, `OFFICE_SITE_NAME`, `ANNUAL_REVENUE`, `NUM_EMPLOYEES`, `TICKER_SYMBOL`, `COMMENTS`, `LOGO_IMAGE_URL`, `LAST_UPDATED_STAMP`, `LAST_UPDATED_TX_STAMP`, `CREATED_STAMP`, `CREATED_TX_STAMP`) VALUES
('TestingTeam1', 'Testing Team1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-07-07 00:16:31', '2017-07-07 00:16:31', '2017-07-07 00:16:31', '2017-07-07 00:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `PARTY_TYPE`
--

CREATE TABLE `PARTY_TYPE` (
  `PARTY_TYPE_ID` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `PARENT_TYPE_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `HAS_TABLE` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `DESCRIPTION` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_UPDATED_STAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_TX_STAMP` datetime DEFAULT NULL,
  `CREATED_STAMP` datetime DEFAULT NULL,
  `CREATED_TX_STAMP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `PARTY_TYPE`
--

INSERT INTO `PARTY_TYPE` (`PARTY_TYPE_ID`, `PARENT_TYPE_ID`, `HAS_TABLE`, `DESCRIPTION`, `LAST_UPDATED_STAMP`, `LAST_UPDATED_TX_STAMP`, `CREATED_STAMP`, `CREATED_TX_STAMP`) VALUES
('AUTOMATED_AGENT', NULL, 'N', 'Automated Agent', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('CORPORATION', 'LEGAL_ORGANIZATION', 'N', 'Corporation', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('FAMILY', 'INFORMAL_GROUP', 'N', 'Family', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('GOVERNMENT_AGENCY', 'LEGAL_ORGANIZATION', 'N', 'Government Agency', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('INFORMAL_GROUP', 'PARTY_GROUP', 'N', 'Informal Group', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('LEGAL_ORGANIZATION', 'PARTY_GROUP', 'N', 'Legal Organization', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('PARTY_GROUP', NULL, 'Y', 'Party Group', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('PERSON', NULL, 'Y', 'Person', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24'),
('TEAM', 'INFORMAL_GROUP', 'N', 'Team', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24', '2017-07-07 00:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `POSTAL_ADDRESS`
--

CREATE TABLE `POSTAL_ADDRESS` (
  `CONTACT_MECH_ID` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `TO_NAME` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `ATTN_NAME` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `ADDRESS1` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `ADDRESS2` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `DIRECTIONS` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `CITY` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `POSTAL_CODE` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `POSTAL_CODE_EXT` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `COUNTRY_GEO_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `STATE_PROVINCE_GEO_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `COUNTY_GEO_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `POSTAL_CODE_GEO_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `GEO_POINT_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_UPDATED_STAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_TX_STAMP` datetime DEFAULT NULL,
  `CREATED_STAMP` datetime DEFAULT NULL,
  `CREATED_TX_STAMP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `POSTAL_ADDRESS`
--

INSERT INTO `POSTAL_ADDRESS` (`CONTACT_MECH_ID`, `TO_NAME`, `ATTN_NAME`, `ADDRESS1`, `ADDRESS2`, `DIRECTIONS`, `CITY`, `POSTAL_CODE`, `POSTAL_CODE_EXT`, `COUNTRY_GEO_ID`, `STATE_PROVINCE_GEO_ID`, `COUNTY_GEO_ID`, `POSTAL_CODE_GEO_ID`, `GEO_POINT_ID`, `LAST_UPDATED_STAMP`, `LAST_UPDATED_TX_STAMP`, `CREATED_STAMP`, `CREATED_TX_STAMP`) VALUES
('9000', 'Company XYZ', NULL, '2003 Open Blvd', NULL, NULL, 'Open City', '999999', NULL, 'USA', 'CA', NULL, NULL, '9000', '2017-07-07 00:16:31', '2017-07-07 00:16:31', '2017-07-07 00:16:31', '2017-07-07 00:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `PRIVACY_POLICY`
--

CREATE TABLE `PRIVACY_POLICY` (
  `PRIVACY_POLICY_ID` int(11) NOT NULL,
  `TITLE` varchar(10) NOT NULL,
  `DESCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TELECOM_NUMBER`
--

CREATE TABLE `TELECOM_NUMBER` (
  `CONTACT_MECH_ID` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `COUNTRY_CODE` varchar(10) COLLATE latin1_general_cs DEFAULT NULL,
  `AREA_CODE` varchar(10) COLLATE latin1_general_cs DEFAULT NULL,
  `CONTACT_NUMBER` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `ASK_FOR_NAME` varchar(100) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_UPDATED_STAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_TX_STAMP` datetime DEFAULT NULL,
  `CREATED_STAMP` datetime DEFAULT NULL,
  `CREATED_TX_STAMP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `TELECOM_NUMBER`
--

INSERT INTO `TELECOM_NUMBER` (`CONTACT_MECH_ID`, `COUNTRY_CODE`, `AREA_CODE`, `CONTACT_NUMBER`, `ASK_FOR_NAME`, `LAST_UPDATED_STAMP`, `LAST_UPDATED_TX_STAMP`, `CREATED_STAMP`, `CREATED_TX_STAMP`) VALUES
('9020', NULL, '801', '555-5555', NULL, '2017-07-07 00:16:37', '2017-07-07 00:16:37', '2017-07-07 00:16:37', '2017-07-07 00:16:37'),
('9022', NULL, '801', '555-5555', NULL, '2017-07-07 00:16:37', '2017-07-07 00:16:37', '2017-07-07 00:16:37', '2017-07-07 00:16:37'),
('9025', '1', '801', '555-5555', NULL, '2017-07-07 00:16:37', '2017-07-07 00:16:37', '2017-07-07 00:16:37', '2017-07-07 00:16:37'),
('9027', '1', '801', '444-4444', NULL, '2017-07-07 00:16:37', '2017-07-07 00:16:37', '2017-07-07 00:16:37', '2017-07-07 00:16:37'),
('9201', NULL, '801', '555-5555', NULL, '2017-07-07 00:16:32', '2017-07-07 00:16:32', '2017-07-07 00:16:32', '2017-07-07 00:16:32'),
('9301', NULL, '212', '555-5555', NULL, '2017-07-07 00:16:39', '2017-07-07 00:16:39', '2017-07-07 00:16:39', '2017-07-07 00:16:39'),
('sfa101', '1', '33', '12456', NULL, '2017-07-07 00:16:32', '2017-07-07 00:16:32', '2017-07-07 00:16:32', '2017-07-07 00:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `TERM_CONDITION`
--

CREATE TABLE `TERM_CONDITION` (
  `TERM_CONDITION_ID` int(11) NOT NULL,
  `TITLE` varchar(10) NOT NULL,
  `DESCRIPTION` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `TOKEN`
--

CREATE TABLE `TOKEN` (
  `TOKEN_ID` int(11) NOT NULL,
  `PARTY_ID` int(11) NOT NULL,
  `TOKEN_NUMBER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `USER_LOGIN`
--

CREATE TABLE `USER_LOGIN` (
  `USER_LOGIN_ID` varchar(250) COLLATE latin1_general_cs NOT NULL,
  `CURRENT_PASSWORD` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `PASSWORD_HINT` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `IS_SYSTEM` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `ENABLED` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `HAS_LOGGED_OUT` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `REQUIRE_PASSWORD_CHANGE` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_CURRENCY_UOM` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_LOCALE` varchar(10) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_TIME_ZONE` varchar(60) COLLATE latin1_general_cs DEFAULT NULL,
  `DISABLED_DATE_TIME` datetime DEFAULT NULL,
  `SUCCESSIVE_FAILED_LOGINS` decimal(20,0) DEFAULT NULL,
  `EXTERNAL_AUTH_ID` varchar(250) COLLATE latin1_general_cs DEFAULT NULL,
  `USER_LDAP_DN` varchar(250) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_UPDATED_STAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_TX_STAMP` datetime DEFAULT NULL,
  `CREATED_STAMP` datetime DEFAULT NULL,
  `CREATED_TX_STAMP` datetime DEFAULT NULL,
  `PARTY_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `USER_LOGIN_HISTORY`
--

CREATE TABLE `USER_LOGIN_HISTORY` (
  `USER_LOGIN_ID` varchar(250) COLLATE latin1_general_cs NOT NULL,
  `VISIT_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL,
  `FROM_DATE` datetime NOT NULL,
  `THRU_DATE` datetime DEFAULT NULL,
  `PASSWORD_USED` varchar(255) COLLATE latin1_general_cs DEFAULT NULL,
  `SUCCESSFUL_LOGIN` char(1) COLLATE latin1_general_cs DEFAULT NULL,
  `LAST_UPDATED_STAMP` datetime DEFAULT NULL,
  `LAST_UPDATED_TX_STAMP` datetime DEFAULT NULL,
  `CREATED_STAMP` datetime DEFAULT NULL,
  `CREATED_TX_STAMP` datetime DEFAULT NULL,
  `PARTY_ID` varchar(20) COLLATE latin1_general_cs DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE`
--

CREATE TABLE `VEHICLE` (
  `VEHICLE_ID` int(11) NOT NULL,
  `PARTY_ID` int(11) NOT NULL,
  `VEHICLE_TYPE_ID` int(11) NOT NULL,
  `REGISTRATION_NO` varchar(20) NOT NULL,
  `PERMIT_FROM` varchar(20) NOT NULL,
  `PERMIT_TO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `VEHICLE_TYPE`
--

CREATE TABLE `VEHICLE_TYPE` (
  `VEHICLE_TYPE_ID` int(11) NOT NULL,
  `VEHICLE_TYPE_NAME` varchar(10) NOT NULL,
  `VEHICLE_WEIGHT_CAPACITY` int(11) NOT NULL,
  `ITEM_HEIGHT` int(11) NOT NULL,
  `ITEM_WIDTH` int(11) NOT NULL,
  `ITEM_LENGTH` int(11) NOT NULL,
  `BASE_FARE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `WALLET`
--

CREATE TABLE `WALLET` (
  `WALLET_ID` int(11) NOT NULL,
  `AMOUNT` varchar(10) NOT NULL,
  `PARTY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `WALLET_TRANSACTION`
--

CREATE TABLE `WALLET_TRANSACTION` (
  `WALLET_TRASACTION_ID` int(11) NOT NULL,
  `PARTY_ID` int(11) NOT NULL,
  `TRASACTION_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FROM_ID` int(11) NOT NULL,
  `TO_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ABOUT_US`
--
ALTER TABLE `ABOUT_US`
  ADD PRIMARY KEY (`ABOUT_US_ID`);

--
-- Indexes for table `CONTACT_MECH`
--
ALTER TABLE `CONTACT_MECH`
  ADD PRIMARY KEY (`CONTACT_MECH_ID`),
  ADD KEY `CONT_MECH_TYPE` (`CONTACT_MECH_TYPE_ID`),
  ADD KEY `CNTCT_MCH_TXSTMP` (`LAST_UPDATED_TX_STAMP`),
  ADD KEY `CNTCT_MCH_TXCRTS` (`CREATED_TX_STAMP`),
  ADD KEY `INFO_STRING_IDX` (`INFO_STRING`);

--
-- Indexes for table `CONTACT_MECH_TYPE`
--
ALTER TABLE `CONTACT_MECH_TYPE`
  ADD PRIMARY KEY (`CONTACT_MECH_TYPE_ID`),
  ADD KEY `CONT_MECH_TYP_PAR` (`PARENT_TYPE_ID`),
  ADD KEY `CNTT_MCH_TP_TXSTMP` (`LAST_UPDATED_TX_STAMP`),
  ADD KEY `CNTT_MCH_TP_TXCRTS` (`CREATED_TX_STAMP`);

--
-- Indexes for table `DISCOUNT_PROMOCOE`
--
ALTER TABLE `DISCOUNT_PROMOCOE`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `FAQS`
--
ALTER TABLE `FAQS`
  ADD PRIMARY KEY (`FAQ_ID`);

--
-- Indexes for table `ITEM_TYPE`
--
ALTER TABLE `ITEM_TYPE`
  ADD PRIMARY KEY (`ITEM_TYPE_ID`);

--
-- Indexes for table `NEWS_SUSCRIPTION`
--
ALTER TABLE `NEWS_SUSCRIPTION`
  ADD PRIMARY KEY (`NEWS_SUB_ID`);

--
-- Indexes for table `OPERATIONAL_CITY`
--
ALTER TABLE `OPERATIONAL_CITY`
  ADD PRIMARY KEY (`OPERATIONAL_CITY_ID`);

--
-- Indexes for table `ORDER`
--
ALTER TABLE `ORDER`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `ORDER_CONTACT`
--
ALTER TABLE `ORDER_CONTACT`
  ADD PRIMARY KEY (`CONTACT_ID`);

--
-- Indexes for table `ORDER_STATUS`
--
ALTER TABLE `ORDER_STATUS`
  ADD PRIMARY KEY (`ORDER_STATUS_ID`);

--
-- Indexes for table `ORDER_STOP`
--
ALTER TABLE `ORDER_STOP`
  ADD PRIMARY KEY (`ORDER_STOP_ID`);

--
-- Indexes for table `PARTY`
--
ALTER TABLE `PARTY`
  ADD PRIMARY KEY (`PARTY_ID`),
  ADD KEY `PARTY_PTY_TYP` (`PARTY_TYPE_ID`),
  ADD KEY `PARTY_CUL` (`CREATED_BY_USER_LOGIN`),
  ADD KEY `PARTY_LMCUL` (`LAST_MODIFIED_BY_USER_LOGIN`),
  ADD KEY `PARTY_PREF_CRNCY` (`PREFERRED_CURRENCY_UOM_ID`),
  ADD KEY `PARTY_STATUSITM` (`STATUS_ID`),
  ADD KEY `PARTY_DATSRC` (`DATA_SOURCE_ID`),
  ADD KEY `PARTY_TXSTMP` (`LAST_UPDATED_TX_STAMP`),
  ADD KEY `PARTY_TXCRTS` (`CREATED_TX_STAMP`),
  ADD KEY `PARTYEXT_ID_IDX` (`EXTERNAL_ID`);

--
-- Indexes for table `PARTY_CONTACT_MECH`
--
ALTER TABLE `PARTY_CONTACT_MECH`
  ADD PRIMARY KEY (`PARTY_ID`,`CONTACT_MECH_ID`,`FROM_DATE`),
  ADD KEY `PARTY_CMECH_PARTY` (`PARTY_ID`),
  ADD KEY `PARTY_CMECH_PROLE` (`PARTY_ID`,`ROLE_TYPE_ID`),
  ADD KEY `PARTY_CMECH_ROLE` (`ROLE_TYPE_ID`),
  ADD KEY `PARTY_CMECH_CMECH` (`CONTACT_MECH_ID`),
  ADD KEY `PRT_CNTT_MCH_TXSTP` (`LAST_UPDATED_TX_STAMP`),
  ADD KEY `PRT_CNTT_MCH_TXCRS` (`CREATED_TX_STAMP`);

--
-- Indexes for table `PARTY_GROUP`
--
ALTER TABLE `PARTY_GROUP`
  ADD PRIMARY KEY (`PARTY_ID`),
  ADD KEY `PARTY_GRP_PARTY` (`PARTY_ID`),
  ADD KEY `PARTY_GROUP_TXSTMP` (`LAST_UPDATED_TX_STAMP`),
  ADD KEY `PARTY_GROUP_TXCRTS` (`CREATED_TX_STAMP`),
  ADD KEY `GROUP_NAME_IDX` (`GROUP_NAME`);

--
-- Indexes for table `PARTY_TYPE`
--
ALTER TABLE `PARTY_TYPE`
  ADD PRIMARY KEY (`PARTY_TYPE_ID`),
  ADD KEY `PARTY_TYPE_PAR` (`PARENT_TYPE_ID`),
  ADD KEY `PARTY_TYPE_TXSTMP` (`LAST_UPDATED_TX_STAMP`),
  ADD KEY `PARTY_TYPE_TXCRTS` (`CREATED_TX_STAMP`);

--
-- Indexes for table `POSTAL_ADDRESS`
--
ALTER TABLE `POSTAL_ADDRESS`
  ADD PRIMARY KEY (`CONTACT_MECH_ID`),
  ADD KEY `POST_ADDR_CMECH` (`CONTACT_MECH_ID`),
  ADD KEY `POST_ADDR_CGEO` (`COUNTRY_GEO_ID`),
  ADD KEY `POST_ADDR_SPGEO` (`STATE_PROVINCE_GEO_ID`),
  ADD KEY `POST_ADDR_CNTG` (`COUNTY_GEO_ID`),
  ADD KEY `POST_ADDR_PCGEO` (`POSTAL_CODE_GEO_ID`),
  ADD KEY `POST_ADDR_GEOPT` (`GEO_POINT_ID`),
  ADD KEY `PSTL_ADDRSS_TXSTMP` (`LAST_UPDATED_TX_STAMP`),
  ADD KEY `PSTL_ADDRSS_TXCRTS` (`CREATED_TX_STAMP`),
  ADD KEY `ADDRESS1_IDX` (`ADDRESS1`),
  ADD KEY `ADDRESS2_IDX` (`ADDRESS2`),
  ADD KEY `CITY_IDX` (`CITY`),
  ADD KEY `POSTAL_CODE_IDX` (`POSTAL_CODE`);

--
-- Indexes for table `PRIVACY_POLICY`
--
ALTER TABLE `PRIVACY_POLICY`
  ADD PRIMARY KEY (`PRIVACY_POLICY_ID`);

--
-- Indexes for table `TELECOM_NUMBER`
--
ALTER TABLE `TELECOM_NUMBER`
  ADD PRIMARY KEY (`CONTACT_MECH_ID`),
  ADD KEY `TEL_NUM_CMECH` (`CONTACT_MECH_ID`),
  ADD KEY `TLCM_NMBR_TXSTMP` (`LAST_UPDATED_TX_STAMP`),
  ADD KEY `TLCM_NMBR_TXCRTS` (`CREATED_TX_STAMP`),
  ADD KEY `COUNTRY_CODE_IDX` (`COUNTRY_CODE`),
  ADD KEY `AREA_CODE_IDX` (`AREA_CODE`),
  ADD KEY `CONTACT_NUMBER_IDX` (`CONTACT_NUMBER`);

--
-- Indexes for table `TERM_CONDITION`
--
ALTER TABLE `TERM_CONDITION`
  ADD PRIMARY KEY (`TERM_CONDITION_ID`);

--
-- Indexes for table `TOKEN`
--
ALTER TABLE `TOKEN`
  ADD PRIMARY KEY (`TOKEN_ID`);

--
-- Indexes for table `USER_LOGIN`
--
ALTER TABLE `USER_LOGIN`
  ADD PRIMARY KEY (`USER_LOGIN_ID`),
  ADD KEY `USER_PARTY` (`PARTY_ID`),
  ADD KEY `USER_LOGIN_TXSTMP` (`LAST_UPDATED_TX_STAMP`),
  ADD KEY `USER_LOGIN_TXCRTS` (`CREATED_TX_STAMP`);

--
-- Indexes for table `USER_LOGIN_HISTORY`
--
ALTER TABLE `USER_LOGIN_HISTORY`
  ADD PRIMARY KEY (`USER_LOGIN_ID`,`FROM_DATE`),
  ADD KEY `USER_LH_USER` (`USER_LOGIN_ID`),
  ADD KEY `USER_LH_PARTY` (`PARTY_ID`),
  ADD KEY `USR_LGN_HSR_TXSTMP` (`LAST_UPDATED_TX_STAMP`),
  ADD KEY `USR_LGN_HSR_TXCRTS` (`CREATED_TX_STAMP`);

--
-- Indexes for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  ADD PRIMARY KEY (`VEHICLE_ID`);

--
-- Indexes for table `VEHICLE_TYPE`
--
ALTER TABLE `VEHICLE_TYPE`
  ADD PRIMARY KEY (`VEHICLE_TYPE_ID`);

--
-- Indexes for table `WALLET`
--
ALTER TABLE `WALLET`
  ADD PRIMARY KEY (`WALLET_ID`);

--
-- Indexes for table `WALLET_TRANSACTION`
--
ALTER TABLE `WALLET_TRANSACTION`
  ADD PRIMARY KEY (`WALLET_TRASACTION_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ABOUT_US`
--
ALTER TABLE `ABOUT_US`
  MODIFY `ABOUT_US_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `DISCOUNT_PROMOCOE`
--
ALTER TABLE `DISCOUNT_PROMOCOE`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `FAQS`
--
ALTER TABLE `FAQS`
  MODIFY `FAQ_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ITEM_TYPE`
--
ALTER TABLE `ITEM_TYPE`
  MODIFY `ITEM_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `NEWS_SUSCRIPTION`
--
ALTER TABLE `NEWS_SUSCRIPTION`
  MODIFY `NEWS_SUB_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `OPERATIONAL_CITY`
--
ALTER TABLE `OPERATIONAL_CITY`
  MODIFY `OPERATIONAL_CITY_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ORDER`
--
ALTER TABLE `ORDER`
  MODIFY `ORDER_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ORDER_CONTACT`
--
ALTER TABLE `ORDER_CONTACT`
  MODIFY `CONTACT_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ORDER_STATUS`
--
ALTER TABLE `ORDER_STATUS`
  MODIFY `ORDER_STATUS_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ORDER_STOP`
--
ALTER TABLE `ORDER_STOP`
  MODIFY `ORDER_STOP_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `PRIVACY_POLICY`
--
ALTER TABLE `PRIVACY_POLICY`
  MODIFY `PRIVACY_POLICY_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TERM_CONDITION`
--
ALTER TABLE `TERM_CONDITION`
  MODIFY `TERM_CONDITION_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `TOKEN`
--
ALTER TABLE `TOKEN`
  MODIFY `TOKEN_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `VEHICLE`
--
ALTER TABLE `VEHICLE`
  MODIFY `VEHICLE_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `VEHICLE_TYPE`
--
ALTER TABLE `VEHICLE_TYPE`
  MODIFY `VEHICLE_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `WALLET`
--
ALTER TABLE `WALLET`
  MODIFY `WALLET_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `WALLET_TRANSACTION`
--
ALTER TABLE `WALLET_TRANSACTION`
  MODIFY `WALLET_TRASACTION_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `CONTACT_MECH_TYPE`
--
ALTER TABLE `CONTACT_MECH_TYPE`
  ADD CONSTRAINT `CONT_MECH_TYP_PAR` FOREIGN KEY (`PARENT_TYPE_ID`) REFERENCES `CONTACT_MECH_TYPE` (`CONTACT_MECH_TYPE_ID`);

--
-- Constraints for table `PARTY_TYPE`
--
ALTER TABLE `PARTY_TYPE`
  ADD CONSTRAINT `PARTY_TYPE_PAR` FOREIGN KEY (`PARENT_TYPE_ID`) REFERENCES `PARTY_TYPE` (`PARTY_TYPE_ID`);

--
-- Constraints for table `USER_LOGIN_HISTORY`
--
ALTER TABLE `USER_LOGIN_HISTORY`
  ADD CONSTRAINT `USER_LH_PARTY` FOREIGN KEY (`PARTY_ID`) REFERENCES `PARTY` (`PARTY_ID`),
  ADD CONSTRAINT `USER_LH_USER` FOREIGN KEY (`USER_LOGIN_ID`) REFERENCES `USER_LOGIN` (`USER_LOGIN_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
