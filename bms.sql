-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 07:16 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomodation`
--

CREATE TABLE `accomodation` (
  `acc_id` int(11) NOT NULL,
  `acc_type` varchar(35) NOT NULL,
  `acc_price` double NOT NULL,
  `acc_slot` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accomodation`
--

INSERT INTO `accomodation` (`acc_id`, `acc_type`, `acc_price`, `acc_slot`) VALUES
(1, 'Sitting', 350, 30),
(2, 'Economy A', 390, 30),
(3, 'Economy B', 390, 30),
(4, 'Tourist', 490, 30),
(5, 'Cabin', 600, 30),
(6, 'Deluxe', 700, 30);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phoneno` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_phoneno`, `user_image`, `user_role`) VALUES
(4, 'manish', 'manish', 'manish', 'ranjan', 'iit2016059@iiita.ac.in', '6475896232', 'user_default_girl.jpg', 'admin'),
(5, 'amit', 'amit', 'Amit', 'Gomi', 'lit2016011@iiila.ac.in', '9784512659', 'user_default.jpg', 'subscriber'),
(26, 'ankur1234', 'manya', 'Owner', 'Old', 'iit2016054@iiita.ac.in', '9784584566', 'phtpp.jpg', 'subscriber'),
(30, 'Pratyush', 'pratysh', 'Pratyush', 'Garg', 'pg@gmail.com', '9457865214', 'user_default.jpg', 'admin'),
(2, 'prateek', 'saraswat', 'prateek', 'saraswat', 'saraswat.prateek100@gmail.com', '9457507662', 'user_default.jpg', 'admin'),
(4, 'manish', 'manish', 'manish', 'ranjan', 'iit2016059@iiita.ac.in', '6475896232', 'user_default_girl.jpg', 'subscriber'),
(5, 'amit', 'amit', 'Amit', 'Gomi', 'lit2016011@iiila.ac.in', '9784512659', 'user_default.jpg', 'admin'),
(26, 'ankur1234', 'manya', 'Owner', 'Old', 'iit2016054@iiita.ac.in', '9784584566', 'phtpp.jpg', 'subscriber'),
(28, 'Hemu', 'heamnt', 'Hemant', 'Singh', 'iit2016070@iiita.ac.in', '9456213654', 'user_default.jpg', 'subscriber'),
(29, 'vipul', 'vipul', 'Vipul', 'Singhal', 'iit2016049@iiita.ac.in', '9456213654', 'user_default_girl.jpg', 'subscriber'),
(30, 'Pratyush', 'pratysh', 'Pratyush', 'Garg', 'pg@gmail.com', '9457865214', 'user_default.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `book_id` int(11) NOT NULL,
  `book_by` varchar(50) NOT NULL,
  `book_contact` varchar(15) NOT NULL,
  `book_address` varchar(100) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_age` int(11) NOT NULL,
  `book_gender` varchar(15) NOT NULL,
  `book_departure` date NOT NULL,
  `dest_id` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `book_tracker` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(3, 'Daily Buses'),
(4, 'Weekly Buses'),
(5, 'Night Buses'),
(0, 'Morning bus');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`) VALUES
(1, 'Rawat om k.', 'om@gmail.com', 'I just want to give adn=vice');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `start` varchar(255) NOT NULL,
  `stopage` varchar(255) NOT NULL,
  `category` int(3) NOT NULL,
  `cost` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`start`, `stopage`, `category`, `cost`) VALUES
('Kanpur', 'Unnao', 5, 100),
('Unnao', 'Lucknow', 5, 152);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `dest_id` int(11) NOT NULL,
  `dest_destination` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`dest_id`, `dest_destination`) VALUES
