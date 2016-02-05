-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2016 at 03:18 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `league_id` int(10) NOT NULL,
  `location_id` int(10) NOT NULL,
  `season_id` tinyint(1) NOT NULL,
  `league_deadline` date NOT NULL,
  `league_start` date NOT NULL,
  `league_end` date NOT NULL,
  `league_start_time` time NOT NULL,
  `league_end_time` time NOT NULL,
  `league_day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `league_minpergame` tinyint(3) NOT NULL,
  `league_games` tinyint(2) NOT NULL,
  `league_playoff_teams` tinyint(2) NOT NULL,
  `league_roster` tinyint(2) NOT NULL,
  `league_onfield` tinyint(2) NOT NULL,
  `league_femsonfield` tinyint(2) NOT NULL,
  `league_price` int(6) NOT NULL,
  `league_freeagents` tinyint(1) NOT NULL,
  `league_captains` tinyint(1) NOT NULL,
  `league_teamplayers` tinyint(1) NOT NULL,
  `league_note` text NOT NULL,
  `league_laid` int(10) NOT NULL,
  `league_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`league_id`, `location_id`, `season_id`, `league_deadline`, `league_start`, `league_end`, `league_start_time`, `league_end_time`, `league_day`, `league_minpergame`, `league_games`, `league_playoff_teams`, `league_roster`, `league_onfield`, `league_femsonfield`, `league_price`, `league_freeagents`, `league_captains`, `league_teamplayers`, `league_note`, `league_laid`, `league_status`) VALUES
(7, 2, 1, '2016-02-17', '2016-03-03', '2016-05-26', '00:00:00', '23:15:00', 'Thursday', 50, 9, 4, 11, 9, 3, 195, 0, 0, 1, 'We play on Field 3.', 82126, 1),
(8, 5, 1, '2016-03-12', '2016-03-26', '2016-06-11', '11:00:00', '16:00:00', 'Saturday', 54, 9, 4, 10, 7, 0, 165, 1, 1, 1, '', 82127, 1),
(9, 6, 1, '2016-03-12', '2016-04-02', '2016-06-18', '09:00:00', '11:00:00', 'Saturday', 54, 9, 4, 10, 7, 2, 120, 1, 1, 1, '', 82128, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(10) NOT NULL,
  `location_borough` tinytext NOT NULL,
  `location_hood` tinytext NOT NULL,
  `location_field` tinytext NOT NULL,
  `location_map_link` tinytext NOT NULL,
  `location_map_embed` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location_borough`, `location_hood`, `location_field`, `location_map_link`, `location_map_embed`) VALUES
(1, 'Brooklyn', 'Williamsburg', 'Bushwick Inlet Park', '', ''),
(2, 'Brooklyn', 'Dumbo', 'Brooklyn Bridge Park', '', ''),
(3, 'Manhattan', 'Chelsea', 'Chelsea Waterside Park', '', ''),
(4, 'Manhattan', 'West Village', 'James J Walker Field', '', ''),
(5, 'Queens', 'Long Island City', 'Queens West Sportsfield', '', ''),
(6, 'Manhattan', 'East Village', 'East River Park', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `season_id` tinyint(1) NOT NULL,
  `season_name` tinytext NOT NULL,
  `season_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`season_id`, `season_name`, `season_status`) VALUES
(1, 'Spring', 1),
(2, 'Summer', 0),
(3, 'Fall', 0),
(4, 'Winter', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` tinyint(10) NOT NULL,
  `user_role` enum('admin') NOT NULL,
  `user_email` tinytext NOT NULL,
  `user_pw` varchar(255) NOT NULL,
  `user_sess_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_role`, `user_email`, `user_pw`, `user_sess_id`) VALUES
(7, 'admin', 'root@root', '$2y$10$SD4blEeDGfpX.dSdHKHaYOM.FIDb8B7.FScCF/WSnNHDyDX/klwhC', '38b079d056100eb7ae4d7a63c0189eae');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`league_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD KEY `season_id` (`season_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `league_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
