-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 09:33 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `confmag_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `dob` datetime NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `dob` datetime NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author_id`, `first_name`, `last_name`, `phone_number`, `dob`, `email`, `password`, `deleted`) VALUES
(1, 'test', 'name', '91832798389', '0000-00-00 00:00:00', 'ahmed.maruff@gmail.com', '123', 0),
(2, 'test2', 'name', '91832798389', '0000-00-00 00:00:00', 'maruf.hh007@gmail.com', '123', 0),
(3, 'test3', 'name', '91832798389', '0000-00-00 00:00:00', 'maruf.hh0@gmail.com', '123', 0),
(4, 'test4', 'name', '91832798389', '0000-00-00 00:00:00', 'maruf.hh@gmail.com', '123', 0),
(5, 'test5', 'name', '91832798389', '0000-00-00 00:00:00', 'black.dmond143@gmail.com', '123', 0),
(6, 'test6', 'test', '981723981293', '0000-00-00 00:00:00', 'o11233784@nwytg.net', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `paper_id` bigint(20) NOT NULL,
  `paper_name` varchar(200) NOT NULL,
  `paper_keywords` varchar(200) NOT NULL,
  `abstract` varchar(3000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `file_url` varchar(100) NOT NULL,
  `review_id` int(11) DEFAULT NULL,
  `added_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`paper_id`, `paper_name`, `paper_keywords`, `abstract`, `status`, `file_url`, `review_id`, `added_time`, `deleted`) VALUES
(1, '_EXAM_-Contents_List.pdf', 'ios android mobile', '', 1, '_EXAM_-Contents_List.pdf', NULL, '2019-04-04 20:41:01', 0),
(2, '_EXAM_-Contents_List.pdf', 'iot machine learning', '', 1, '_EXAM_-Contents_List.pdf', NULL, '2019-04-05 20:41:01', 0),
(2147483647, 'my paper', 'keywords', 'abstracts', 1, '', NULL, '2019-04-05 21:12:08', 0),
(15544993711, 'my paper', 'keywords', 'abstracts', 1, '', NULL, '2019-04-05 21:22:51', 0),
(115545019361, '', '', '', 1, '', NULL, '2019-04-05 22:05:36', 0),
(115545019371, 'my paper', 'keywords', 'abstracts', 1, '', NULL, '2019-04-05 21:23:35', 0),
(115545019381, 'test paper ', 'wwqdqwj', 'alkdjdkljaslkd', 1, '', NULL, '2019-04-05 21:24:26', 0),
(115545019391, '', '', '', 1, '', NULL, '2019-04-05 21:38:25', 0),
(115545724601, '', '', '', 1, '', NULL, '2019-04-06 17:41:00', 0),
(115545724891, 'test', 'dhasjdh', 'ADSHKJDH', 1, '', NULL, '2019-04-06 17:41:29', 0),
(115545742161, '', 'lorem', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy te', 1, '', NULL, '2019-04-06 18:10:16', 0),
(115546290981, 'test', 'iot,ios,android,freeze,food,mankind', 'test paper ', 1, '', NULL, '2019-04-07 09:24:58', 0),
(115546305161, '', '', '', 1, '', NULL, '2019-04-07 09:48:36', 0),
(115547230921, '', '', '', 1, '', NULL, '2019-04-08 11:31:32', 0),
(115547238591, '', '', '', 1, '', NULL, '2019-04-08 11:44:19', 0),
(115547239361, '', '', '', 1, '', NULL, '2019-04-08 11:45:36', 0),
(115547239531, 'test', 'test', 's', 1, '', NULL, '2019-04-08 11:45:53', 0),
(115547239721, 'test', 'test', 's', 1, '', NULL, '2019-04-08 11:46:12', 0),
(115547291721, 'title paper', 'key,word', 'abs tract', 1, 'COXDA.pdf', NULL, '2019-04-08 13:12:52', 0),
(115547296671, '', '', '', 1, 'COXDA1.pdf', NULL, '2019-04-08 13:21:07', 0),
(115547297641, '', '', '', 1, 'COXDA2.pdf', NULL, '2019-04-08 13:22:44', 0),
(115547298361, 'new ', 'dsjha,asdasd,sadasd,sadsad', 'sadsajdn shsadhsjahahd kashd\r\nczx chchhdkas d\r\na sdksadudiqdjask\r\njsa sa das d', 1, 'COXDA3.pdf', NULL, '2019-04-08 13:23:56', 0),
(115547298761, 'new ', 'dsjha,asdasd,sadasd,sadsad', 'sadsajdn shsadhsjahahd kashd\r\nczx chchhdkas d\r\na sdksadudiqdjask\r\njsa sa das d', 1, 'COXDA4.pdf', NULL, '2019-04-08 13:24:36', 0),
(115547299081, '', '', '', 1, 'COXDA5.pdf', NULL, '2019-04-08 13:25:08', 0),
(115547368821, 'test', 'jsahj,shadh', 'jhsakhdh', 1, '', NULL, '2019-04-08 15:21:22', 0),
(115547368891, 'test', 'jsahj,shadh', 'jhsakhdh', 1, '', NULL, '2019-04-08 15:21:29', 0),
(115547369631, 'test', 'jsahj,shadh', 'jhsakhdh', 1, 'test.pdf', NULL, '2019-04-08 15:22:43', 0),
(115547413881, '', '', '', 1, 'test1.pdf', NULL, '2019-04-08 16:36:28', 0),
(215547510642, 'maruf hh mail paper', 'maruf,hh,mail,paper', 'daskjdhashd ldjdkjas\r\nsa daskd\r\nsad ksjlsld jasd\r\ns sjsldas d\r\ndsl', 1, 'test3.pdf', NULL, '2019-04-08 19:17:44', 0),
(515547509885, 'black dmond mail paper', 'black,dmond,paper', 'skjdhkjhsa dsah h khd\r\ndsak hskdk\r\ndsd sakjdskd \r\nasd sdj', 1, 'test2.pdf', NULL, '2019-04-08 19:16:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paper_author`
--

CREATE TABLE `paper_author` (
  `paper_author_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `paper_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper_author`
--

INSERT INTO `paper_author` (`paper_author_id`, `author_id`, `paper_id`) VALUES
(1, 1, 2147483647),
(2, 1, 15544993711),
(3, 1, 604201911554499415),
(4, 1, 604201911554499466),
(5, 1, 604201911554500305),
(6, 1, 115545019361),
(7, 1, 115545724601),
(8, 1, 115545724891),
(9, 1, 115545742161),
(10, 1, 115546290981),
(11, 1, 115546305161),
(12, 1, 115547230921),
(13, 1, 115547238591),
(14, 1, 115547239361),
(15, 1, 115547239531),
(16, 1, 115547239721),
(17, 1, 115547291721),
(18, 1, 115547296671),
(19, 1, 115547297641),
(20, 1, 115547298361),
(21, 1, 115547298761),
(22, 1, 115547299081),
(23, 1, 115547368821),
(24, 1, 115547368891),
(25, 1, 115547369631),
(26, 1, 115547413881),
(27, 5, 515547509885),
(28, 2, 215547510642);

-- --------------------------------------------------------

--
-- Table structure for table `paper_reviewer`
--

CREATE TABLE `paper_reviewer` (
  `reviewer_id` int(11) NOT NULL,
  `paper_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `reviewer_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `dob` datetime NOT NULL,
  `affiliation` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `cv_url` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_comments` varchar(500) NOT NULL,
  `review_score` tinyint(4) NOT NULL,
  `reply` varchar(500) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `review_history`
--

CREATE TABLE `review_history` (
  `review_history_id` int(11) NOT NULL,
  `paper_id` bigint(20) NOT NULL,
  `review_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`paper_id`),
  ADD KEY `review_id` (`review_id`);

--
-- Indexes for table `paper_author`
--
ALTER TABLE `paper_author`
  ADD PRIMARY KEY (`paper_author_id`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`reviewer_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `review_history`
--
ALTER TABLE `review_history`
  ADD PRIMARY KEY (`review_history_id`),
  ADD KEY `review_id` (`review_id`),
  ADD KEY `paper_id` (`paper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paper_author`
--
ALTER TABLE `paper_author`
  MODIFY `paper_author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review_history`
--
ALTER TABLE `review_history`
  MODIFY `review_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `papers`
--
ALTER TABLE `papers`
  ADD CONSTRAINT `papers_ibfk_3` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`);

--
-- Constraints for table `review_history`
--
ALTER TABLE `review_history`
  ADD CONSTRAINT `review_history_ibfk_2` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`review_id`),
  ADD CONSTRAINT `review_history_ibfk_3` FOREIGN KEY (`paper_id`) REFERENCES `papers` (`paper_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