(1, 'Ahmedabad'),
(2, 'Amreli'),
(3, 'Anand'),
(4, 'Aravalli'),
(5, 'Aravalli'),
(6, 'Banaskantha'),
(7, 'Bharuch'),
(8, 'Bhavnagar'),
(9, 'Botad'),
(10, 'Chhota Udaipur'),
(11, 'Dahod'),
(12, 'Dang'),
(13, 'Devbhoomi Dwarka'),
(14, 'Gandhinagar'),
(15, 'Gir Somnath'),
(16, 'Jamnagar'),
(17, 'Junagadh'),
(18, 'Kutch'),
(19, 'Kheda'),
(20, 'Aravalli'),
(21, 'Mahisagar'),
(22, 'Mehsana'),
(23, 'Morbi'),
(24, 'Narmada'),
(25, 'Navsari'),
(26, 'Panchmahal'),
(27, 'Patan'),
(28, 'Porbandar'),
(29, 'Rajkot'),
(30, 'Sabarkantha'),
(31, 'Surat'),
(32, 'Surendranagar'),
(33, 'Tapi'),
(34, 'Vadodara'),
(35, 'Valsad');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `rating1` int(11) DEFAULT NULL,
  `rating2` int(11) DEFAULT NULL,
  `rating3` int(11) DEFAULT NULL,
  `commentText` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `rating1`, `rating2`, `rating3`, `commentText`, `created_at`) VALUES
(3, 5, 5, 10, 'very nie', '2023-07-04 05:14:09'),
(2, 3, 4, 10, NULL, '2023-07-04 05:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(3) NOT NULL,
  `bus_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_age` int(3) NOT NULL,
  `source` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `cost` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `bus_id`, `user_id`, `user_name`, `user_age`, `source`, `destination`, `date`, `cost`) VALUES
