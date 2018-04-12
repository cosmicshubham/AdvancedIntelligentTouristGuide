-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 06:47 PM
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
(9, 1, 6),
(10, 2, 1),
(11, 3, 1),
(12, 3, 3),
(13, 4, 1),
(14, 4, 5),
(15, 4, 4);

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
(7, 'Allahabad', '25.4358', '81.8463'),
(8, 'Ajanta Caves', '25.4358', '75.7033'),
(9, 'Lonavala', '18.7546', '73.4062'),
(10, 'Mahabaleshwar', '17.9307', '73.6477'),
(11, 'Pune', '18.5204', '73.8567'),
(12, 'Shirdi', '18.5204', '73.8567'),
(13, 'Ellora Caves', '20.0268', '75.1771'),
(14, 'Ganpatipule', '17.1489', '73.2727'),
(15, 'Nashik', '19.9975', '73.7898'),
(16, 'Ratnagiri', '16.9902', '73.3120'),
(17, 'Tadoba National Park', '20.2484', '79.3607'),
(18, 'Matheran', '18.9887', '73.2712'),
(19, 'Aurangabad', '19.8762', '75.3433'),
(20, 'Panchgani', '17.9236', '73.7983'),
(21, 'Agra', '27.1767', '78.0081'),
(22, 'Lucknow', '26.8467', '80.9462'),
(23, 'Varanasi', '25.3176', '82.9739'),
(24, 'Mathura', '27.4924', '77.6737'),
(26, 'Kushinagar', '26.8102', '83.9744'),
(27, 'Sarnath', '25.3762', '83.0227'),
(28, 'Aligarh', '27.8974', '78.0880'),
(29, 'Jhansi', '25.4484', '78.5685'),
(30, 'Dehradun', '30.3165', '78.0322'),
(31, 'Nainital', '29.3803', '79.4636'),
(32, 'Mussoorie', '30.4599', '78.0664'),
(33, 'Rishikesh', '30.0869', '78.2676'),
(34, 'Haridwar', '29.9457', '78.1642'),
(35, 'Kedarnath', '30.7346', '79.0669'),
(36, 'Badrinath', '30.7433', '79.4938'),
(37, 'Ranikhet', '29.6434', '79.4322'),
(38, 'Chandigarh', '30.7333', '76.7794'),
(39, 'Gurugram', '28.4595', '77.0266'),
(40, 'Kurukshetra', '29.9695', '76.8783'),
(41, 'Panipat', '29.3909', '76.9635'),
(42, 'Kolkata', '22.5726', '88.3639');

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
(3, 4, 34, 1),
(4, 4, 11, 1),
(5, 4, 38, 1),
(7, 30, 32, 1),
(8, 30, 38, 1);

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
(7, 'Paragliding'),
(8, 'Bungee Jumping'),
(9, 'Kayaking '),
(10, 'Glacier Climbing'),
(11, 'Dirt Biking'),
(12, 'Skiing'),
(13, 'Kite Wing'),
(14, 'Bobsledding'),
(15, 'Zorbing'),
(16, 'Surfing'),
(17, 'Moutain Biking'),
(18, 'Rock Climbing'),
(19, 'Orienteering'),
(20, 'Hang Gliding'),
(21, 'Hiking'),
(22, 'Rafting'),
(23, 'Underwater Walk'),
(24, 'Heli Skiing'),
(25, 'Caving'),
(26, 'Hot Air Ballooning'),
(27, 'Flying Fox'),
(28, 'Mountain Cycling'),
(29, 'Desert Clamping'),
(30, 'Para Sailing'),
(31, 'Microflight Flying'),
(32, 'Trekking'),
(33, 'Angling'),
(34, 'Canoeing'),
(35, 'Scuba Diving'),
(36, 'Wildlife Safari'),
(37, 'Wind Surfing'),
(38, 'Motorcycle Trip'),
(39, 'Jeep Safari'),
(40, 'Dune Bashing');

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

--
-- Dumping data for table `userplacerating`
--

INSERT INTO `userplacerating` (`id`, `userid`, `placeid`, `placerating`, `comment`) VALUES
(1, 1, 1, 5, 'Goa was good'),
(2, 1, 4, 7, 'Open Minded People'),
(3, 1, 23, 7, 'Cultural Stuff'),
(4, 1, 7, 6, 'Maha khumbh was nice');

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
(1, 'shubham@gmail.com', 'shubham', 'Shubham Kumar', 'Male', '654654654654', '1996-10-25', '54654654', '22222', 8, 'Very Nice Website', 'standard'),
(2, 'aakash@gmail.com', 'aakash', 'Aakash Chandhoke', 'Male', '123456789', '1993-10-24', '9910753314', 'Luckerganj, Allahabad', 0, '', 'admin'),
(4, 'akhilesh@gmail.com', 'akhilesh', 'Akhilesh Kumar', 'Male', '9876543210', '1995-04-10', '9876543210', 'Kanpur', 8, 'App Experience is awesome.', 'standard');

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
(1, 1, 10),
(2, 1, 14),
(3, 1, 17),
(4, 1, 18),
(5, 1, 7),
(6, 1, 11),
(7, 1, 34),
(8, 1, 38),
(10, 1, 9),
(11, 1, 12),
(12, 1, 19);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `placeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `placestags`
--
ALTER TABLE `placestags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tagid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `transportid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userplacerating`
--
ALTER TABLE `userplacerating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usertags`
--
ALTER TABLE `usertags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
