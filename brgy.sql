-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 06:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgy`
--
CREATE DATABASE IF NOT EXISTS `brgy` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `brgy`;

-- --------------------------------------------------------

--
-- Table structure for table `accs`
--

CREATE TABLE IF NOT EXISTS `accs` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `civil_stat` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `acc_privilege` enum('Admin','User') NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accs`
--

INSERT INTO `accs` (`acc_id`, `first_name`, `last_name`, `sex`, `civil_stat`, `address`, `birthdate`, `phone_num`, `email`, `username`, `password`, `acc_privilege`) VALUES
(9, 'hello', 'hello', 'Male', 'Married', 'dfgfd', '2002-02-02', '34533', 'zivseighfred@gmail.com', 'easy', '$2y$10$jlWooyjsn/66WJNYubywUeEl61wP8VwD63Il8gtA75xmpd03nBCKy', 'User'),
(10, 'ADMIN', 'ADMIN', 'Male', 'Single', 'Sample', '2023-05-10', '09174154203', 'sample@gmail.com', 'admin', '$2y$10$/mREFOUyzWvSM.8/PTh5IOlEr9Egqsqiy8ITzmLzV5Ks0q219SsrC', 'Admin'),
(11, 'User', 'User', 'Male', 'Single', 'Sample', '2002-02-02', '0956575765', 'sample@gmail.com', 'user', '$2y$10$z6bJLUK/SJJei1cqjGT2C.J.UyDfT.GtgWliFxc4p3dmNEPDuVUmi', 'User'),
(12, 'Admin', 'Administrator', 'Female', 'Married', 'Sample', '2002-03-03', '0915894754', 'sample@gmail.com', 'admin0', '$2y$10$zQfmtwoKvy9vE3qXuoGZ6uIxSXhbnv8kHv8MGtNDSgBzY3LrAlBfK', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_type` enum('Clearance','ID','Indigency','Certificate') NOT NULL,
  `control_number` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `pickup` enum('Myself','Authorized Person','Grab/Lalamove/Etc') NOT NULL,
  `birthdate` date DEFAULT NULL,
  `birthplace` varchar(255) DEFAULT NULL,
  `SSSno` int(255) DEFAULT NULL,
  `height` int(255) DEFAULT NULL,
  `weight` int(255) DEFAULT NULL,
  `tin` int(255) DEFAULT NULL,
  `civil_status` varchar(100) DEFAULT NULL,
  `ec_name` varchar(100) DEFAULT NULL,
  `ec_address` varchar(100) DEFAULT NULL,
  `ec_contact` varchar(255) DEFAULT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `application_date` datetime NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`doc_id`, `doc_type`, `control_number`, `first_name`, `last_name`, `address`, `contact_num`, `pickup`, `birthdate`, `birthplace`, `SSSno`, `height`, `weight`, `tin`, `civil_status`, `ec_name`, `ec_address`, `ec_contact`, `purpose`, `application_date`) VALUES
(31, 'Certificate', '837-0031', 'Test', 'Testing', 'Sample', '09178784252', 'Myself', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample', '2023-05-02 17:43:50'),
(32, 'Clearance', '837-0032', 'Sample', 'Test', 'Test Sample', '09184485764', 'Authorized Person', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sample', '2023-05-02 18:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `doc_req`
--

CREATE TABLE IF NOT EXISTS `doc_req` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL,
  `status` enum('Pending','Approved','Denied') NOT NULL,
  `acc_id` int(11) NOT NULL,
  PRIMARY KEY (`req_id`),
  KEY `doc_foreign` (`doc_id`),
  KEY `acc_foreign` (`acc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_req`
--

INSERT INTO `doc_req` (`req_id`, `doc_id`, `status`, `acc_id`) VALUES
(21, 31, 'Pending', 10),
(22, 32, 'Approved', 11);

-- --------------------------------------------------------

--
-- Table structure for table `index_page`
--

CREATE TABLE IF NOT EXISTS `index_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_photo` varchar(255) DEFAULT NULL,
  `gallery1` varchar(255) DEFAULT NULL,
  `gallery2` varchar(255) DEFAULT NULL,
  `gallery3` varchar(255) DEFAULT NULL,
  `main_info` varchar(255) DEFAULT NULL,
  `table_info1` varchar(255) DEFAULT NULL,
  `table_info_d1` varchar(255) DEFAULT NULL,
  `table_info2` varchar(255) DEFAULT NULL,
  `table_info_d2` varchar(255) DEFAULT NULL,
  `table_info3` varchar(255) DEFAULT NULL,
  `table_info_d3` varchar(255) DEFAULT NULL,
  `table_pic1` varchar(255) DEFAULT NULL,
  `table_pic2` varchar(255) DEFAULT NULL,
  `table_pic3` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `socmed` varchar(255) DEFAULT NULL,
  `socmed_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `index_page`
--

INSERT INTO `index_page` (`id`, `main_photo`, `gallery1`, `gallery2`, `gallery3`, `main_info`, `table_info1`, `table_info_d1`, `table_info2`, `table_info_d2`, `table_info3`, `table_info_d3`, `table_pic1`, `table_pic2`, `table_pic3`, `address`, `contact`, `socmed`, `socmed_link`) VALUES
(1, 'img/heading.jpg', 'img/main1.jpg', 'img/main2.jpg', 'img/main3.jpg', 'Barangay 837 is a barangay in the city of Manila, under the administrative district of Pandacan. Its population as determined by the 2020 Census was 3,039. This represented 0.16% of the total population of Manila.', 'Households', 'The household population of Barangay 837 in the 2015 Census was 3,218 broken down into 779 households or an average of 4.13 members per household.', 'Population by Age Group', 'According to the 2015 Census, the age group with the highest population in Barangay 837 is 20 to 24, with 311 individuals. Conversely, the age group with the lowest population is 80 and over, with 21 individuals.\r\n', 'Historical Population', 'The population of Barangay 837 grew from 2,949 in 1990 to 3,039 in 2020, an increase of 90 people over the course of 30 years. The latest census figures in 2020 denote a negative growth rate of 1.20%, or a decrease of 179 people. ', 'img/table1.jpg', 'img/table2.jpg', 'img/table3.jpg', 'Barangay Hall', '91700000', 'Facebook', 'https://www.facebook.com/profile.php?id=100068827255600');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE IF NOT EXISTS `officials` (
  `official_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `suffix` enum('Mr','Ms','Mrs') NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `visibility` enum('Yes','No') DEFAULT NULL,
  PRIMARY KEY (`official_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`official_id`, `position`, `short_desc`, `first_name`, `last_name`, `image`, `suffix`, `email`, `phone_num`, `visibility`) VALUES
(7, 'Captain', 'Punong Barangay', 'Josaphat', 'Ramos', 'img/blank.png', 'Mr', 'sample@gmail.com', '917000000', 'Yes'),
(8, 'Secretary', 'Kalihim ng Barangay', 'Amy', 'Alegarbes', 'img/blank.png', 'Mr', 'sample@gmail.com', '91700000', 'Yes'),
(9, 'Treasurer', 'Ingat-Yaman ng Barangay', 'Bobby', 'Dela Cerna', 'img/blank.png', 'Mr', 'sample@gmail.com', '917000000', 'Yes');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doc_req`
--
ALTER TABLE `doc_req`
  ADD CONSTRAINT `acc_foreign` FOREIGN KEY (`acc_id`) REFERENCES `accs` (`acc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doc_foreign` FOREIGN KEY (`doc_id`) REFERENCES `documents` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