(5, 2, 2, 'dheeraj', 20, 'kanpur', 'lucknow', '2018-03-29', 0),
(6, 2, 2, 'manish', 52, 'kanpur', 'lucknow', '2018-03-29', 0),
(7, 2, 2, 'Pratyush', 10, 'kanpur', 'Lucknow', '2018-04-14', 0),
(10, 2, 2, 'Pratyush', 10, 'Kanpur', 'Lucknow', '2018-04-14', 0),
(11, 4, 3, 'Vikas', 52, 'Chennai', 'Chittor', '2018-04-17', 0),
(14, 4, 3, 'Hemant', 45, 'Chennai', 'Chittor', '2018-04-17', 0),
(15, 6, 2, 'Ankit', 45, 'Agra', 'Mathura', '2018-04-17', 0),
(16, 6, 2, 'Pratyush', 12, 'Agra', 'Mathura', '2018-04-17', 0),
(17, 3, 2, 'Prateek', 20, 'Delhi', 'Surat', '2018-04-17', 0),
(21, 7, 3, 'Prateek', 20, 'Tundla', 'Allahabad', '2018-04-17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `origin`
--

CREATE TABLE `origin` (
  `origin_id` int(11) NOT NULL,
  `origin_desc` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `origin`
--

INSERT INTO `origin` (`origin_id`, `origin_desc`) VALUES
(1, 'Ahmedabad'),
(2, 'Amerli'),
(3, 'Anand'),
(4, 'Aravalli'),
(5, 'Banaskantha'),
(6, 'Bharuch'),
(7, 'Bhavnagar'),
(8, 'Botad'),
(9, 'Chhota Udaipur'),
(10, 'Dahod'),
(11, 'Dang'),
(12, 'Devbhoomi Dwarka'),
(13, 'Gandhinagar'),
(14, 'Gir Somnath'),
(15, 'Jamnagar'),
(16, 'Junagadh'),
(17, 'Kutch'),
(18, 'Kheda'),
(19, 'Mahisagar'),
(20, 'Mehsana'),
(21, 'Morbi'),
(22, 'Narmada'),
(23, 'Navsari'),
(24, 'Panchmahal'),
(25, 'Patan'),
(26, 'Porbandar'),
(27, 'Rajkot'),
(28, 'Sabarkantha'),
(29, 'Surat'),
(30, 'Surendranagar'),
(31, 'Tapi'),
(32, 'Vadodara'),
(33, 'Valsad');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_source` varchar(255) NOT NULL,
  `post_destination` varchar(255) NOT NULL,
  `post_via` varchar(255) NOT NULL,
  `post_via_time` varchar(255) NOT NULL,
  `post_query_count` int(3) NOT NULL,
  `max_seats` int(3) NOT NULL,
  `available_seats` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_source`, `post_destination`, `post_via`, `post_via_time`, `post_query_count`, `max_seats`, `available_seats`) VALUES
(2, 3, 'Kanpur to Lucknow', 'Prateek Saraswat', '2018-04-26', 'bus2.jpg', 'Runs daily except Tuesday\r\nA/C Bus', 'Kanpur', 'Lucknow', 'Kanpur Unnao Lucknow', '6:00 8:00 11:00', 2, 20, 10),
(3, 3, 'Delhi to Mumbai', 'Prateek', '2018-04-26', 'bus3.jpg', 'Runs daily \r\nLowest fare among all', 'Delhi', 'Mumbai', 'Delhi Jaipur Udaipur Naidad Surat Mumbai', '3:00 5:00 7:00 12:00 18:00 20:00', 1, 30, 17),
(4, 5, 'Chennai to Bangolore', 'Prateek', '2018-05-18', 'bus4.jpg', 'Runs only on Tuesday', 'Chennai', 'Bangolore', 'Chennai Kanchipuram Chittor Bangolore', '12:00 2:00 5:00 7:00', 6, 0, -2),
(5, 3, 'Chandigarh to Manali', 'Prateek', '2019-06-03', 'bus5.jpg', 'Runs daily', 'Chandigarh', 'Manali', 'Chandigarh Panchkula Mandi Kullu Manali', '12:00 2:00 5:00 7:00 8:00', 0, 0, 0),
(6, 4, 'Agra to Mathura', 'Prateek', '2018-04-26', 'bus1.jpg', 'Weekly', 'Agra', 'Mathura', 'Agra Mathura', '5:00 7:00', 0, 0, 0),
(7, 4, 'Delhi to Allahabad', 'Prateek Saraswat', '2018-04-26', 'bus2.jpg', 'Runs Weekly', 'Delhi', 'Allahabad', 'Delhi Ghaziabad Aligarh Tundla Kanpur Fatehpur Allahabad', '12:00 2:00 5:00 7:00 8:00 9:00 10:00 11:00', 0, 10, 9),
(8, 3, 'Kanpur to Lucknow', 'Prateek Saraswat', '2018-04-30', 'bus2.jpg', 'Runs daily except Tuesday\r\nA/C Bus', 'Kanpur', 'Lucknow', 'Kanpur Unnao Lucknow', '6:00 8:00 11:00', 0, 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `query_id` int(3) NOT NULL,
  `query_bus_id` int(3) NOT NULL,
  `query_user` varchar(255) NOT NULL,
  `query_email` varchar(255) NOT NULL,
  `query_date` date NOT NULL,
  `query_content` text NOT NULL,
  `query_replied` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`query_id`, `query_bus_id`, `query_user`, `query_email`, `query_date`, `query_content`, `query_replied`) VALUES
(8, 4, 'Saraswat', 'prateek@gmail.com', '2018-03-23', 'Good', 'no'),
(9, 2, 'Parteek', 'saraswat.prateek100@gmail.com', '2018-03-17', 'Good', 'no'),
(11, 3, 'Prateek', 'iit2016058@iiita.ac.in', '2018-03-18', 'Good', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `bus_id` int(3) NOT NULL,
  `max_seats` int(3) NOT NULL,
  `available_seats` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `stat_id` int(11) NOT NULL,
  `stat_desc` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`stat_id`, `stat_desc`) VALUES
(1, 'Paid'),
(2, 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 1234567891, 'adminuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2020-04-14 06:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(8, 'AC Bus', '2021-07-04 14:27:53'),
(9, 'Non AC Bus', '2021-07-04 14:28:32'),
(10, 'Volvo Bus', '2021-07-04 14:28:47'),
(11, 'Delux Bus', '2021-07-04 14:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ID` int(10) NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext,
  `EnquiryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsRead` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `Name`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'Kiran', 'kran@gmail.com', 'cost of volvo place pritampura to dwarka', '2021-07-05 07:26:24', 1),
(2, 'Anuj', 'AKKK@GMAIL.COM', 'This is for testing.', '2021-07-11 08:55:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', '<font color=\"#747474\" face=\"Roboto, sans-serif, arial\"><span style=\"font-size: 13px;\"><b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</b></span></font><br>', NULL, NULL, '2021-07-11 08:54:33'),
(2, 'contactus', 'Contact Us', '                #890 CFG Apartment, Mayur Vihar, Delhi-India.', 'infotest@gmail.com', 4654789799, '2021-07-11 08:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblpass`
--

CREATE TABLE `tblpass` (
  `ID` int(10) NOT NULL,
  `PassNumber` varchar(200) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `ProfileImage` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `IdentityType` varchar(200) DEFAULT NULL,
  `IdentityCardno` varchar(200) DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `Source` varchar(200) DEFAULT NULL,
  `Destination` varchar(200) DEFAULT NULL,
  `FromDate` varchar(200) DEFAULT NULL,
  `ToDate` varchar(200) DEFAULT NULL,
  `Cost` decimal(10,0) DEFAULT NULL,
  `PasscreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpass`
--

INSERT INTO `tblpass` (`ID`, `PassNumber`, `FullName`, `ProfileImage`, `ContactNumber`, `Email`, `IdentityType`, `IdentityCardno`, `Category`, `Source`, `Destination`, `FromDate`, `ToDate`, `Cost`, `PasscreationDate`) VALUES
(1, '286529906', 'Yogesh Kumar', '779b7513263ef185b6d094af290ef5401625471444.png', 4654464646, 'yogi@gmail.com', 'Adhar Card', 'AD-122346', 'Delux Bus', 'dfg', 'kgf', '2020-04-14', '2020-05-14', '900', '2020-04-14 11:47:03'),
(2, '915773340', 'Suresh Khanna', '779b7513263ef185b6d094af290ef5401625471444.png', 9879878978, 'suresh@gmail.com', 'Any Other Govt Issued Doc', 'KTI-896567', 'Delux Bus', NULL, NULL, '2020-04-14', '2020-07-31', '900', '2020-04-13 11:50:15'),
(3, '884595667', 'Anuj kumar', '779b7513263ef185b6d094af290ef5401625471444.png', 1234567890, 'phpgurukulofficial@Gmail.com', 'Voter Card', '5235252', 'Delux Bus', 'Pritampura', 'Dwarka', '2020-04-16', '2020-04-19', '600', '2020-04-16 02:38:27'),
(4, '210712236', 'Abir Singh', 'e76de47f621d84adbab3266e3239baee1625460898.png', 4654646546, 'abir@gmail.com', 'Voter Card', '5646465', 'Non AC Bus', 'abc', 'dbc', '2021-07-05', '2021-07-16', '900', '2021-07-04 15:01:38'),
(5, '474965545', 'Augustya', '779b7513263ef185b6d094af290ef5401625471444.png', 6546465464, 'aug@gmail.com', 'Student Card', '789456', 'Delux Bus', 'Delhi', 'Meerut', '2021-07-05', '2021-07-31', '1800', '2021-07-05 07:50:44'),
(6, '681924385', 'Anuj kumar', 'ea3dc39ca0b2f6b5f17abddec1f0e9a41625993624.png', 1234569870, 'ak@test.com', 'Driving License', 'GGGGGGHGH2423423432', 'Delux Bus', 'Laxmi Nagar', 'Central Secretariat', '2021-07-15', '2021-07-30', '500', '2021-07-11 08:53:44'),
(7, '729753281', 'Rawat om k.', '241ff7bb15d97de36789d64395d0d21f1688132325.jpg', 1234567890, 'om@gmail.com', 'PAN Card', 'DETT89X', 'AC Bus', 'Ahmedabad', 'Nayka', '2001-09-25', '2003-12-31', '900', '2023-06-30 13:38:45'),
(8, '771872087', 'Rawat om k.', '241ff7bb15d97de36789d64395d0d21f1688132325.jpg', 1234567890, 'om@gmail.com', 'PAN Card', 'DETT89X', 'AC Bus', 'Ahmedabad', 'Nayka', '2001-09-25', '2003-12-31', '900', '2023-06-30 13:38:45'),
(9, '169756877', 'Sahil aghara', '32554b968a0ad569a14dd61adf835bd81688444816.png', 7894561230, 'jhasiyfhgasf@gmail.com', 'Passport', 'A9126969', 'Delux Bus', 'Ahmedabad', 'Dwarka', '2023-07-04', '2023-08-04', '10000', '2023-07-04 04:26:56'),
(10, '356293054', 'Sahil aghara', '32554b968a0ad569a14dd61adf835bd81688444816.png', 7894561230, 'jhasiyfhgasf@gmail.com', 'Passport', 'A9126969', 'Delux Bus', 'Ahmedabad', 'Dwarka', '2023-07-04', '2023-08-04', '10000', '2023-07-04 04:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `trans_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `trans_payment` double NOT NULL,
  `trans_passenger` varchar(100) NOT NULL,
  `trans_age` int(11) NOT NULL,
  `trans_gender` varchar(15) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `dest_id` int(11) NOT NULL,
  `stat_id` int(11) DEFAULT '1',
  `trans_refunded` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `trans_time`, `trans_payment`, `trans_passenger`, `trans_age`, `trans_gender`, `acc_id`, `origin_id`, `dest_id`, `stat_id`, `trans_refunded`) VALUES
(6, '2023-06-25 08:28:13', 600, 'Rawat om k.', 20, 'Male', 5, 1, 1, 1, 0),
(7, '2023-06-25 09:32:53', 312, 'Rawat om k.', 80, 'Male', 2, 1, 1, 1, 0),
(8, '2023-06-25 10:15:38', 312, 'Ritesh Mehta', 80, 'Male', 2, 7, 18, 1, 0),
(9, '2023-06-28 04:20:01', 351, 'gayni', 20, 'Male', 2, 3, 15, 1, 0),
(10, '2023-06-28 04:20:01', 351, 'aaryan', 20, 'Female', 2, 3, 15, 1, 0),
(11, '2023-07-04 04:34:41', 448, 'Sahil aghara', 18, 'Male', 6, 1, 13, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_account` varchar(50) NOT NULL,
  `user_password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admin2', 'c84258e9c39059a89ab77d846ddab909');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'manya123', '123', 'customer'),
(2, 'manya123', '123', 'customer'),
(3, 'ok123', '123', 'customer'),
(4, 'ok1234', '1234', 'admin'),
(5, 'ok1234', '1234', 'admin'),
(6, 'ok1234', '1234', 'admin'),
(7, 'om1234', '1234', 'admin'),
(8, 'admin', 'admin123', 'admin'),
(9, 'driver', '123', 'driver'),
(10, 'om123', 'QE', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomodation`
--
ALTER TABLE `accomodation`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `dest_id` (`dest_id`,`acc_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `origin_id` (`origin_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`dest_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `origin`
--
ALTER TABLE `origin`
  ADD PRIMARY KEY (`origin_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpass`
--
ALTER TABLE `tblpass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `acc_id` (`acc_id`,`origin_id`,`dest_id`,`stat_id`),
  ADD KEY `origin_id` (`origin_id`),
  ADD KEY `dest_id` (`dest_id`),
  ADD KEY `stat_id` (`stat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomodation`
--
ALTER TABLE `accomodation`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `dest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `origin`
--
ALTER TABLE `origin`
  MODIFY `origin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpass`
--
ALTER TABLE `tblpass`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked`
--
ALTER TABLE `booked`
  ADD CONSTRAINT `booked_ibfk_1` FOREIGN KEY (`dest_id`) REFERENCES `destination` (`dest_id`),
  ADD CONSTRAINT `booked_ibfk_2` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`),
  ADD CONSTRAINT `booked_ibfk_3` FOREIGN KEY (`origin_id`) REFERENCES `origin` (`origin_id`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`acc_id`) REFERENCES `accomodation` (`acc_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`origin_id`) REFERENCES `origin` (`origin_id`),
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`dest_id`) REFERENCES `destination` (`dest_id`),
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`stat_id`) REFERENCES `status` (`stat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
