-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2026 at 11:07 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gconsole`
--

-- --------------------------------------------------------

--
-- Table structure for table `console`
--

CREATE TABLE `console` (
  `consoleid` int NOT NULL,
  `name` text NOT NULL,
  `bit` int NOT NULL,
  `eu_release` text NOT NULL,
  `us_release` text NOT NULL,
  `asia_relase` text NOT NULL,
  `makerid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dev`
--

CREATE TABLE `dev` (
  `devid` int NOT NULL,
  `name` text NOT NULL,
  `location` text NOT NULL,
  `date_added` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameid` int NOT NULL,
  `name` text NOT NULL,
  `eu_release` text NOT NULL,
  `us_release` text NOT NULL,
  `asia_release` text NOT NULL,
  `date_added` text NOT NULL,
  `devid` int NOT NULL,
  `pubid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gamer`
--

CREATE TABLE `gamer` (
  `gamerid` int NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `sname` text NOT NULL,
  `sign_update` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE `maker` (
  `makerid` int NOT NULL,
  `maker` text NOT NULL,
  `location` text NOT NULL,
  `date_added` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owns`
--

CREATE TABLE `owns` (
  `ownsid` int NOT NULL,
  `consoleid` int NOT NULL,
  `dateadded` text NOT NULL,
  `purchasedate` date NOT NULL,
  `gamerid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plays`
--

CREATE TABLE `plays` (
  `playsid` int NOT NULL,
  `gameid` int NOT NULL,
  `dateadded` text NOT NULL,
  `purchasedate` text NOT NULL,
  `gamerid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playson`
--

CREATE TABLE `playson` (
  `playsonid` int NOT NULL,
  `gameid` int NOT NULL,
  `consoleid` int NOT NULL,
  `date_added` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pub`
--

CREATE TABLE `pub` (
  `pubid` int NOT NULL,
  `namee` text NOT NULL,
  `location` text NOT NULL,
  `date_added` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`consoleid`),
  ADD KEY `makerid` (`makerid`);

--
-- Indexes for table `dev`
--
ALTER TABLE `dev`
  ADD PRIMARY KEY (`devid`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameid`),
  ADD KEY `devid` (`devid`),
  ADD KEY `pubid` (`pubid`);

--
-- Indexes for table `gamer`
--
ALTER TABLE `gamer`
  ADD PRIMARY KEY (`gamerid`);

--
-- Indexes for table `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`makerid`);

--
-- Indexes for table `owns`
--
ALTER TABLE `owns`
  ADD PRIMARY KEY (`ownsid`),
  ADD KEY `consoleid` (`consoleid`),
  ADD KEY `gamerid` (`gamerid`);

--
-- Indexes for table `plays`
--
ALTER TABLE `plays`
  ADD PRIMARY KEY (`playsid`),
  ADD KEY `gameid` (`gameid`),
  ADD KEY `gamerid` (`gamerid`);

--
-- Indexes for table `playson`
--
ALTER TABLE `playson`
  ADD PRIMARY KEY (`playsonid`),
  ADD KEY `gameid` (`gameid`,`consoleid`),
  ADD KEY `consoleid` (`consoleid`);

--
-- Indexes for table `pub`
--
ALTER TABLE `pub`
  ADD PRIMARY KEY (`pubid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `console`
--
ALTER TABLE `console`
  MODIFY `consoleid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dev`
--
ALTER TABLE `dev`
  MODIFY `devid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gameid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gamer`
--
ALTER TABLE `gamer`
  MODIFY `gamerid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maker`
--
ALTER TABLE `maker`
  MODIFY `makerid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owns`
--
ALTER TABLE `owns`
  MODIFY `ownsid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plays`
--
ALTER TABLE `plays`
  MODIFY `playsid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playson`
--
ALTER TABLE `playson`
  MODIFY `playsonid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pub`
--
ALTER TABLE `pub`
  MODIFY `pubid` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `console`
--
ALTER TABLE `console`
  ADD CONSTRAINT `console_ibfk_1` FOREIGN KEY (`makerid`) REFERENCES `maker` (`makerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`devid`) REFERENCES `dev` (`devid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`pubid`) REFERENCES `pub` (`pubid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owns`
--
ALTER TABLE `owns`
  ADD CONSTRAINT `owns_ibfk_1` FOREIGN KEY (`consoleid`) REFERENCES `console` (`consoleid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owns_ibfk_2` FOREIGN KEY (`gamerid`) REFERENCES `gamer` (`gamerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plays`
--
ALTER TABLE `plays`
  ADD CONSTRAINT `plays_ibfk_1` FOREIGN KEY (`gameid`) REFERENCES `game` (`gameid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plays_ibfk_2` FOREIGN KEY (`gamerid`) REFERENCES `gamer` (`gamerid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playson`
--
ALTER TABLE `playson`
  ADD CONSTRAINT `playson_ibfk_1` FOREIGN KEY (`gameid`) REFERENCES `game` (`gameid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playson_ibfk_2` FOREIGN KEY (`consoleid`) REFERENCES `console` (`consoleid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
