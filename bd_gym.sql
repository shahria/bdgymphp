-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 02:48 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `categoryid`) VALUES
(1, 'International', 'N/A', 0),
(2, 'National', 'N/A', 0),
(3, 'Politics', 'N/A', 0),
(5, 'Sports', 'N/A', 0),
(6, 'Football', 'N/A', 5),
(7, 'Cricket', 'N/A', 5),
(8, 'Table Tenis', 'N/A', 5),
(9, 'Test Matches', 'N/A', 7),
(10, 'T20', 'N/A', 7),
(11, 'Day/Night', 'N/A', 6),
(12, 'Women', 'N/A', 10),
(16, 'Dates', 'N/A', 0),
(17, 'Ajowa', 'Dates', 16),
(18, 'Communication', 'N/A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `countryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `countryId`) VALUES
(2, 'Dhaka', 1),
(3, 'Chandpur', 1),
(4, 'Sylhet', 1),
(5, 'Narayanganj', 1),
(6, 'Feni', 1),
(7, 'Faridganj', 1),
(9, 'Hobigan\'j', 1),
(10, 'Chapai', 1),
(11, 'Tangail', 1),
(12, 'Barishal', 1),
(13, 'Bagerhat', 1),
(14, 'Gopalganj', 1),
(15, 'Noakhali', 1),
(16, 'Jassore', 1),
(17, 'Munshiganj', 1),
(18, 'Rajbari', 1),
(19, 'Comilla', 1),
(20, 'Rangpur', 1),
(23, 'Ottawa', NULL),
(24, 'Sydney', NULL),
(25, 'London', NULL),
(26, 'Newyork', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(4, 'Australia'),
(1, 'Bangladesh'),
(5, 'Canada'),
(3, 'UK'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `pagefile`
--

CREATE TABLE `pagefile` (
  `id` int(11) NOT NULL,
  `pageid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagefile`
--

INSERT INTO `pagefile` (`id`, `pageid`, `title`, `dateTime`, `file`) VALUES
(1, 3, '   mmmm', '2020-03-27 20:05:25', 'multi 4700 12.05.2011.doc');

-- --------------------------------------------------------

--
-- Table structure for table `pageimage`
--

CREATE TABLE `pageimage` (
  `id` int(11) NOT NULL,
  `pageid` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageimage`
--

INSERT INTO `pageimage` (`id`, `pageid`, `title`, `dateTime`, `image`) VALUES
(4, 12, 'Tamim_Iqbal', '2020-03-26 21:35:59', '287.png'),
(5, 3, 'ajowa', '2020-03-26 21:36:23', 'ajowa.jpg'),
(6, 18, 'tran', '2020-03-26 23:27:18', 'bd bus.jpg'),
(7, 10, 'corona', '2020-03-26 23:28:59', 'ashes.jpg'),
(8, 9, 'tt', '2020-03-26 23:29:15', 'tt.jpg'),
(9, 8, 'corona', '2020-03-26 23:30:47', 'corona-virus-getty.jpg'),
(10, 14, 'messi', '2020-03-26 23:32:00', 'messi.jpg'),
(11, 17, 'army', '2020-03-26 23:33:57', 'army.jpg'),
(12, 6, 'msic', '2020-03-26 23:36:09', 'music.jpg'),
(13, 5, 'oronavirus: Asia', '2020-03-26 23:37:58', 'asia.jpg'),
(14, 6, 'music', '2020-03-26 23:38:19', 'music.jpg'),
(15, 16, 'mujib', '2020-03-26 23:38:48', 'mujib.jpg'),
(16, 15, 'migrant', '2020-03-27 20:30:59', 'migrants.jpg'),
(17, 7, 'borders', '2020-03-27 20:32:40', 'eu.jpg'),
(18, 19, 'hasina', '2020-03-29 23:43:59', 'pm_214.jpg'),
(19, 20, 'dhaka, breath', '2020-03-29 23:47:16', 'dhaka.jpg'),
(20, 21, 'corona_image', '2020-03-30 00:26:22', 'corona.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pagelikes`
--

CREATE TABLE `pagelikes` (
  `pageId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateTime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagelikes`
--

INSERT INTO `pagelikes` (`pageId`, `userId`, `dateTime`) VALUES
(4, 1, '2020-03-27 23:15:38'),
(5, 1, '2020-03-27 23:24:02'),
(6, 1, '2020-03-27 23:39:16'),
(7, 1, '2020-03-27 23:39:49'),
(8, 1, '2020-03-30 23:52:32'),
(9, 1, '2020-03-30 23:52:37'),
(10, 1, '2020-03-30 23:52:43'),
(11, 1, '2020-03-30 23:52:53'),
(12, 1, '2020-03-30 23:52:49'),
(15, 1, '2020-03-28 19:18:04'),
(16, 1, '2020-03-28 18:54:43'),
(17, 1, '2020-03-30 23:50:10'),
(18, 1, '2020-03-30 23:50:21'),
(19, 1, '2020-03-30 23:50:28'),
(20, 1, '2020-03-30 23:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(700) NOT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `hitCount` int(11) DEFAULT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `tags`, `createDate`, `userId`, `hitCount`, `categoryId`) VALUES
(3, 'Ajowa Dates', 'Ajowa, dates, saudi', '2020-03-18 00:00:00', 1, 0, 17),
(5, 'Coronavirus: Asian nations face virus battle amid WHO warning', 'bbc, corona, virus', '2020-03-18 00:00:00', 1, 0, 1),
(6, 'Does music help us work better? It depends', 'music, better, work', '2020-03-18 00:00:00', 1, 0, 1),
(7, 'EU shuts borders as supermarkets battle hoarding', 'eu, borders, close, corona', '2020-03-18 00:00:00', 1, 0, 1),
(8, 'Coronavirus: \'In this current dark reality, sport doesn\'t matter but it does\'', 'Coronavirus, dark, sport', '2020-03-18 00:00:00', 1, 0, 6),
(9, 'Tokyo Olympics: 11-year-old Syrian table tennis player could be youngest Olympian', 'tt, Olympics, Syrian, youngest', '2020-03-18 00:00:00', 1, 0, 8),
(10, 'What are the Ashes? Cricket\'s oldest rivalry explained', 'Ashes, Cricket\'s, ', '2020-03-18 00:00:00', 1, 0, 9),
(11, 'Mooney tops MRF Tyres Women\'s T20I Batting Rankings', 'Mooney, t20, cricket, Batting', '2020-03-18 00:00:00', 1, 0, 12),
(12, '\'Difficult to fill Mortaza\'s shoes\' – Tamim Iqbal', 'mash, Mortaza, t20, Tamim Iqbal', '2020-03-18 00:00:00', 1, 0, 7),
(13, 'Domingo seeks T20 World Cup roadmap for Bangladesh', 'T20, World Cup, Bangladesh, Cricket', '2020-03-18 00:00:00', 1, 0, 10),
(14, 'FC Barcelona Captain Lionel Messi\'s Likely New Wages Will Blow Your Mind: Report', 'Lionel Messi, Barcelona, Wages, Football', '2020-03-18 00:00:00', 1, 0, 11),
(15, '406 more Bangladeshis brought back from KSA, 2 hospitalised with high fever', ' Bangladeshis, hospitalised, fever', '2020-03-19 00:00:00', 1, 0, 2),
(16, 'Ribute to a towering figure of history', 'ribute, history, model', '2020-03-19 00:00:00', 1, 0, 3),
(17, 'Army to run two quarantine centres in Dhaka: ISPR', 'BD Army, quarantine, Dhaka', '2020-03-19 00:00:00', 1, 0, 2),
(18, 'Bus, train, launch services to be halted if coronavirus situation worsens: Ministers', 'Bus, train, launch', '2020-03-20 00:00:00', 1, 0, 18),
(19, 'PM seeks list of distressed people in need of govt assistance', 'PM, Hasina, National', '2020-03-29 00:00:00', 1, 0, 2),
(20, 'Dhaka breathes', 'Dhaka, breathes', '2020-03-29 00:00:00', 1, 0, 2),
(21, 'Know true extent, know it now', 'crona, national, extent', '2020-03-29 00:00:00', 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pagescomments`
--

CREATE TABLE `pagescomments` (
  `id` int(11) NOT NULL,
  `pageid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagescomments`
--

INSERT INTO `pagescomments` (`id`, `pageid`, `userid`, `dateTime`, `comment`) VALUES
(1, 23, 1, '2020-03-21 00:28:21', 'Authentic News'),
(2, 5, 1, '2020-03-21 00:51:28', 'We want more details of this news.'),
(3, 5, 1, '2020-03-21 21:52:55', 'Yea, without details news become unrealistic. '),
(4, 5, 1, '2020-03-21 21:53:26', 'You can find details to this link.'),
(5, 3, 1, '2020-03-23 21:06:25', '100% Pure & Without Chemical Product.'),
(6, 6, 1, '2020-03-23 22:25:01', 'Wow! Nice News.'),
(7, 6, 1, '2020-03-23 22:25:32', 'how could u say it?\r\n'),
(8, 7, 1, '2020-03-23 22:26:38', 'Plz, take it seriously.'),
(9, 7, 1, '2020-03-23 22:26:55', 'yeaa, agree with this.'),
(10, 14, 1, '2020-03-23 22:27:47', 'Thats why he is an Alion!!!'),
(11, 18, 1, '2020-03-24 19:43:36', 'Time to spend moment with family.'),
(12, 16, 1, '2020-03-24 20:06:09', 'Father of Nation!!!'),
(13, 16, 1, '2020-03-24 20:06:43', 'HaaaHaaa'),
(14, 8, 1, '2020-03-24 20:07:26', 'It does indeed!!!'),
(15, 9, 1, '2020-03-24 20:08:18', 'I just love this game.'),
(16, 13, 1, '2020-03-24 20:09:13', 'Lets see, what can he do......'),
(17, 10, 1, '2020-03-24 20:10:11', 'Test Match Is the actual format for cricket.'),
(18, 11, 1, '2020-03-24 20:11:01', 'Women are prospering in every aspects.  '),
(19, 15, 1, '2020-03-27 20:30:20', 'How sad!!!'),
(20, 15, 1, '2020-03-27 20:30:36', 'Yeaa, really it is.'),
(21, 19, 1, '2020-03-29 23:44:56', 'This initiative should to taken very earlier.'),
(22, 20, 1, '2020-03-30 23:51:52', 'we love this empty street...'),
(23, 12, 1, '2020-03-30 23:53:47', 'no one can fill-up his position.... ');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `cityid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `contact`, `email`, `address`, `cityid`) VALUES
(1, 'Jamal Khan', '017111111', 'jamal@gmail.com', 'N/A', 1),
(2, 'Tonmoy', '01715-867662', 'tonmoy_20@yahoo.com', '     Niketan, Dhaka', 1),
(3, 'Rahman', '01817273636', 'rahman@yahoo.com', ' Mohammadpur', 2),
(4, 'Manik', '01672898', 'manik@gmail.com', 'Notun Bazar', 1),
(10, 'Mintu', '0167289866', 'mintu@gmail.com', 'Kali Bari', 7),
(11, '', '01915808909', 'fatema@gmail.com', '', 5),
(12, 'Hena', '01715657580', 'hena@gmail.com', ' jafrabad model', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createIp` varchar(200) NOT NULL,
  `type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contact`, `email`, `password`, `createDate`, `createIp`, `type`) VALUES
(1, 'Mr. Admin', '0171118908', 'admin@system.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-03-21 22:06:11', '127.0.0.1', 'A'),
(2, 'Mr. User 1', '01914077099', 'user@gmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-03-21 22:10:09', '127.98.70.9', 'U'),
(3, 'Hasan Mahmud', '01815867660', 'hasan@gmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-03-23 23:46:13', '127.0.0.1', 'A'),
(4, 'Robin Hood', 'robin@yahoo.com', '01515675654', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-03-23 23:48:06', '127.0.0.1', 'U'),
(5, 'Mr. Akram Uddin', '01712322312', 'akram@hotmail.com', '*A4B6157319038724E3560894F7F932C8886EBFCF', '2020-03-24 00:55:31', '127.0.0.1', 'U'),
(6, 'Hamid Hossain', '01717654531', 'hamid@live.com', '*A4B6157319038724E3560894F7F932C8886EBFCF', '2020-03-24 01:03:34', '127.0.0.1', 'U'),
(7, 'Paul Adam', '01819038565', 'paul@gmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', '2020-03-25 23:50:08', '::1', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `usersactive`
--

CREATE TABLE `usersactive` (
  `userId` int(11) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersactive`
--

INSERT INTO `usersactive` (`userId`, `ip`, `dateTime`) VALUES
(1, '::1', '2020-03-23 19:08:52'),
(2, '127.0.0.1', '2020-03-26 16:22:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `pagefile`
--
ALTER TABLE `pagefile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pageimage`
--
ALTER TABLE `pageimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagelikes`
--
ALTER TABLE `pagelikes`
  ADD PRIMARY KEY (`pageId`,`userId`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `pagescomments`
--
ALTER TABLE `pagescomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usersactive`
--
ALTER TABLE `usersactive`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pagefile`
--
ALTER TABLE `pagefile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pageimage`
--
ALTER TABLE `pageimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pagescomments`
--
ALTER TABLE `pagescomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usersactive`
--
ALTER TABLE `usersactive`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
