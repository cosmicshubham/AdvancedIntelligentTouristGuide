-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2018 at 10:27 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aitgdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `modeoftransport`
--

CREATE TABLE `modeoftransport` (
  `id` int(11) NOT NULL,
  `placeid` int(11) NOT NULL,
  `transportid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modeoftransport`
--

INSERT INTO `modeoftransport` (`id`, `placeid`, `transportid`) VALUES
(1, 1, 1),
(7, 1, 2),
(9, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `placeid` int(11) NOT NULL,
  `placename` varchar(255) NOT NULL,
  `lattitude` decimal(10,4) NOT NULL,
  `longitude` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`placeid`, `placename`, `lattitude`, `longitude`) VALUES
(1, 'Goa', '15.2993', '74.1240'),
(2, 'Mumbai', '19.0760', '72.8777'),
(3, 'Chennai', '13.0827', '80.2707'),
(4, 'Delhi', '28.7041', '77.1025'),
(7, 'Allahabad', '25.4358', '81.8463');

-- --------------------------------------------------------

--
-- Table structure for table `placestags`
--

CREATE TABLE `placestags` (
  `id` int(11) NOT NULL,
  `placeid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placestags`
--

INSERT INTO `placestags` (`id`, `placeid`, `tagid`, `weight`) VALUES
(2, 1, 3, 9),
(4, 3, 4, 3),
(8, 1, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tagid` int(11) NOT NULL,
  `tagname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tagid`, `tagname`) VALUES
(1, 'trekking'),
(2, 'swimming'),
(3, 'forestSafari'),
(4, 'rafting');

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `transportid` int(11) NOT NULL,
  `transportname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transports`
--

INSERT INTO `transports` (`transportid`, `transportname`) VALUES
(1, 'Car'),
(2, 'Auto'),
(3, 'Train'),
(4, 'Bus'),
(5, 'Self'),
(6, 'Boat');

-- --------------------------------------------------------

--
-- Table structure for table `userplacerating`
--

CREATE TABLE `userplacerating` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `placeid` int(11) NOT NULL,
  `placerating` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `aadharid` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text,
  `apprating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `uname`, `gender`, `aadharid`, `dob`, `phone`, `address`, `apprating`, `comment`, `type`) VALUES
(1, 'shubham', 'kumar', 'Shubham Kumar', 'male', '654654654654', '1996-10-25', '54654654', '22222', 0, '', 'standard'),
(2, 'aakash', 'chandhoke', NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 'admin'),
(4, 'hello', 'hello', NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 'standard'),
(5, 'mmmm', 'mmmm', NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `usertags`
--

CREATE TABLE `usertags` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tagid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertags`
--

INSERT INTO `usertags` (`id`, `userid`, `tagid`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modeoftransport`
--
ALTER TABLE `modeoftransport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `placeid` (`placeid`),
  ADD KEY `transportid` (`transportid`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`placeid`);

--
-- Indexes for table `placestags`
--
ALTER TABLE `placestags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `placeid` (`placeid`),
  ADD KEY `tagid` (`tagid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tagid`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`transportid`);

--
-- Indexes for table `userplacerating`
--
ALTER TABLE `userplacerating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `placeid` (`placeid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `usertags`
--
ALTER TABLE `usertags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `tagid` (`tagid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modeoftransport`
--
ALTER TABLE `modeoftransport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `placeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `placestags`
--
ALTER TABLE `placestags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `transportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userplacerating`
--
ALTER TABLE `userplacerating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `usertags`
--
ALTER TABLE `usertags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `modeoftransport`
--
ALTER TABLE `modeoftransport`
  ADD CONSTRAINT `modeoftransport_ibfk_1` FOREIGN KEY (`transportid`) REFERENCES `transports` (`transportid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modeoftransport_ibfk_2` FOREIGN KEY (`placeid`) REFERENCES `places` (`placeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `placestags`
--
ALTER TABLE `placestags`
  ADD CONSTRAINT `placestags_ibfk_1` FOREIGN KEY (`tagid`) REFERENCES `tags` (`tagid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `placestags_ibfk_2` FOREIGN KEY (`placeid`) REFERENCES `places` (`placeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userplacerating`
--
ALTER TABLE `userplacerating`
  ADD CONSTRAINT `userplacerating_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userplacerating_ibfk_2` FOREIGN KEY (`placeid`) REFERENCES `places` (`placeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertags`
--
ALTER TABLE `usertags`
  ADD CONSTRAINT `usertags_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usertags_ibfk_2` FOREIGN KEY (`tagid`) REFERENCES `tags` (`tagid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
