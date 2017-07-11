-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2017 at 10:50 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `make-a-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `street` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `pin_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `age` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `doctor_verified` int(11) NOT NULL,
  `volunteer_verified` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `disease_id` int(11) NOT NULL,
  `wish_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `child-doctor-pivot`
--

CREATE TABLE `child-doctor-pivot` (
  `id` int(11) NOT NULL,
  `child_id` int(11) UNSIGNED NOT NULL,
  `doctor_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `child-volunteer-pivot`
--

CREATE TABLE `child-volunteer-pivot` (
  `id` int(10) UNSIGNED NOT NULL,
  `child_id` int(10) UNSIGNED NOT NULL,
  `volunteer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `id` int(11) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `qualification` varchar(40) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address_id` int(11) NOT NULL,
  `contact_no` text NOT NULL,
  `doctor_type_id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_type`
--

CREATE TABLE `doctor_type` (
  `id` int(11) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` text NOT NULL,
  `contact_no` text NOT NULL,
  `address_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `id` int(11) NOT NULL,
  `wish` varchar(40) NOT NULL,
  `child_id` int(11) UNSIGNED NOT NULL,
  `donor_id` int(11) DEFAULT NULL,
  `volunteer_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `completed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_id` (`document_id`),
  ADD KEY `disease_id` (`disease_id`),
  ADD KEY `wish_id` (`wish_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `child-doctor-pivot`
--
ALTER TABLE `child-doctor-pivot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `child-volunteer-pivot`
--
ALTER TABLE `child-volunteer-pivot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`),
  ADD KEY `volunteer_id` (`volunteer_id`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `doctor_type_id` (`doctor_type_id`);

--
-- Indexes for table `doctor_type`
--
ALTER TABLE `doctor_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`),
  ADD KEY `donor_id` (`donor_id`),
  ADD KEY `volunteer_id` (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `child-doctor-pivot`
--
ALTER TABLE `child-doctor-pivot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `child-volunteer-pivot`
--
ALTER TABLE `child-volunteer-pivot`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_type`
--
ALTER TABLE `doctor_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`id`),
  ADD CONSTRAINT `child_ibfk_2` FOREIGN KEY (`document_id`) REFERENCES `document` (`id`),
  ADD CONSTRAINT `child_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `child-doctor-pivot`
--
ALTER TABLE `child-doctor-pivot`
  ADD CONSTRAINT `child-doctor-pivot_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `child` (`id`),
  ADD CONSTRAINT `child-doctor-pivot_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`);

--
-- Constraints for table `child-volunteer-pivot`
--
ALTER TABLE `child-volunteer-pivot`
  ADD CONSTRAINT `child-volunteer-pivot_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `child` (`id`),
  ADD CONSTRAINT `child-volunteer-pivot_ibfk_2` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD CONSTRAINT `volunteer_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

--
-- Constraints for table `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `wish_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `child` (`id`),
  ADD CONSTRAINT `wish_ibfk_2` FOREIGN KEY (`volunteer_id`) REFERENCES `volunteer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
